<?php
$MensajeError = array();
$MensajeExito = array();
$MensajeAdvertencia = array();
$Exito;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once('../../Inc/session.inc.php');


    require_once('../../funciones/conexion.php');
    require_once('../../funciones/CategoriaSocios.php');
    $MiConexion = ConexionBD();
    /**
         * crear una consulta de si existe la cuota por idmes
         * true = extraemos su id -> continuamos
         * false = Creamos la cuota con su fecha de vencimiento y extraemos su id
         * 
         * por cada par (socio cuota) procedemos a hacer ->
         * 
         * crear una consulta por id Tiposocio, extremos su id, 
         * crear una consulta de si existe la cuota (TipoSocio cuota) por idmes 
         * 
         * true = extraemos su id y emitimos un mensaje de ya existente (concatenamos mensaje de advertencia)
         * false = Creamos la cuota y extraemos su id 
         * 
         * 
         */
    
    
    /* $IngresoRegistro = array(); */


    if (isset($_GET["guardar"]) && $_GET["guardar"] && isset($_POST["Mes"]) && isset($_POST["FVencimiento"])) {
        require_once '../../funciones/Cuota.php';
        $Exito =false;
        $Mes = $_POST["Mes"]."-00" ;
        
        $FechaVenc= $_POST["FVencimiento"];
        
        
        $Cuota = mostrarCuotaxMes($Mes, $MiConexion);
        
        

         if (!isset($Cuota["ID"])) {
            
            $Exito = crearCuota($Mes, $MiConexion);
            $Cuota = mostrarCuotaxMes($Mes, $MiConexion);
            
        } else {
            $Exito = true;
            
        }

        if (!$Exito) {
            $MensajeError[] = "No se cargaron las cuotas";
            
            exit();
            
        }
        else {
            require_once '../../funciones/DetalleCuota.php';

            if (isset($_POST["Socio-Docente"])) {
                $TipoSocio = $_POST["Socio-Docente"];
                $VCuota_Socio = $_POST["VCuota-Docente"];

                //obtener el id tipoSocio
                $idTipoSocio = conocerIdCategoriaSocio($TipoSocio, $MiConexion);
                
                
                if (!empty($idTipoSocio)) {
                    //consultar si ya existe la cuota del mes para esa categoria de socio
                    $CuotaSocio = mostrarDetalleCuotaIDCuotaTipoSocio($Cuota["ID"], $idTipoSocio["ID_CATEGORIASOCIO"], $MiConexion);

                                       
                    if (!empty($CuotaSocio)) {
                        
                        //true => emitir advertencia;
                        $MensajeAdvertencia[] = "Cuota "  . $TipoSocio . " Ya existente, no se creo la cuota ";


                    } else {
                        

                        //false => crear cuota
                        $estadoCreacion = crearDetalleCuota($Cuota["ID"], $idTipoSocio["ID_CATEGORIASOCIO"], $VCuota_Socio,$FechaVenc, $MiConexion);

                        if ($estadoCreacion) {
                        

                            //mensaje de exito
                            $Exito = $Exito && true;

                            $MensajeExito[] ="Se creo la cuota " .  $TipoSocio;
                        } else {
                        

                            //mensaje de fracaso
                            $Exito = $Exito && false;
                            $MensajeError[] = "No se creo la cuota " . $TipoSocio;
                        }
                    }
                }else
                {
                    $MensajeError[] = "No se creo la cuota " .$TipoSocio . "Socio No Existente";
                }
            }
            if (isset($_POST["Socio-Alumno"])) {
                $TipoSocio = $_POST["Socio-Alumno"];
                $VCuota_Socio = $_POST["VCuota-Alumno"];

                //obtener el id tipoSocio
                $idTipoSocio = conocerIdCategoriaSocio($TipoSocio, $MiConexion);
                
                if (!empty($idTipoSocio)) {
                    //consultar si ya existe la cuota del mes para esa categoria de socio
                    $CuotaSocio = mostrarDetalleCuotaIDCuotaTipoSocio($Cuota["ID"], $idTipoSocio["ID_CATEGORIASOCIO"], $MiConexion);

                                       
                    if (!empty($CuotaSocio)) {
                        
                        //true => emitir advertencia;
                        $MensajeAdvertencia[] = "Cuota "  . $TipoSocio . " Ya existente, no se creo la cuota ";


                    } else {
                        

                        //false => crear cuota
                        $estadoCreacion = crearDetalleCuota($Cuota["ID"], $idTipoSocio["ID_CATEGORIASOCIO"], $VCuota_Socio,$FechaVenc, $MiConexion);

                        if ($estadoCreacion) {
                        

                            //mensaje de exito
                            $Exito = $Exito && true;

                            $MensajeExito[] ="Se creo la cuota " .  $TipoSocio;
                        } else {
                        

                            //mensaje de fracaso
                            $Exito = $Exito && false;
                            $MensajeError[] = "No se creo la cuota " . $TipoSocio;
                        }
                    }
                }else
                {
                    $MensajeError[] = "No se creo la cuota " .$TipoSocio . "Socio No Existente";
                }
            }
            if (isset($_POST["Socio-Tutor"])) {
                $TipoSocio = $_POST["Socio-Tutor"];
                $VCuota_Socio = $_POST["VCuota-Tutor"];

                //obtener el id tipoSocio
                $idTipoSocio = conocerIdCategoriaSocio($TipoSocio, $MiConexion);
                
                
                if (!empty($idTipoSocio)) {
                    //consultar si ya existe la cuota del mes para esa categoria de socio
                    $CuotaSocio = mostrarDetalleCuotaIDCuotaTipoSocio($Cuota["ID"], $idTipoSocio["ID_CATEGORIASOCIO"], $MiConexion);

                                       
                    if (!empty($CuotaSocio)) {
                        
                        //true => emitir advertencia;
                        $MensajeAdvertencia[] = "Cuota "  . $TipoSocio . " Ya existente, no se creo la cuota ";


                    } else {
                        

                        //false => crear cuota
                        $estadoCreacion = crearDetalleCuota($Cuota["ID"], $idTipoSocio["ID_CATEGORIASOCIO"], $VCuota_Socio,$FechaVenc, $MiConexion);

                        if ($estadoCreacion) {
                        

                            //mensaje de exito
                            $Exito = $Exito && true;

                            $MensajeExito[] ="Se creo la cuota " .  $TipoSocio;
                        } else {
                        

                            //mensaje de fracaso
                            $Exito = $Exito && false;
                            $MensajeError[] = "No se creo la cuota " . $TipoSocio;
                        }
                    }
                }else
                {
                    $MensajeError[] = "No se creo la cuota " .$TipoSocio . "Socio No Existente";
                }
            }
            if (isset($_POST["Socio-Institucion"])) {
                $TipoSocio = $_POST["Socio-Institucion"];
                $VCuota_Socio = $_POST["VCuota-Institucion"];

                //obtener el id tipoSocio
                $idTipoSocio = conocerIdCategoriaSocio($TipoSocio, $MiConexion);
                
                
                if (!empty($idTipoSocio)) {
                    //consultar si ya existe la cuota del mes para esa categoria de socio
                    $CuotaSocio = mostrarDetalleCuotaIDCuotaTipoSocio($Cuota["ID"], $idTipoSocio["ID_CATEGORIASOCIO"], $MiConexion);

                                       
                    if (!empty($CuotaSocio)) {
                        
                        //true => emitir advertencia;
                        $MensajeAdvertencia[] = "Cuota "  . $TipoSocio . " Ya existente, no se creo la cuota ";


                    } else {
                        

                        //false => crear cuota
                        $estadoCreacion = crearDetalleCuota($Cuota["ID"], $idTipoSocio["ID_CATEGORIASOCIO"], $VCuota_Socio,$FechaVenc, $MiConexion);

                        if ($estadoCreacion) {
                        

                            //mensaje de exito
                            $Exito = $Exito && true;

                            $MensajeExito[] ="Se creo la cuota " .  $TipoSocio;
                        } else {
                        

                            //mensaje de fracaso
                            $Exito = $Exito && false;
                            $MensajeError[] = "No se creo la cuota " . $TipoSocio;
                        }
                    }
                }else
                {
                    $MensajeError[] = "No se creo la cuota " .$TipoSocio . "Socio No Existente";
                }
            }



        }


        
        $json=array();

    
    
        $json[]= array(
            'EstadoExito'=> $Exito,
            'MensajeExito' => $MensajeExito,
            'MensajeError' => $MensajeError,
            'MensajeAdvertencia'=> $MensajeAdvertencia 
        );
   

    

    header("HTTP/1.1 200 OK");
    $jsonString = json_encode($json);

    echo $jsonString;
    exit();
    }




    

    
} else {
    require_once('./Inc/session.inc.php');
    require_once('funciones/conexion.php');
    require_once 'funciones/CategoriaSocios.php';
    $MiConexion = ConexionBD();

     //variable bandera que analiza el exito general de la operacion



    $catSocios = conocerTodasCatSocio($MiConexion);
    $cantCatSocios = count($catSocios);











    require_once('./Inc/menus/head.inc.php');
}
