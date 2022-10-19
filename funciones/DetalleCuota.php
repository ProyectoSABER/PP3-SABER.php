<?php

function crearDetalleCuota($Idcuota, $IdCatSocio, $ValorCuota, $FechaVenc, $PConeccionBD)
{

    $sql = "INSERT INTO `detallecuota`(`id_Cuota`,`id_CatSocio`,`valorCuota`,`fechaVencimiento`) VALUES ('$Idcuota','$IdCatSocio','$ValorCuota','$FechaVenc' )";

    $consulta = mysqli_query($PConeccionBD, $sql);


    return $consulta;
};

function mostrarDetalleCuotaIDCuotaTipoSocio($Id, $IdTipoSocio, $PConeccionBD)
{
    $consulta = array();

    $sql = "SELECT `id_detalleCuota`, `id_Cuota`, `id_CatSocio`, `valorCuota`,`fechaVencimiento` FROM `detallecuota` WHERE `id_Cuota`='$Id' AND `id_CatSocio`='$IdTipoSocio'";


    $rs = mysqli_query($PConeccionBD, $sql);

    $data = mysqli_fetch_array($rs);

    if (!empty($data)) {
        $consulta["ID"] = $data["id_detalleCuota"];
        $consulta["IDCUOTA"] = $data["id_Cuota"];
        $consulta["IDCATSOCIO"] = $data["id_CatSocio"];
        $consulta["VALCUOTA"] = $data["valorCuota"];
        $consulta["FECHVENC"] = $data["fechaVencimiento"];
    }
    return $consulta;
};

/**
 * Devuelve los Los detalles de una cuota por Id de detalle
 * @param string $Id id de detalle de cuota,
 * @param mysqli $PConeccionBD Proporcionar link de conexion a la base de datos mysqli
 * 
 * @return array["IdCuota","MesCuota","IdDetCuota","CatSocio","Vcuota","Fvenc"]|false|null
 */
function mostrarDetalleCuotaID(string $Id, mysqli $PConeccionBD)
{
    $cuotas = array();

    $sql = "SELECT `DC`.`id_Cuota` AS iDCuota, `C`.`MesAnio_Cuota` AS mesCuota, `DC`.`id_detalleCuota` AS iDdetCuota, `CS`.`nom_CategoriaSocio` AS  catSocio , `DC`.`valorCuota` AS vCuota , `DC`.`fechaVencimiento` AS fVenc FROM `detallecuota` AS DC, `cuota` AS C, `categoriasocio` AS CS  WHERE `DC`.`id_Cuota`=`C`.`id` AND `DC`.`id_CatSocio` = `CS`.`id_CategoriaSocio` AND `DC`.`id_detalleCuota`= $Id";

    $rs = mysqli_query($PConeccionBD, $sql);

    $data = mysqli_fetch_array($rs);

    if (!empty($data)) {
        $cuotas["IdCuota"] = $data["iDCuota"];
        $cuotas["MesCuota"] = $data["mesCuota"];
        $cuotas["IdDetCuota"] = $data["iDdetCuota"];
        $cuotas["CatSocio"] = $data["catSocio"];
        $cuotas["Vcuota"] = $data["vCuota"];
        $cuotas["Fvenc"] = $data["fVenc"];
    } else {
        return $data;
    }
    return $cuotas;
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
/**
 * Mostrar todos los detalles de cuotas con su Id de Cuotas y categoria de Socio
 * @param mysqli $PConeccionBD Proporcionar link de conexion a la base de datos mysqli
 * @return array[index]["IdCuota","MesCuota","IdDetCuota","CatSocio","VCUOTA","FVENC"]|false|Null
 */
function mostrarTodasDetCuota(mysqli $PConeccionBD)
{
    $cuotas = array();
    $qr = "SELECT `DC`.`id_Cuota` AS iDCuota,`C`.`MesAnio_Cuota` AS mesCuota, `DC`.`id_detalleCuota` AS iDdetCuota, `CS`.`nom_CategoriaSocio` AS  catSocio , `DC`.`valorCuota` AS vCuota , `DC`.`fechaVencimiento` AS fVenc FROM `detallecuota` AS DC, `cuota` AS C, `categoriasocio` AS CS  WHERE `DC`.`id_Cuota`=`C`.`id` AND `DC`.`id_CatSocio` = `CS`.`id_CategoriaSocio` ORDER BY `mesCuota` asc  ";

    $consulta = mysqli_query($PConeccionBD, $qr);

    if (empty($consulta) || !$consulta) {
        return false;
    }
    $i = 0;
    while ($data = mysqli_fetch_array($consulta)) {
        $cuotas[$i]["IdCuota"] = $data["iDCuota"];
        $cuotas[$i]["MesCuota"] = $data["mesCuota"];
        $cuotas[$i]["IdDetCuota"] = $data["iDdetCuota"];
        $cuotas[$i]["CatSocio"] = $data["catSocio"];
        $cuotas[$i]["VCUOTA"] = $data["vCuota"];
        $cuotas[$i]["FVENC"] = $data["fVenc"];
        $i++;
    }
    return $cuotas;
}

/**
 * Elimina un detalle de cuota
 * @param string $idDetalleCuota Croporcionar un id
 * @param mysqli $PConeccionBD Cadena de conexion de mysql
 * @return bool
 * For successful queries eliminarDetalleCuota() will return TRUE. Returns FALSE on failure.
 */
function eliminarDetalleCuota(string $idDetalleCuota ,mysqli $PConeccionBD){
    $qr="DELETE FROM `detallecuota` WHERE `id_detalleCuota`= $idDetalleCuota";
    $rs=mysqli_query($PConeccionBD,$qr);
    return $rs;
}