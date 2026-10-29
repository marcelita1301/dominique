<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Papa</title>
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



  
  <h1 style="text-align: center;">Padre</h1>
  <table style="border-collapse: collapse;">
 
  <thead>
    <tr>
      <th style="border: 1px solid black; padding: 5px; background-color: lightgray;">Documento</th>
      <th style="border: 1px solid black; padding: 5px; background-color: lightgray;">Nombre</th>
      <th style="border: 1px solid black; padding: 5px; background-color: lightgray;">Apellidos</th>
      <th style="border: 1px solid black; padding: 5px; background-color: lightgray;">Sexo</th>
      <th style="border: 1px solid black; padding: 5px; background-color: lightgray;">Estado civil</th>
      <th style="border: 1px solid black; padding: 5px; background-color: lightgray;">Fecha de Nacimiento</th>
      <th style="border: 1px solid black; padding: 5px; background-color: lightgray;">Lugar de Expedicion</th>
      <th style="border: 1px solid black; padding: 5px; background-color: lightgray;">Lugar de Nacimiento</th>
      <th style="border: 1px solid black; padding: 5px; background-color: lightgray;">Direccion</th>
      <th style="border: 1px solid black; padding: 5px; background-color: lightgray;">Barrio</th>
      <th style="border: 1px solid black; padding: 5px; background-color: lightgray;">EPS</th>
      <th style="border: 1px solid black; padding: 5px; background-color: lightgray;">RH</th>
      <th style="border: 1px solid black; padding: 5px; background-color: lightgray;">Profesion</th>
      <th style="border: 1px solid black; padding: 5px; background-color: lightgray;">Telefono</th>
      <th style="border: 1px solid black; padding: 5px; background-color: lightgray;">Correo</th>
      <th style="border: 1px solid black; padding: 5px; background-color: lightgray;">Modificar</th>
      <th style="border: 1px solid black; padding: 5px; background-color: lightgray;">Eliminar</th>
    </tr>
  </thead>
  <body>
    <?php
    include('conexion.php');
    $result=mysqli_query($conexion,"select * from papa;") or die ("problemas en el select".mysqli_error($conexion));

    while($reg=mysqli_fetch_array($result)){
      echo"<tr>";
      echo "<td>".$reg['documentop']."</td>";
      echo "<td>".$reg['nombrep']."</td>";
      echo "<td>".$reg['apellidosp']."</td>";
      echo "<td>".$reg['sexop']."</td>";
      echo "<td>".$reg['estadocivilp']."</td>";
      echo "<td>".$reg['fechap']."</td>";
      echo "<td>".$reg['expedicionp']."</td>";
      echo "<td>".$reg['lugarp']."</td>";
      echo "<td>".$reg['direccionp']."</td>";
      echo "<td>".$reg['barriop']."</td>";
      echo "<td>".$reg['epsp']."</td>";
      echo "<td>".$reg['rhp']."</td>";
      echo "<td>".$reg['profesionp']."</td>";
      echo "<td>".$reg['telefonop']."</td>";
      echo "<td>".$reg['correop']."</td>";

      echo "<td><div align='center'><a href='modificarpapa.php?cod=$reg[documentop]' onclick='mostrarAlerta();'><img src='Icons/icons8-edit.gif' style='width: 2rem;'></a></div></td>";
echo "<td><div align='center'><a href='eliminarpapa.php?doc=$reg[documentop]' onclick='confirmarEliminacion();'><img src='Icons/icons8-basura.gif' style='width: 2rem;'></a></div></td>";
  

     echo"<tr>";
    }
    
    ?></tbody>
    <tfoot>

      <th colspan="45">
        <div align="center">
          <a href="descargar.php" class="btn btn-primary">Descargar</a>
          <a href="imprimir.php" class="btn btn-info">Imprimir</a>
          <a href="bienvenidoadmin.php" class="btn btn-warning">Atras</a>
        </div>
      </th>
        
      <script>
        
        function confirmarEliminacion(documento) {
  var respuesta = confirm("¿Deseas eliminar este registro?");
  if (respuesta) {
    eliminarRegistro(documento);
  }
}

function eliminarRegistro(documento) {
  // Realizar una solicitud AJAX para eliminar el registro.
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "eliminarestudiante.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Manejar la respuesta del servidor, si es necesario.
      alert("Registro eliminado exitosamente.");
      // Actualizar la tabla o realizar otras acciones si es necesario.
    }
  };
  // Enviar los datos en el cuerpo de la solicitud.
  var data = {
    documento: documento
  };
  xhr.send(JSON.stringify(data));
}

</script>


    </tfoot>
  </table>
</body>
</html>