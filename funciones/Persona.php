<?php


function MostrarUnaPersona($DNIPersona, $PConeccionBD)
{
    $Usuario = array();
    $data = array();




    $SQL = "SELECT per.dni_persona, tipDNI.nom_TipoDocumento, per.nombre_Persona, per.apellido_Persona, per.foto_socio, dom.nom_calle, dom.alt_calle, barr.nom_barrio, loc.nom_localidad, pro.nom_prov, Us.mail_Usuario,per.fechaAlta_Persona
        FROM persona as per , domicilio as dom, barrio as barr, localidad as loc, provincia as pro ,tipodocumento as tipDNI, usuario as Us WHERE per.dni_persona='$DNIPersona' and tipDNI.id_TipoDocumento=per.tipoDNI_persona and dom.idDomicilio=id_domicilio and barr.idBarrio=dom.idBarrio and loc.idLocalidad=barr.idLocalidad and pro.idProvincia=loc.idProvincia and Us.id_Usuario=per.id_usuario";

    $rs = mysqli_query($PConeccionBD, $SQL);
    $data = mysqli_fetch_array($rs);

    if (!empty($data)) {

        $Usuario['DNI'] = $data['dni_persona'];
        $Usuario['TIPODNI'] = $data['nom_TipoDocumento'];
        $Usuario['NOMBRE'] = $data['nombre_Persona'];
        $Usuario['APELLIDO'] = $data['apellido_Persona'];
        $Usuario['Foto'] = $data['foto_socio'];
        $Usuario['CALLE'] = $data['nom_calle'];
        $Usuario['ALTURACALLE'] = $data['alt_calle'];
        $Usuario['BARRIO'] = $data['nom_barrio'];
        $Usuario['LOCALIDAD'] = $data['nom_localidad'];
        $Usuario['PROVINCIA'] = $data['nom_prov'];
        $Usuario['USUARIO'] = $data['mail_Usuario'];
        return $Usuario;
    }


    return $data;
}


function mostrarTodoPersona($PConeccionBD)
{
    $Usuario = array();
    $data = array();




    $SQL = "SELECT per.dni_persona, tipDNI.nom_TipoDocumento, per.nombre_Persona, per.apellido_Persona, per.foto_socio, dom.nom_calle, dom.alt_calle, barr.nom_barrio, loc.nom_localidad, pro.nom_prov, Us.mail_Usuario,per.fechaAlta_Persona
        FROM persona as per , domicilio as dom, barrio as barr, localidad as loc, provincia as pro ,tipodocumento as tipDNI, usuario as Us WHERE tipDNI.id_TipoDocumento=per.tipoDNI_persona and dom.idDomicilio=id_domicilio and barr.idBarrio=dom.idBarrio and loc.idLocalidad=barr.idLocalidad and pro.idProvincia=loc.idProvincia and Us.id_Usuario=per.id_usuario";

    $rs = mysqli_query($PConeccionBD, $SQL);
    $i = 0;
    while ($data = mysqli_fetch_array($rs)) {

        $Usuario[$i]['DNI'] = $data['dni_persona'];
        $Usuario[$i]['TIPODNI'] = $data['nom_TipoDocumento'];
        $Usuario[$i]['NOMBRE'] = $data['nombre_Persona'];
        $Usuario[$i]['APELLIDO'] = $data['apellido_Persona'];
        $Usuario[$i]['Foto'] = $data['foto_socio'];
        $Usuario[$i]['CALLE'] = $data['nom_calle'];
        $Usuario[$i]['ALTURACALLE'] = $data['alt_calle'];
        $Usuario[$i]['BARRIO'] = $data['nom_barrio'];
        $Usuario[$i]['LOCALIDAD'] = $data['nom_localidad'];
        $Usuario[$i]['PROVINCIA'] = $data['nom_prov'];
        $Usuario[$i]['MAIL'] = $data['mail_Usuario'];
        $Usuario[$i]['FECALTA'] = $data['fechaAlta_Persona'];
        $i++;
    }

    return $Usuario;
}

function mostrarTodoPersonaNoSocio($PConeccionBD)
{
    $Usuario = array();
    $data = array();




    $SQL = "SELECT per.dni_persona as DNI, tipDNI.nom_TipoDocumento as TipoDni, per.nombre_Persona as Nombre, per.apellido_Persona as Apellido, per.foto_socio as Foto, dom.nom_calle AS Calle, dom.alt_calle AS AlturaCalle, barr.nom_barrio As Barrio, loc.nom_localidad AS Localidad, pro.nom_prov AS Provincia, Us.id_Usuario as IdUsuario, Us.mail_Usuario as Mail ,per.fechaAlta_Persona as FechaAlta

            FROM persona as per , domicilio as dom, barrio as barr, localidad as loc, provincia as pro ,tipodocumento as tipDNI, usuario as Us 
            WHERE tipDNI.id_TipoDocumento=per.tipoDNI_persona and dom.idDomicilio=id_domicilio and barr.idBarrio=dom.idBarrio and loc.idLocalidad=barr.idLocalidad and pro.idProvincia=loc.idProvincia and Us.id_Usuario=per.id_usuario AND dni_Persona NOT IN (SELECT dni_Socio FROM socio)";

    $rs = mysqli_query($PConeccionBD, $SQL);
    $i = 0;
    while ($data = mysqli_fetch_array($rs)) {

        $Usuario[$i]['DNI'] = $data['DNI'];
        $Usuario[$i]['TIPODNI'] = $data['TipoDni'];
        $Usuario[$i]['NOMBRE'] = $data['Nombre'];
        $Usuario[$i]['APELLIDO'] = $data['Apellido'];
        $Usuario[$i]['Foto'] = $data['Foto'];
        $Usuario[$i]['CALLE'] = $data['Calle'];
        $Usuario[$i]['ALTURACALLE'] = $data['AlturaCalle'];
        $Usuario[$i]['BARRIO'] = $data['Barrio'];
        $Usuario[$i]['LOCALIDAD'] = $data['Localidad'];
        $Usuario[$i]['PROVINCIA'] = $data['Provincia'];

        $Usuario[$i]['IDUSUARIO'] = $data['IdUsuario'];
        $Usuario[$i]['MAIL'] = $data['Mail'];
        $Usuario[$i]['FECHALTA'] = $data['FechaAlta'];
        $i++;
    }



    return $Usuario;
}



