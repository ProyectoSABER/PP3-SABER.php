<?Php


require_once('./Inc/session.inc.php');
require_once 'funciones/conexion.php';

require_once('./funciones/convertirFecha.php');
require_once('./funciones/Socio.php');

$MiConexion = $ConexionBD;


$Socio=array();
$Socio=mostrarTodoSocio($MiConexion);
$CantSocio=count($Socio);






require_once('./Inc/menus/head.inc.php');
?>