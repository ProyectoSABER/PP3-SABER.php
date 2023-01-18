<?php
require_once('./Inc/session.inc.php');



require_once 'funciones/conexion.php';
require_once 'funciones/Persona.php';
require_once 'funciones/TipoDni.php';
require_once 'funciones/Domicilio.php';
$MiConexion = ConexionBD();

$TipoDNI=array();
$TipoDNI=conocerTodosTipoDni($MiConexion);
$CantTipoDni=count($TipoDNI);

$Domicilio=array();
$Domicilio=conocerTodosDomicilioCompleto($MiConexion);
$CantDomicilio=count($Domicilio);


$Usuario=array();
$Usuario=buscarUsuarioSinpersonas($MiConexion);
$CantUsuario=count($Usuario);




$MensajeError = "";
$MensajeExito = "";

if (!empty($_POST['Registrar'])) {

    if ((!empty($_POST['DNI']) && !(strlen($_POST['DNI']) < 8))) {
       
        if (!empty($_POST['TIPODNI'])) {

            if (!empty($_POST['NOMBRE'])) {

                if (!empty($_POST['Apellido'])) {

                    if (!empty($_POST['IDDomicilio'])) {

                        if (!empty($_POST['Usuario'])) {
                            
                            $NewUser = array();
                $NewUser['DNIPersona'] = $_POST['DNI'];
                $NewUser['TipoDNI'] = $_POST['TIPODNI'];
                $NewUser['Nombre'] = $_POST['NOMBRE'];
                $NewUser['Apellido'] = $_POST['Apellido'];
                $NewUser['IdDomicilio'] = $_POST['IDDomicilio'];
                $NewUser['USUARIO_ID'] = $_POST['Usuario'];
                $rsp = insertarUnaPersonaArray($NewUser, $MiConexion);


            if ($rsp) {
                $MensajeExito = "LA Persona ".$_POST['Apellido']." ". $_POST['NOMBRE']." se guardo correctamente"; 
                
            }

                        } else {

                            $MensajeError = "Debes de seleccionar un usuario sin registro o debera de crear un usuario nuevo";
                        }
                    } else {

                        $MensajeError = "Debes de seleccionar un Domicilio";
                    }
                } else {

                    $MensajeError = "Debes de ingresar un Apellido";
                }
            } else {

                $MensajeError = "Debes de ingresar un Nombre";
            }
        } else {

            $MensajeError = 'Debe de Selecionar un tipo de Dni';
        }
    } else {

        $MensajeError = "Debes de ingresar un DNI igual o mayor a 8 carácteres";
    }

}

require_once('./Inc/menus/head.inc.php');
