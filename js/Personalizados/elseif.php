elseif 

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
        ($Exito) {


            if (isset($_POST["Socio-Docente"])) {
                $TipoSocio = $_POST["Socio-Docente"];
                $VCuota_Socio = $_POST["VCuota-Docente"];

                //obtener el id tipoSocio
                $idTipoSocio = conocerIdCategoriaSocio($TipoSocio, $MiConexion);
                /* $idTipoSocio["ID_CATEGORIASOCIO"] */
                if (!empty($idTipoSocio)) {
                    //consultar si ya existe la cuota del mes para esa categoria de socio
                    $CuotaSocio = mostrarDetalleCuotaIDMesTipoSocio($Mes, $idTipoSocio["ID_CATEGORIASOCIO"], $MiConexion);
                    if ($CuotaSocio) {

                        //true => emitir advertencia;
                        $MensajeAdvertencia = $MensajeAdvertencia . "Cuota"  . $TipoSocio . "Ya existente";
                    } else {
                        //false => crear cuota
                        $estadoCreacion = crearDetalleCuota($Mes, $idTipoSocio["ID_CATEGORIASOCIO"], $VCuota_Socio, $MiConexion);
                        if ($estadoCreacion) {
                            //mensaje de exito
                            $Exito = $Exito && true;

                            $MensajeExito = $MensajeExito . "Se creo la cuota " .  $TipoSocio;
                        } else {
                            //mensaje de fracaso
                            $Exito = $Exito && false;
                            $MensajeError = $MensajeError . "No se creo la cuota " . $TipoSocio;
                        }
                    }
                }else{
                    $MensajeError= $MensajeError ." Id socio: ". $idTipoSocio ."  No encontrado ";
                }
            }
            if (isset($_POST["Socio-Alumno"])) {
                $TipoSocio = $_POST["Socio-Alumno"];
                $VCuota_Socio = $_POST["VCuota-Alumno"];
                //obtener el id tipoSocio
                $idTipoSocio = conocerIdCategoriaSocio($TipoSocio, $MiConexion);
                /* $idTipoSocio["ID_CATEGORIASOCIO"] */
                if (!empty($idTipoSocio)) {
                    //consultar si ya existe la cuota del mes para esa categoria de socio
                    $CuotaSocio = mostrarDetalleCuotaIDMesTipoSocio($Mes, $idTipoSocio["ID_CATEGORIASOCIO"], $MiConexion);
                    if ($CuotaSocio) {

                        //true => emitir advertencia;
                        $MensajeAdvertencia = $MensajeAdvertencia . "Cuota"  . $TipoSocio . "Ya existente";
                    } else {
                        //false => crear cuota
                        $estadoCreacion = crearDetalleCuota($Mes, $idTipoSocio["ID_CATEGORIASOCIO"], $VCuota_Socio, $MiConexion);
                        if ($estadoCreacion) {
                            //mensaje de exito
                            $Exito = $Exito && true;

                            $MensajeExito = $MensajeExito . "Se creo la cuota " .  $TipoSocio;
                        } else {
                            //mensaje de fracaso
                            $Exito = $Exito && false;
                            $MensajeError = $MensajeError . "No se creo la cuota " . $TipoSocio;
                        }
                    }
                }else{
                    $MensajeError= $MensajeError ." Id socio: ". $idTipoSocio ."  No encontrado ";
                }
            }
            if (isset($_POST["Socio-Tutor"])) {

                $TipoSocio = $_POST["Socio-Tutor"];
                $VCuota_Socio = $_POST["VCuota-Tutor"];

                //obtener el id tipoSocio
                $idTipoSocio = conocerIdCategoriaSocio($TipoSocio, $MiConexion);
                /* $idTipoSocio["ID_CATEGORIASOCIO"] */
                if (!empty($idTipoSocio)) {
                    //consultar si ya existe la cuota del mes para esa categoria de socio
                    $CuotaSocio = mostrarDetalleCuotaIDMesTipoSocio($Mes, $idTipoSocio["ID_CATEGORIASOCIO"], $MiConexion);
                    if ($CuotaSocio) {

                        //true => emitir advertencia;
                        $MensajeAdvertencia = $MensajeAdvertencia . "Cuota"  . $TipoSocio . "Ya existente";
                    } else {
                        //false => crear cuota
                        $estadoCreacion = crearDetalleCuota($Mes, $idTipoSocio["ID_CATEGORIASOCIO"], $VCuota_Socio, $MiConexion);
                        if ($estadoCreacion) {
                            //mensaje de exito
                            $Exito = $Exito && true;

                            $MensajeExito = $MensajeExito . "Se creo la cuota " .  $TipoSocio;
                        } else {
                            //mensaje de fracaso
                            $Exito = $Exito && false;
                            $MensajeError = $MensajeError . "No se creo la cuota " . $TipoSocio;
                        }
                    }
                }else{
                    $MensajeError= $MensajeError ." Id socio: ". $idTipoSocio ."  No encontrado ";
                }
            }
            if (isset($_POST["Socio-Institucion"])) {

                $TipoSocio = $_POST["Socio-Institucion"];
                $VCuota_Socio = $_POST["VCuota-Institucion"];

                //obtener el id tipoSocio
                $idTipoSocio = conocerIdCategoriaSocio($TipoSocio, $MiConexion);
                /* $idTipoSocio["ID_CATEGORIASOCIO"] */
                if (!empty($idTipoSocio)) {
                    //consultar si ya existe la cuota del mes para esa categoria de socio
                    $CuotaSocio = mostrarDetalleCuotaIDMesTipoSocio($Mes, $idTipoSocio["ID_CATEGORIASOCIO"], $MiConexion);
                    if ($CuotaSocio) {

                        //true => emitir advertencia;
                        $MensajeAdvertencia = $MensajeAdvertencia . "Cuota"  . $TipoSocio . "Ya existente";
                    } else {
                        //false => crear cuota
                        $estadoCreacion = crearDetalleCuota($Mes, $idTipoSocio["ID_CATEGORIASOCIO"], $VCuota_Socio, $MiConexion);
                        if ($estadoCreacion) {
                            //mensaje de exito
                            $Exito = $Exito && true;

                            $MensajeExito = $MensajeExito . "Se creo la cuota " .  $TipoSocio;
                        } else {
                            //mensaje de fracaso
                            $Exito = $Exito && false;
                            $MensajeError = $MensajeError . "No se creo la cuota " . $TipoSocio;
                        }
                    }
                }else{
                    $MensajeError= $MensajeError ." Id socio: ". $idTipoSocio ."  No encontrado ";
                }
            }
        }
