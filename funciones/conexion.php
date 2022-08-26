<?php
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    // Variables de la conexion a la DB
    $mysqli = new mysqli("localhost","root","","saber_bd");
    $ConexionBD =$mysqli;
    // Comprobamos la conexion
    if($mysqli->connect_errno) {
        die("Fallo la conexion");
    } 
    
    ?>