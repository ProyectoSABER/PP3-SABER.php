



<?php
if (is_file('../../Inc/session.inc.php')) {
    require_once('../../Inc/session.inc.php');
} else {
    require_once('./Inc/session.inc.php');
}
if (is_file('../../Inc/menus/head.inc.php')) {
    require_once('../../Inc/menus/head.inc.php');
} else {
    require_once('./Inc/menus/head.inc.php');
}
if (is_file('../../funciones/conexion.php')) {
    require_once('../../funciones/conexion.php');
} else {
    require_once('./funciones/conexion.php');
}
if (is_file('../../funciones/Editorial.php')) {
    require_once('../../funciones/Editorial.php');
} else {
    require_once('./funciones/Editorial.php');
}
if (is_file('../../funciones/Libros.php')) {
    require_once('../../funciones/Libros.php');
} else {
    require_once('./funciones/Libros.php');
}
if (is_file('../../funciones/Socio.php')) {
    require_once('../../funciones/Socio.php');
} else {
    require_once('./funciones/Socio.php');
}
if (is_file('../../funciones/EjemplaresLibros.php')) {
    require_once('../../funciones/EjemplaresLibros.php');
} else {
    require_once('./funciones/EjemplaresLibros.php');
}

if (is_file('../../funciones/TipoPrestamo.php')) {
    require_once('../../funciones/TipoPrestamo.php');
} else {
    require_once './funciones/TipoPrestamo.php';
}

$MiConexion = ConexionBD();

$MensajeError = "";
$MensajeExito = "";


$TipoPrestamo = array();
$TipoPrestamo = conocerTodoTipoPrestamosSegunTipoUsuario($_SESSION["USUARIO_IDTIPOUSUARIO"], $MiConexion);

$CantTipoPrestamo = count($TipoPrestamo);


$Editorial = array();


$Libros = array();
$Libros = conocerTodosLibrosDisponibles($MiConexion);
$CantLibros = count($Libros);


$Socios = array();
$Socios = mostrarTodoSocio($MiConexion);
$CantSocios = count($Socios);


$EjemplaresDispo = array();


$BtnDisabled = true;
$PanelLibroHidden = true;
$PanelSocioHidden = true;





if (!empty($_POST['registrarPrestamoSocio'])) {
    $registrarPrestamoSocio = '';

    $registrarPrestamoSocio = $_POST['registrarPrestamoSocio'];
    require_once '../../funciones/Reserva.php';

    $idEjemplar = $_POST['idEJEM'];
    $tipoPrestamo = $_POST['idTipoPrestamo'];
    $idISBN = $_POST['idISBN'];
    $datosSocio = buscarSocioPorIdUsuario($_SESSION['USUARIO_ID'], $MiConexion);
    if (count($datosSocio) > 0) {
        $idSocio = $datosSocio['socio_id'];
    }
    $datos['IDSocio'] = $idSocio;
    $datos['IDISBN'] = $idISBN;
    $datos['IDTIPOPRESTAMO'] = $tipoPrestamo;
    $datos['IDEJEMPLAR'] =  $idEjemplar;

    registrarReservaSocio($datos, $MiConexion);

    header('Location:../../index.php');
    exit;
}




/* $IngresoRegistro = array(); */



/* foreach ($_POST as $clave => $valor) {

        $IngresoRegistro[$clave] = $valor;
    }; */


if (is_file('../../Inc/menus/head.inc.php')) {
    require_once('../../Inc/menus/head.inc.php');
} else {
    require_once('./Inc/menus/head.inc.php');
}
