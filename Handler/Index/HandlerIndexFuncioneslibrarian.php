<?php

require_once('./funciones/prestamos.php');
$PDiarios=array();
$PDiarios=conocertodosPrestamosActivosInstitucionales($MiConexion);
$CantPDiarios=count($PDiarios);


if(!empty($_POST['Devolucion'])){

registrarDevolucion($_POST['Devolucion'],$MiConexion);

}

require_once('./funciones/reserva.php');
$ReservasSolicitadas=conocertodosReservasSolicitadasPorTodosSocios($MiConexion);

$cantReservaSolicitados=count($ReservasSolicitadas);

if(isset($_GET['AnularReserva'])){

    
    $idDetReserva=$_GET['AnularReserva'];
    anularReservaIdDetalleReserva($idDetReserva, $MiConexion);
    Header('Location:index.php');
        exit;
}
if(isset($_GET['ListoRetirar'])){

    
    $idDetReserva=$_GET['ListoRetirar'];
    listoParaRetirarReserva($idDetReserva, $MiConexion);
    
    Header('Location:index.php');
        exit;
}
if(isset($_GET['RegistrarPrestamo'])){

   
    $idDetReserva=$_GET['RegistrarPrestamo'];

    $DATOS = array();
    require_once('./funciones/registrarPrestamo.php');
            $reserva=conocerUnaReserva($idDetReserva,$MiConexion);

            $DATOS['IDSocio'] = $reserva['ID_SOCIO'];
            $DATOS['IDEJEMPLAR'] = $reserva['ID_EJEMPLAR'];
            $DATOS['IDTIPOPRESTAMO'] = $reserva['ID_TIPOPRESTAMO'];
             $rp = registrarPrestamo($DATOS, $MiConexion);
             reservaRetirada($idDetReserva, $MiConexion);
    
    Header('Location:index.php');
        exit;
}



?>