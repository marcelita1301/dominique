<?php
include('conexion.php');
$documento=$_POST["documento"];
mysqli_query($conexion,"update estudiante set nombre='$_POST[nombre]', apellidos='$_POST[apellidos]', sexo='$_POST[sexo]', fecha='$_POST[fecha]',expedicion='$_POST[expedicion]',lugar='$_POST[lugar]',direccion='$_POST[direccion]',barrio='$_POST[barrio]',eps='$_POST[eps]',rh='$_POST[rh]',  mama='$_POST[mama]',papa='$_POST[papa]' where documento='$documento'") or die ("problemas en el select:". mysqli_error(  $conexion));
echo'<script type="text/javascript">
    alert("Se Modifico Correctamente");
    window.location.href="mostrarestu.php";
    </script>';
?>

