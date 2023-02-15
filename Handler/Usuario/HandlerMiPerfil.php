<?php
require_once('./Inc/session.inc.php');
require_once 'funciones/conexion.php';


require_once('./funciones/conocerUsuario.php');

require_once('./funciones/Persona.php');
require_once('./funciones/Contacto.php');

$MiConexion = ConexionBD();
if (isset($_POST["datosPersonales"])) {
    $DNI = $_SESSION["USUARIO_DNI"];
    $Nombre = $_POST["name"];
    $Apellido = $_POST["lastname"];

    $res = modificarUnaPersonaDNI($DNI, $Nombre, $Apellido, $MiConexion);
    if ($res == 1 || $res == true) {
        cargarUsuario($_SESSION['USUARIO_ID'], $MiConexion);
        $msgExito = "Se modificaron los datos de manera Exitosa";
    } else {
        $msgError = "No se pudo modificar los datos";
    }
    header("location=miPerfil.php");
}
/* Modificar Clave de Usuario */
if (isset($_POST["clave"])) {
    require_once('./funciones/Usuario.php');


    $Email = $_POST["emailActual"];
    $Clave = $_POST["claveActual"];
    $ClaveNueva = $_POST["nuevaClave"];

    if ($Email == $_SESSION["USUARIO_EMAIL"]) {
        $USUARIO = DatosLogin($Email, $Clave, $MiConexion);
        if (!empty($USUARIO)) {
            $res = modificarClave($Email, $ClaveNueva, $MiConexion);
            if ($res == 1 || $res == true) {
                cargarUsuario($_SESSION['USUARIO_ID'], $MiConexion);
                $msgExito = "Se modifico la contraseña de manera Exitosa";
            } else {
                $msgError = "No se pudo modificar la contraseña";
            }
        } else {
            $msgError = "La Clave no coincide con el usuario actual";
        }
    } else {
        $msgError = "El Email no coincide con el usuario actual";
    }
}

if (isset($_POST["file"])) {
    if ($_FILES["archivo"]["error"] > 0) {
        $msgError = "Error al Cargar el Archivo";
    } else {
        $permitidos = array("image/gif", "image/png", "image/jpg", "image/jpge", "image/svg", "image/webp", "image/bmp");
        $limite_kb = 1024;
        if (in_array($_FILES["archivo"]["type"], $permitidos) && $_FILES["archivo"]["size"] <= $limite_kb * 1024) {
            $ruta = "./images/profile/" . $_SESSION["USUARIO_ID"] . "/";
            $imageFileType = strtolower(pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION));
            $_FILES["archivo"]["name"] = $_SESSION["USUARIO_ID"] . "." . $imageFileType;
            $archivo = $ruta . $_FILES["archivo"]["name"];

            if (!file_exists($ruta)) {
                //si no existe la ruta que la cree
                mkdir($ruta, 0777, true);
            }
            //remplazar el archivo anterior
            $resultado = @move_uploaded_file($_FILES["archivo"]["tmp_name"], $archivo);
            if ($resultado) {
                $rutaAguardar = "images/profile/" . $_SESSION["USUARIO_ID"] . "/" . $_FILES["archivo"]["name"];
                $res = modificarImagenIdUsuario($_SESSION["USUARIO_ID"], $rutaAguardar, $MiConexion);
                if ($res) {
                    cargarUsuario($_SESSION['USUARIO_ID'], $MiConexion);

                    $msgExito = "Imagen Cargada Correctamente";
                }else {
                    $msgError = "La Imagen no se guardo Correctamente";
                }
            } else {
                $msgError = "La Imagen no se guardo Correctamente";
            }
        } else {
            $msgError = "Archivo no permitido o excede el tamaño";
        }
    }
}
