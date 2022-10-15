<?php

require_once('./funciones/prestamos.php');
$PrestamosActivos=array();
$PrestamosSolicitados=array();
$PrestamosActivos=conocertodosPrestamosActivosPorSocio($MiConexion);
$PrestamosSolicitados=conocertodosPrestamosSolicitadosPorSocio($MiConexion);
$cantPrestamosSolicitados=count($PrestamosSolicitados);
$CantPrestamosActivos=count($PrestamosActivos);


?>