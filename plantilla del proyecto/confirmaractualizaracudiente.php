<?php
include('conexion.php');
$documento=$_POST["documento"];
mysqli_query($conexion,"update acudiente set nombre='$_POST[nombre]', apellidos='$_POST[apellidos]', sexo='$_POST[sexo]',estadocivil='$_POST[estadocivil]', fecha='$_POST[fecha]', telefono='$_POST[telefono]', correo='$_POST[correo]' where documento='$documento'") or die ("problemas en el select:". mysqli_error(  $conexion));
echo "El archivo fue modificado con exito";
echo "<br>";
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
   
   <a href="mostrardatosacudiente.php">Acudientes</a>
</body>
</html>
