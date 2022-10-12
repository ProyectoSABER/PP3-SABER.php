<?php

function crearDetalleCuota($IdMesAnio,$IdCatSocio,$ValorCuota,$PConeccionBD){

    $sql= "INSERT INTO `detallecuota`(`id_Cuota`, `id_CatSocio`, `valorCuota`) VALUES ('$IdMesAnio','$IdCatSocio','$ValorCuota')";

    $consulta = mysqli_query($PConeccionBD, $sql);

    return $consulta;
};

function mostrarDetalleCuotaIDMesTipoSocio($IdMesAÑoCuota,$IdTipoSocio,$PConeccionBD){
    
    $sql= "SELECT `id_detalleCuota`, `id_Cuota`, `id_CatSocio`, `valorCuota` FROM `detallecuota` WHERE id_Cuota='$IdMesAÑoCuota' AND `id_CatSocio`='$IdTipoSocio';";
    
    $consulta = mysqli_query($PConeccionBD, $sql);
    
    return $consulta;
};



/* function crearCuota($IdMesAnio,$FechaVenc,$PConeccionBD){

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



 */
