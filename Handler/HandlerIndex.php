<?php 
require_once('./Inc/session.inc.php');

require_once 'funciones/conexion.php';
$MiConexion = ConexionBD();
require_once('./funciones/registrarDevolucion.php');
require_once('./funciones/conocerUsuario.php');

$user="";
$user=cargarUsuario($_SESSION['USUARIO_ID'],$MiConexion);

if($user==='undefine'){
  Header('Location:NewUser.php');
        exit;
}

$Admin=false;
$Bibliotecario=false;


if($_SESSION['USUARIO_IDTIPOUSUARIO']==1){
$Admin=true;
require_once 'Handler\Index\HandlerIndexFuncionesAdmin.php';
}
if($_SESSION['USUARIO_IDTIPOUSUARIO']==2){
$Bibliotecario=true;
require_once 'Handler\Index\HandlerIndexFuncioneslibrarian.php';
}else{

  require_once 'Handler\Index\HandlerIndexFuncionesPartners.php';
}





require_once('./Inc/menus/head.inc.php');
