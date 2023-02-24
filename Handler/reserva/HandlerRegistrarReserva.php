



<?php


if (is_file('dirs.php')) {
    require_once('dirs.php');
} else {
    require_once('../../dirs.php');
}


require_once(_RAIZ . './Inc/session.inc.php');

require_once(_RAIZ . './funciones/conexion.php');
require_once(_RAIZ . './funciones/Editorial.php');
require_once(_RAIZ . './funciones/Libros.php');
require_once(_RAIZ . './funciones/Socio.php');
require_once(_RAIZ . './funciones/EjemplaresLibros.php');
require_once(_RAIZ . './funciones/TipoPrestamo.php');
require_once(_RAIZ . './funciones/Reserva.php');



$MiConexion = ConexionBD();





if (!empty($_POST['registrarPrestamoSocio'])) {


    $registrarPrestamoSocio = '';

    $registrarPrestamoSocio = $_POST['registrarPrestamoSocio'];

    $tipoPrestamo = $_POST['idTipoPrestamo'];
    $idISBN = $_POST['idISBN'];
    $EjemplaresDisponibles = conocerEjemplaresDisponiblesUnLibro($idISBN, $MiConexion);
    /* Comprobamos que existan ejemplares disponibles */
    if (count($EjemplaresDisponibles) < 1) {
        $json = array(
            'status' => 404,
            'response' => "No Existen ejemplares de libros disponibles ",
            'resquest' => $_POST
        );
        $jsonString = json_encode($json, http_response_code($json['status']));
        echo $jsonString;
        exit();
    }

    $datosSocio = buscarSocioPorIdUsuario($_SESSION['USUARIO_ID'], $MiConexion);
    if (count($datosSocio) > 0) {
        $idSocio = $datosSocio['socio_id'];
    }
    $datos['IDSocio'] = $idSocio;
    $datos['IDISBN'] = $idISBN;
    $datos['IDTIPOPRESTAMO'] = $tipoPrestamo;
    $datos['IDEJEMPLAR'] =  $EjemplaresDisponibles[0]['EJEMPLARLIBRO_ID'];

    $res=registrarReservaSocio($datos, $MiConexion);
   
    if (!empty($res)&&$res!=false) {
        $json = array(
            'status' => 200,
            'response' => $res,
            'resquest' => $_POST

        );
    } else {
        $json = array(
            'status' => 404,
            'response' => "No se Registro el autor: ",
            'resquest' => $_POST
        );
    }

    $jsonString = json_encode($json, http_response_code($json['status']));

    echo $jsonString;
    exit();
}
if (isset($_POST['consultarIsbn'])) {

    $consultarIsbn = $_POST['consultarIsbn'];
    $res = conocerUnLibro($consultarIsbn, $MiConexion);

    if (!empty($res)) {
        $json = array(
            'status' => 200,
            'response' => $res,
            'resquest' => "Consultar un libro isbn: " . $_POST['consultarIsbn']

        );
    } else {
        $json = array(
            'status' => 404,
            'response' => "No se Registro el autor: ",
            'resquest' => "Consultar un libro isbn: " . $_POST['consultarIsbn']
        );
    }

    $jsonString = json_encode($json, http_response_code($json['status']));

    echo $jsonString;
    exit();
}




/* $IngresoRegistro = array(); */



/* foreach ($_POST as $clave => $valor) {

        $IngresoRegistro[$clave] = $valor;
    }; */



$MensajeError = "";
$MensajeExito = "";


$TipoPrestamo = array();
$TipoPrestamo = conocerTodoTipoPrestamosSegunTipoUsuario($_SESSION["USUARIO_IDTIPOUSUARIO"], $MiConexion);

$CantTipoPrestamo = count($TipoPrestamo);


$Editorial = array();


$Libros = array();
$Libros = conocerLibrosDisponibles($MiConexion);
$CantLibros = count($Libros);


$Socios = array();
$Socios = mostrarTodoSocio($MiConexion);
$CantSocios = count($Socios);


$EjemplaresDispo = array();


$BtnDisabled = true;
$PanelLibroHidden = true;
$PanelSocioHidden = true;



require_once(_RAIZ . './Inc/menus/head.inc.php');
