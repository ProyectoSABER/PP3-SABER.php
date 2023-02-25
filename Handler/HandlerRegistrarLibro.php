<?php



if (is_file('dirs.php')) {
    require_once('dirs.php');
} else {
    require_once('./../dirs.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require_once(_RAIZ . '/Inc/session.inc.php');
    require_once(_RAIZ . '/funciones/conexion.php');
    require_once(_RAIZ . '/funciones/Autores.php');
    require_once(_RAIZ . './funciones/CategoriaLibros.php');
    require_once(_RAIZ . './funciones/Proveedor.php');
    require_once(_RAIZ . './funciones/Idioma.php');
    require_once(_RAIZ . './funciones/Editorial.php');
    require_once(_RAIZ . './funciones/CategoriaProveedores.php');
    require_once(_RAIZ . './funciones/Domicilio.php');
    require_once(_RAIZ . './funciones/Contacto.php');


    $MiConexion = ConexionBD();

    if (isset($_POST['registrarAutor'])) {

        $RegistrarNombreAutor = $_POST['name'];
        $res = registrarAutor($RegistrarNombreAutor, $MiConexion);

        if (!empty($res)) {
            $json = array(
                'status' => 200,
                'response' => $res,
                'resquest' => $RegistrarNombreAutor

            );
        } else {
            $json = array(
                'status' => 404,
                'response' => "No se Registro el autor: ",
                'resquest' => $RegistrarNombreAutor
            );
        }

        $jsonString = json_encode($json, http_response_code($json['status']));

        echo $jsonString;
        exit();
    }
    if (isset($_POST['EditarAutor'])) {

        $ModificarNombreAutor = $_POST['EditarAutor'];
        $IdAutor = $_POST['idAutor'];
        $res = modificarAutor($IdAutor, $ModificarNombreAutor, $MiConexion);

        if (!empty($res)) {
            $json = array(
                'status' => 200,
                'response' => $res,
                'resquest' => $_POST

            );
        } else {
            $json = array(
                'status' => 404,
                'response' => "No se modifico el Registro del autor: ",
                'resquest' => $_POST
            );
        }

        $jsonString = json_encode($json, http_response_code($json['status']));

        echo $jsonString;
        exit();
    }
    if (isset($_POST['EliminarAutor'])) {

        $IdAutor = $_POST['EliminarAutor'];
        $res = eliminarAutor($IdAutor, $MiConexion);

        if (!empty($res)) {
            $json = array(
                'status' => 200,
                'response' => $res,
                'resquest' => $_POST

            );
        } else {
            $json = array(
                'status' => 404,
                'response' => "No se modifico el Registro del autor: ",
                'resquest' => $_POST
            );
        }

        $jsonString = json_encode($json, http_response_code($json['status']));

        echo $jsonString;
        exit();
    }
    if (isset($_POST['ConsultarAutores'])) {


        $res = conocerTodosAutores($MiConexion);

        if (!empty($res)) {
            $json = array(
                'status' => 200,
                'response' => $res,
                'resquest' => "Consultar todos los Autores"

            );
        } else {
            $json = array(
                'status' => 204,
                'response' => "No se encontraron auotores: ",
                'resquest' => "Consultar todos los Autores"
            );
        }

        $jsonString = json_encode($json, http_response_code($json['status']));

        echo $jsonString;
        exit();
    }

    //idiomas
    if (isset($_POST['ConsultarIdiomas'])) {


        $res = conocerTodosIdioma($MiConexion);

        if (!empty($res)) {
            $json = array(
                'status' => 200,
                'response' => $res,
                'resquest' => "Consultar todos los Idiomas"

            );
        } else {
            $json = array(
                'status' => 404,
                'response' => "No se Registro el Idiomas: ",
                'resquest' => "Consultar todos los Idiomas"
            );
        }

        $jsonString = json_encode($json, http_response_code($json['status']));

        echo $jsonString;
        exit();
    }
    if (isset($_POST['registrarIdioma'])) {

        $RegistrarIdioma = $_POST['name'];
        $res = registrarIdioma($RegistrarIdioma, $MiConexion);

        if (!empty($res)) {
            $json = array(
                'status' => 200,
                'response' => $res,
                'resquest' => $RegistrarIdioma

            );
        } else {
            $json = array(
                'status' => 404,
                'response' => "No se Registro el Idioma: ",
                'resquest' => $RegistrarIdioma
            );
        }

        $jsonString = json_encode($json, http_response_code($json['status']));

        echo $jsonString;
        exit();
    }
    if (isset($_POST['EditarIdioma'])) {

        $ModificarNombreIdioma = $_POST['EditarIdioma'];
        $idIdioma = $_POST['idIdioma'];
        $res = modificarIdioma($idIdioma, $ModificarNombreIdioma, $MiConexion);

        if (!empty($res)) {
            $json = array(
                'status' => 200,
                'response' => $res,
                'resquest' => $_POST

            );
        } else {
            $json = array(
                'status' => 404,
                'response' => "No se modifico el Registro del Idioma: ",
                'resquest' => $_POST
            );
        }

        $jsonString = json_encode($json, http_response_code($json['status']));

        echo $jsonString;
        exit();
    }
    if (isset($_POST['EliminarIdioma'])) {

        $idIdioma = $_POST['EliminarIdioma'];
        $res = eliminarIdioma($idIdioma, $MiConexion);

        if (!empty($res)) {
            $json = array(
                'status' => 200,
                'response' => $res,
                'resquest' => $_POST

            );
        } else {
            $json = array(
                'status' => 404,
                'response' => "No se modifico el Registro del Idioma: ",
                'resquest' => $_POST
            );
        }

        $jsonString = json_encode($json, http_response_code($json['status']));

        echo $jsonString;
        exit();
    }

    //Editoriales
    if (isset($_POST['ConsultarEditoriales'])) {


        $res = conocerTodasEditorial($MiConexion);

        if (!empty($res)) {
            $json = array(
                'status' => 200,
                'response' => $res,
                'resquest' => "Consultar todos las Editoriales"

            );
        } else {
            $json = array(
                'status' => 404,
                'response' => "No se Registro la Editorial: ",
                'resquest' => "Consultar todos las Editoriales"
            );
        }

        $jsonString = json_encode($json, http_response_code($json['status']));

        echo $jsonString;
        exit();
    }
    if (isset($_POST['registrarEditorial'])) {

        $RegistrarEditorial = $_POST['name'];
        $res = registrarEditorial($RegistrarEditorial, $MiConexion);

        if (!empty($res)) {
            $json = array(
                'status' => 200,
                'response' => $res,
                'resquest' => $RegistrarEditorial

            );
        } else {
            $json = array(
                'status' => 404,
                'response' => "No se Registro la Editorial: ",
                'resquest' => $RegistrarEditorial
            );
        }

        $jsonString = json_encode($json, http_response_code($json['status']));

        echo $jsonString;
        exit();
    }
    if (isset($_POST['EditarEditorial'])) {

        $ModificarNombreEditorial = $_POST['EditarEditorial'];
        $idEditorial = $_POST['idEditorial'];
        $res = modificarEditorial($idEditorial, $ModificarNombreEditorial, $MiConexion);

        if (!empty($res)) {
            $json = array(
                'status' => 200,
                'response' => $res,
                'resquest' => $_POST

            );
        } else {
            $json = array(
                'status' => 404,
                'response' => "No se modifico el Registro de la Editorial",
                'resquest' => $_POST
            );
        }

        $jsonString = json_encode($json, http_response_code($json['status']));

        echo $jsonString;
        exit();
    }
    if (isset($_POST['EliminarEditorial'])) {

        $idEditorial = $_POST['EliminarEditorial'];
        $res = eliminarEditorial($idEditorial, $MiConexion);

        if (!empty($res)) {
            $json = array(
                'status' => 200,
                'response' => $res,
                'resquest' => $_POST

            );
        } else {
            $json = array(
                'status' => 404,
                'response' => "No se modifico el Registro de la Editorial",
                'resquest' => $_POST
            );
        }

        $jsonString = json_encode($json, http_response_code($json['status']));

        echo $jsonString;
        exit();
    }
    //CategoriaLibros
    if (isset($_POST['ConsultarCategoriaLibros'])) {


        $res = conocerTodasCatLibros($MiConexion);

        if (!empty($res)) {
            $json = array(
                'status' => 200,
                'response' => $res,
                'resquest' => "Consultar todos las CategoriaLibros"

            );
        } else {
            $json = array(
                'status' => 404,
                'response' => "No se Registro la CategoriaLibro: ",
                'resquest' => "Consultar todos las CategoriaLibros"
            );
        }

        $jsonString = json_encode($json, http_response_code($json['status']));

        echo $jsonString;
        exit();
    }
    if (isset($_POST['registrarCategoriaLibro'])) {

        $RegistrarCategoriaLibro = $_POST['name'];
        $res = registrarCategoriaLibro($RegistrarCategoriaLibro, $MiConexion);

        if (!empty($res)) {
            $json = array(
                'status' => 200,
                'response' => $res,
                'resquest' => $RegistrarCategoriaLibro

            );
        } else {
            $json = array(
                'status' => 404,
                'response' => "No se Registro la CategoriaLibro: ",
                'resquest' => $RegistrarCategoriaLibro
            );
        }

        $jsonString = json_encode($json, http_response_code($json['status']));

        echo $jsonString;
        exit();
    }
    if (isset($_POST['EditarCategoriaLibro'])) {

        $ModificarNombreCategoriaLibro = $_POST['EditarCategoriaLibro'];
        $idCategoriaLibro = $_POST['idCategoriaLibro'];
        $res = modificarCategoriaLibro($idCategoriaLibro, $ModificarNombreCategoriaLibro, $MiConexion);

        if (!empty($res)) {
            $json = array(
                'status' => 200,
                'response' => $res,
                'resquest' => $_POST

            );
        } else {
            $json = array(
                'status' => 404,
                'response' => "No se modifico el Registro de la CategoriaLibro",
                'resquest' => $_POST
            );
        }

        $jsonString = json_encode($json, http_response_code($json['status']));

        echo $jsonString;
        exit();
    }
    if (isset($_POST['EliminarCategoriaLibro'])) {

        $idCategoriaLibro = $_POST['EliminarCategoriaLibro'];
        $res = eliminarCategoriaLibro($idCategoriaLibro, $MiConexion);

        if (!empty($res)) {
            $json = array(
                'status' => 200,
                'response' => $res,
                'resquest' => $_POST

            );
        } else {
            $json = array(
                'status' => 404,
                'response' => "No se modifico el Registro de la CategoriaLibro",
                'resquest' => $_POST
            );
        }

        $jsonString = json_encode($json, http_response_code($json['status']));

        echo $jsonString;
        exit();
    }
    //Proveedores
    if (isset($_POST['ConsultarProveedores'])) {


        $res = conocerTodosProveedor($MiConexion);

        if (!empty($res)) {
            $json = array(
                'status' => 200,
                'response' => $res,
                'resquest' => "Consultar todos las Proveedores"

            );
        } else {
            $json = array(
                'status' => 404,
                'response' => "No se Registro la Proveedor: ",
                'resquest' => "Consultar todos las Proveedores"
            );
        }

        $jsonString = json_encode($json, http_response_code($json['status']));

        echo $jsonString;
        exit();
    }
    if (isset($_POST['MostrarCategoriaProveedor'])) {


        $res = conocerTodasCatProveedores($MiConexion);

        if (!empty($res)) {
            $json = array(
                'status' => 200,
                'response' => $res,
                'resquest' => "Consultar todos las Proveedores"

            );
        } else {
            $json = array(
                'status' => 404,
                'response' => "No se Registro la Proveedor: ",
                'resquest' => "Consultar todos las Proveedores"
            );
        }

        $jsonString = json_encode($json, http_response_code($json['status']));

        echo $jsonString;
        exit();
    }

    if (isset($_POST['registrarProveedor'])) {
        $res = true;
        $cuitProveedor = $_POST["cuitProveedor"] ?? false;
        $nombreYapellido = $_POST["nombreYapellido"] ?? false;
        $CategoriaProveedor = $_POST["CategoriaProveedor"] ?? false;
        $pais = $_POST["pais"] ?? false;
        $Provincia = $_POST["Provincia"] ?? false;
        $Localidad = $_POST["Localidad"] ?? false;
        $Barrio = $_POST["Barrio"] ?? false;
        $Calle = $_POST["Calle"] ?? false;
        $Altura = $_POST["Altura"] ?? false;
        $TipoContacto = $_POST["TipoContacto"] ?? false;
        $CodArea = $_POST["CodArea"] ?? false;
        $Celular = $_POST["Celular"] ?? false;
        $Email = $_POST["EmailProveedor"] ?? false;

        if (!($cuitProveedor && $nombreYapellido && $CategoriaProveedor && $pais && $Provincia && $Localidad && $Barrio && $Calle && $Altura && $TipoContacto)) {
            $res = false;
            $error_msg = "No se proporcionaron los datos correspondientes para almacenar";
        }

        if ($res) {
            $proveedorExist = conocerProveedor($cuitProveedor, $MiConexion);
            if (!$proveedorExist) {
                //registrar domicilio
                //consultar existencia de domicilio
                //consultar calle y altura en localidad
                $existCalle = conocerunDomicilioCompleto($pais, $Provincia, $Localidad, $Barrio, $Calle, $Altura, $MiConexion);
                if ($existCalle) {
                    //obtener id domicilio
                    $idDomicilio = $existCalle[0]["DomicilioID"];
                } else {
                    //crear domicilio
                    registraDomicilio($Calle, $Altura, $Barrio, $MiConexion);
                    $existCalle = conocerunDomicilio($Calle, $Altura, $Barrio, $MiConexion);
                    //obtener id domicilio
                    $idDomicilio = $existCalle[0]["DomicilioID"];
                }

                $idBibliotecario = $_SESSION["USUARIO_ID"];
                //registrar Proveedor
                $res = registrarProveedor($cuitProveedor, $nombreYapellido, $idDomicilio, $idBibliotecario, $CategoriaProveedor, $MiConexion);

                if (!$res) {
                    $error_msg = "No se pudo registrar el proveedor";
                    $data_insert=$cuitProveedor." ". $nombreYapellido." ". $idDomicilio." ". $idBibliotecario." ". $CategoriaProveedor;
                } else {


                    //registrar contacto



                    //Conocer Existencia de contacto celular Email


                    $contacto = $CodArea ? $CodArea . $Celular : $Email;

                    $exitsContacto = ConocerContacto($contacto, $TipoContacto, $MiConexion);

                    if ($exitsContacto) {
                        $idContacto = $exitsContacto[0]["IDCONTACTO"];
                    } else {
                        //crear contacto
                        registrarContacto($contacto, $TipoContacto, $MiConexion);

                        //Conocer id contacto nuevo
                        $exitsContacto = ConocerContacto($contacto, $TipoContacto, $MiConexion);
                        $idContacto = $exitsContacto[0]["IDCONTACTO"];
                    }
                    //Asocir proveedor a contacto
                    $res = registrarContacto_proveedor($cuitProveedor, $idContacto, $MiConexion);
                    if (!$res) {
                        $error_msg = "No se pudo ASOCIAR EL CONTACTO CON EL PROVEEDOR";

                    }
                }
            } else {
                $res = false;
                $error_msg = "El proveedor ya existe";
            }
        }

        if (!empty($res) && $res != false) {
            $json = array(
                'status' => 200,
                'response' => $res,
                'resquest' => $_POST

            );
        } else {
            $json = array(
                'status' => 404,
                'response' => "No se Registro el Proveedor: ",
                'error_msg' => $error_msg,
                "data_insert"=>$data_insert??"",
                'resquest' => $_POST
            );
        }

        $jsonString = json_encode($json, http_response_code($json['status']));

        echo $jsonString;
        exit();
    }
    /*
    TODO Implementar
    if (isset($_POST['EditarProveedor'])) {

        $ModificarNombreProveedor = $_POST['EditarProveedor'];
        $idProveedor = $_POST['idProveedor'];
        $res = modificarProveedor($idProveedor, $ModificarNombreProveedor, $MiConexion);

        if (!empty($res)) {
            $json = array(
                'status' => 200,
                'response' => $res,
                'resquest' => $_POST

            );
        } else {
            $json = array(
                'status' => 404,
                'response' => "No se modifico el Registro de la Proveedor",
                'resquest' => $_POST
            );
        }

        $jsonString = json_encode($json, http_response_code($json['status']));

        echo $jsonString;
        exit();
    } */
    if (isset($_POST['EliminarProveedor'])) {

//! consultar que el proveedor no este asignado a ningun libro
// TODO 1 Consultar asociacion de proveedor contacto en tabla, obtner id de contactos
// TODO 2 elimiar asociacion de proveedor contacto en tabla
// TODO 3 elimiar contacto de proveedor en tabla contacto con los id recuperados
// TODO 4 buscar domicilio provedor y almacenar id de domicilio
// TODO 5 Eliminar proveedor
// TODO 6 Eliminar domicilio de proveedor

        /* $idProveedor = $_POST['EliminarProveedor'];

                // eliminarAsociacionProveedorContacto($idProveedor, $MiConexion) 
        $res = eliminarProveedor($idProveedor, $MiConexion); */

        if (!empty($res)) {
            $json = array(
                'status' => 200,
                'response' => $res,
                'resquest' => $_POST

            );
        } else {
            $json = array(
                'status' => 404,
                'response' => "No se modifico el Registro de la Proveedor",
                'resquest' => $_POST
            );
        }

        $jsonString = json_encode($json, http_response_code($json['status']));

        echo $jsonString;
        exit();
    }
    // Domicilio
    if (isset($_POST['MostrarPaises'])) {


        $res = mostrarPaises($MiConexion);

        if (!empty($res)) {
            $json = array(
                'status' => 200,
                'response' => $res,
                'resquest' => "Consultar todos los Paises"

            );
        } else {
            $json = array(
                'status' => 404,
                'response' => "No se obtuvieron todos los Paises: ",
                'resquest' => "Consultar todos los Paises"
            );
        }

        $jsonString = json_encode($json, http_response_code($json['status']));

        echo $jsonString;
        exit();
    }
    if (isset($_POST['MostrarProvinciaPorPais'])) {

        $idPaisSeleccionado = $_POST['MostrarProvinciaPorPais'];
        $res = mostrarTodasProvinciaXPais($idPaisSeleccionado, $MiConexion);

        if (!empty($res)) {
            $json = array(
                'status' => 200,
                'response' => $res,
                'resquest' => "Consultar todas las Provincias por Pais"

            );
        } else {
            $json = array(
                'status' => 404,
                'response' => "No se obtuvieron todos los Paises: ",
                'resquest' => "Consultar todos los Paises"
            );
        }

        $jsonString = json_encode($json, http_response_code($json['status']));

        echo $jsonString;
        exit();
    }
    if (isset($_POST['MostrarLocalidadPorProvincia'])) {

        $idProvinciaSeleccionado = $_POST['MostrarLocalidadPorProvincia'];
        $res = mostrarLocalidadesXProvincia($idProvinciaSeleccionado, $MiConexion);

        if (!empty($res)) {
            $json = array(
                'status' => 200,
                'response' => $res,
                'resquest' => "Consultar todas las Localidades por Provincias"

            );
        } else {
            $json = array(
                'status' => 404,
                'response' => "No se obtuvieron las localidades ",
                'resquest' => "Consultar todas las Localidades por Provincias"
            );
        }

        $jsonString = json_encode($json, http_response_code($json['status']));

        echo $jsonString;
        exit();
    }
    if (isset($_POST['MostrarBarrioPorLocalidad'])) {

        $idLocalidadSeleccionada = $_POST['MostrarBarrioPorLocalidad'];
        $res = mostrarBarrioXLocalidad($idLocalidadSeleccionada, $MiConexion);

        if (!empty($res)) {
            $json = array(
                'status' => 200,
                'response' => $res,
                'resquest' => "Consultar todas las Localidades por Provincias"

            );
        } else {
            $json = array(
                'status' => 404,
                'response' => "No se obtuvieron las localidades ",
                'resquest' => "Consultar todas las Localidades por Provincias"
            );
        }

        $jsonString = json_encode($json, http_response_code($json['status']));

        echo $jsonString;
        exit();
    }
    if (isset($_POST['MostrarCategoriaContacto'])) {


        $res = conocerTodosTipoContacto($MiConexion);

        if (!empty($res)) {
            $json = array(
                'status' => 200,
                'response' => $res,
                'resquest' => "Consultar todas las Localidades por Provincias"

            );
        } else {
            $json = array(
                'status' => 404,
                'response' => "No se obtuvieron las localidades ",
                'resquest' => "Consultar todas las Localidades por Provincias"
            );
        }

        $jsonString = json_encode($json, http_response_code($json['status']));

        echo $jsonString;
        exit();
    }
}


require_once('./Inc/session.inc.php');


require_once 'funciones/conexion.php';

$MiConexion = ConexionBD();

$MensajeError = "";
$MensajeExito = "";

require_once './funciones/Editorial.php';
$Editorial = array();
$Editorial = conocerTodasEditorial($MiConexion);

$CantEditorial = count($Editorial);

require_once './funciones/CategoriaLibros.php';
require_once './funciones/Libros.php';
require_once './funciones/Proveedor.php';
require_once './funciones/Autores.php';
require_once './funciones/Bibliotecario.php';
require_once './funciones/Idioma.php';

$CatLibros = array();
$CatLibros = conocerTodasCatLibros($MiConexion);
$CantCatLi = count($CatLibros);

$Proveedor = array();
$Proveedor = conocerTodosProveedor($MiConexion);
$CantProveedores = count($Proveedor);

$Autores = array();
$Autores = conocerTodosAutores($MiConexion);
$CantAutores = count($Autores);

$Bibliotecario = array();
$Bibliotecario = conocerBibliotecario($_SESSION['USUARIO_DNI'], $MiConexion);

$Idioma = array();
$Idioma = conocerTodosIdioma($MiConexion);
$CantIdioma = count($Idioma);
$cantLibreros = 25;
$cantEstantes = 5;

/* Array ( [ISBN] => 9788478290765 
[Titulo] => El Lenguaje Unificado de Modelado, uml 2. 0: Guía de Usuario: 
    [SubTitulo] => Aprenda uml Directamente de sus Creadores 
    [Autor] => 4 
    [Idioma] => 1 
    [NEdicion] => 1 
    [Editorial] => 2 
    [CategoriaLibro] => 2 
    [FechaPublicacion] => 2023-02-03 
    [CantEjemplar] => 1 
    [ProveedorLibro] => 1322222123 
    [Librero] => 20 
    [Estante] => 5 
    [hidden_autor] => 1,2,3,4 
    [archivo] => 
    [Registrar] => Registrar 
    )*/

/* $IngresoRegistro = array(); */


if (!empty($_POST['Registrar'])) {
    $urlImg = "NULL";

    if ((empty($_POST['ISBN']) && (strlen($_POST['ISBN']) < 13))) {
        $MensajeError = "Debes de ingresar un ISBN mayor a 12";
        importHead();
        return;
    }
    $VerificarExistencia = conocerUnLibro($_POST['ISBN'], $MiConexion);
    if ($VerificarExistencia) {
        $MensajeError = 'Ya existe un Libro con el ISBN: ' . $_POST['ISBN'];
    } elseif (empty($_POST['Titulo'])) {
        $MensajeError = "Debes de ingresar un titulo";
    } elseif (empty($_POST['Idioma'])) {
        $MensajeError = "Debes de ingresar un Idioma";
    } elseif (empty($_POST['NEdicion'])) {
        $MensajeError = "Debes de ingresar un Numero de Edicion";
    } elseif (empty($_POST['Editorial'])) {
        $MensajeError = "Debes de ingresar una Editorial";
    } elseif (empty($_POST['CategoriaLibro'])) {
        $MensajeError = "Debes de ingresar un Categoria de libro";
    } elseif (empty($_POST['FechaPublicacion'])) {
        $MensajeError = "Debes de ingresar una fecha";
    } elseif (empty($_POST['CantEjemplar'])) {
        $MensajeError = "Debes de ingresar una cantidad de ejemplares";
    } elseif (empty($_POST['ProveedorLibro'])) {
        $MensajeError = "Debes de seleccionar un proveedor";
    } elseif (empty($_POST['Librero'])) {
        $MensajeError = "Debes de ingresar un Librero";
    } elseif (empty($_POST['Estante'])) {
        $MensajeError = "Debes de ingresar un Estante";
    } elseif (empty($_POST['hidden_autor'])) {
        $MensajeError = "Debes de ingresar un Autor";
    }







    if (!empty($_FILES["archivo"])) {

        if ($_FILES["archivo"]["error"] > 0) {
            $MensajeError = "Error al Cargar el Archivo (Archivo Dañado) ";
        } else {
            $tamañoArchivo = $_FILES["archivo"]["size"];
            $permitidos = array("image/gif", "image/png", "image/jpg", "image/jpge", "image/svg", "image/webp", "image/bmp");
            $limite_byte = 6000640;
            if (!in_array($_FILES["archivo"]["type"], $permitidos)) {
                $MensajeError = "Archivo no permitido (*.gif,*.png,*.jpg,*.jpge,*.svg,*.webp,*.bmp";
            } elseif ($limite_byte <= $tamañoArchivo) {
                $MensajeError = "Archivo excede el tamaño (Hasta 6 mB)";
            } else {
                //obtenemos la ruta a almacenar STRING
                $ruta = "./images/libros/" . $_POST["ISBN"]  . "/";
                //tipo de imagen
                $imageFileType = strtolower(pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION));
                //Cambiamos el nombre de la imagen
                $_FILES["archivo"]["name"] = $_POST["ISBN"] . "." . $imageFileType;
                //ruta completa con el nombre de archivo
                $archivo = $ruta . $_FILES["archivo"]["name"];

                if (!file_exists($ruta)) {
                    //si no existe la ruta que la cree
                    mkdir($ruta, 0777, true);
                }
                //remplazar el archivo anterior
                $resultado = @move_uploaded_file($_FILES["archivo"]["tmp_name"], $archivo);
                if ($resultado) {
                    $urlImg = "images/libros/" . $_POST["ISBN"] . "/" . $_FILES["archivo"]["name"];
                } else {
                    $MensajeError = "La Imagen no se guardo Correctamente";
                }
            }
        }
    }






    if (empty($MensajeError)) {
        $UbicacionEstanteria = $_POST['Librero'] . ',' . $_POST['Estante'];
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
            $UbicacionEstanteria,
            $Bibliotecario['Bibliotecario_ID'],
            $MiConexion,
            $urlImg
        );
        if ($estadoRegistro != false) {
            $registrarAutores = explode(',', $_POST['hidden_autor']);
            foreach ($registrarAutores as $clave => $valor) {

                $res = registrarAutoresEnunlibro($_POST['ISBN'], $valor, $MiConexion);
            }
            if (!$res) {
                $MensajeError = "El Registro de autores no se almaceno!";
            } else {
                $MensajeExito = "Registro almacenado!";
                $MensajeError = "";
            }
        }
    } elseif (!$MensajeError) {
        $MensajeError = "El Registro no se almaceno!" . $MensajeError;
    }




    /* foreach ($_POST as $clave => $valor) {

        $IngresoRegistro[$clave] = $valor;
    };

    $IngresoRegistro['$Bibliotecario_ID']=$Bibliotecario['Bibliotecario_ID']; */
}
function importHead()
{
    require_once('./Inc/menus/head.inc.php');
}
importHead();
