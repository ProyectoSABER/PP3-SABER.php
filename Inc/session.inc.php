<?php 

session_start();
if (empty($_SESSION['USUARIO_EMAIL'])) {

  header('Location:cerrarSesion.php');
  exit;
}
?>