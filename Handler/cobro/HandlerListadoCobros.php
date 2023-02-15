<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once('./../../Inc/session.inc.php');
    require_once('./../../funciones/conexion.php');
    require_once('./../../funciones/DetalleCuota.php');
    $MiConexion = ConexionBD();

    if (isset($_GET["mostrarDetCuota"])) {
        $idCuota = $_GET["mostrarDetCuota"];
        $DetCuota = mostrarDetalleCuotaID($idCuota, $MiConexion);

        header("HTTP/1.1 200 OK");
        $jsonString = json_encode($DetCuota);

        echo $jsonString;
    }
    if (isset($_GET["cargarTabla"])) {
        $Cuota = array();
        $Cuota = mostrarTodasDetCuota($MiConexion);
        
        if (!empty($Cuota)) {
            $json = array(
                'status' => 200,
                'results' => $Cuota
            );
        } else {
            $json = array(
                'status' => 404,
                'results' => "Sin Cuotas: "
            );
        }

        $jsonString = json_encode($json, http_response_code($json['status']));

        echo $jsonString;
    }

    exit();
} else {
    require_once('./Inc/session.inc.php');
    require_once 'funciones/conexion.php';

    require_once('./funciones/convertirFecha.php');
    require_once('./funciones/DetalleCuota.php');
    require_once('./funciones/calcularVencimiento.php');
    $MiConexion = ConexionBD();


    $res = array();
    $res = mostrarTodasDetCuotaAbonadas($MiConexion);
    $CantCuota = count($res);




    require_once('./Inc/menus/head.inc.php');
}

?>