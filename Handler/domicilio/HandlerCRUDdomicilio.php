<?php
if (is_file('./../../dirs.php')) {
    require_once('./../../dirs.php');
} else {
    require_once('./dirs.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require_once(_RAIZ . '/Inc/session.inc.php');
    require_once(_RAIZ . '/funciones/conexion.php');
    require_once(_RAIZ . '/funciones/domicilio.php');

    $MiConexion = ConexionBD();

    if (($_POST['Pais'] ?? false) == 'allow') {
        $res = mostrarPaises($MiConexion);

        if (!empty($res)) {
            $json = array(
                'status' => 200,
                'response' => $res,
                'resquest' => $_POST['Pais']

            );
        } else {
            $json = array(
                'status' => 404,
                'response' => "Sin Cuotas: ",
                'resquest' => $_POST['Pais']
            );
        }

        $jsonString = json_encode($json, http_response_code($json['status']));

        echo $jsonString;
        exit();
    }
    if (($_POST['Provincia'] ?? false) == 'allow') {

        $res = mostrarTodasProvinciaXPais($_POST['Pais'], $MiConexion);

        if (!empty($res)) {
            $json = array(
                'status' => 200,
                'response' => $res,
                'resquest' => $_POST['Pais']

            );
        } else {
            $json = array(
                'status' => 404,
                'response' => "Sin Cuotas: ",
                'resquest' => $_POST['Pais']
            );
        }

        $jsonString = json_encode($json, http_response_code($json['status']));

        echo $jsonString;
        exit();
    }
    if (isset($_POST['TipoRegistro'])) {

        
        if ($_POST['TipoRegistro'] == 'País') {

            $res = registrarPais($_POST['Pais'], $MiConexion);

            if (!empty($res)) {
                $json = array(
                    'status' => 200,
                    'response' => $res,
                    'resquest' => $_POST['TipoRegistro']

                );
            } else {
                $json = array(
                    'status' => 404,
                    'response' => "Sin Registros ",
                    'resquest' => $_POST['TipoRegistro']
                );
            }

            $jsonString = json_encode($json, http_response_code($json['status']));

            echo $jsonString;
        }
        if ($_POST['TipoRegistro'] == 'Provincia') {

            $res = registrarProvincia($_POST['Provincia'],$_POST['id_Pais'],$MiConexion);

            if (!empty($res)) {
                $json = array(
                    'status' => 200,
                    'response' => $res,
                    'resquest' => $_POST['TipoRegistro']

                );
            } else {
                $json = array(
                    'status' => 404,
                    'response' => "Sin Registros",
                    'resquest' => $_POST['TipoRegistro']
                );
            }

            $jsonString = json_encode($json, http_response_code($json['status']));

            echo $jsonString;
        }
        if ($_POST['TipoRegistro'] == 'Ciudad') {

            $res = registrarLocalidad($_POST['Ciudad'],$_POST['id_Provincia'], $MiConexion);

            if (!empty($res)) {
                $json = array(
                    'status' => 200,
                    'response' => $res,
                    'resquest' => $_POST['TipoRegistro']

                );
            } else {
                $json = array(
                    'status' => 404,
                    'response' => "Sin Registros ",
                    'resquest' => $_POST['TipoRegistro']
                );
            }

            $jsonString = json_encode($json, http_response_code($json['status']));

            echo $jsonString;
            exit;
        }
        
       
    }


    /*  if($_POST["Registrar"]='Pais'??"false"){
        $res = array();
        $tipoSolicitud = "Insert";
    }
    if($_POST["Registrar"]='Provincia'??"false"){

    }
    if($_POST["Registrar"]='Ciudad'??"false"){

    } */
}


require_once('./Inc/session.inc.php');
require_once 'funciones/conexion.php';
require_once 'funciones/Domicilio.php';
$MiConexion = ConexionBD();



$localidad = array();
$localidad = mostrarLocalidad($MiConexion);
$Cantlocalidad = count($localidad);

$provincia = array();
$provincia = mostrarTodasProvincia($MiConexion);
$Cantprovincia = count($provincia);

$pais = array();
$pais = mostrarPaises($MiConexion);
$Cantpais = count($pais);



require_once('./Inc/menus/head.inc.php');
