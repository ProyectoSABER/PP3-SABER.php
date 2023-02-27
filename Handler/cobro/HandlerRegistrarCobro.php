<?Php

use FontLib\Table\Type\post;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once('./../../Inc/session.inc.php');
    require_once('./../../funciones/conexion.php');
    require_once('./../../funciones/DetalleCuota.php');
    require_once('./../../funciones/Socio.php');
    require_once('./../../funciones/DetalleCobro.php');
    $MiConexion = ConexionBD();
    
    if (isset($_GET["RegistrarCobro"])) {
        $res = array();
        $tipoSolicitud = "Insert";
        $error=array();
        $data = $_POST["data"];
        
        $CobroCuota=$data["cobroCuota"];
        $DetCobroCuota=$data["detalleCobro"];
        
        $resCobro=crearCobro(intval($CobroCuota["idSocio"]),$CobroCuota["fechaCobro"],$CobroCuota["idMetodoPago"],$MiConexion);
        if(!$resCobro){
            $error[0]=["Error al crear el cobro linea: ".__LINE__];
        }else{

        
        $idCuota=consultarIdCobroNoAsignado(intval($CobroCuota["idSocio"]),$CobroCuota["fechaCobro"], $MiConexion);
        $estadoCobroCuota="PAGADO";
        unset($error);
        $indice=0;
        foreach ($DetCobroCuota as $DetCuota){
            $rs=crearDetalleCobro(intval($idCuota),intval($DetCuota["idDetalleCuota"]),intval($DetCuota["valorCuota"]),intval($DetCuota["recargo"]),$estadoCobroCuota,intval($DetCuota["idResponsableCobro"]),$DetCuota["observaciones"], $MiConexion);
            
            if(!$rs){
                $error[$indice]=[intval($idCuota),intval($DetCuota["idDetalleCuota"]),intval($DetCuota["valorCuota"]),intval($DetCuota["recargo"]),$estadoCobroCuota,intval($DetCuota["idResponsableCobro"]),$DetCuota["observaciones"]];
            }
            
            if($rs){
                $res[$indice]=[intval($idCuota),intval($DetCuota["idDetalleCuota"]),intval($DetCuota["valorCuota"]),intval($DetCuota["recargo"]),$estadoCobroCuota,intval($DetCuota["idResponsableCobro"]),$DetCuota["observaciones"]];
            }
            $indice++;
        }
        //consultar si alguna cuota se cargo con el idcobro, si no eliminar de la bd.
         if(!empty($error)){
            $idCobroSinAsignar=consultardetalleCobroPorIdCobro($idCuota, $MiConexion);
            if(!$idCobroSinAsignar){
                eliminarCobroCuotaPorIdCobro($idCuota,$MiConexion);
            }
         }
        }   

        if ((!empty($res)&&(empty($error)))) {
            $json = array(
                'status' => 200,
                'results' => $res,
                'errorGuardado'=>$error??"",
                'tipoSolicitud' => "$tipoSolicitud",
                'id_cobro'=>"$idCuota",
            );
        } else {
            $json = array(
                'status' => 404,
                'results' => "Sin resultados:",
                'errorGuardado'=>$error,
                'tipoSolicitud' => "$tipoSolicitud",
                'request' => $_POST
            );
        }

        $jsonString = json_encode($json, http_response_code($json['status']));

        echo $jsonString;

       
    }
    if (isset($_GET["mostrarDetCuota"])) {
        $res = array();
        $tipoBusquedaCuota = "";
        $tipoBusquedaCuota = $_GET["mostrarDetCuota"];
        $idCuota = $_POST["IdDetalleCuota"];
        $res = mostrarDetalleCuotaID($idCuota, $MiConexion);

        
        
        if (!empty($res)) {
            $json = array(
                'status' => 200,
                'results' => $res,
                'tipoBusqueda' => "$tipoBusquedaCuota",
                'valorBuscado' => "$idCuota"
            );
        } else {
            $json = array(
                'status' => 404,
                'results' => "Sin resultados:",
                'tipoBusqueda' => "$tipoBusquedaCuota",
                'valorBuscado' => "$idCuota"
            );
        }

        $jsonString = json_encode($json, http_response_code($json['status']));

        echo $jsonString;

       
    }
    if (isset($_GET["cargarTabla"])) {
        $Cuota = array();
        $Cuota = mostrarTodasDetCuota($MiConexion);
        
        if (!empty($Cuota)) {
            $json = array(
                'status' => 200,
                'results' => $Cuota
            );
        } else {
            $json = array(
                'status' => 404,
                'results' => "Sin Cuotas: "
            );
        }

        $jsonString = json_encode($json, http_response_code($json['status']));

        echo $jsonString;
    }

    /* Busqueda de Socios */
    if (isset($_GET["Busquedasocio"])) {
        $res = array();
        $tipoBusqueda = "";
        $tipoBusqueda = $_GET["Busquedasocio"];
        $socioBuscado = $_POST["search"];

        if ($tipoBusqueda == "DNI") {

            $res = busquedaTodosSociosDNI($socioBuscado, $MiConexion);
        }
        if ($tipoBusqueda == "N°SOCIO") {
            $res = busquedaTodosSociosNumerosocio($socioBuscado, $MiConexion);
        }

        if ($tipoBusqueda == "NOMBREAPELLIDO") {
            $res = busquedaTodosSociosNombreApellido($socioBuscado, $MiConexion);
        }

        if (!empty($res)) {
            $json = array(
                'status' => 200,
                'results' => $res,
                'tipoBusqueda' => "$tipoBusqueda",
                'valorBuscado' => "$socioBuscado"
            );
        } else {
            $json = array(
                'status' => 404,
                'results' => "Sin Socio:",
                'tipoBusqueda' => "$tipoBusqueda",
                'valorBuscado' => "$socioBuscado"
            );
        }

        $jsonString = json_encode($json, http_response_code($json['status']));

        echo $jsonString;
    }
    /* Busqueda de Bibliotecario */
    if (isset($_GET["mostrarBibliotecario"])) {
        $res = array();
        $tipoBusqueda = "";
        $tipoBusqueda = $_GET["mostrarBibliotecario"];
        

        $res= array( 
            "nombre" => $_SESSION["USUARIO_NOMBRE"],
            "apellido" => $_SESSION["USUARIO_APELLIDO"],
            "idBibliotecario" => $_SESSION["USUARIO_ID"]
            
        );
        

        if (!empty($res)) {
            $json = array(
                'status' => 200,
                'results' => $res,
                'tipoBusqueda' => "$tipoBusqueda",
                'valorBuscado' => "Session"
            );
        } else {
            $json = array(
                'status' => 404,
                'results' => "Sin Socio:",
                'tipoBusqueda' => "$tipoBusqueda",
                'valorBuscado' => "Session"
            );
        }

        $jsonString = json_encode($json, http_response_code($json['status']));

        echo $jsonString;
    }

    if (isset($_GET["BusquedaCuotaDni"])) {
        $res = array();
        $tipoBusquedaCuota = "";
        $tipoBusquedaCuota = 'BusquedaCuotaNoAbonadasDni';
        $DNIsocioBuscado = $_POST["DniSocio"];



        $SOCIO = MostrarUnoSocioDni($DNIsocioBuscado, $MiConexion);
        $res=mostrarDetCuotaNoAbonadasSocio($SOCIO['SOCIO_ID'],$SOCIO['SOCIO_CATEGORIA'],$SOCIO['SOCIO_FECHAALTA'],$MiConexion);




        if (!empty($res)) {
            $json = array(
                'status' => 200,
                'results' => $res,
                'tipoBusqueda' => "$tipoBusquedaCuota",
                'valorBuscado' => "$DNIsocioBuscado"
            );
        } else {
            $json = array(
                'status' => 404,
                'results' => "Sin resultados:".$res,
                'tipoBusqueda' => "$tipoBusquedaCuota",
                'valorBuscado' => "$DNIsocioBuscado"
            );
        }

        $jsonString = json_encode($json, http_response_code($json['status']));

        echo $jsonString;
    }
    if (isset($_GET["BusquedaCuotaAbonadasDni"])) {
        $res = array();
        $tipoBusquedaCuota = "";
        $tipoBusquedaCuota = "BusquedaCuotaAbonadasDni";
        $DNIsocioBuscado = $_POST["DniSocio"];



        $SOCIO = MostrarUnoSocioDni($DNIsocioBuscado, $MiConexion);
        $res=mostrarDetCuotaAbonadasSocio($SOCIO['SOCIO_ID'],$MiConexion);




        if (!empty($res)) {
            $json = array(
                'status' => 200,
                'results' => $res,
                'tipoBusqueda' => "$tipoBusquedaCuota",
                'valorBuscado' => "$DNIsocioBuscado"
            );
        } else {
            $json = array(
                'status' => 404,
                'results' => "Sin resultados:",
                'tipoBusqueda' => "$tipoBusquedaCuota",
                'valorBuscado' => "$DNIsocioBuscado"
            );
        }

        $jsonString = json_encode($json, http_response_code($json['status']));

        echo $jsonString;
    }

    exit();
} elseif ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    require_once('./../../Inc/session.inc.php');
    require_once('./../../funciones/conexion.php');
    require_once('./../../funciones/DetalleCuota.php');
    $MiConexion = ConexionBD();


    if (isset($_GET["EliminarId"])) {

        $idCuota = $_GET["EliminarId"];
        $DetCuota = eliminarDetalleCuota($idCuota, $MiConexion);
        if ($DetCuota) {
            $json = array(
                'status' => 200,
                'results' => $DetCuota
            );
        } else {
            $json = array(
                'status' => 400,
                'results' => "Estado Eliminación: " . $DetCuota
            );
        }

        $jsonString = json_encode($json, http_response_code($json['status']));

        echo $jsonString;
    }
    exit();
} else {
    require_once('./Inc/session.inc.php');
    require_once 'funciones/conexion.php';

    require_once('./funciones/convertirFecha.php');
    require_once('./funciones/DetalleCuota.php');
    $MiConexion = ConexionBD();


    $Cuota = array();
    $Cuota = mostrarTodasDetCuota($MiConexion);
    $CantCuota = count($Cuota);




    require_once('./Inc/menus/head.inc.php');
}
