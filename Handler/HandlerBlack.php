<?php
if($_SERVER['REQUEST_METHOD']!="POST"){
require_once('./Inc/session.inc.php');
require_once 'funciones/conexion.php';

$acceso=$_SERVER['REQUEST_METHOD'];
$host=$_SERVER['HTTP_HOST'];
$path=$_SERVER['PATH_INFO'];
$filname=$_SERVER['SCRIPT_FILENAME'];
$self=$_SERVER['PHP_SELF'];

$root=$_SERVER['DOCUMENT_ROOT'];

$metodoPath=get_include_path ();



require_once('./Inc/menus/head.inc.php');
}else{

require_once('../Inc/session.inc.php');

/* echo "acceso" .  $acceso=$_SERVER['REQUEST_METHOD'];
echo "host". $host=$_SERVER['HTTP_HOST'];
echo "path". $path=$_SERVER['PATH_INFO'];
echo "filname" . $filname=$_SERVER['SCRIPT_FILENAME'];
echo"\n prueba de self ". $self=$_SERVER['PHP_SELF'];
echo"\n prueba de root ". $root=$_SERVER['DOCUMENT_ROOT'];
;

echo "metodoPath()".$metodoPath=get_include_path (); */

echo $_POST["Mes"];
}
?>