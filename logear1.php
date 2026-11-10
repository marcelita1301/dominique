<?php
  include("conexion.php");
  $user=$_POST["usuario"];
  $password=$_POST["password"];
  $secretario=mysqli_query($conexion, "select * from secretario where documento='$user' && password='$password'");
  $mama=mysqli_query($conexion, "select * from mama where documentom='$user' && passwordm='$password' ");
  $papa=mysqli_query($conexion, "select * from papa where documentop='$user' && passwordp='$password' ");
  $docente=mysqli_query($conexion, "select * from docente where documento='$user' && password='$password' ");
  $estudiante=mysqli_query($conexion, "select * from estudiante where documento='$user' && password='$password' ");

  if(mysqli_num_rows($secretario)>0){
   $fila=mysqli_fetch_row($secretario);
   $nombre=$fila[2];
   $documento=$fila[0];

   session_start();
   $_SESSION['nombre']="$nombre";
   $_SESSION['documento']="$documento";
   header("location:bienvenidoadmin.php");

  }elseif(mysqli_num_rows($mama)>0){
   $fila=mysqli_fetch_row($mama);
   $nombrem=$fila[2];
   $documentom=$fila[0];

   session_start();
   $_SESSION['nombrem']="$nombrem";
   $_SESSION['documentom']="$documentom";
   header("location:bienvenidoacudiente.php");

  }elseif(mysqli_num_rows($papa)>0){
   $fila=mysqli_fetch_row($papa);
   $nombrep=$fila[2];
   $documentop=$fila[0];

   session_start();
   $_SESSION['nombrep']="$nombrep";
   $_SESSION['documentop']="$documentop";
   header("location:bienvenidoacudiente.php");

  }elseif(mysqli_num_rows($docente)>0){
   $fila=mysqli_fetch_row($docente);
   $nombre=$fila[2];
   $documento=$fila[0];

   session_start();
   $_SESSION['nombre']="$nombre";
   $_SESSION['documento']="$documento";
   header("location:bienvenidodocente.php");

  }elseif(mysqli_num_rows($estudiante)>0){
   $fila=mysqli_fetch_row($estudiante);
   $nombre=$fila[2];
   $documento=$fila[0];

   session_start();
   $_SESSION['nombre']="$nombre";
   $_SESSION['documento']="$documento";
   header("location:bienvenidoestudiante.php");
  }else{
    header("location:login1.html");
  }
 

?>