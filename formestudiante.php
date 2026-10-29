<?php
  include("conexion.php");
  $mama=mysqli_query($conexion,"select * from mama") or die ("problemas en el select".mysqli_error($conexion));
  $papa=mysqli_query($conexion,"select * from papa") or die ("problemas en el select".mysqli_error($conexion));
  $result=mysqli_query($conexion,"select * from grados") or die ("problemas en el select".mysqli_error($conexion));
  
                   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="cssform2.css">
</head>
<body>
    
 <h1>ESTUDIANTE</h1>
 <form action="estudiante.php" method="POST">
<section>
  <p>Información Personal</p>
  <input type="number" placeholder="Documento" name="documento" required/>
  <input type="password" placeholder="Password" name="password" required/>
  <input type="text" placeholder="Nombre" name="nombre" required/>
  <input type="text" placeholder="Apellidos" name="apellidos" required />
  <select name="sexo" placeholder="Sexo" required>
    <option disabled hidden selected value="sexo">Sexo</option>
    <option value="femenino">Femenino</option>
    <option value="masculino">Masculino</option>
    <option value="nobinario">No binario</option>
  </select>
  <input type="date" placeholder="Fecha" name="fecha" required/>
  <input type="text" placeholder="Lugar expedicion Documento" name="expedicion" required/>
  <input type="text" placeholder="Lugar de nacimiento" name="lugar" required />
  <input type="text" placeholder="Direccion" name="direccion" required/>
  <input type="text" placeholder="Barrio" name="barrio" required/>
  <input type="text" placeholder="EPS" name="eps" required/>
  <select name="rh" placeholder="Tipo de sangre" required>
    <option disabled hidden selected value="rh">Tipo de sangre</option>
    <option value="A+">A+</option>
    <option value="A-">A-</option>
    <option value="B+">B+</option>
    <option value="B-">B-</option>
    <option value="AB-">AB-</option>
    <option value="AB+">AB+</option>
    <option value="O-">O-</option>
    <option value="O+">O+</option>
  </select>
  <select name="mama" placeholder="Mama" required>
  <option disabled hidden selected value="Mama">Mama</option>
  <?php
   while ($valor= mysqli_fetch_array($mama)) {
    echo '<option value="'.$valor['documentom'].'">'.$valor['documentom'].' '.$valor['nombrem'].'</option>';
   }
  ?>
  </select>
  <select name="papa" placeholder="Papa" required>
  <option disabled hidden selected value="Papa">Papa</option>
  <?php
   while ($valores= mysqli_fetch_array($papa)) {
    echo '<option value="'.$valores['documentop'].'">'.$valores['documentop'].'  '.$valores['nombrep'].'</option>';
   }
  ?>
  </select>
  <select name="grado" placeholder="grado" required>
  <option disabled hidden selected value="grado">Grado</option>
  <?php
   while ($valore= mysqli_fetch_array($result)) {
    echo '<option value="'.$valore['codigo'].'">'.$valore['nombre'].'</option>';
   }
  ?>
  </select>
</section>

<input type="submit" class="button" value="Enviar"></input>
</form>
</body>
</html>  

  