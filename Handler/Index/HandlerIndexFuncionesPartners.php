<?php
$PrestamosActivos=array();
$ReservasSolicitadas=array();
require_once('./funciones/prestamos.php');
$PrestamosActivos=conocertodosPrestamosActivosPorSocio($MiConexion);
$CantPrestamosActivos=count($PrestamosActivos);

require_once('./funciones/reserva.php');
$ReservasSolicitadas=conocertodosReservasSolicitadasPorSocio($MiConexion);

$cantReservaSolicitados=count($ReservasSolicitadas);

if(isset($_GET['AnularReserva'])){

    
    $idDetReserva=$_GET['AnularReserva'];
    anularReservaIdDetalleReserva($idDetReserva, $MiConexion);
    Header('Location:index.php');
        exit;
}

?>