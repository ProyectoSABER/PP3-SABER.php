<?Php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once('./../../Inc/session.inc.php');
$opcion=(isset($_POST['opcion']))? $_POST['opcion']: "";
$usuarioActual=$_SESSION;
switch($opcion){
    case 1:
        $res=array();
        $res["usuarioActual"]=[$usuarioActual];
        $tipoSolicitud=$opcion;
        if ((!empty($res)&&(empty($error)))) {
            $json = array(
                'status' => 200,
                'results' => $res,
                'tipoSolicitud' => "$tipoSolicitud"
            );
        } else {
            $json = array(
                'status' => 404,
                'results' => "Sin resultados:",
                'errorGuardado'=>$error,
                'tipoSolicitud' => "$tipoSolicitud"
            );
        }

        $jsonString = json_encode($json, http_response_code($json['status']));

        echo $jsonString;

}
}