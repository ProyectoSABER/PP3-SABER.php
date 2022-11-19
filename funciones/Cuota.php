<?php


function crearCuota($MesAnio,$PConeccionBD){

    $sql= "INSERT INTO `cuota`(`MesAnio_Cuota`) VALUES ('$MesAnio')";

    $consulta = mysqli_query($PConeccionBD, $sql);

    return $consulta;
};

function mostrarTodasCuotas($PConeccionBD){
    
    $cuota=array();

    $sql= "SELECT `id_MesAnio_Cuota` as idCuota,`MesAnio_Cuota` as Mes FROM `cuota`";
    
    $consulta = mysqli_query($PConeccionBD, $sql);

    
    if (!$consulta) {
        return false;
    }

    $i = 0;
    while ($data = mysqli_fetch_array($consulta)) {
        $cuota[$i]["ID_CUOTA"]=$data["idCuota"];
        $cuota[$i]["MES"]=$data["Mes"];
    }
    return $cuota;
};



function mostrarCuotaID($IdCuota,$PConeccionBD){
    $consulta=array();
    $sql= "SELECT `id` as idCuota,`MesAnio_Cuota` as Mes FROM `cuota` WHERE id` = '$IdCuota' ";
    
    $rs = mysqli_query($PConeccionBD, $sql);
    if (!$rs) {
        return false;
    }

    $data = mysqli_fetch_array($rs);

    if (!empty($data)) {
        $consulta["ID"]=$data["idCuota"];
        $consulta["MES"]=$data["Mes"];
        return $consulta;
    }
    
};

function mostrarCuotaxMes($mes,$PConeccionBD){
    
    $sql= "SELECT `id` as idCuota,`MesAnio_Cuota` as Mes FROM `cuota` WHERE `MesAnio_Cuota` = '$mes' ";
    $consulta=array();
    $rs = mysqli_query($PConeccionBD, $sql);
    if (!$rs) {
        return false;
    }

    $data = mysqli_fetch_array($rs);

    if (!empty($data)) {
        $consulta["ID"]=$data["idCuota"];
        $consulta["MES"]=$data["Mes"];
        return $consulta;
    }
    
};


//Falta Terminar
function eliminarCuota($IdCuota){};

?>