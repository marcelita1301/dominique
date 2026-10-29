<?php
session_start();
if (isset($_SESSION["nombre"])){

}else{
	header("location:login1.html");
	exit();
}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	BIENVENIDO<br>
	<?php echo $_SESSION['nombre']."";
	      echo "<br>";
          echo $_SESSION['documento'];
          echo "<br>" 
          ?>

	<a href="salir.php">Cerrar sesión</a>
</body>
</html>