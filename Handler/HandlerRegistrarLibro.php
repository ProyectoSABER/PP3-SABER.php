<?php
require_once('./Inc/session.inc.php');


require_once 'funciones/conexion.php';

$MiConexion = $ConexionBD;

$MensajeError = "";
$MensajeExito = "";

require_once './funciones/Editorial.php';
$Editorial = array();
$Editorial = conocerTodasEditorial($MiConexion);

$CantEditorial = count($Editorial);

require_once './funciones/CategoriaLibros.php';
require_once './funciones/Libros.php';
require_once './funciones/Proveedor.php';
require_once './funciones/Bibliotecario.php';
require_once './funciones/Idioma.php';

$CatLibros = array();
$CatLibros = conocerTodasCatLibros($MiConexion);
$CantCatLi = count($CatLibros);

$Proveedor = array();
$Proveedor = conocerTodosProveedor($MiConexion);
$CantProveedores = count($Proveedor);

$Bibliotecario = array();
$Bibliotecario = conocerBibliotecario($_SESSION['USUARIO_DNI'], $MiConexion);

$Idioma = array();
$Idioma = conocerTodosIdioma($MiConexion);
$CantIdioma = count($Idioma);

/* $IngresoRegistro = array(); */


if (!empty($_POST['Registrar'])) {

    if ((!empty($_POST['ISBN']) && !(strlen($_POST['ISBN']) < 13))) {
        $VerificarExistencia = conocerUnLibro($_POST['ISBN'], $MiConexion);
        if (!$VerificarExistencia) {

            if (!empty($_POST['Titulo'])) {

                if (!empty($_POST['Idioma'])) {

                    if (!empty($_POST['NEdicion'])) {

                        if (!empty($_POST['Editorial'])) {

                            if (!empty($_POST['CategoriaLibro'])) {


                                if (!empty($_POST['FechaPublicacion'])) {


                                    if (!empty($_POST['CantEjemplar'])) {

                                        if (!empty($_POST['ProveedorLibro'])) {

                                            if (!empty($_POST['UbicacionEstanteria'])) {






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

    /* foreach ($_POST as $clave => $valor) {

        $IngresoRegistro[$clave] = $valor;
    };

    $IngresoRegistro['$Bibliotecario_ID']=$Bibliotecario['Bibliotecario_ID']; */
}

require_once('./Inc/menus/head.inc.php');
