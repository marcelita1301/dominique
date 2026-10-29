<?php
include('conexion.php');
$id=$_GET["doc"];
$result=mysqli_query($conexion,"delete  from estudiante where documento=$id") or die ("problemas en el select". mysqli_error(  $conexion));

header("location:mostrarestu.php");

?>





