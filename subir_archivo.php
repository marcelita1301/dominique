<?php
  include("conexion.php");
  $nom=$_POST["nombre"];
  $nombre_img=$_FILES['archivo']['name'];
  $tam_img=$_FILES['archivo']['size'];
   if ($tam_img<=1000000) {
   		$carpeta=$_SERVER['DOCUMENT_ROOT'].'/Proyecto de grado lu/imageness/';
   		move_uploaded_file($_FILES['archivo']['tmp_name'], $carpeta.$nombre_img);
//Guardamos a la tabla
  mysqli_query($conexion,"insert into documentos(nombre,contenido) values ('$nom','$nombre_img')") or die("Problemas al insertar".mysqli_error($conexion));
  echo'<script type="text/javascript">
    alert("Se Guardaron los Cambios");
    window.location.href="bienvenidoadmin.php";
    </script>';
   }

?>