<?php
require_once('./Inc/session.inc.php');
require_once './funciones/registrarPrestamo.php';


require_once('./Inc/menus/head.inc.php');
require_once 'funciones/conexion.php';
$MiConexion = ConexionBD();
$ISBNlibro='';
$IDSocio='';
if(isset($_SESSION['RegistrarPrestamo']['ISBN'])){
$ISBNlibro = $_SESSION['RegistrarPrestamo']['ISBN'];
$IDSocio = $_SESSION['RegistrarPrestamo']['IDSocio'];
$TipoSocio=$_SESSION['RegistrarPrestamo']['TipoSocio'];
}
$MensajeError = "";
$MensajeExito = "";

require_once './funciones/Libros.php';
$Libro = array();
$Libro = conocerUnLibro($ISBNlibro, $MiConexion);

require_once './funciones/EjemplaresLibros.php';
$EjemplaresDispo = array();
$EjemplaresDispo = conocerEjemplaresDisponiblesUnLibro($ISBNlibro, $MiConexion);
$CantEjemplaresDispo = count($EjemplaresDispo);

require_once('./funciones/Socio.php');
$Socio = array();
$Socio = MostrarUnoSocioID($IDSocio, $MiConexion);

require_once './funciones/TipoPrestamo.php';
$TipoPrestamo = array();
$TipoPrestamo = conocerTodoTipoPrestamos($MiConexion);;
$CantTipoPrestamo = count($TipoPrestamo);

$IngresoRegistro = array();

$BtnDisabled = false;

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
            $MensajeExito = "Se registro el préstamo";
        } else {
            $MensajeError = ' Debe de seleccionar un tipo de prestamo';
        }
    } else {
        $MensajeError = ' Debe de seleccionar un Ejemplar de libro';
    }
}


/* TPrestamo nombre radio 
IDEJEMPLARLIBRO nombre ejemplar*/






    /* foreach ($_SESSION['RegistrarPrestamo'] as $clave => $valor) {

        $IngresoRegistro[$clave] = $valor;
    };
 */
