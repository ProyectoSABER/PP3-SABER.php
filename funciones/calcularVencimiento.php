<?php

function compararFechas($primera, $segunda)
{
 $valoresPrimera = explode ("/", $primera);   
 $valoresSegunda = explode ("/", $segunda); 

 $diaPrimera    = $valoresPrimera[0];  
 $mesPrimera  = $valoresPrimera[1];  
 $anyoPrimera   = $valoresPrimera[2]; 

 $diaSegunda   = $valoresSegunda[0];  
 $mesSegunda = $valoresSegunda[1];  
 $anyoSegunda  = $valoresSegunda[2];

 $diasPrimeraJuliano = gregoriantojd($mesPrimera, $diaPrimera, $anyoPrimera);  
 $diasSegundaJuliano = gregoriantojd($mesSegunda, $diaSegunda, $anyoSegunda);     

 if(!checkdate($mesPrimera, $diaPrimera, $anyoPrimera)){
   // "La fecha ".$primera." no es v&aacute;lida";
   return 0;
 }elseif(!checkdate($mesSegunda, $diaSegunda, $anyoSegunda)){
   // "La fecha ".$segunda." no es v&aacute;lida";
   return 0;
 }else{
   return  $diasPrimeraJuliano - $diasSegundaJuliano;
 } 

}




/**
 * CalcularEstadoCuota
 *  @param string $vFecha fecha de vencimiento de cuota D/M/A
 *  @param string $fechaPago  fecha de vencimiento de cuota D/M/A
 * @return "Vencida || Vigente || erro en fechas"
*/
function estadoCuota( $vFecha,  $fechaPago ){

    $res = compararFechas($vFecha, $fechaPago);

     if ($res!=0 ) {

        if($res>0){
            return "Vigente";
        }else{
            return "Vencida";
        }

        
    } else{
    return "error en fechas";
    }
    
    


}



?>