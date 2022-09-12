<?Php


require_once('./Inc/session.inc.php');
require_once 'funciones/conexion.php';

require_once('./funciones/convertirFecha.php');
require_once('./funciones/Socio.php');
require_once('./funciones/Persona.php');
require_once('./funciones/Contacto.php');

$MiConexion = ConexionBD();



if(empty($_GET['SOCIO_ID'])){
    header('Location:ListadoSocios.php');
  exit;
}

$SOCIO_ID=$_GET['SOCIO_ID'];


$Socio=array();
$Contacto=array();

$Socio=MostrarUnoSocioID($SOCIO_ID, $MiConexion);
$dni=$Socio['SOCIO_DNI'];

$PERSONA=MostrarUnaPersona($dni,$MiConexion);

$Contacto=ConocerContactoDNI($dni, $MiConexion);

if ($Contacto){
$CantContacto=count($Contacto);
}





require_once('./Inc/menus/head.inc.php');
?>