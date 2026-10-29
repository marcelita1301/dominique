<?php
include('conexion.php');
$result=mysqli_query($conexion,"select * from docente;") or die ("problemas en el select".mysqli_error($conexion));



echo "<table border='1'>";
echo"<tr>";
echo "<td>Documento</td><td>Nombre</td><td>Apellidos</td><td>Sexo</td><td>Fecha de Nacimiento</td><td>Grado que dicta</td><td>Eliminar</td><td>Modificar</td>";
echo"<tr>";
while($reg=mysqli_fetch_array($result)){
    echo"<tr>";
    echo "<td>".$reg['documento']."</td>";
    echo "<td>".$reg['nombre']."</td>";
    echo "<td>".$reg['apellidos']."</td>";
    echo "<td>".$reg['sexo']."</td>";
    echo "<td>".$reg['fecha']."</td>";
    echo "<td>".$reg['grado']."</td>";


    echo"<td><a href='eliminar.php?cod=$reg[documento]'>Eliminar</td>";
    echo"<td><a href='modificardocente.php?doc=$reg[documento]'>Modificar</td>";
    echo"<tr>";
}
echo"</table>";
?>