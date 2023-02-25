<?php


function conocerTodosDomicilioCompleto($PConeccionBD)
{
    $Lista = array();
    $data = array();



    $SQL = "SELECT dom.idDomicilio,dom.nom_calle, dom.alt_calle, barr.nom_barrio, loc.nom_localidad, pro.nom_prov
    FROM domicilio as dom, barrio as barr, localidad as loc, provincia as pro WHERE barr.idBarrio=dom.idBarrio and loc.idLocalidad=barr.idLocalidad and pro.idProvincia=loc.idProvincia";


    $rs = mysqli_query($PConeccionBD, $SQL);


    $i = 0;
    while ($data = mysqli_fetch_array($rs)) {

        $Lista[$i]['DomicilioID'] = $data['idDomicilio'];
        $Lista[$i]['Domicilio_Calle'] = $data['nom_calle'];
        $Lista[$i]['Domicilio_AltCalle'] = $data['alt_calle'];
        $Lista[$i]['Domicilio_Barrio'] = $data['nom_barrio'];
        $Lista[$i]['Domicilio_Localidad'] = $data['nom_localidad'];
        $Lista[$i]['Domicilio_Provincia'] = $data['nom_prov'];
        $Lista[$i]['Domicilio_Completo'] = $data['nom_prov'] . "-" . $data['nom_localidad'] . "-" . $data['nom_calle'] . "-" . $data['alt_calle'];
        $i++;
    }

    return !empty($Lista) ?  $Lista : '';
}









function registrarPais($nombrePais, $PConeccionBD)
{
    $SQL = "INSERT INTO `pais`(`nombre_pais`) VALUES ('$nombrePais')";
    $rs = mysqli_query($PConeccionBD, $SQL);
    return $rs;
}
function mostrarPaises($PConeccionBD)
{
    $Lista = array();
    $data = array();
    $SQL = "SELECT `id_pais`, `nombre_pais` FROM `pais`";

    $rs = mysqli_query($PConeccionBD, $SQL);
    $i = 0;
    while ($data = mysqli_fetch_array($rs)) {

        $Lista[$i]['ID'] = $data['id_pais'];
        $Lista[$i]['NOMBRE'] = $data['nombre_pais'];
        $i++;
    }

    return $Lista ?? '';
}

function registrarProvincia($nombreProvincia, $idPais, $PConeccionBD)
{
    $SQL = "INSERT INTO `provincia`(`nom_prov`, `id_pais`) VALUES ('$nombreProvincia','$idPais')";
    $rs = mysqli_query($PConeccionBD, $SQL);
    return $rs;
}
function mostrarTodasProvincia($PConeccionBD)
{
    $Lista = array();
    $data = array();
    $SQL = "SELECT `idProvincia`, `nom_prov`, `id_pais` FROM `provincia` ";

    $rs = mysqli_query($PConeccionBD, $SQL);
    $i = 0;
    while ($data = mysqli_fetch_array($rs)) {

        $Lista[$i]['IDPROVINCIA'] = $data['idProvincia'];
        $Lista[$i]['NOMBREPROVINCIA'] = $data['nom_prov'];
        $Lista[$i]['IDPAIS'] = $data['id_pais'];
        $i++;
    }

    return $Lista ?? '';
}

function mostrarTodasProvinciaXPais($idPais, $PConeccionBD)
{
    $Lista = array();
    $data = array();
    $SQL = "SELECT `idProvincia`, `nom_prov`, `id_pais` FROM `provincia` where `id_pais`= $idPais ";

    $rs = mysqli_query($PConeccionBD, $SQL);
    $i = 0;
    while ($data = mysqli_fetch_array($rs)) {

        $Lista[$i]['ID'] = $data['idProvincia'];
        $Lista[$i]['NOMBRE'] = $data['nom_prov'];

        $i++;
    }

    return $Lista ?? '';
}

function registrarLocalidad($nombreLocalidad, $idProvincia, $PConeccionBD)
{
    $SQL = "INSERT INTO `localidad`( `nom_localidad`, `idProvincia`) VALUES ('$nombreLocalidad','$idProvincia')";
    $rs = mysqli_query($PConeccionBD, $SQL);
    return $rs;
}
function mostrarLocalidad($PConeccionBD)
{
    $Lista = array();
    $data = array();
    $SQL = "SELECT `idLocalidad`, `nom_localidad`, `idProvincia` FROM `localidad`";

    $rs = mysqli_query($PConeccionBD, $SQL);
    $i = 0;
    while ($data = mysqli_fetch_array($rs)) {

        $Lista[$i]['IDPLOCALIDAD'] = $data['idLocalidad'];
        $Lista[$i]['NOMBRELOCALIDAD'] = $data['nom_localidad'];
        $Lista[$i]['IDPROVINCIA'] = $data['idProvincia'];
        $i++;
    }

    return $Lista ?? '';
}

