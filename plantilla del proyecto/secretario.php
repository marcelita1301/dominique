<?php
  include("conexion.php");
  $documento=$_POST["documento"];
  $password=$_POST["password"];
  $nombre=$_POST["nombre"];
  $apellidos=$_POST["apellidos"];
  $sexo=$_POST["sexo"];
  $estadocivil=$_POST["estadocivil"];
  $fecha=$_POST["fecha"];
  $telefono=$_POST["telefono"];
  $correo=$_POST["correo"];
//Guardamos a la tabla
  mysqli_query($conexion,"insert into secretario(documento,password,nombre,apellidos,sexo,estadocivil,fecha,telefono,correo) values ($documento,'$password','$nombre','$apellidos','$sexo','$estadocivil','$fecha','$telefono','$correo')") or die("Problemas al insertar".mysqli_error($conexion));
  echo " Se guardaron los cambios ";
?>
