<?php
  include("conexion.php");
  $codigo=$_POST["codigo"];
  $nombre=$_POST["nombre"];
  $descripcion=$_POST["descripcion"];
//Guardamos a la tabla
  mysqli_query($conexion,"insert into grados(codigo,nombre,descripcion) values ($codigo,'$nombre','$descripcion')") or die("Problemas al insertar".mysqli_error($conexion));
  echo " Se guardaron los cambios ";
?>