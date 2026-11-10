<?php
include('conexion.php');
$id=$_GET["doc"];
$result=mysqli_query($conexion,"delete  from papa where documentop=$id") or die ("problemas en el select". mysqli_error(  $conexion));

header("location:mostrarpapa.php");

?>