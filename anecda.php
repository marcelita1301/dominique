<?php
  include("conexion.php");
  $documentoestudiante=$_POST["documentoestudiante"];
  $nombreestudiante=$_POST["nombreestudiante"];
  $fechanacimiento=$_POST["fechanacimiento"];
  $direccion=$_POST["direccion"];
  $nombremadre=$_POST["nombremadre"];
  $documentom=$_POST["documentom"];
  $telefonom=$_POST["telefonom"];
  $nombrepadre=$_POST["nombrepadre"];
  $documentop=$_POST["documentop"];
  $telefonop=$_POST["telefonop"];
  $acudiente=$_POST["acudiente"];
  $parentesco=$_POST["parentesco"];
  $telefonoacu=$_POST["telefonoacu"];
  $docente=$_POST["docente"];
  $grado=$_POST["grado"];
  $fechainiciacion=$_POST["fechainiciacion"];
  $año=$_POST["año"];
//Guardamos a la tabla
  mysqli_query($conexion,"insert into anecdatario(documentoestudiante,nombreestudiante,fechanacimiento,direccion,nombremadre,documentom,telefonom,nombrepadre,documentop,telefonop,acudiente,parentesco,telefonoacu,docente,grado,fechainiciacion,año) values ($documentoestudiante,'$nombreestudiante','$fechanacimiento','$direccion','$nombremadre','$documentom','$telefonom','$nombrepadre','$documentop','$telefonop','$acudiente','$parentesco','$telefonoacu','$docente','$grado','$fechainiciacion','$año')") or die("Problemas al insertar".mysqli_error($conexion));
  echo'<script type="text/javascript">
    alert("Se Guardo Correctamente");
    window.location.href="anecdatario.php";
    </script>';;
?>