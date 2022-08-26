<?php
require_once('./Inc/session.inc.php');



require_once 'funciones/conexion.php';
require_once 'funciones/Persona.php';
require_once 'funciones/TipoDni.php';
require_once 'funciones/Domicilio.php';
$MiConexion = $ConexionBD;

$TipoDNI=array();
$TipoDNI=conocerTodosTipoDni($MiConexion);
$CantTipoDni=count($TipoDNI);

$Domicilio=array();
$Domicilio=conocerTodosDomicilioCompleto($MiConexion);
$CantDomicilio=count($Domicilio);




$MensajeError = "";
$MensajeExito = "";







if (!empty($_POST['Registrar'])) {

    if ((!empty($_POST['DNI']) && !(strlen($_POST['DNI']) < 8))) {
        $VerificarExistencia = conocerUnLibro($_POST['ISBN'], $MiConexion);
        if ($VerificarExistencia) {




            if (!empty($_POST['Titulo'])) {

                if (!empty($_POST['Idioma'])) {

                    if (!empty($_POST['NEdicion'])) {

                        if (!empty($_POST['Editorial'])) {

                            if (!empty($_POST['CategoriaLibro'])) {


                                if (!empty($_POST['FechaPublicacion'])) {


                                    if (!empty($_POST['CantEjemplar'])) {

                                        if (!empty($_POST['ProveedorLibro'])) {

                                            if (!empty($_POST['UbicacionEstanteria'])) {




                                            insertarUnaPersona($DNIPersona,$TipoDNI,$Nombre,$Apellido,$IdDomicilio,$IdUsuario,$FotoSocio, $PConeccionBD);

                                                $estadoRegistro = RegistrarLibro(
                                                    $_POST['ISBN'],
                                                    $_POST['Titulo'],
                                                    $_POST['SubTitulo'],
                                                    $_POST['Idioma'],
                                                    $_POST['NEdicion'],
                                                    $_POST['Editorial'],
                                                    $_POST['CategoriaLibro'],
                                                    $_POST['FechaPublicacion'],
                                                    $_POST['CantEjemplar'],
                                                    $_POST['ProveedorLibro'],
                                                    $_POST['UbicacionEstanteria'],
                                                    $Bibliotecario['Bibliotecario_ID'],
                                                    $MiConexion
                                                );




                                                if ($estadoRegistro != false) {

                                                    $MensajeExito = "Registro almacenado!";
                                                    $MensajeError = "";
                                                } else {
                                                    if ($MensajeError) {
                                                        $MensajeError = "El Registro no se almaceno!" . $MensajeError;
                                                        return;
                                                    }
                                                    $MensajeError = "El Registro no se almaceno!";
                                                }
                                            } else {

                                                $MensajeError = "Debes de ingresar una ubicacion de estanteria";
                                            }
                                        } else {

                                            $MensajeError = "Debes de seleccionar un proveedor";
                                        }
                                    } else {

                                        $MensajeError = "Debes de ingresar una cantidad de ejemplares";
                                    }
                                } else {

                                    $MensajeError = "Debes de ingresar una fecha";
                                }
                            } else {

                                $MensajeError = "Debes de ingresar un Categoria de libro";
                            }
                        } else {

                            $MensajeError = "Debes de ingresar una Editorial";
                        }
                    } else {

                        $MensajeError = "Debes de ingresar un Numero de Edicion";
                    }
                } else {

                    $MensajeError = "Debes de ingresar un Idioma";
                }
            } else {

                $MensajeError = "Debes de ingresar un titulo";
            }
        } else {

            $MensajeError = 'ISBN existente';
        }
    } else {

        $MensajeError = "Debes de ingresar un ISBN mayor a 12";
    }

}

require_once('./Inc/menus/head.inc.php');
