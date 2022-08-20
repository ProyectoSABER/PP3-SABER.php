<?php

function convertir_fecha($vFecha){

    $fecha=  date("d/m/Y H:i:s",(strtotime($vFecha)));


return $fecha;
}


function convertir_fechaFrontServer($vFecha){

    $fecha=  date("Y/m/d",(strtotime($vFecha)));


return $fecha;
} 

?>