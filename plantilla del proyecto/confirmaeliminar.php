<?php
include('conexion.php');
$id=$_GET["ced"];
mysqli_query($conexion, "DELETE from estudiante where documento=$id") or die ("problemas en el select". mysqli_error ($conexion));
header("location:mostrardatos.php");
?>