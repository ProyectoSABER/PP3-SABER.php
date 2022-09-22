<?php
require_once('./Inc/session.inc.php');


require_once 'funciones/conexion.php';

$MiConexion = ConexionBD();

$MensajeError = "";
$MensajeExito = "";

require_once 'funciones/CategoriaSocios.php';
$catSocios=conocerTodasCatSocio($MiConexion);
$cantCatSocios=count($catSocios);



/* $IngresoRegistro = array(); */


if (isset($_POST['Registrar'])&&!empty($_POST['Registrar'])) {

   
    } else {

        $MensajeError = "";
    }

    /* foreach ($_POST as $clave => $valor) {

        $IngresoRegistro[$clave] = $valor;
    };

    $IngresoRegistro['$Bibliotecario_ID']=$Bibliotecario['Bibliotecario_ID']; */


require_once('./Inc/menus/head.inc.php');
