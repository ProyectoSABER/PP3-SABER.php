<?php


    require_once('./Inc/session.inc.php');
    require_once 'funciones/conexion.php';

    require_once('./funciones/convertirFecha.php');
    require_once('./funciones/DetalleCuota.php');
    require_once('./funciones/calcularVencimiento.php');
    require_once('./funciones/Socio.php');
    $MiConexion = ConexionBD();
    $dni=$_SESSION["USUARIO_DNI"];
    $socio=  MostrarUnoSocioDni($dni,$MiConexion);
    $idUsuario=  $socio["SOCIO_ID"]??false;

    if($idUsuario){
        $res = array();
        $res =  mostrarDetCuotaAbonadasSocio($idUsuario,$MiConexion);
        $CantCuota = count($res);
    }
    




    require_once('./Inc/menus/head.inc.php');


?>