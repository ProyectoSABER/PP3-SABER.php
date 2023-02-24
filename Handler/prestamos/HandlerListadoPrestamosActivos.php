<?Php


require_once('./Inc/session.inc.php');
require_once 'funciones/conexion.php';


require_once('./funciones/prestamos.php');
require_once('./funciones/registrarDevolucion.php');

$MiConexion = ConexionBD();

$Prestamos=array();
$Prestamos=conocertodosPrestamosActivos($MiConexion);
$CantPrestamos=count($Prestamos);

require_once('./funciones/prestamos.php');
$PActivos=array();
$PActivos=conocertodosPrestamosActivos($MiConexion);
$CantPActivos=count($PActivos);

if(!empty($_POST['Devolucion'])){

    registrarDevolucion($_POST['Devolucion'],$MiConexion);
    header('Location:RegistrarDevolucion.php');
    exit;
    
}







require_once('./Inc/menus/head.inc.php');
?>