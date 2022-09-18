<?php
require_once('./Inc/session.inc.php');

require_once('./Inc/menus/head.inc.php');
require_once 'funciones/conexion.php';

$MiConexion = ConexionBD();

$MensajeError = "";
$MensajeExito = "";

require_once './funciones/Editorial.php';
$Editorial = array();

require_once './funciones/Libros.php';
$Libros = array();
$Libros = conocerTodosLibrosDisponibles($MiConexion);
$CantLibros = count($Libros);

require_once('./funciones/Socio.php');
$Socios = array();
$Socios = mostrarTodoSocio($MiConexion);
$CantSocios = count($Socios);

require_once './funciones/EjemplaresLibros.php';
$EjemplaresDispo = array();
require_once('./funciones/Socio.php');
$Socios = array();
$Socios = mostrarTodoSocio($MiConexion);
$CantSocios = count($Socios);

$BtnDisabled = true;
$PanelLibroHidden = true;
$PanelSocioHidden = true;


if (!empty($_GET['RegistrarForm1'])) {
    if (!empty($_GET['ISBN'])) {

        $LibroISBN = array();
        $LibroISBN = conocerUnLibro($_GET['ISBN'], $MiConexion);
        $EjemplaresDispo = conocerEjemplaresDisponiblesUnLibro($_GET['ISBN'], $MiConexion);
        $CantEjemplaresDispo = count($EjemplaresDispo);

        $PanelLibroHidden = false;
        if ($CantEjemplaresDispo == 0){
            
            $MensajeError = "El Libro selecccionado no dispone de ejemplares disponibles";
        }
    } else {
        $MensajeError = "Debes de Seleccionar un libro ";
    }

    


    if (!empty($_GET['IDSocio'])) {
        $SocioID = array();
        $SocioID = MostrarUnoSocioID($_GET['IDSocio'], $MiConexion);
        $PanelSocioHidden = false;
        if (!$SocioID['SOCIO_ESTADOSOCIO'] == 'Activo') {
            $MensajeError = "El Socio se Encuentra en condición de " . $SocioID['SOCIO_ESTADOSOCIO'];
        }
    }

    if (!empty($_GET['ISBN']) && !empty($_GET['IDSocio'])) {
        if ($SocioID['SOCIO_ESTADOSOCIO'] == 'Activo') {
            if ($CantEjemplaresDispo != 0) {
                $BtnDisabled = false;
            }
        }
    }
}


/* $IngresoRegistro = array(); */

if (!empty($_POST['RegistrarPrestamo'])) {
    if (!empty($_POST['IDEJEMPLARLIBRO'])) {
        if (!empty($_POST['TPrestamo'])) {
            $DATOS = array();

            $DATOS['IDSocio'] = $IDSocio;
            $DATOS['IDEJEMPLAR'] = $_POST['IDEJEMPLARLIBRO'];
            $DATOS['IDTIPOPRESTAMO'] = $_POST['TPrestamo'];


            $rp = registrarPrestamo($DATOS, $MiConexion);
            $IngresoRegistro = $rp;
            $EjemplaresDispo = conocerEjemplaresDisponiblesUnLibro($ISBNlibro, $MiConexion);
            $CantEjemplaresDispo = count($EjemplaresDispo);
        } else {
            $MensajeError = ' Debe de seleccionar un tipo de prestamo';
        }
    } else {
        $MensajeError = ' Debe de seleccionar un Ejemplar de libro';
    }
}
/* foreach ($_POST as $clave => $valor) {

        $IngresoRegistro[$clave] = $valor;
    }; */



require_once('./Inc/menus/head.inc.php');
