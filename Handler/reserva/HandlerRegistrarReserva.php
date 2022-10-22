<?php
if (is_file('../../Inc/session.inc.php'))
{
    require_once('../../Inc/session.inc.php');
}else{
    require_once('./Inc/session.inc.php'); 
}
if (is_file('../../Inc/menus/head.inc.php'))
{
    require_once('../../Inc/menus/head.inc.php');
}else{
    require_once('./Inc/menus/head.inc.php'); 
}
if (is_file('../../funciones/conexion.php'))
{
    require_once('../../funciones/conexion.php');
}else{
    require_once('./funciones/conexion.php'); 
}
if (is_file('../../funciones/Editorial.php'))
{
    require_once('../../funciones/Editorial.php');
}else{
    require_once('./funciones/Editorial.php'); 
}
if (is_file('../../funciones/Libros.php'))
{
    require_once('../../funciones/Libros.php');
}else{
    require_once('./funciones/Libros.php'); 
}
if (is_file('../../funciones/Socio.php'))
{
    require_once('../../funciones/Socio.php');
}else{
    require_once('./funciones/Socio.php'); 
}
if (is_file('../../funciones/EjemplaresLibros.php'))
{
    require_once('../../funciones/EjemplaresLibros.php');
}else{
    require_once('./funciones/EjemplaresLibros.php'); 
}
if (is_file('../../funciones/Socio.php'))
{
    require_once('../../funciones/Socio.php');
}else{
    require_once('./funciones/Socio.php'); 
}

$MiConexion = ConexionBD();

$MensajeError = "";
$MensajeExito = "";

$Editorial = array();

$Libros = array();
$Libros = conocerTodosLibros($MiConexion);
$CantLibros = count($Libros);

$Socios = array();
$Socios = mostrarTodoSocio($MiConexion);
$CantSocios = count($Socios);


$EjemplaresDispo = array();

$Socios = array();
$Socios = mostrarTodoSocio($MiConexion);
$CantSocios = count($Socios);

$BtnDisabled = true;
$PanelLibroHidden = true;
$PanelSocioHidden = true;
$registrarPrestamoSocio ='';
$registrarPrestamoSocio = $_POST['registrarPrestamoSocio'];
if(!empty($registrarPrestamoSocio)){
    require_once '../../funciones/registrarPrestamo.php';
    
    $idEjemplar = $_POST['idEJEM'];
    $tipoPrestamo = $_POST['idTipoPrestamo'];
    $idISBN = $_POST['idISBN'];
    $datosSocio = buscarSocioPorIdUsuario($_SESSION['USUARIO_ID'],$MiConexion);
    if(count($datosSocio) > 0){
       $idSocio = $datosSocio['socio_id'];
    }
    $datos['IDSocio'] = $idSocio;
    $datos['IDISBN'] = $idISBN;
    $datos['IDTIPOPRESTAMO'] = $tipoPrestamo;
    $datos['IDEJEMPLAR'] =  $idEjemplar;
    
    registrarPrestamoSocio($datos,$MiConexion);
   
    header('Location:../../index.php');
    exit;

}

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

    $_SESSION['RegistrarPrestamo']['ISBN'] = $_GET['ISBN'];
    $_SESSION['RegistrarPrestamo']['IDSocio'] = $_GET['IDSocio'];

    header('Location:RegistrarPrestamo2.php');
    exit;
}
/* foreach ($_POST as $clave => $valor) {

        $IngresoRegistro[$clave] = $valor;
    }; */


    if (is_file('../../Inc/menus/head.inc.php'))
    {
        require_once('../../Inc/menus/head.inc.php');
    }else{
        require_once('./Inc/menus/head.inc.php'); 
    }

