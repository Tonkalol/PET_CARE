<html>
<head>
<title>conexion</title>
</head>
<body>
<?php
$conexion=mysqli_connect("localhost","root","","Usuarios") 
  or die("Problemas en la conexion");
  mysqli_query($conexion,"insert into registros(Nombres, Apellidos, Email, Contrasena) values 
   ('$_REQUEST[Nombres]','$_REQUEST[Apellidos]','$_REQUEST[Email]','$_REQUEST[Contrasena]')") 
   or die("Problemas en el registro".mysqli_error( $conexion));
mysqli_close($conexion);
echo "Usuario guardado";  
?>
</body>
</html>