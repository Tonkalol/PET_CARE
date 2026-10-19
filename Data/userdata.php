<?php
session_start();

$conexion = mysqli_connect("localhost", "root", "", "Usuarios");
if (!$conexion) {
    die("Error: No se pudo conectar a la base de datos.");
}

$nombres = isset($_POST['nombres']) ? trim($_POST['nombres']) : null;
$apellidos = isset($_POST['apellidos']) ? trim($_POST['apellidos']) : null;
$email = isset($_POST['email']) ? trim($_POST['email']) : null;
$contrasena = isset($_POST['contrasena']) ? trim($_POST['contrasena']) : null;

$fields = [];
$params = [];
$types = '';

if ($nombres) {
    $fields[] = 'Nombres = ?';
    $params[] = $nombres;
    $types .= 's';
}

if ($apellidos) {
    $fields[] = 'Apellidos = ?';
    $params[] = $apellidos;
    $types .= 's';
}

if ($contrasena) {
    $fields[] = 'Contrasena = ?';
    $params[] = $contrasena;
    $types .= 's';
}

if (empty($fields)) {
    $_SESSION['mensaje'] = "No hay datos para actualizar.";
    header("Location: ../Proyecto PHP/profile.php");
    exit;
}

$query = "UPDATE registros SET " . implode(', ', $fields) . " WHERE Email = ?";
$params[] = $_SESSION['usuEma']; 
$types .= 's';

$stmt = mysqli_prepare($conexion, $query);
mysqli_stmt_bind_param($stmt, $types, ...$params);

if (mysqli_stmt_execute($stmt)) {
    if ($nombres) {
        $_SESSION['usuario'] = $nombres;
    }
    if ($apellidos) {
        $_SESSION['usuApe'] = $apellidos;
    }
    $_SESSION['mensaje'] = "Datos actualizados correctamente.";
    header("Location: ../Proyecto PHP/profile.php");
    exit;
} else {
    $_SESSION['mensaje'] = "No se pudo actualizar la información. Intenta nuevamente.";
    header("Location: ../Proyecto PHP/profile.php");
    exit;
}

mysqli_close($conexion);
?>
