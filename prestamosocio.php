<?php
require_once './funciones/Bibliotecario.php';


function calcularFechaDevolucion($fechaActual){
    
    $fechaFechaDevolucion=date("y-m-d",strtotime($fechaActual."+ 7 days"));
return $fechaFechaDevolucion;
}

$MensajeError = "";
$MensajeExito = "";

require_once './funciones/Editorial.php';
$Editorial = array();

require_once './funciones/Libros.php';
$Libros = array();
$Libros = conocerTodosLibros($MiConexion);
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
if (!empty($_GET['RegistrarPrestamoUsuario'])) {

                $idLibro = $_GET['ID_ISBN'];
                $idTipo = $_GET['ID_TIPO'];
                $idUser = $_GET['ID_USER'];
                $estadoPedido = 4;
                if(registrarPrestamoSocio($idLibro,$idTipo,$idUser,$estadoPedido)){
                    echo '<script>alert("ESTA OK");</script>';
                } else{
                    echo '<script>alert("NO ESTA OK");</script>';
                }

           

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



require_once('./Inc/menus/head.inc.php');
