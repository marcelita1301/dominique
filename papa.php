<?php
  include("conexion.php");
  $documentop=$_POST["documentop"];
  $passwordp=$_POST["passwordp"];
  $nombrep=$_POST["nombrep"];
  $apellidosp=$_POST["apellidosp"];
  $sexop=$_POST["sexop"];
  $estadocivilp=$_POST["estadocivilp"];
  $fechap=$_POST["fechap"];
  $expedicionp=$_POST["expedicionp"];
  $lugarp=$_POST["lugarp"];
  $direccionp=$_POST["direccionp"];
  $barriop=$_POST["barriop"];
  $epsp=$_POST["epsp"];
  $rhp=$_POST["rhp"];
  $profesionp=$_POST["profesionp"];
  $telefonop=$_POST["telefonop"];
  $correop=$_POST["correop"];
//Guardamos a la tabla
  mysqli_query($conexion,"insert into papa(documentop,passwordp,nombrep,apellidosp,sexop,estadocivilp,fechap,expedicionp,lugarp,direccionp,barriop,epsp,rhp,profesionp,telefonop,correop) values ($documentop,'$passwordp','$nombrep','$apellidosp','$sexop','$estadocivilp','$fechap','$expedicionp','$lugarp','$direccionp','$barriop','$epsp','$rhp','$profesionp','$telefonop','$correop')") or die("Problemas al insertar".mysqli_error($conexion));
  echo " Se guardaron los cambios ";
    header("location:formestudiante.php");
?>