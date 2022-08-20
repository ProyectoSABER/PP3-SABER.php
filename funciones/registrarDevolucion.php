<?php
require_once './funciones/Bibliotecario.php';






function registrarDevolucion($IDPrestamo,$ConexionBD,$IdEstadoPrestamo=2){
    
   
   
    

    $Bibliotecario = array();
    $Bibliotecario = conocerBibliotecario($_SESSION['USUARIO_DNI'], $ConexionBD);
    $IDBibliotecario=$Bibliotecario['Bibliotecario_ID'];
    $fechaActual=date("y-m-d");
    
           


                $sql= "UPDATE `detalleprestamolibro` AS DP,`ejemplarlibro`AS EL 
                SET `DP`.`fechaDevolucion` = '$fechaActual', `DP`.`Id_estado_PrestamoLibro` = '$IdEstadoPrestamo',`DP`.`id_bibliotecario`='$IDBibliotecario',`EL`.`id_EstadoLibro` = '1' 
                WHERE `DP`.`id_DetallePrestamoLibro` = '$IDPrestamo' AND `DP`.`id_EjemplarLibro_Libro`=`EL`.`id_EjemplarLibro`";

                $Update = mysqli_query($ConexionBD, $sql);
                return $Update;


           
            
            
        



}



