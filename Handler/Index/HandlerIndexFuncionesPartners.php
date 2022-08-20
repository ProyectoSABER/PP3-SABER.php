<?php

require_once('./funciones/prestamos.php');
$PrestamosActivos=array();
$PrestamosActivos=conocertodosPrestamosActivosPorSocio($MiConexion);
$CantPrestamosActivos=count($PrestamosActivos);


?>