<?php
  include("conexion.php");
  $user=$_POST["usuario"];
  $password=$_POST["password"];
  $secretario=mysqli_query($conexion, "select * from secretario where documento='$user' && password='$password'");
  $acudiente=mysqli_query($conexion, "select * from acudiente where documento='$user' && password='$password' ");
  $docente=mysqli_query($conexion, "select * from docente where documento='$user' && password='$password' ");
  $estudiante=mysqli_query($conexion, "select * from estudiante where documento='$user' && password='$password' ");

  if(mysqli_num_rows($secretario)>0){
   $fila=mysqli_fetch_row($secretario);
   $nombre=$fila[2];
   $documento=$fila[0];

   session_start();
   $_SESSION['nombre']="$nombre";
   $_SESSION['documento']="$documento";
   header("location:admin1.php");

  }elseif(mysqli_num_rows($acudiente)>0){
   $fila=mysqli_fetch_row($acudiente);
   $nombre=$fila[2];
   $documento=$fila[0];

   session_start();
   $_SESSION['nombre']="$nombre";
   $_SESSION['documento']="$documento";
   header("location:admin1.php");

  }elseif(mysqli_num_rows($docente)>0){
   $fila=mysqli_fetch_row($docente);
   $nombre=$fila[2];
   $documento=$fila[0];

   session_start();
   $_SESSION['nombre']="$nombre";
   $_SESSION['documento']="$documento";
   header("location:admin1.php");

  }elseif(mysqli_num_rows($estudiante)>0){
   $fila=mysqli_fetch_row($estudiante);
   $nombre=$fila[2];
   $documento=$fila[0];

   session_start();
   $_SESSION['nombre']="$nombre";
   $_SESSION['documento']="$documento";
   header("location:admin1.php");
  }else{
    header("location:login1.html");
  }
 

?>