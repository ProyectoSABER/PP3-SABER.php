<?php
if(isset($_POST["idCobro"])){
    $idCobro=$_POST["idCobro"];
    require_once ('../../funciones/DetalleCobro.php');
    require_once('./../../Inc/session.inc.php');
    require_once('./../../funciones/conexion.php');
    require_once('./../../funciones/convertirFecha.php');
    require_once('./../../funciones/calcularVencimiento.php');
    $MiConexion = ConexionBD();

    $res=consultardetallesdeCobro($idCobro,$MiConexion);
    $CountDetalle=count($res);
     
}

if(isset($_POST["idDetalleCobro"])){
    
    $idDetalleCobro=$_POST["idDetalleCobro"];
    require_once ('../../funciones/DetalleCobro.php');
    require_once('./../../Inc/session.inc.php');
    require_once('./../../funciones/conexion.php');
    require_once('./../../funciones/convertirFecha.php');
    require_once('./../../funciones/calcularVencimiento.php');
    $MiConexion = ConexionBD();

    $res=consultardetallesdeCobroIdDetalle($idDetalleCobro,$MiConexion);
    $CountDetalle=count($res);
     
}
?>