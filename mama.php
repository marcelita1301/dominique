<?php
  include("conexion.php");
  $documentom=$_POST["documentom"];
  $passwordm=$_POST["passwordm"];
  $nombrem=$_POST["nombrem"];
  $apellidosm=$_POST["apellidosm"];
  $sexom=$_POST["sexom"];
  $estadocivilm=$_POST["estadocivilm"];
  $fecham=$_POST["fecham"];
  $expedicionm=$_POST["expedicionm"];
  $lugarm=$_POST["lugarm"];
  $direccionm=$_POST["direccionm"];
  $barriom=$_POST["barriom"];
  $epsm=$_POST["epsm"];
  $rhm=$_POST["rhm"];
  $profesionm=$_POST["profesionm"];
  $telefonom=$_POST["telefonom"];
  $correom=$_POST["correom"];
//Guardamos a la tabla
  mysqli_query($conexion,"insert into mama(documentom,passwordm,nombrem,apellidosm,sexom,estadocivilm,fecham,expedicionm,lugarm,direccionm,barriom,epsm,rhm,profesionm,telefonom,correom) values ($documentom,'$passwordm','$nombrem','$apellidosm','$sexom','$estadocivilm','$fecham','$expedicionm','$lugarm','$direccionm','$barriom','$epsm','$rhm','$profesionm','$telefonom','$correom')") or die("Problemas al insertar".mysqli_error($conexion));
  echo " Se guardaron los cambios ";
    header("location:papa.html");
?>
