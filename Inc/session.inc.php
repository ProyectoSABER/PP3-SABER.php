<?php
session_start();
if (empty($_SESSION['USUARIO_EMAIL'])) {
  $_SESSION["UltPage"]=$_SERVER['PHP_SELF'];
  header('Location:cerrarSesion.php');
  exit;
}


?>