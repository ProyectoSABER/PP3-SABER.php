<?php
if (is_file('../../Inc/session.inc.php')) {
    require_once('../../Inc/session.inc.php');
} else {
    require_once('./Inc/session.inc.php');
}
if (is_file('../../Inc/menus/head.inc.php')) {
    require_once('../../Inc/menus/head.inc.php');
} else {
    require_once('./Inc/menus/head.inc.php');
}
if (is_file('../../funciones/conexion.php')) {
    require_once('../../funciones/conexion.php');
} else {
    require_once('./funciones/conexion.php');
}
if (is_file('../../funciones/Editorial.php')) {
    require_once('../../funciones/Editorial.php');
} else {
    require_once('./funciones/Editorial.php');
}
if (is_file('../../funciones/Libros.php')) {
    require_once('../../funciones/Libros.php');
} else {
    require_once('./funciones/Libros.php');
}
if (is_file('../../funciones/Socio.php')) {
    require_once('../../funciones/Socio.php');
} else {
    require_once('./funciones/Socio.php');
}
if (is_file('../../funciones/EjemplaresLibros.php')) {
    require_once('../../funciones/EjemplaresLibros.php');
} else {
    require_once('./funciones/EjemplaresLibros.php');
}

if (is_file('../../funciones/TipoPrestamo.php')) {
    require_once('../../funciones/TipoPrestamo.php');
} else {
    require_once './funciones/TipoPrestamo.php';
}
if (is_file('../../funciones/EstadoSocio.php')) {
    require_once('../../funciones/EstadoSocio.php');
} else {
    require_once './funciones/EstadoSocio.php';
}
if (is_file('../../funciones/CategoriaSocios.php')) {
    require_once('../../funciones/CategoriaSocios.php');
} else {
    require_once './funciones/CategoriaSocios.php';
}
if (is_file('../../funciones/Usuario.php')) {
    require_once('../../funciones/Usuario.php');
} else {
    require_once './funciones/Usuario.php';
}
if (is_file('../../funciones/Persona.php')) {
    require_once('../../funciones/Persona.php');
} else {
    require_once './funciones/Persona.php';
}




$MiConexion = ConexionBD();

$MensajeError = "";
$MensajeExito = "";


$NoSocio = array();
$NoSocio = mostrarTodoPersonaNoSocio($MiConexion);
$CantNoSocio = count($NoSocio);

$CategoriaSocio = array();
$CategoriaSocio = conocerTodasCatSocio($MiConexion);
$CantCatSocio = count($CategoriaSocio);



$EstadoSocio = array();
$EstadoSocio = conocerTodosEstadoSocio($MiConexion);
$CantEstadoSocio = count($EstadoSocio);






$IngresoRegistro = array();


if (!empty($_POST['Registrar'])) {

    if ((!empty($_POST['DNI']) && !(strlen($_POST['DNI']) < 8))) {

            //vrificar que el socio no esté cargado



        if (!empty($_POST['IDCategoriaSocio'])) {

            if (!empty($_POST['IDEstadoSocio'])) {







                $estadoRegistro = insertarUnoSocio(
                    $_POST['DNI'],
                    $_POST['IDCategoriaSocio'],
                    $_POST['IDEstadoSocio'],
                    $MiConexion
                );




                if ($estadoRegistro != false) {
                    $IDSocioInsertado = MostrarUnoSocioDni($_POST['DNI'], $MiConexion);
                    $MensajeExito = "Registro almacenado! Identificador Unico De SOCIO: " . $IDSocioInsertado['SOCIO_ID'];
                    $idUsuario = mostrarUsuarioSegunDni($_POST['DNI'], $MiConexion);
                    $datoUsuario = DatosUsuario($idUsuario["IDUSUARIO"], $MiConexion);
                    if ($datoUsuario['USUARIO_IDTIPO'] > 3) {
                        if ($_POST['IDCategoriaSocio'] == 1) {
                            $tipoUsuario = 3;
                        } else {
                            $tipoUsuario = 4;
                        }
                        $estado=ActualizarNuevoSocio($idUsuario["IDUSUARIO"], $tipoUsuario, $MiConexion);
                    }


                    $MensajeError = "";
                } else {

                    $MensajeError = "El Registro no se almaceno!";
                }
            } else {

                $MensajeError = "Debes de Seleccionar un Estado inicial de Socio";
            }
        } else {

            $MensajeError = "Debes de Seleccionar una Categoria de Socio";
        }
    } else {

        $MensajeError = "Debes de Seleccionar un Dni";
    }

    foreach ($_POST as $clave => $valor) {

        $IngresoRegistro[$clave] = $valor;
    };
}

