<?php
include('conexion.php');
$id=$_GET["doc"];
$result=mysqli_query($conexion,"select * from docente where documento='$id'") or die ("problemas en el select". mysqli_error(  $conexion));
?>
<!DOCTYPE html>
<html>
<head>
	<title>Modificar</title>
</head>
<body>
	<form method="post" action="confirmaractualizardocente.php">

<?php

  While ($row=mysqli_fetch_array($result)){

  	echo "<input type='text' name='nombre' id='nombre' value='".$row['nombre']."'><br>";
  	echo "<input type='text' name='apellidos' id='apelidos' value='".$row['apellidos']."'><br>";
  	echo "<input type='text' name='sexo' id='sexo' value='".$row['sexo']."'><br>";
  	echo "<input type='date' name='fecha' id='fecha' value='".$row['fecha']."'><br>";
  	echo "<input type='number' name='grado' id='grado' value='".$row['grado']."'><br>";
  }
 ?>
 <input type='hidden' name='documento' id='documento' value='<?php echo $id;?>'>
 <input type="submit" value="Actualizar">
</form>
</body>
</html>
