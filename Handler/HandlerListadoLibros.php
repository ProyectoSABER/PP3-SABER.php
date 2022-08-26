<?Php


require_once('./Inc/session.inc.php');
require_once 'funciones/conexion.php';

require_once('./funciones/convertirFecha.php');
require_once('./funciones/Libros.php');

$MiConexion = $ConexionBD;

$libros=array();
$libros=conocerTodosLibros($MiConexion);
$CantLibros=count($libros);






require_once('./Inc/menus/head.inc.php');
?>