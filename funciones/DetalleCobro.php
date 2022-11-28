<?php
/**
 * Crea un nuevo registro de cobro * 
 * @param string $idUsuario id del usuario de cuota,
 * @param string $fechaCobro fecha de cobro,
 * @param mysqli $PConeccionBD Proporcionar link de conexion a la base de datos mysqli
 * 
 * @return array|false|null
 */
function crearCobro($idUsuario,$fechaCobro,$PConeccionBD)
{

    $sql = "INSERT INTO `cobrocuota` (`idCobroCuota`, `fecha_CobroCuota`, `idSocio`) VALUES (NULL, '$fechaCobro', '$idUsuario');";

    $consulta = mysqli_query($PConeccionBD, $sql);


    return $consulta;
};

/**
 * Crea un nuevo registro de cobro  
 * @param string $idUsuario id del usuario de cuota que se busca,
 * @param string $fechaCobro fecha de cobro,
 * @param mysqli $PConeccionBD Proporcionar link de conexion a la base de datos mysqli
 * 
 * @return array|false|null
 */
function consultarIdCobroNoAsignado($idUsuario,$fechaCobro, $PConeccionBD)
{

    $sql = "SELECT `idCobroCuota` as  `IDCuota` FROM `cobrocuota` WHERE `idSocio`=$idUsuario AND `fecha_CobroCuota`='$fechaCobro' AND `idCobroCuota` NOT IN (SELECT  `idCobroCuota` FROM `detallecobro` );";


    $rs = mysqli_query($PConeccionBD, $sql);
    $data = mysqli_fetch_array($rs);
    if(!empty($data)){
    $idBuscado=$data["IDCuota"];
    return $idBuscado;
}else{
    return $idBuscado=false;
}
    
};

function crearDetalleCobro($IdCobroCuota,$idDetalleCuota,$valorCuota,$recargo,$estadoCobroCuota,$idResponsableCobro,$Observaciones, $PConeccionBD)
{

    $sql = "INSERT INTO `detallecobro`(`idCobroCuota`, `idDetalleCuota`, `valorCuota`, `recargo`,`estadoCobroCuota`, `idResponsableCobro`, `Observaciones`) VALUES ('$IdCobroCuota','$idDetalleCuota','$valorCuota',$recargo,'$estadoCobroCuota','$idResponsableCobro','$Observaciones')";

    $consulta = mysqli_query($PConeccionBD, $sql);


    return $consulta;
};
function eliminarCobroCuotaPorIdCobro($idCobro,$PConeccionBD){

    $sql = "DELETE FROM `cobrocuota` WHERE `idCobroCuota`='$idCobro'";
    $consulta = mysqli_query($PConeccionBD, $sql);
    return $consulta;
    
}
function consultardetalleCobroPorIdCobro($idCobro, $PConeccionBD)
{

    $sql = "SELECT  `id_DetalleCobro`, `idCobroCuota`, `idDetalleCuota`, `valorCuota`, `recargo`, `estadoCobroCuota`, `idResponsableCobro`, `Observaciones` FROM `detallecobro`WHERE`idCobroCuota`='$idCobro';";


    $rs = mysqli_query($PConeccionBD, $sql);
    
    $data = mysqli_fetch_array($rs);
    if(!empty($data)){
    $idBuscado=$data["IDCuota"];
    return $idBuscado;
}else{
    return $idBuscado=false;
}
    
};
