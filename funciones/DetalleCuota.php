<?php

function crearDetalleCuota($Idcuota,$IdCatSocio,$ValorCuota, $FechaVenc ,$PConeccionBD){

    $sql= "INSERT INTO `detallecuota`(`id_Cuota`,`id_CatSocio`,`valorCuota`,`fechaVencimiento`) VALUES ('$Idcuota','$IdCatSocio','$ValorCuota','$FechaVenc' )";

    $consulta = mysqli_query($PConeccionBD, $sql);
    

    return $consulta;


};

function mostrarDetalleCuotaIDCuotaTipoSocio($Id,$IdTipoSocio,$PConeccionBD){
    $consulta=array();
    
    $sql= "SELECT `id_detalleCuota`, `id_Cuota`, `id_CatSocio`, `valorCuota`,`fechaVencimiento` FROM `detallecuota` WHERE `id_Cuota`='$Id' AND `id_CatSocio`='$IdTipoSocio'";
    
    
    $rs = mysqli_query($PConeccionBD, $sql);

    $data = mysqli_fetch_array($rs);

    if (!empty($data)) {
        $consulta["ID"]=$data["id_detalleCuota"];
        $consulta["IDCUOTA"]=$data["id_Cuota"];
        $consulta["IDCATSOCIO"]=$data["id_CatSocio"];
        $consulta["VALCUOTA"]=$data["valorCuota"];
        $consulta["FECHVENC"]=$data["fechaVencimiento"];
        
    }
    return $consulta ;
    
    
   
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
