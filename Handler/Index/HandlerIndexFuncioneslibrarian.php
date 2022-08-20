<?php

require_once('./funciones/prestamos.php');
$PDiarios=array();
$PDiarios=conocertodosPrestamosActivosInstitucionales($MiConexion);
$CantPDiarios=count($PDiarios);

if(!empty($_POST['Devolucion'])){

registrarDevolucion($_POST['Devolucion'],$MiConexion);

}

?>