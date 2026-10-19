<?php
$conexion = mysqli_connect("localhost","root","","Usuarios") 
  or die("Problemas en la conexion");
  $table=mysqli_query($conexion,"select Nombres, Apellidos, Email from registros") 
  or die("Problemas en el select:".mysqli_error($conexion));
  while ($reg=mysqli_fetch_array($table))
  {
    echo "Nombre: ".$reg['Nombres']."<br>";
    echo "Apellido: ".$reg['Apellidos']."<br>";
    echo "Email: ".$reg['Email']."<br>";
    echo "<br>";
    echo "<hr>";
  }
mysqli_close($conexion);

