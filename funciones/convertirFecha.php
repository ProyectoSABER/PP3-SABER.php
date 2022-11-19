<?php
/**
 * Convertir Fecha
 *  @param string $TipoFecha = "s" fecha sin hora
 * @return date d/m/Y || d/m/Y H:i:s
*/
function convertir_fecha(string $vFecha, string $TipoFecha="s"){
    return ($TipoFecha =="s") ? 
    date("d/m/Y",(strtotime($vFecha))): date("d/m/Y H:i:s",(strtotime($vFecha))); ;
    


}

/**
 * Convertir Fecha
 *  @param string $TipoFecha = "s" fecha sin hora
 * @return date m/Y || m/Y H:i:s
*/

function convertir_fechaMesAnio(string $vFecha, string $TipoFecha="s"){
    return ($TipoFecha =="s") ? 
    date("m/Y",(strtotime($vFecha))): date("m/Y H:i:s",(strtotime($vFecha))); ;
    


}


function convertir_fechaFrontServer($vFecha){

    $fecha=  date("Y/m/d",(strtotime($vFecha)));


return $fecha;
} 

?>