<?php
include("conexion.php");
$result=mysqli_query($conexion,"select * from documentos;") or die ("problemas en el select".mysqli_error($conexion));

$id_archivo = $_GET['id_archivo'];
$query = "SELECT nombre, contenido FROM documentos WHERE id = :id_archivo";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="index2/imagenes/imagencorporativa.jpg" rel="icon">
    <link rel="stylesheet" href="cssform2.css">
    <script src="javaform2.js"></script>
</head>
<body>
    <br> <br> <br> <br>
    <section>
    <a href='/Proyecto de grado lu/imageness'>DESCARGAR</a>
    </section>
</body>
</html>


