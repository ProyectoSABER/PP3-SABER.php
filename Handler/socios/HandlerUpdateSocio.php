<?php
require_once('./Inc/session.inc.php');



require_once 'funciones/conexion.php';

$MiConexion = $ConexionBD;

$MensajeError = "";
$MensajeExito = "";


require_once './funciones/Persona.php';
$NoSocio = array();
$NoSocio = mostrarTodoPersonaNoSocio($MiConexion);
$CantNoSocio = count($NoSocio);

require_once './funciones/CategoriaSocios.php';
$CategoriaSocio = array();
$CategoriaSocio = conocerTodasCatSocio($MiConexion);
$CantCatSocio = count($CategoriaSocio);

require_once './funciones/EstadoSocio.php';
$EstadoSocio = array();
$EstadoSocio = conocerTodosEstadoSocio($MiConexion);
$CantEstadoSocio = count($EstadoSocio);

require_once './funciones/Socio.php';





$IngresoRegistro = array();


if (!empty($_POST['Registrar'])) {

    if ((!empty($_POST['DNI']) && !(strlen($_POST['DNI']) < 8))) {





        if (!empty($_POST['IDCategoriaSocio'])) {

            if (!empty($_POST['IDEstadoSocio'])) {







                $estadoRegistro = insertarUnoSocio(
                    $_POST['DNI'],
                    $_POST['IDCategoriaSocio'],
                    $_POST['IDEstadoSocio'],
                    $MiConexion
                );




                if ($estadoRegistro != false) {
                    $IDSocioInsertado=MostrarUnoSocioDni($_POST['DNI'],$MiConexion);
                    $MensajeExito = "Registro almacenado! Identificador Unico De SOCIO: ".$IDSocioInsertado['SOCIO_ID'];
                    
                    $MensajeError = "";
                } else {
                    
                    $MensajeError = "El Registro no se almaceno!";
                }
            } else {

                $MensajeError = "Debes de Seleccionar un Estado inicial de Socio";
            }
        } else {

            $MensajeError = "Debes de Seleccionar una Categoria de Socio";
        }
    } else {

        $MensajeError = "Debes de Seleccionar un Dni";
    }

    foreach ($_POST as $clave => $valor) {

        $IngresoRegistro[$clave] = $valor;
    };
}

require_once('./Inc/menus/head.inc.php');
