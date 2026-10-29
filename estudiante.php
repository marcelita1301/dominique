<?php
  include("conexion.php");
  $documento=$_POST["documento"];
  $password=$_POST["password"];
  $nombre=$_POST["nombre"];
  $apellidos=$_POST["apellidos"];
  $sexo=$_POST["sexo"];
  $fecha=$_POST["fecha"];
  $expedicion=$_POST["expedicion"];
  $lugar=$_POST["lugar"];
  $direccion=$_POST["direccion"];
  $barrio=$_POST["barrio"];
  $eps=$_POST["eps"];
  $rh=$_POST["rh"];
  $mama=$_POST["mama"];
  $papa=$_POST["papa"];
  $grado=$_POST["grado"];

//Guardamos a la tabla
  mysqli_query($conexion,"insert into estudiante(documento,password,nombre,apellidos,sexo,fecha,expedicion,lugar,direccion,barrio,eps,rh,mama,papa,grado) values ($documento,'$password','$nombre','$apellidos','$sexo','$fecha','$expedicion','$lugar','$direccion','$barrio','$eps','$rh',$mama,$papa,$grado)") or die("Problemas al insertar".mysqli_error($conexion));
  echo'<script type="text/javascript">
    alert("Se Guardaron los Cambios");
    window.location.href="mostrarestu.php";
    </script>';

?>

