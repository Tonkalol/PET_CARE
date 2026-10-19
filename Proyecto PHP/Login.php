<?php
$mensaje = isset($_GET['error']) ? $_GET['error'] : "";
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pet Care- Login</title>
	<link rel="stylesheet" href="style/logstyle.css">
</head>

<body>

	<container>

		<h1>Inicia Sesion</h1>
		<form action="../Data/Logeo.php" method="post">
			<h3>Correo:</h3>
			<input type="text" name="Email">

			<h3>Contrasena:</h3>
			<input type="password" name="Contrasena">

			<button>login</button>
		</form>

		<?php if ($mensaje): ?>
            <p style="color: red;"><?= htmlspecialchars($mensaje) ?></p>
        <?php endif; ?>
	</container>

</body>

</html>

<form action="../Data/Logeo.php" method="post">