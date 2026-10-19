<?php
session_start();

if (!isset($_SESSION['usuId'])) {
    header('Location: ../Proyecto_PHP/login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mascotaId = $_POST['mascota'];
    $tipoConsulta = $_POST['consulta'];
    $fecha = $_POST['fecha'];

    if (empty($mascotaId) || empty($tipoConsulta) || empty($fecha)) {
        echo "Por favor, completa todos los campos.";
        exit();
    }

    $conexion = mysqli_connect("localhost", "root", "", "Usuarios");

    if (!$conexion) {
        die("Error: No se pudo conectar a la base de datos.");
    }

    $usuarioId = $_SESSION['usuId'];
    $query = "INSERT INTO citas (usuario_id, mascota_id, tipo_consulta, fecha) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexion, $query);
    mysqli_stmt_bind_param($stmt, "iiss", $usuarioId, $mascotaId, $tipoConsulta, $fecha);

    if (mysqli_stmt_execute($stmt)) {
        echo "Cita agendada con éxito.";
    } else {
        echo "Hubo un error al agendar la cita. Por favor, inténtalo nuevamente.";
    }

    mysqli_close($conexion);
}
?>
