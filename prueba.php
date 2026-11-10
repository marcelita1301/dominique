<?php
include ("conexion.php");

$v=$_POST["documentoestudiante"];
echo $v;

$result=mysqli_query($conexion,"select * from anecdatario where documentoestudiante='$v'")or die ("Problemas en el select".mysqli_error($conexion));
if (mysqli_num_rows($result)>0){
    header("location:anecdatario.php");
}else{
    header("location:anecdatarionuevo.html");
}
?>