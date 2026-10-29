<?php
include('conexion.php');
$result=mysqli_query($conexion,"select * from documentos;") or die ("problemas en el select".mysqli_error($conexion));

echo "<table>";
echo"<tr>";
echo "<td>ID</td><td>Nombre</td><td>Contenido</td><td>Documento</td><td>Eliminar</td><td>Modificar</td>";
echo"<tr>";
while($reg=mysqli_fetch_array($result)){
    echo"<tr>";
    echo "<td>".$reg['id']."</td>";
    echo "<td>".$reg['nombre']."</td>";
    echo "<td>".$reg['contenido']."</td>";

    echo"<td><img width='55' height='55' src=/Proyecto de grado/imageness/".$reg['contenido']."></td>";
    echo"<td><a href='eliminar.php?cod=$reg[id]'>Eliminar</td>";
    echo"<td><a href='modificar.php?doc=$reg[id]'>Modificar</td>";
    echo"<tr>";
}
echo"</table>";
?>


