<?php
  include("conexion.php");
  $documento=$_POST["documento"];
  $password=$_POST["password"];
  $nombre=$_POST["nombre"];
  $apellidos=$_POST["apellidos"];
  $sexo=$_POST["sexo"];
  $fecha=$_POST["fecha"];
  $grado=$_POST["grado"];
  $acudiente=$_POST["acudiente"];
//Guardamos a la tabla
  mysqli_query($conexion,"insert into estudiante(documento,password,nombre,apellidos,sexo,fecha,grado,acudiente) values ($documento,'$password','$nombre','$apellidos','$sexo','$fecha','$grado',$acudiente)") or die("Problemas al insertar".mysqli_error($conexion));
  echo " Se guardaron los cambios ";
  header("location:mostrardatosestudiante.php");
?>

