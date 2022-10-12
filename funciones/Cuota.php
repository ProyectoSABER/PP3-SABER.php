<?php
function crearCuota($IdMesAnio,$FechaVenc,$PConeccionBD){

    $sql= "INSERT INTO `cuota`(`id_MesAnio_Cuota`, `fechaVenc_Cuota`) VALUES ('$IdMesAnio','$FechaVenc') ";

    $consulta = mysqli_query($PConeccionBD, $sql);

    return $consulta;
};

function mostrarTodasCuotas($PConeccionBD){
    
    $cuota=array();

    $sql= "SELECT `id_MesAnio_Cuota` as idCuota, `fechaVenc_Cuota` as FechaVencimiento FROM `cuota`";
    
    $consulta = mysqli_query($PConeccionBD, $sql);

    
    if (!$consulta) {
        return false;
    }

    $i = 0;
    while ($data = mysqli_fetch_array($consulta)) {
        $cuota[$i]["ID_CUOTA"]=$data["idCuota"];
        $cuota[$i]["FEC_VENC"]=$data["FechaVencimiento"];
    }
    return $cuota;
};



function mostrarCuota($IdCuota,$PConeccionBD){
    
    $sql= "SELECT `id_MesAnio_Cuota` as idCuota, `fechaVenc_Cuota` as FechaVencimiento  FROM `cuota` WHERE id_MesAnio_Cuota` = '$IdCuota' ";
    
    $consulta = mysqli_query($PConeccionBD, $sql);
    
    return $consulta;
};


function modificarFechaVencCuota($IdCuota,$FechaVenc,$PConeccionBD){
    $sql= "UPDATE `cuota` SET `fechaVenc_Cuota`='$FechaVenc' WHERE id_MesAnio_Cuota` = '$IdCuota' ";
    
    $consulta = mysqli_query($PConeccionBD, $sql);
    
    return $consulta;
};
//Falta Terminar
function eliminarCuota($IdCuota){};

?>