function insertarUnaPersona($DNIPersona, $TipoDNI, $Nombre, $Apellido, $IdDomicilio, $IdUsuario, $FotoSocio, $PConeccionBD)
{





    $SQL = "INSERT INTO `persona`(`dni_Persona`, `tipoDNI_persona`, `nombre_Persona`, `apellido_persona`, `id_domicilio`, `id_usuario`, `foto_socio`) VALUES ('$DNIPersona','$TipoDNI','$Nombre','$Apellido','$IdDomicilio','$IdUsuario','$FotoSocio')";



    $consulta = mysqli_query($PConeccionBD, $SQL);

    return $consulta;
}

function insertarUnaPersonaArray($Persona, $PConeccionBD)
{
    $DNIPersona = $Persona['DNIPersona'];
    $TipoDNI = $Persona['TipoDNI'];
    $Nombre = $Persona['Nombre'];
    $Apellido = $Persona['Apellido'];
    $IdDomicilio = !empty($Persona['IdDomicilio']) ? $Persona['IdDomicilio'] : '1';
    $IdUsuario = !empty($Persona['USUARIO_ID']) ? $Persona['USUARIO_ID'] : $_SESSION['USUARIO_ID'];
    $FotoSocio = !empty($Persona['FotoSocio']) ? $Persona['FotoSocio'] : 'null';




    $SQL = "INSERT INTO `persona`(`dni_Persona`, `tipoDNI_persona`, `nombre_Persona`, `apellido_persona`, `id_domicilio`, `id_usuario`, `foto_socio`) VALUES ('$DNIPersona','$TipoDNI','$Nombre','$Apellido',$IdDomicilio,'$IdUsuario','$FotoSocio')";



    $consulta = mysqli_query($PConeccionBD, $SQL);

    return $consulta;
}
function eliminarUnaPersona($Persona, $PConeccionBD)
{
    $DNIPersona = $Persona['DNIPersona'];

    $SQL = "DELETE FROM `persona` WHERE `dni_Persona`=$DNIPersona'";

    $consulta = mysqli_query($PConeccionBD, $SQL);

    return $consulta;
}



function MostrarContactoUnaPersona($DNIPersona, $PConeccionBD)
{
    $Usuario = array();
    $data = array();




    $SQL = "SELECT per.dni_persona, 
        FROM persona as per , domicilio as dom, barrio as barr, localidad as loc, provincia as pro ,tipodocumento as tipDNI, usuario as Us WHERE per.dni_persona='$DNIPersona' and tipDNI.id_TipoDocumento=per.tipoDNI_persona and dom.idDomicilio=id_domicilio and barr.idBarrio=dom.idBarrio and loc.idLocalidad=barr.idLocalidad and pro.idProvincia=loc.idProvincia and Us.id_Usuario=per.id_usuario";

    $rs = mysqli_query($PConeccionBD, $SQL);
    $data = mysqli_fetch_array($rs);

    if (!empty($data)) {

        $Usuario['DNI'] = $data['dni_persona'];
        $Usuario['TIPODNI'] = $data['nom_TipoDocumento'];
        $Usuario['NOMBRE'] = $data['nombre_Persona'];
        $Usuario['APELLIDO'] = $data['apellido_Persona'];
        $Usuario['Foto'] = $data['foto_socio'];
        $Usuario['CALLE'] = $data['nom_calle'];
        $Usuario['ALTURACALLE'] = $data['alt_calle'];
        $Usuario['BARRIO'] = $data['nom_barrio'];
        $Usuario['LOCALIDAD'] = $data['nom_localidad'];
        $Usuario['PROVINCIA'] = $data['nom_prov'];
        return $Usuario;
    }


    return $data;
}

function buscarUsuarioSinpersonas($PConeccionBD)
{
    $Usuario = array();
    $SQL = "SELECT `id_Usuario`, `mail_Usuario` FROM `usuario` WHERE `id_Usuario` NOT IN (SELECT `id_usuario` FROM `persona`)";
    $rs = mysqli_query($PConeccionBD, $SQL);

    $i = 0;
    while ($data = mysqli_fetch_array($rs)) {
        $Usuario[$i]['IDUSUARIO'] = $data['id_Usuario'];
        $Usuario[$i]['MAILUSUARIO'] = $data['mail_Usuario'];
        $i++;
    }

    return $Usuario;
}
function mostrarUsuarioSegunDni($DNIPersona, $PConeccionBD)
{
    $Usuario = array();
    $SQL = "SELECT U.id_Usuario , U.mail_Usuario FROM usuario AS U, persona AS P WHERE U.id_Usuario=P.id_usuario AND P.dni_Persona='$DNIPersona'";

    $rs = mysqli_query($PConeccionBD, $SQL);

    $data = mysqli_fetch_array($rs);
    $Usuario["IDUSUARIO"] = $data["id_Usuario"];
    $Usuario["MAILUSUARIO"] = $data["mail_Usuario"];

    return $Usuario;
}
