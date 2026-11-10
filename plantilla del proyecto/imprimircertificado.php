<?php
include("conexion.php");
$query=("SELECT documento, nombre, grado FROM estudiante");
$resultado=mysqli_query($conexion,$query);
?>
<!DOCTYPE html>
<html lang="en">
<head> <center>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h4>LA DIRECTORA DEL CENTRO EDUCATIVO DOMINIQUE</h4>
    <br><br>
    <h4>HACE CONSTAR QUE:</h4>
    <br> <br>
    <?php
     while ($valores=mysqli_fetch_array($resultado)){
         echo "LA ESTUDIANTE:.$valores[nombre].";
     }
    ?>
</body>
</html>