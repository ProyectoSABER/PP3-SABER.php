<?Php


require_once('./Inc/session.inc.php');
require_once 'funciones/conexion.php';


require_once('./funciones/EjemplaresLibros.php');

$MiConexion = ConexionBD();

if(empty($_GET['Registrar'])){
    header('Location:ListadoLibros.php');
  exit;
}

$ISBN=$_GET['Registrar'];

$Ejlibros=array();
$Ejlibros=conocertodosEjemplaresUnLibro($ISBN,$MiConexion);
$CantEjLibros=count($Ejlibros);







require_once('./Inc/menus/head.inc.php');
?>