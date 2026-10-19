<?php
session_start();

$conexion = mysqli_connect("localhost", "root", "", "Usuarios");
if (!$conexion) {
    die("Error: No se pudo conectar a la base de datos.");
}

$nombre = $_POST['nombre'];
$tipo = $_POST['tipo'];
$raza = $_POST['raza'];
$edad = $_POST['edad'];
$usuario_id = $_SESSION['usuId'];

$imagen = null;

if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
    $nombreArchivo = uniqid() . "_" . basename($_FILES['imagen']['name']);
    $rutaArchivo = $nombreArchivo;

    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaArchivo)) {
        $imagen = $rutaArchivo;
    } else {
        echo "Error al subir la imagen. Verifica el formato del archivo.";
    }
} else {
    $imagen = "default.jpg";
}

$query = "INSERT INTO mascotas (nombre, tipo, raza, edad, imagen, usuario_id) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conexion, $query);
mysqli_stmt_bind_param($stmt, "sssisi", $nombre, $tipo, $raza, $edad, $imagen, $usuario_id);

if (mysqli_stmt_execute($stmt)) {
    echo "Mascota agregada con éxito.";
} else {
    echo "Error al agregar la mascota: " . mysqli_error($conexion);
}

mysqli_close($conexion);
?>
