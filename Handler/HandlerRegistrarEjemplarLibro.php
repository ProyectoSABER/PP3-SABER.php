<?php
require_once('./Inc/session.inc.php');


require_once 'funciones/conexion.php';

$MiConexion = $ConexionBD;

$MensajeError = "";
$MensajeExito = "";


require_once('./funciones/EjemplaresLibros.php');
require_once('./funciones/Libros.php');
$Libros = array();
$Libros = conocerTodosLibros($MiConexion);
$CantLibros = count($Libros);

if (!empty($_POST['Registrar'])) {

    if (!empty($_POST['ISBN'])) {


        if (!empty($_POST['NEjemplar'])) {


            $Ejemplar = array();
            $Ejemplar = conocerUnEjemplarLibroIDINST($_POST['NEjemplar'],$_POST['ISBN'], $MiConexion);

            if (!$Ejemplar) {


                if (!empty($_POST['EstadoLibro'])) {


                    $estadoRegistro = RegistrarUnEjemplarUnLibro($_POST['NEjemplar'], $_POST['ISBN'], $_POST['EstadoLibro'], $MiConexion);

                    if ($estadoRegistro != false) {

                        $MensajeExito = "Registro almacenado!";
                        $MensajeError = "";
                    } else {
                        $MensajeError = "El Registro no se almaceno!";
                    }
                } else {

                    $MensajeError = "Debes de Seleccionar un estado de libro";
                }
            } else {

                $MensajeError = "Codigo Ejemplar existente. Debes de ingresar un Codigo Numerico Unico de Ejemplar";
            }
        } else {

            $MensajeError = "Debes de ingresar un Codigo Numerico Unico de Ejemplar";
        }
    } else {

        $MensajeError = "Debes de seleccionar Un Titulo de Libro";
    }
}

require_once('./Inc/menus/head.inc.php');
