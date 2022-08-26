<?Php


require_once('./Inc/session.inc.php');
require_once 'funciones/conexion.php';


require_once('./funciones/prestamos.php');

$MiConexion = $ConexionBD;

$Prestamos=array();
$Prestamos=conocertodosPrestamosActivos($MiConexion);
$CantPrestamos=count($Prestamos);










require_once('./Inc/menus/head.inc.php');
?>