
<?php
//Include_once o Require_once al archivo de conexion.
 function ConexionBD(
    $Host = 'localhost:33065',
    $User = 'root',
    $Password = '',
    $BaseDeDatos = 'saber_bd'
) {

    $LinkConexion = mysqli_connect($Host, $User, $Password, $BaseDeDatos);
    $ok='<h3>Acceso al Mysql del Localhost: La conexion es correcta!</h3>';

    if ($LinkConexion != false)
        return $LinkConexion;
    else
        die('No se pudo establecer la conexión.');
}


$conn = ConexionBD();

$usuLimite = $_REQUEST['usuID'];


$sql = "UPDATE usuario SET activo_usuario = 0
WHERE id_Usuario = '$usuLimite'";
$cs = mysqli_query($conn,$sql);

echo "<script>window.history.back();</script>";

?>
 