<?php
/**
 * Crea un nuevo registro de cobro * 
 * @param string $idUsuario id del usuario de cuota,
 * @param string $fechaCobro fecha de cobro,
 * @param mysqli $PConeccionBD Proporcionar link de conexion a la base de datos mysqli
 * 
 * @return array|false|null
 */
function crearCobro($idUsuario,$fechaCobro,$idMetodoPago,$PConeccionBD)
{

    $sql = "INSERT INTO `cobrocuota` ( `fecha_CobroCuota`, `idSocio`,`id_metodoPago`) VALUES ('$fechaCobro', '$idUsuario','$idMetodoPago');";

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
    $idBuscado=$data["idCobroCuota"];
    return $idBuscado;
}else{
    return $idBuscado=false;
}
    
};
function consultardetallesdeCobro($idCobro, $PConeccionBD)
{
    $res=array();
    $detalleSocio=array();
    $detalleBibliotecario=array();
    $detalleCobro=array();
    $sql = "SELECT
    `dc`.`id_DetalleCobro` AS `IDDETALLECOBRO`,
    `dc`.`idCobroCuota` AS `IDCOBROCUOTA`,
    `dc`.`idDetalleCuota` AS `IDDETALLECUOTA`,
    `dc`.`valorCuota` AS `VALORCUOTA`,
    `dc`.`recargo` AS `RECARGO`,
    `dc`.`estadoCobroCuota` AS `ESTADOCOBROCUOTA`,
    `dc`.`idResponsableCobro` AS `IDRESPOSABLECOBRO`,
    `dc`.`Observaciones` AS `OBSERVACIONES`,
    `cc`.`fecha_CobroCuota` AS `FECHACOBROCUOTA`,
    `cc`.`idSocio` AS `IDSOCIO`,
    `s`.`dni_Socio` AS `DNISOCIO`,
    `s`.`idcategoria_Socio` AS `IDCATESOCIO`,
    
    `dtc`.`fechaVencimiento` AS `FECHAVENCIMIENTO`,
    `cuota`.`MesAnio_Cuota` AS `MESANIOCUOTA`,

    `s`.`id_EstadoSocio` AS `IDESTADOSOCIO`,
    `s`.`fechaAlta_socio` AS `FECHAALTASOCIO`,
    `b`.`dni_Bibliotecario` AS `DNIBIBLIOTECARIO`,
    `b`.`id_bibliotecario` AS `IDBIBLIOTECARIO`,
    
    
    `ds`.`tipoDNI_persona` AS `TIPODNISOCIO`,
    `ds`.`nombre_Persona` AS `NOMBRESOCIO`,
    `ds`.`apellido_persona` AS `APELLIDOSOCIO`,

    `p`.`tipoDNI_persona` AS `TIPODNIBIBLIOTECARIO`,
    `p`.`nombre_Persona` AS `NOMBREBIBLIOTECARIO`,
    `p`.`apellido_persona` AS `APELLIDOBIBLIOTECARIO`,
    
    `cs`.`nom_CategoriaSocio` AS `CATEGORIASOCIO`
FROM
    `detallecobro` as `dc`,
    `cobrocuota` as `cc`,
    `socio` as `s`,
    `bibliotecario` as `b`,
    `persona` as `p`,
    `persona` as `ds`,
    `categoriasocio` as `cs`,
    `detallecuota` as `dtc`,
    `cuota` as `cuota`

WHERE
    `dc`.`idCobroCuota` = '$idCobro'
    and `cc`.`idCobroCuota` = `dc`.`idCobroCuota`
    and `dc`.`idDetalleCuota` = `dtc`.`id_detalleCuota`
    and `dtc`.`id_Cuota` = `cuota`.`id`
    and `s`.`id_socio` = `cc`.`idSocio`
    and `b`.`id_bibliotecario` = `dc`.`idResponsableCobro`
    and `b`.`dni_Bibliotecario` = `p`.`dni_Persona`
    and `s`.`dni_Socio` = `ds`.`dni_Persona`
    and `cs`.`id_CategoriaSocio` = `s`.`idcategoria_Socio`";


    $rs = mysqli_query($PConeccionBD, $sql);
    
    
$i = 0;
    while ($data = mysqli_fetch_array($rs)) {
        $res[$i]['detalleCobro']['IDDETALLECOBRO'] = $data['IDDETALLECOBRO'];
        $res[$i]['detalleCobro']['IDCOBROCUOTA'] = $data['IDCOBROCUOTA'];
        $res[$i]['detalleCobro']['IDDETALLECUOTA'] = $data['IDDETALLECUOTA'];
        $res[$i]['detalleCobro']['VALORCUOTA'] = $data['VALORCUOTA'];
        $res[$i]['detalleCobro']['RECARGO'] = $data['RECARGO'];
        $res[$i]['detalleCobro']['ESTADOCOBROCUOTA'] = $data['ESTADOCOBROCUOTA'];
        $res[$i]['detalleCobro']['IDRESPOSABLECOBRO'] = $data['IDRESPOSABLECOBRO'];
        $res[$i]['detalleCobro']['OBSERVACIONES'] = $data['OBSERVACIONES'];
        $res[$i]['detalleCobro']['FECHACOBROCUOTA'] = $data['FECHACOBROCUOTA'];

        $res[$i]['detalleCobro']['FECHAVENCIMIENTO'] = $data['FECHAVENCIMIENTO'];
        $res[$i]['detalleCobro']['MESANIOCUOTA'] = $data['MESANIOCUOTA'];
        
        $res[$i]['detalleSocio']['ID'] = $data['IDSOCIO'];
        $res[$i]['detalleSocio']['DNI'] = $data['DNISOCIO'];
        $res[$i]['detalleSocio']['IDCATE'] = $data['IDCATESOCIO'];
        $res[$i]['detalleSocio']['IDESTADO'] = $data['IDESTADOSOCIO'];
        $res[$i]['detalleSocio']['FECHAALTA'] = $data['FECHAALTASOCIO'];
        $res[$i]['detalleSocio']['CATEGORIA'] = $data['CATEGORIASOCIO'];
        $res[$i]['detalleSocio']['TIPODNI'] = $data['TIPODNISOCIO'];
        $res[$i]['detalleSocio']['NOMBRE'] = $data['NOMBRESOCIO'];
        $res[$i]['detalleSocio']['APELLIDO'] = $data['APELLIDOSOCIO'];
        
        $res[$i]['detalleBibliotecario']['DNI'] = $data['DNIBIBLIOTECARIO'];
        $res[$i]['detalleBibliotecario']['ID'] = $data['IDBIBLIOTECARIO'];
        $res[$i]['detalleBibliotecario']['TIPODNI'] = $data['TIPODNIBIBLIOTECARIO'];
        $res[$i]['detalleBibliotecario']['NOMBRE'] = $data['NOMBREBIBLIOTECARIO'];
        $res[$i]['detalleBibliotecario']['APELLIDO'] = $data['APELLIDOBIBLIOTECARIO'];
        
        
        $i++;
    }
    return $res??'false';
};


        function consultardetallesdeCobroIdDetalle($idDetalleCobro, $PConeccionBD)
{
    $res=array();
    $detalleSocio=array();
    $detalleBibliotecario=array();
    $detalleCobro=array();
    $sql = "SELECT
    `dc`.`id_DetalleCobro` AS `IDDETALLECOBRO`,
    `dc`.`idCobroCuota` AS `IDCOBROCUOTA`,
    `dc`.`idDetalleCuota` AS `IDDETALLECUOTA`,
    `dc`.`valorCuota` AS `VALORCUOTA`,
    `dc`.`recargo` AS `RECARGO`,
    `dc`.`estadoCobroCuota` AS `ESTADOCOBROCUOTA`,
    `dc`.`idResponsableCobro` AS `IDRESPOSABLECOBRO`,
    `dc`.`Observaciones` AS `OBSERVACIONES`,
    `cc`.`fecha_CobroCuota` AS `FECHACOBROCUOTA`,
    `cc`.`idSocio` AS `IDSOCIO`,
    `s`.`dni_Socio` AS `DNISOCIO`,
    `s`.`idcategoria_Socio` AS `IDCATESOCIO`,
    
    `dtc`.`fechaVencimiento` AS `FECHAVENCIMIENTO`,
    `cuota`.`MesAnio_Cuota` AS `MESANIOCUOTA`,

    `s`.`id_EstadoSocio` AS `IDESTADOSOCIO`,
    `s`.`fechaAlta_socio` AS `FECHAALTASOCIO`,
    `b`.`dni_Bibliotecario` AS `DNIBIBLIOTECARIO`,
    `b`.`id_bibliotecario` AS `IDBIBLIOTECARIO`,
    
    
    `ds`.`tipoDNI_persona` AS `TIPODNISOCIO`,
    `ds`.`nombre_Persona` AS `NOMBRESOCIO`,
    `ds`.`apellido_persona` AS `APELLIDOSOCIO`,

    `p`.`tipoDNI_persona` AS `TIPODNIBIBLIOTECARIO`,
    `p`.`nombre_Persona` AS `NOMBREBIBLIOTECARIO`,
    `p`.`apellido_persona` AS `APELLIDOBIBLIOTECARIO`,
    
    `cs`.`nom_CategoriaSocio` AS `CATEGORIASOCIO`
FROM
    `detallecobro` as `dc`,
    `cobrocuota` as `cc`,
    `socio` as `s`,
    `bibliotecario` as `b`,
    `persona` as `p`,
    `persona` as `ds`,
    `categoriasocio` as `cs`,
    `detallecuota` as `dtc`,
    `cuota` as `cuota`

WHERE

`dc`.`id_DetalleCobro` = $idDetalleCobro
    and `cc`.`idCobroCuota` = `dc`.`idCobroCuota`
    and `dc`.`idDetalleCuota` = `dtc`.`id_detalleCuota`
    and `dtc`.`id_Cuota` = `cuota`.`id`
    and `s`.`id_socio` = `cc`.`idSocio`
    and `b`.`id_bibliotecario` = `dc`.`idResponsableCobro`
    and `b`.`dni_Bibliotecario` = `p`.`dni_Persona`
    and `s`.`dni_Socio` = `ds`.`dni_Persona`
    and `cs`.`id_CategoriaSocio` = `s`.`idcategoria_Socio`";


    $rs = mysqli_query($PConeccionBD, $sql);
    
    
$i = 0;
    while ($data = mysqli_fetch_array($rs)) {
        $res[$i]['detalleCobro']['IDDETALLECOBRO'] = $data['IDDETALLECOBRO'];
        $res[$i]['detalleCobro']['IDCOBROCUOTA'] = $data['IDCOBROCUOTA'];
        $res[$i]['detalleCobro']['IDDETALLECUOTA'] = $data['IDDETALLECUOTA'];
        $res[$i]['detalleCobro']['VALORCUOTA'] = $data['VALORCUOTA'];
        $res[$i]['detalleCobro']['RECARGO'] = $data['RECARGO'];
        $res[$i]['detalleCobro']['ESTADOCOBROCUOTA'] = $data['ESTADOCOBROCUOTA'];
        $res[$i]['detalleCobro']['IDRESPOSABLECOBRO'] = $data['IDRESPOSABLECOBRO'];
        $res[$i]['detalleCobro']['OBSERVACIONES'] = $data['OBSERVACIONES'];
        $res[$i]['detalleCobro']['FECHACOBROCUOTA'] = $data['FECHACOBROCUOTA'];

        $res[$i]['detalleCobro']['FECHAVENCIMIENTO'] = $data['FECHAVENCIMIENTO'];
        $res[$i]['detalleCobro']['MESANIOCUOTA'] = $data['MESANIOCUOTA'];
        
        $res[$i]['detalleSocio']['ID'] = $data['IDSOCIO'];
        $res[$i]['detalleSocio']['DNI'] = $data['DNISOCIO'];
        $res[$i]['detalleSocio']['IDCATE'] = $data['IDCATESOCIO'];
        $res[$i]['detalleSocio']['IDESTADO'] = $data['IDESTADOSOCIO'];
        $res[$i]['detalleSocio']['FECHAALTA'] = $data['FECHAALTASOCIO'];
        $res[$i]['detalleSocio']['CATEGORIA'] = $data['CATEGORIASOCIO'];
        $res[$i]['detalleSocio']['TIPODNI'] = $data['TIPODNISOCIO'];
        $res[$i]['detalleSocio']['NOMBRE'] = $data['NOMBRESOCIO'];
        $res[$i]['detalleSocio']['APELLIDO'] = $data['APELLIDOSOCIO'];
        
        $res[$i]['detalleBibliotecario']['DNI'] = $data['DNIBIBLIOTECARIO'];
        $res[$i]['detalleBibliotecario']['ID'] = $data['IDBIBLIOTECARIO'];
        $res[$i]['detalleBibliotecario']['TIPODNI'] = $data['TIPODNIBIBLIOTECARIO'];
        $res[$i]['detalleBibliotecario']['NOMBRE'] = $data['NOMBREBIBLIOTECARIO'];
        $res[$i]['detalleBibliotecario']['APELLIDO'] = $data['APELLIDOBIBLIOTECARIO'];
        
        
        $i++;
    }
    return $res??'false';
};