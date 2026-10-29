<?php
include("conexion.php");
$documento=$_POST["documento"];
$result=mysqli_query($conexion, "select * From estudiante where documento=$documento");
if((mysqli_num_rows($result)>0)){
    header("location:imprimircertificado.php");
}else{
  header("location:certificado.html");
}

?>