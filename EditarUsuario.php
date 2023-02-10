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

$idUser = $_POST['update_id'];
$nombreUser = $_POST['nombreEditUser'];
$apellidoUser = $_POST['apellidoEditUser'];
$dniUser = $_POST['dniEditUser'];
$mailUser = $_POST['mailEditUser'];
$passUser = md5($_POST['passwordEditUser']);
$rolUser = $_POST['rolEditUser'];


$sql = "UPDATE usuario SET mail_Usuario = '$mailUser', clave_Usuario = '$passUser', idTipo_Usuario = '$rolUser' WHERE id_usuario = '$idUser' ";
$cs = mysqli_query($conn,$sql);

    if($cs==1){
   
  
         /*   NO EDITAMOS POR DNI ES CLAVE FORANEA
             $sql = "UPDATE persona SET dni_persona = '$dni_persona', nombre_Persona = '$nombreUser', apellido_Persona = '$apellidoUser'
             WHERE id_usuario = '$idUser' ";
             $cs = mysqli_query($conn,$sql);
        */
       
        echo "<script>alert('EDICION EXITOSA')</script>";
        echo "<script>window.history.back();</script>";
}  else{
    echo "<script>alert('EDICION NO CORRECTA')</script>";
    echo "<script>window.history.back();</script>";
}




