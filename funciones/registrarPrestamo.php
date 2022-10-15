<?php
require_once 'Bibliotecario.php';


function calcularFechaDevolucion($fechaActual){
    
    $fechaFechaDevolucion=date("y-m-d",strtotime($fechaActual."+ 7 days"));
return $fechaFechaDevolucion;
}


function registrarPrestamo($datos,$ConexionBD,$IdEstadoPrestamo=1){
    
    $IDSocio=$datos['IDSocio'];
    $IDEJEMPLAR=$datos['IDEJEMPLAR'];
    $IDTIPOPRESTAMO=$datos['IDTIPOPRESTAMO'];

    $Bibliotecario = array();
    $Bibliotecario = conocerBibliotecario($_SESSION['USUARIO_DNI'], $ConexionBD);
    $IDBibliotecario=$Bibliotecario['Bibliotecario_ID'];
    $fechaActual=date("y-m-d");
    

    $sql = "INSERT INTO `prestamolibro`(`id_socio`) VALUES ('$IDSocio')";

    $consulta = mysqli_query($ConexionBD, $sql);

    if($consulta){

        $sql =   "SELECT `idPrestamoLibro` FROM `prestamolibro` WHERE `id_socio`= '$IDSocio' AND `idPrestamoLibro` NOT IN (SELECT `id_PrestamoLibro` FROM `detalleprestamolibro`)";
        $rs = mysqli_query($ConexionBD, $sql);

        $data=mysqli_fetch_array($rs);


        if($data){
            $IdPrestamo=$data['idPrestamoLibro'];
            $sql="INSERT INTO `detalleprestamolibro`(`id_bibliotecario`, `id_tipoPrestamo`,  `fechaPrestamo`, `id_PrestamoLibro`, `id_EjemplarLibro_Libro`, `Id_estado_PrestamoLibro`) 
            VALUES ('$IDBibliotecario','$IDTIPOPRESTAMO','$fechaActual','$IdPrestamo','$IDEJEMPLAR','$IdEstadoPrestamo')";
            $consulta = mysqli_query($ConexionBD, $sql);
            if($consulta){


                $sql= "UPDATE `ejemplarlibro`SET `id_EstadoLibro` = 2 WHERE `id_EjemplarLibro` ='$IDEJEMPLAR'";
                $consulta = mysqli_query($ConexionBD, $sql);
                return $consulta;

                }


            return $consulta;
            
            
        }
        return $data;
    }




    return $consulta;



}
function registrarPrestamoSocio($datos,$ConexionBD,$IdEstadoPrestamo=4){
    
    $IDSocio=$datos['IDSocio'];
    $IDISBN = $datos['IDISBN'];
    $IDEJEMPLAR=$datos['IDEJEMPLAR'];
    $IDTIPOPRESTAMO=$datos['IDTIPOPRESTAMO'];

    
    $fechaActual=date("y-m-d");
    

    $sql = "INSERT INTO `prestamolibro`(`id_socio`) VALUES ('$IDSocio')";

    $consulta = mysqli_query($ConexionBD, $sql);

    if($consulta){

        $sql =   "SELECT `idPrestamoLibro` FROM `prestamolibro` WHERE `id_socio`= '$IDSocio' AND `idPrestamoLibro` NOT IN (SELECT `id_PrestamoLibro` FROM `detalleprestamolibro`)";
        $rs = mysqli_query($ConexionBD, $sql);

        $data=mysqli_fetch_array($rs);


        if($data){
            $IdPrestamo=$data['idPrestamoLibro'];
            $sql="INSERT INTO `detalleprestamolibro`(`id_tipoPrestamo`,  `fechaPrestamo`, `id_PrestamoLibro`, `id_EjemplarLibro_Libro`, `Id_estado_PrestamoLibro`) 
            VALUES ('$IDTIPOPRESTAMO','$fechaActual','$IdPrestamo','$IDEJEMPLAR','$IdEstadoPrestamo')";
            $consulta = mysqli_query($ConexionBD, $sql);
            if($consulta){


                $sql= "UPDATE `ejemplarlibro`SET `id_EstadoLibro` = 2 WHERE `id_EjemplarLibro` ='$IDEJEMPLAR'";
                $consulta = mysqli_query($ConexionBD, $sql);
                return $consulta;

                }


            return $consulta;
            
            
        }
        return $data;
    }




    return $consulta;



}



