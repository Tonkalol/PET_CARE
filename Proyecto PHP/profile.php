<head>
    <link rel="stylesheet" href="./style/profile.css">
</head>

<?php
include_once './layouts/header.php';

$openMascotas = isset($_GET['openMascotas']) && $_GET['openMascotas'] === 'true';

if (!isset($_SESSION['usuEma'])) {
    header("Location: ../Proyecto PHP/Main.php");
    exit();
}

$conexion = mysqli_connect("localhost", "root", "", "Usuarios");
if (!$conexion) {
    die("Error: No se pudo conectar a la base de datos.");
}

$query = "SELECT * FROM registros WHERE Email = ?";
$stmt = mysqli_prepare($conexion, $query);
mysqli_stmt_bind_param($stmt, "s", $_SESSION['usuEma']);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($result && mysqli_num_rows($result) > 0) {
    $usuario = mysqli_fetch_assoc($result);
}

$mascotas = [];
$queryMascotas = "SELECT * FROM mascotas WHERE usuario_id = ?";
$stmtMascotas = mysqli_prepare($conexion, $queryMascotas);
mysqli_stmt_bind_param($stmtMascotas, "i", $_SESSION['usuId']);
mysqli_stmt_execute($stmtMascotas);
$resultMascotas = mysqli_stmt_get_result($stmtMascotas);

if ($resultMascotas && mysqli_num_rows($resultMascotas) > 0) {
    while ($mascota = mysqli_fetch_assoc($resultMascotas)) {
        $mascotas[] = $mascota;
    }
    $_SESSION['mascotas'] = $mascotas;
}

mysqli_close($conexion);
?>


<body>
    <section id="cuenta">
        <h2>Hola, <?php echo $_SESSION['usuario']; ?></h2>
        <div class="menu">
            <button class="tab-button active" data-tab="configuracion">Configuración de la Cuenta</button>
            <button class="tab-button" data-tab="mascotas">Tus Mascotas</button>
            <button class="tab-button" data-tab="citas">Citas Agendadas</button>
            <button class="tab-button" data-tab="seguros">Seguros</button>
        </div>
        <div class="tab-content" id="configuracion">
            <form action="../Data/userdata.php" method="POST">
                <h2>Actualiza tus datos</h2>
                <div class="user-info">
                    <div class="info-item">
                        <label for="nombres"><strong>Nombre:</strong></label>
                        <input type="text" name="nombres" id="nombres" value="<?php echo htmlspecialchars($usuario['Nombres']); ?>" disabled>
                        <button type="button" class="edit-button" data-target="nombres">Editar</button>
                    </div>
                    <div class="info-item">
                        <label for="apellidos"><strong>Apellido:</strong></label>
                        <input type="text" name="apellidos" id="apellidos" value="<?php echo htmlspecialchars($usuario['Apellidos']); ?>" disabled>
                        <button type="button" class="edit-button" data-target="apellidos">Editar</button>
                    </div>
                    <div class="info-item">
                        <label for="contrasena"><strong>Nueva Contraseña:</strong></label>
                        <input type="password" name="contrasena" id="contrasena" placeholder="Introduce nueva contraseña">
                    </div>
                </div>
                <button type="submit" class="save-button">Guardar Cambios</button>
            </form>
            <?php
            if (isset($_SESSION['mensaje'])) {
                echo "<p id='mensaje' class='success'>" . htmlspecialchars($_SESSION['mensaje']) . "</p>";
                unset($_SESSION['mensaje']);
            }
            ?>
        </div>


        <div class="tab-content" id="mascotas" style="display: none;">
            <h3>Tus Mascotas</h3>

            <?php if (empty($mascotas)): ?>
                <p>Aún no has agregado a tu familia, ¡agrégales!</p>
            <?php else: ?>
                <div class="mascotas-list">
                    <?php foreach ($mascotas as $mascota): ?>
                        <div class="mascota-item">
                            <div class="mascota-info">
                                <img src="../../Uploads/<?php echo htmlspecialchars($mascota['imagen']); ?>" alt="Foto de <?php echo htmlspecialchars($mascota['nombre']); ?>" width="100">
                                <div>
                                    <p><strong>Nombre:</strong> <?php echo htmlspecialchars($mascota['nombre']); ?></p>
                                    <p><strong>Especie:</strong> <?php echo htmlspecialchars($mascota['tipo']); ?></p>
                                    <p><strong>Edad:</strong> <?php echo htmlspecialchars($mascota['edad']); ?> meses</p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <div class="center-button">
                <button id="showFormButton" class="save-button">Agregar Mascota</button>
            </div>

            <div id="addMascotaForm" class="add-mascota-form">
                <div class="form-container">
                    <span id="closeFormButton" class="close-button">&times;</span>
                    <h3>Agregar nueva mascota</h3>
                    <form action="../Data/Pets.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nombre">Nombre de la mascota:</label>
                            <input type="text" id="nombre" name="nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="tipo">Tipo de mascota (perro, gato, etc.):</label>
                            <input type="text" id="tipo" name="tipo" required>
                        </div>
                        <div class="form-group">
                            <label for="raza">Raza de la mascota:</label>
                            <input type="text" id="raza" name="raza" required>
                        </div>
                        <div class="form-group">
                            <label for="edad">Edad de la mascota en meses:</label>
                            <input type="number" id="edad" name="edad" min="0" required>
                        </div>
                        <div class="form-group">
                            <label for="imagen">Imagen de la mascota:</label>
                            <input type="file" id="imagen" name="imagen" accept="image/*">
                        </div>
                        <button type="submit" class="save-button">Guardar Mascota</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="tab-content" id="citas" style="display: none;">
            <h3>Citas Agendadas</h3>
            <p>Consulta y administra las citas agendadas para tus mascotas.</p>
        </div>

        <div class="tab-content" id="seguros" style="display: none;">
            <h3>Seguros</h3>
            <p>Explora y administra los planes de seguros de tus mascotas.</p>
        </div>
    </section>
    <script>
        const openMascotas = <?php echo json_encode($openMascotas); ?>;
    </script>
    <script src="profile.js"></script>
</body>

</html>