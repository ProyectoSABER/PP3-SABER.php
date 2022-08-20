<?php
require_once('./funciones/convertirFecha.php');
require_once('funciones\conocerUsuario.php');
$Usuarios=array();
$Usuarios=conocerTodosUsuario($MiConexion);
$CantUsuarios=count($Usuarios);


?>