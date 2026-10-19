<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registro</title>
	<link rel="stylesheet" href="style/logstyle.css">
</head>
<body>
	<container>
		<h1>Registrate con nosotros</h1>
		<form action="../Data/registro.php" method="post">
			<h3>Nombre: </h3>
			<input type="text" name="Nombres">
			<h3>Apellidos: </h3>
			<input type="text" name="Apellidos">
			<h3>Correo: </h3>
			<input type="text" name="Email">
			<h3>Contrasena: </h3>
			<input type="text" name="Contrasena">
			<button>login</button>
		</form>
	</container>
</body>
</html>