<?php 
session_start();

require_once 'funciones/conexion.php';
$MiConexion = $ConexionBD;
require_once 'funciones/login.php';
$FechaHoraHoy = date('Y-m-d H:i:s');
RegistrarLogout($_SESSION['USUARIO_ID'],$FechaHoraHoy, $MiConexion);

$_SESSION[]=array();
session_destroy();
header('Location:login.php');
exit;
?>