<?php
session_start();
if(isset($_POST['generar'])){
include("conexion.php");
$result=mysqli_query($conexion,"select * from estudiante where documento='$id'") or die ("problemas en el select". mysqli_error(  $conexion));

 While ($row=mysqli_fetch_array($result)){
    $mes=date("m");
    $anio=date("Y");
        $doc=$fila['Documento'];
        $query2="INSERT INTO pension(valor,anio,mes,concepto,estado,estudiantes_documento) VALUES(452500,'$anio','$mes', 'mensualidad', 'por pagar', '$doc')";
        echo "si";

 }
}
?>