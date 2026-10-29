<?php
include('conexion.php');
$documento=$_POST["documento"];
mysqli_query($conexion,"update estudiante set nombre='$_POST[nombre]', apellidos='$_POST[apellidos]', sexo='$_POST[sexo]', fecha='$_POST[fecha]', grado='$_POST[grado]', acudiente='$_POST[acudiente]' where documento='$documento'") or die ("problemas en el select:". mysqli_error(  $conexion));
echo "El archivo fue modificado con exito";
echo "<br>";
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
   
   <a href="mostrardatosestudiante.php">Estudiantes</a>
</body>
</html>
