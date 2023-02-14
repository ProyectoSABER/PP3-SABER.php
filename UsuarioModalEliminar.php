
<?php
//Include_once o Require_once al archivo de conexion.
require_once('./funciones/conexion.php');

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