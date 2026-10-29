<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Planillas</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

  <style>
    
    table {
      border-collapse: collapse;
      width: 100%;
      margin-top: 20px;
    }

    th,
    td {
      border: 1px solid black;
      padding: 5px;
    }

    th {
      background-color: lightgray;
    }

    tbody tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    tfoot {
      border-top: 1px solid black;
    }

    .btn {
      padding: 5px 10px;
      border-radius: 5px;
      font-size: 14px;
      cursor: pointer;
    }

    .btn-primary {
      background-color: #007bff;
      color: white;
    }

    .btn-info {
      background-color: #00b8d4;
      color: white;
    }

    .btn-warning {
      background-color: #ffc107;
      color: white;
    }
  </style>
</head>



  
  <h1 style="text-align: center;">Plantilla</h1>
  <table style="border-collapse: collapse;">
 
  <thead>
    <tr>
      <th style="border: 1px solid black; padding: 5px; background-color: lightgray;">Documento</th>
      <th style="border: 1px solid black; padding: 5px; background-color: lightgray;">Grado</th>
      <th style="border: 1px solid black; padding: 5px; background-color: lightgray;">Nombre</th>
      <th style="border: 1px solid black; padding: 5px; background-color: lightgray;">Apellidos </th>
      <th style="border: 1px solid black; padding: 5px; background-color: lightgray;">Sexo</th>
      <th style="border: 1px solid black; padding: 5px; background-color: lightgray;">Fercha de Nacimiento</th>
      <th style="border: 1px solid black; padding: 5px; background-color: lightgray;">Lugar de Expedicion</th>
      <th style="border: 1px solid black; padding: 5px; background-color: lightgray;">Dirreccion</th>
      <th style="border: 1px solid black; padding: 5px; background-color: lightgray;">Barrio</th>
      <th style="border: 1px solid black; padding: 5px; background-color: lightgray;">EPS</th>
      <th style="border: 1px solid black; padding: 5px; background-color: lightgray;">RH</th>
      <th style="border: 1px solid black; padding: 5px; background-color: lightgray;">Documento Madre</th>
      <th style="border: 1px solid black; padding: 5px; background-color: lightgray;">Nombre Madre</th>
      <th style="border: 1px solid black; padding: 5px; background-color: lightgray;">Apellidos Madre</th>
      <th style="border: 1px solid black; padding: 5px; background-color: lightgray;">Lugar de Expedicion Madre</th>
      <th style="border: 1px solid black; padding: 5px; background-color: lightgray;">Telefono Madre</th>
      <th style="border: 1px solid black; padding: 5px; background-color: lightgray;">Correo Madre</th>
      <th style="border: 1px solid black; padding: 5px; background-color: lightgray;">Documento Padre</th>
      <th style="border: 1px solid black; padding: 5px; background-color: lightgray;">Nombre Padre</th>
      <th style="border: 1px solid black; padding: 5px; background-color: lightgray;">Apellidos Padre</th>
      <th style="border: 1px solid black; padding: 5px; background-color: lightgray;">Lugar de Expedicion Padre</th>
      <th style="border: 1px solid black; padding: 5px; background-color: lightgray;">Telefono Padre</th>
      <th style="border: 1px solid black; padding: 5px; background-color: lightgray;">Correo Padre</th>
    </tr>
  </thead>
  <body>
   
   <a href="bienvenidoadmin.php">Inicio</a>
</body>
    


<?php
include("conexion.php");
$estudiante=mysqli_query($conexion,"select * from estudiante e INNER JOIN mama m ON m.documentom=e.mama INNER JOIN papa p ON p.documentop=e.papa ") or die ("problemas en el select".mysqli_error($conexion));


while($reg=mysqli_fetch_array($estudiante)){
    echo"<tr class='tabla'>";
    
    echo "<td>".$reg['documento']."</td>";
    echo "<td>".$reg['grado']."</td>";
    echo "<td>".$reg['nombre']."</td>";
    echo "<td>".$reg['apellidos']."</td>";
    echo "<td>".$reg['sexo']."</td>";
    echo "<td>".$reg['fecha']."</td>";
    echo "<td>".$reg['expedicion']."</td>";
    echo "<td>".$reg['direccion']."</td>";
    echo "<td>".$reg['barrio']."</td>";
    echo "<td>".$reg['eps']."</td>";
    echo "<td>".$reg['rh']."</td>";
    echo "<td>".$reg['documentom']."</td>";
    echo "<td>".$reg['nombrem']."</td>";
    echo "<td>".$reg['apellidosm']."</td>";
    echo "<td>".$reg['expedicionm']."</td>";
    echo "<td>".$reg['telefonom']."</td>";
    echo "<td>".$reg['correom']."</td>";
    echo "<td>".$reg['documentop']."</td>";
    echo "<td>".$reg['nombrep']."</td>";
    echo "<td>".$reg['apellidosp']."</td>";
    echo "<td>".$reg['expedicionp']."</td>";
    echo "<td>".$reg['telefonop']."</td>";
    echo "<td>".$reg['correop']."</td>";

}
 ?>

</html>