function mostrarLocalidadesXProvincia($idProvincia, $PConeccionBD)
{
    $Lista = array();
    $data = array();
    $SQL = "SELECT `idLocalidad`, `nom_localidad` FROM `localidad` WHERE  `idProvincia` ='$idProvincia'";

    $rs = mysqli_query($PConeccionBD, $SQL);
    $i = 0;
    while ($data = mysqli_fetch_array($rs)) {

        $Lista[$i]['ID'] = $data['idLocalidad'];
        $Lista[$i]['NOMBRE'] = $data['nom_localidad'];

        $i++;
    }

    return $Lista ?? '';
}
function mostrarBarrioXLocalidad($idLocalidad, $PConeccionBD)
{
    $Lista = array();
    $data = array();
    $SQL = "SELECT `idBarrio`, `nom_barrio` FROM `barrio` WHERE `idLocalidad`='$idLocalidad'";

    $rs = mysqli_query($PConeccionBD, $SQL);
    $i = 0;
    while ($data = mysqli_fetch_array($rs)) {

        $Lista[$i]['ID'] = $data['idBarrio'];
        $Lista[$i]['NOMBRE'] = $data['nom_barrio'];

        $i++;
    }

    return $Lista ?? '';
}



function conocerunDomicilioCompleto($pais,$Provincia,$Localidad,$Barrio,$Calle,$Altura,$PConeccionBD)
{
    $Lista = array();
    $data = array();

    

    $SQL = "SELECT dom.idDomicilio,dom.nom_calle, dom.alt_calle, barr.nom_barrio, loc.nom_localidad, pro.nom_prov
    FROM domicilio as dom, barrio as barr, localidad as loc, provincia as pro 
    WHERE 
    dom.nom_calle like '$Calle'and dom.alt_calle='$Altura'and dom.idBarrio='$Barrio' and
    barr.idBarrio=dom.idBarrio and  loc.idLocalidad=barr.idLocalidad and loc.idLocalidad='$Localidad'  and pro.idProvincia=loc.idProvincia and pro.idProvincia='$Provincia' and pro.id_pais='$pais'";


    $rs = mysqli_query($PConeccionBD, $SQL);


    $i = 0;
    while ($data = mysqli_fetch_array($rs)) {

        $Lista[$i]['DomicilioID'] = $data['idDomicilio'];
        $Lista[$i]['Domicilio_Calle'] = $data['nom_calle'];
        $Lista[$i]['Domicilio_AltCalle'] = $data['alt_calle'];
        $Lista[$i]['Domicilio_Barrio'] = $data['nom_barrio'];
        $Lista[$i]['Domicilio_Localidad'] = $data['nom_localidad'];
        $Lista[$i]['Domicilio_Provincia'] = $data['nom_prov'];
        $Lista[$i]['Domicilio_Completo'] = $data['nom_prov'] . "-" . $data['nom_localidad'] . "-" . $data['nom_calle'] . "-" . $data['alt_calle'];
        $i++;
    }

    return $Lista??$rs;
}

function registraDomicilio($Calle,$Altura,$Barrio, $PConeccionBD){
    $SQL = "INSERT INTO `domicilio`(`nom_calle`, `alt_calle`, `idBarrio`) VALUES ('$Calle','$Altura','$Barrio')";
    $rs = mysqli_query($PConeccionBD, $SQL);
    return $rs;
}
function conocerunDomicilio($Calle,$Altura,$Barrio, $PConeccionBD){
    $SQL = "SELECT `idDomicilio`, `nom_calle`, `alt_calle`, `idBarrio` FROM `domicilio` WHERE `nom_calle`='$Calle' and `alt_calle`='$Altura' and `idBarrio`='$Barrio'";
    $rs = mysqli_query($PConeccionBD, $SQL);


    $i = 0;
    while ($data = mysqli_fetch_array($rs)) {

        $Lista[$i]['DomicilioID'] = $data['idDomicilio'];
        $Lista[$i]['Domicilio_Calle'] = $data['nom_calle'];
        $Lista[$i]['Domicilio_AltCalle'] = $data['alt_calle'];
        $Lista[$i]['Domicilio_Barrio'] = $data['idBarrio'];
        $i++;
    }
    return $Lista??$rs;
}
?>
