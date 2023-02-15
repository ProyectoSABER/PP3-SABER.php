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
function mostrarTodasDetCuotaAbonadas(mysqli $PConeccionBD)

{
    $res = array();
    $detalleSocio = array();
    $detalleBibliotecario = array();
    $detalleCobro = array();
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

    `ESTADOCOBROCUOTA`='PAGADO'
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
    return $res ?? 'false';
};

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
 * Mostrar todos los detalles de cuotas no abonadas por un socio y su categoria con su Id de Cuotas y categoria de Socio
 * @param mysqli $PConeccionBD Proporcionar link de conexion a la base de datos mysqli
 * @param int $IdSocio Id de socio
 * @param int|string $CatSocio Id categoria de Socio || Nombre de categoria de socio
 * 
 * @return array[index]["IdCuota","MesCuota","IdDetCuota","CatSocio","VCUOTA","FVENC"]|false|Null
 */
function mostrarDetCuotaNoAbonadasSocio(int $IdSocio, $CatSocio, mysqli $PConeccionBD)
{
    $cuotas = array();

    if (is_int($CatSocio)) {
        $qr = "SELECT `DC`.`id_Cuota` AS iDCuota,
    `C`.`MesAnio_Cuota` AS mesCuota, 
    `DC`.`id_detalleCuota` AS iDdetCuota, 
    `CS`.`nom_CategoriaSocio` AS  catSocio ,
     `DC`.`valorCuota` AS vCuota ,
     `DC`.`fechaVencimiento` AS fVenc
    FROM `cuota` AS C, `detallecuota` AS DC, `categoriasocio` AS CS 
    WHERE C.id = DC.id_Cuota AND `DC`.`id_CatSocio` = `CS`.`id_CategoriaSocio` AND DC.id_CatSocio='$CatSocio' AND
    DC.id_detalleCuota  Not in 
     ( SELECT `DCC`.`idDetalleCuota` FROM `cobrocuota` AS CC, `detallecobro` AS DCC WHERE `CC`.`idCobroCuota`=`DCC`.`idCobroCuota` 
     AND `CC`.`idSocio`='$IdSocio') ";
    } elseif (is_string($CatSocio)) {
        $qr = "SELECT `DC`.`id_Cuota` AS iDCuota,
    `C`.`MesAnio_Cuota` AS mesCuota, 
    `DC`.`id_detalleCuota` AS iDdetCuota, 
    `CS`.`nom_CategoriaSocio` AS  catSocio ,
     `DC`.`valorCuota` AS vCuota ,
     `DC`.`fechaVencimiento` AS fVenc
    FROM `cuota` AS C, `detallecuota` AS DC, `categoriasocio` AS CS 
    WHERE C.id = DC.id_Cuota AND `DC`.`id_CatSocio` = `CS`.`id_CategoriaSocio` AND CS.nom_CategoriaSocio='$CatSocio' AND
    DC.id_detalleCuota  Not in 
     ( SELECT `DCC`.`idDetalleCuota` FROM `cobrocuota` AS CC, `detallecobro` AS DCC WHERE `CC`.`idCobroCuota`=`DCC`.`idCobroCuota` 
     AND `CC`.`idSocio`='$IdSocio') ";
    } else {
        return $cuotas;
    }

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
 * Mostrar todos los detalles de cuotas abonadas por un socio
 * @param mysqli $PConeccionBD Proporcionar link de conexion a la base de datos mysqli
 * @param int $IdSocio Id de socio * 
 * @return array[index]["IdCuota","MesCuota","IdDetCuota","CatSocio","VCUOTA","FVENC"]|false|Null
 */
function mostrarDetCuotaAbonadasSocio(int $IdSocio, mysqli $PConeccionBD)
{
    $cuotas = array();


    $qr = "SELECT
    `DCC`.`id_DetalleCobro` AS `idDetalle`,
    `DCC`.`idCobroCuota` AS `idCobro`,
    `DCC`.`idDetalleCuota` AS `iDdetCuota`,
    `DCC`.`valorCuota` AS `vCuota`,
    `DCC`.`recargo` AS `recargoC`,
    `DCC`.`estadoCobroCuota`  AS `estadoCobroCuota`,
    `DCC`.`idResponsableCobro` AS `IdCobrador` ,
    `DCC`.`Observaciones` AS  `Observaciones`,
    `CC`.`fecha_CobroCuota` AS `fechaCobro`,
    `DC`.`fechaVencimiento` AS `fVenc`,    
    `C`.`MesAnio_Cuota` AS `mesCuota`,
    `C`.`id` AS `iDCuota`,  
    `CS`.`nom_CategoriaSocio` AS `catSocio`,
    `P`.`nombre_Persona` as `nombBibliotecario`,
    `P`.`apellido_persona` as `apellBibliotecario`,

    `Ps`.`nombre_Persona` as `nombSocio`,
    `Ps`.`apellido_persona` as `apellSocio`
    	


    FROM
    `detallecobro` AS `DCC`,
    `cobrocuota` AS `CC`,
    `detallecuota` AS `DC`,
    `cuota` AS `C`,
    `categoriasocio` AS `CS`,
    `bibliotecario` AS `B`,
    `persona` AS `P`,
    `persona` AS `Ps`,
    `socio` AS `S`

    WHERE
    `DCC`.`idCobroCuota` = `CC`.`idCobroCuota`
    AND `DCC`.`idDetalleCuota` = `DC`.`id_detalleCuota`
    AND `DC`.`id_Cuota` = `C`.`id` 
    AND `DC`.`id_CatSocio` = `CS`.`id_CategoriaSocio`
    AND `CC`.`idSocio` = '$IdSocio'
    AND `B`.`id_bibliotecario` = `DCC`.`idResponsableCobro`
    AND  `B`.`dni_Bibliotecario`=`P`.`dni_Persona`
    AND `S`.`id_socio`= `CC`.`idSocio`
    AND  `S`.`dni_Socio`=`Ps`.`dni_Persona`";


    $consulta = mysqli_query($PConeccionBD, $qr);

    if (empty($consulta) || !$consulta) {
        return false;
    }
    $i = 0;
    while ($data = mysqli_fetch_array($consulta)) {
        $cuotas[$i]["idDetalleCuota"] = $data["idDetalle"];
        $cuotas[$i]["IdCuota"] = $data["iDCuota"];
        $cuotas[$i]["MesCuota"] = $data["mesCuota"];
        $cuotas[$i]["IdDetCuota"] = $data["iDdetCuota"];
        $cuotas[$i]["CatSocio"] = $data["catSocio"];
        $cuotas[$i]["VCUOTA"] = $data["vCuota"];
        $cuotas[$i]["RECARGO"] = $data["recargoC"];
        $cuotas[$i]["FCOBRO"] = $data["fechaCobro"];
        $cuotas[$i]["ESTADOCOBRO"] = $data["estadoCobroCuota"];
        $cuotas[$i]["FVENC"] = $data["fVenc"];
        $cuotas[$i]["NOMBREBIBLIOTECARIO"] = $data["nombBibliotecario"];
        $cuotas[$i]["APELLIDOBIBLIOTECARIO"] = $data["apellBibliotecario"];
        $cuotas[$i]["NOMBRESOCIO"] = $data["nombSocio"];
        $cuotas[$i]["APELLIDOSOCIO"] = $data["apellSocio"];
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
function eliminarDetalleCuota(string $idDetalleCuota, mysqli $PConeccionBD)
{
    $qr = "DELETE FROM `detallecuota` WHERE `id_detalleCuota`= $idDetalleCuota";
    $rs = mysqli_query($PConeccionBD, $qr);
    return $rs;
}

/**
 * Mostrar cuotas no abonadas y vencidas
 * 
 * @param mysqli $PConeccionBD Cadena de conexion de mysql
 * @return array
 * For successful queries eliminarDetalleCuota() will return TRUE. Returns FALSE on failure.
 */
function mostrarCuotasNoAbonadasyVencidas(mysqli $PConeccionBD)
{
    $res = array();

    $SQL = "SELECT
    
    `c`.`MesAnio_Cuota` as MESANIOCUOTA , 
    `dc`.`valorCuota` as VALORCUOTA,
    `dc`.`fechaVencimiento` as  FECHAVENCIMIENTO,

    `s`.`id_socio` as IDSOCIO,    
    `s`.`dni_Socio` as DNISOCIO,
    `p`.`apellido_persona` as APELLIDOSOCIO,
    `p`.`nombre_Persona` as NOMBRESOCIO,
    `cs`.`nom_CategoriaSocio` as CATEGORIASOCIO,
    `dom`.`nom_calle` as CALLE,
    `dom`.`alt_calle` as ALT,
    `loc`.`nom_localidad` as LOCALIDAD
FROM
    `cuota` as `c`,
    `detallecuota` as `dc`,
    `socio` as `s`,
    `persona` as `p`,
    `categoriasocio` as `cs`,
    `domicilio`as `dom`,
    `barrio`as `barr`,
    `localidad` as `loc`    
Where
    `dc`.`id_Cuota` = `c`.`id`
     and `dc`.`id_CatSocio`= `s`.`idcategoria_Socio`
    and `p`.`id_domicilio` =`dom`.`idDomicilio`
    and `dom`.`idBarrio` = `barr`.`idBarrio`
    and `barr`.`idLocalidad` = `loc`.`idLocalidad`
    and `s`.`idcategoria_Socio`= `cs`.`id_CategoriaSocio`
    and `dc`.`fechaVencimiento` <  (CURDATE())
    and `s`.`dni_Socio` = `p`.`dni_Persona`
    and `dc`.`id_detalleCuota`
     not in (SELECT
        `dcc`.`idDetalleCuota`
    FROM
        `detallecuota` as `dc`,
    `cobrocuota` as `cc`,
    `detallecobro` as `dcc`
Where
         `dcc`.`idDetalleCuota` = `dc`.`id_detalleCuota`
    and `dcc`.`idCobroCuota` = `cc`.`idCobroCuota`
    and `cc`.`idSocio` = `s`.`id_socio`
    )";
    $rs = mysqli_query($PConeccionBD, $SQL);

    $i = 0;
    while ($data = mysqli_fetch_array($rs)) {
        $res[$i]['detalleCuota']['VALORCUOTA'] = $data['VALORCUOTA'];
        $res[$i]['detalleCuota']['FECHAVENCIMIENTO'] = $data['FECHAVENCIMIENTO'];
        $res[$i]['detalleCuota']['MESANIOCUOTA'] = $data['MESANIOCUOTA'];

        $res[$i]['detalleSocio']['ID'] = $data['IDSOCIO'];
        $res[$i]['detalleSocio']['DNI'] = $data['DNISOCIO'];
        $res[$i]['detalleSocio']['CATEGORIA'] = $data['CATEGORIASOCIO'];
        $res[$i]['detalleSocio']['NOMBRE'] = $data['NOMBRESOCIO'];
        $res[$i]['detalleSocio']['APELLIDO'] = $data['APELLIDOSOCIO'];
        
        $res[$i]['detalleSocio']['CALLE'] = $data['CALLE'];
        $res[$i]['detalleSocio']['ALT'] = $data['ALT'];
        $res[$i]['detalleSocio']['LOCALIDAD'] = $data['LOCALIDAD'];


        $i++;
    }




    return $res ?? "";
}
