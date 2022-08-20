<?php
require_once('./Inc/session.inc.php');



require_once 'funciones/conexion.php';
require_once 'funciones/Persona.php';
require_once 'funciones/TipoDni.php';
require_once 'funciones/Contacto.php';

$MiConexion = ConexionBD();

$tipoDni = array();
$tipoDni = conocerTodosTipoDni($MiConexion);
$CantipoDni = count($tipoDni);

$tipoContacto = array();
$tipoContacto = conocerTodosTipoContacto($MiConexion);
$CantipoContacto = count($tipoContacto);




$MensajeError = "";
$MensajeExito = "";
$EstadoRegistro=false;

$IngresoRegistro=array();

if (!empty($_POST["RegistrarUser"])) {
    if ($_POST["DNI"]) {
        $persona = array();

        $persona = MostrarUnaPersona($_POST["DNI"], $MiConexion);
        if (empty($persona['DNI'])) {

            $NewUser = array();
            $NewUser['DNIPersona'] = $_POST['DNI'];
            $NewUser['TipoDNI'] = $_POST['TipoDni'];
            $NewUser['Nombre'] = $_POST['NOMBRE'];
            $NewUser['Apellido'] = $_POST['Apellido'];


            $NewUser['TipoContacto'] = $_POST['TipoContacto'];
            $NewUser['Contacto'] = $_POST['CodigoArea'] . $_POST['Ncelular'];


            $rsp = insertarUnaPersonaArray($NewUser, $MiConexion);


            if ($rsp) {

                $rsc = insertarUnContactoArray($NewUser, $MiConexion);
                

                if ($rsc) {
                    $EstadoRegistro=true;




                } else {

                    $MensajeError = "No se registraron los datos de contacto";
                    eliminarUnaPersona($NewUser,$MiConexion);
                }
            } else {
    
                $MensajeError = "No se registraron los datos de usuario";
            }
        } else {
            $MensajeError = "El Dni ya se encuentra registrado, póngase en contacto con el encargado de biblioteca";
        }
            }
}
require_once('./Inc/menus/head.inc.php');
