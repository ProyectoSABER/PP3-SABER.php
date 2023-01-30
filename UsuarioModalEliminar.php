
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

$id = $_REQUEST['usuID'];


$sql = "DELETE FROM persona WHERE id_Usuario = '$id'";
$cs = mysqli_query($conn,$sql);

if($cs){

    echo "<script>alert('Se elimino el registro correctamente')</script>";
} else {
    echo "ha ocurrido un error, no se eliminó el registro";
};

echo "<script>window.history.back();</script>";

?>