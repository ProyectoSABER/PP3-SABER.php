<?php


function conocerTodosUsuario($PConeccionBD)
{
    
    $Usuario = array();
    $data = array();




    $SQL = "SELECT per.dni_persona,  per.nombre_Persona, per.apellido_Persona, Us.mail_Usuario,per.fechaAlta_Persona, Us.id_usuario, US.activo_Usuario
        FROM persona as per, usuario as Us WHERE Us.id_Usuario=per.id_usuario";

    $rs = mysqli_query($PConeccionBD, $SQL);
    $i = 0;
    while ($data = mysqli_fetch_array($rs)) {

        $Usuario[$i]['DNI'] = $data['dni_persona'];        
        $Usuario[$i]['IDUSUARIO'] = $data['id_usuario'];        
        $Usuario[$i]['MAIL'] = $data['mail_Usuario'];
        $Usuario[$i]['NOMBRE'] = $data['nombre_Persona'];
        $Usuario[$i]['APELLIDO'] = $data['apellido_Persona'];
        
        $Usuario[$i]['ESTADO'] = $data['activo_Usuario'];
        $Usuario[$i]['FECALTA'] = $data['fechaAlta_Persona'];
        $i++;
    }

        return $Usuario;
    
}
function conocerUsuario($idUsuario, $PConeccionBD)
{
    $Usuario = array();
    $data = array();

    if ($idUsuario) {


        $SQL = "SELECT per.dni_persona, per.tipoDNI_persona, per.nombre_Persona, per.apellido_Persona, per.foto_socio, dom.nom_calle, dom.alt_calle, barr.nom_barrio, loc.nom_localidad, pro.nom_prov 
        FROM persona as per , domicilio as dom, barrio as barr, localidad as loc, provincia as pro 
        WHERE id_usuario='$idUsuario' and dom.idDomicilio=id_domicilio and barr.idBarrio=dom.idBarrio and loc.idLocalidad=barr.idLocalidad and pro.idProvincia=loc.idProvincia";

        $rs = mysqli_query($PConeccionBD, $SQL);
        $data = mysqli_fetch_array($rs);

        if (!empty($data)) {

            $Usuario['USUARIO_DNI'] = $data['dni_persona'];
            $Usuario['USUARIO_TIPODNI'] = $data['tipoDNI_persona'];
            $Usuario['USUARIO_NOMBRE'] = $data['nombre_Persona'];
            $Usuario['USUARIO_APELLIDO'] = $data['apellido_Persona'];
            $Usuario['USUARIO_Foto'] = $data['foto_socio'];
            $Usuario['USUARIO_CALLE'] = $data['nom_calle'];
            $Usuario['USUARIO_ALTURACALLE'] = $data['alt_calle'];
            $Usuario['USUARIO_BARRIO'] = $data['nom_barrio'];
            $Usuario['USUARIO_LOCALIDAD'] = $data['nom_localidad'];
            $Usuario['USUARIO_PROVINCIA'] = $data['nom_prov'];
        }
        else{
            $SQL = "SELECT per.dni_persona, per.tipoDNI_persona, per.nombre_Persona, per.apellido_Persona, per.foto_socio
        FROM persona as per
        WHERE id_usuario='$idUsuario'";

        $rs = mysqli_query($PConeccionBD, $SQL);
        $data = mysqli_fetch_array($rs);
        if (!empty($data)) {

            $Usuario['USUARIO_DNI'] = $data['dni_persona'];
            $Usuario['USUARIO_TIPODNI'] = $data['tipoDNI_persona'];
            $Usuario['USUARIO_NOMBRE'] = $data['nombre_Persona'];
            $Usuario['USUARIO_APELLIDO'] = $data['apellido_Persona'];
            $Usuario['USUARIO_Foto'] = $data['foto_socio'];
            
        }

        }

        return $Usuario;
    }
    return $Usuario;
}

function cargarUsuario($idUsuario, $PConeccionBD)
{
    $data = array();
    $data = conocerUsuario($idUsuario, $PConeccionBD);

    if (!empty($data)) {
        

        $_SESSION['USUARIO_DNI'] = $data['USUARIO_DNI'];
        $_SESSION['USUARIO_TIPODNI'] = $data['USUARIO_TIPODNI'];
        $_SESSION['USUARIO_NOMBRE'] = $data['USUARIO_NOMBRE'];
        $_SESSION['USUARIO_APELLIDO'] = $data['USUARIO_APELLIDO'];
        $_SESSION['USUARIO_Foto'] = $data['USUARIO_Foto'];
        if(!empty($data['USUARIO_CALLE'])){
        $_SESSION['USUARIO_CALLE'] = $data['USUARIO_CALLE'];
        $_SESSION['USUARIO_ALTURACALLE'] = $data['USUARIO_ALTURACALLE'];
        $_SESSION['USUARIO_BARRIO'] = $data['USUARIO_BARRIO'];
        $_SESSION['USUARIO_LOCALIDAD'] = $data['USUARIO_LOCALIDAD'];
        $_SESSION['USUARIO_PROVINCIA'] = $data['USUARIO_PROVINCIA'];
}
        return 'define';
    }
    return 'undefine';
}

function conocerUsuarioSinAsociarAUnaPersona($idUsuario, $PConeccionBD)
{
    $Usuario = array();
    $data = array();

    if ($idUsuario) {


        $SQL = "SELECT per.dni_persona, per.tipoDNI_persona, per.nombre_Persona, per.apellido_Persona, per.foto_socio, dom.nom_calle, dom.alt_calle, barr.nom_barrio, loc.nom_localidad, pro.nom_prov 
        FROM persona as per , domicilio as dom, barrio as barr, localidad as loc, provincia as pro 
        WHERE id_usuario='$idUsuario' and dom.idDomicilio=id_domicilio and barr.idBarrio=dom.idBarrio and loc.idLocalidad=barr.idLocalidad and pro.idProvincia=loc.idProvincia";

        $rs = mysqli_query($PConeccionBD, $SQL);
        $data = mysqli_fetch_array($rs);

        if (!empty($data)) {

            $Usuario['USUARIO_DNI'] = $data['dni_persona'];
            $Usuario['USUARIO_TIPODNI'] = $data['tipoDNI_persona'];
            $Usuario['USUARIO_NOMBRE'] = $data['nombre_Persona'];
            $Usuario['USUARIO_APELLIDO'] = $data['apellido_Persona'];
            $Usuario['USUARIO_Foto'] = $data['foto_socio'];
            $Usuario['USUARIO_CALLE'] = $data['nom_calle'];
            $Usuario['USUARIO_ALTURACALLE'] = $data['alt_calle'];
            $Usuario['USUARIO_BARRIO'] = $data['nom_barrio'];
            $Usuario['USUARIO_LOCALIDAD'] = $data['nom_localidad'];
            $Usuario['USUARIO_PROVINCIA'] = $data['nom_prov'];
        }

        return $Usuario;
    }
    return $Usuario;
}