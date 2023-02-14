
<?php
//Include_once o Require_once al archivo de conexion.
require_once('./funciones/conexion.php');


$conn = ConexionBD();

$usuLimite = $_REQUEST['usuID'];


$sql = "UPDATE usuario SET activo_usuario = 0
WHERE id_Usuario = '$usuLimite'";
$cs = mysqli_query($conn,$sql);

echo "<script>window.history.back();</script>";

?>
 