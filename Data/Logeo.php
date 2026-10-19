<?php
session_start();

// ==========================================
// 1. EL OBSERVADOR (El que registra los accesos)
// ==========================================
class LoggerObserver implements SplObserver {
    public function update(SplSubject $subject): void {
        if ($subject instanceof AuthManager) {
            $email = $subject->getEmail();
            $estado = $subject->getEstado();
            $fecha = date('Y-m-d H:i:s');
            
            // Guardamos el historial en un archivo de texto
            $mensaje = "[$fecha] Intento de login: $email - Estado: $estado\n";
            file_put_contents('log_accesos.txt', $mensaje, FILE_APPEND);
        }
    }
}

// ==========================================
// 2. EL SUJETO (Tu sistema de Login)
// ==========================================
class AuthManager implements SplSubject {
    private array $observadores = [];
    private string $email = '';
    private string $estado = '';
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function attach(SplObserver $observer): void {
        $this->observadores[] = $observer;
    }

    public function detach(SplObserver $observer): void {
        $key = array_search($observer, $this->observadores, true);
        if ($key !== false) {
            unset($this->observadores[$key]);
        }
    }

    public function notify(): void {
        foreach ($this->observadores as $observador) {
            $observador->update($this);
        }
    }

    // Aquí está la lógica de tu base de datos
    public function login($email, $contrasena) {
        $this->email = $email;

        $email_esc = mysqli_real_escape_string($this->conexion, $email);
        $pass_esc = mysqli_real_escape_string($this->conexion, $contrasena);

        try {
            $query = "SELECT * FROM registros WHERE Email='$email_esc'";
            $resultado = mysqli_query($this->conexion, $query);

            if (!$resultado) {
                throw new Exception("No se pudo ejecutar la consulta.");
            }

            if (mysqli_num_rows($resultado) > 0) {
                $fila = mysqli_fetch_assoc($resultado);
                
                if ($pass_esc == $fila['Contrasena']) {
                    // Login exitoso
                    $this->estado = 'exitoso';
                    $this->notify(); 

                    $_SESSION['usuId'] = $fila['ID_key'];
                    $_SESSION['usuario'] = $fila['Nombres'];
                    $_SESSION['usuApe'] = $fila['Apellidos'];
                    $_SESSION['usuEma'] = $fila['Email'];
                    
                    header("Location: ../Proyecto PHP/Main.php");
                    exit;
                } else {
                    // Contraseña incorrecta
                    $this->estado = 'fallido_contrasena';
                    $this->notify(); 
                    header("Location: ../Proyecto PHP/Login.php");
                    exit;
                }
            } else {
                // Usuario no existe
                $this->estado = 'fallido_usuario_no_existe';
                $this->notify(); 
                header("Location: ../Proyecto PHP/Login.php");
                exit;
            }

        } catch (\Throwable $th) {
            $this->estado = 'error_servidor';
            $this->notify();
            header("Location: ../Proyecto PHP/Login.php");
            exit;
        }
    }

    public function getEmail(): string { return $this->email; }
    public function getEstado(): string { return $this->estado; }
}

// ==========================================
// 3. EJECUCIÓN DEL CÓDIGO
// ==========================================

// Blindaje: Solo permitimos que este código se ejecute si enviaron el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Usamos 127.0.0.1 para evitar el error de conexión denegada que tuviste antes
        $conexion = mysqli_connect("127.0.0.1", "root", "", "Usuarios");

        if (!$conexion) {
            die("No se pudo conectar a la base de datos.");
        }

        $email = $_POST['Email'] ?? '';
        $contrasena = $_POST['Contrasena'] ?? '';

        // Preparamos nuestro gestor y conectamos el observador
        $auth = new AuthManager($conexion);
        $auth->attach(new LoggerObserver());

        // ¡Disparamos el login!
        $auth->login($email, $contrasena);

        mysqli_close($conexion);

    } catch (\Throwable $th) {
        header("Location: ../Proyecto PHP/Login.php");
        exit;
    }
} else {
    // Si alguien intenta entrar directo a Logeo.php escribiendo la URL, lo devolvemos al inicio
    header("Location: ../Proyecto PHP/Login.php");
    exit;
}
?>