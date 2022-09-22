<?php
$timeToFisnishSession=5*60*60;
session_set_cookie_params($timeToFisnishSession);
session_start();
if (empty($_SESSION['USUARIO_EMAIL'])) {

  header('Location:cerrarSesion.php');
  exit;
}
?>