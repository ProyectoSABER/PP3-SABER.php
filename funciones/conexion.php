<?php



//Conexion Martin
/*   function ConexionBD(
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
}  */ 

//Conexion Adrian

function ConexionBD(
    $Host = 'localhost',
    $User = 'root',
    $Password = 'Root@1234',
    $BaseDeDatos = 'saber_bd'
) {

    $LinkConexion = mysqli_connect($Host, $User, $Password, $BaseDeDatos);
    $ok='<h3>Acceso al Mysql del Localhost: La conexion es correcta!</h3>';

    if ($LinkConexion != false)
        return $LinkConexion;
    else
        die('No se pudo establecer la conexión.');
} 

?>