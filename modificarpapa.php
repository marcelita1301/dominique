<?php
include('conexion.php');
$id=$_GET["cod"];
$result=mysqli_query($conexion,"select * from papa where documento='$id'") or die ("problemas en el select". mysqli_error(  $conexion));
?>
<!DOCTYPE html>
<html>
<head>
	<title>Modificar</title>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="index2/imagenes/imagencorporativa.jpg" rel="icon">
    <link rel="stylesheet" href="cssform2.css">
    <script src="javaform2.js"></script>
</head>
<body>
	<form method="post" action="confirmaractualizaracudiente.php">
  <section>
    <p>Modificar Información Personal</p>

<?php

  While ($row=mysqli_fetch_array($result)){
  	echo "<input type='text' name='nombre' id='nombre' value='".$row['nombre']."'><br>";
  	echo "<input type='text' name='apellidos' id='apelidos' value='".$row['apellidos']."'><br>";
  	echo "<input type='text' name='sexo' id='sexo' value='".$row['sexo']."'><br>";
    echo "<input type='text' name='estadocivil' id='estadocivil' value='".$row['estadocivil']."'><br>";
  	echo "<input type='date' name='fecha' id='fecha' value='".$row['fecha']."'><br>";
    echo "<input type='text' name='expedicion' id='expedicion' value='".$row['expedicion']."'><br>";
    echo "<input type='text' name='lugar' id='lugar' value='".$row['lugar']."'><br>";
    echo "<input type='text' name='direccion' id='direccion' value='".$row['direccion']."'><br>";
    echo "<input type='text' name='barrio' id='barrio' value='".$row['barrio']."'><br>";
    echo "<input type='text' name='eps' id='eps' value='".$row['eps']."'><br>";
    echo "<input type='text' name='rh' id='rh' value='".$row['rh']."'><br>";
    echo "<input type='text' name='profesion' id='profesion' value='".$row['profesion']."'><br>";
  	echo "<input type='number' name='telefono' id='telefono' value='".$row['telefono']."'><br>";
  	echo "<input type='email' name='correo' id='correo' value='".$row['correo']."'><br>";
  }
 ?>
 <input type='hidden' name='documento' id='documento' value='<?php echo $id;?>'>
 </section>
 <input type="submit" class="button" value="Actualizar">
</form>
</body>
</html>
