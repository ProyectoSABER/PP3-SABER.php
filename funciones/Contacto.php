<?php
function conocerTodosTipoContacto($PConeccionBD)
{
    $Lista = array();
    $data = array();




    $sql = "SELECT * FROM `tipo_contacto`";

    $rs = mysqli_query($PConeccionBD, $sql);


    $i = 0;
    while ($data = mysqli_fetch_array($rs)) {
        $Lista[$i]['ID'] = $data['idTipo_Contacto'];
        $Lista[$i]['TIPO'] = $data['tipo_Contacto'];
        $i++;
    }

    return !empty($Lista) ?  $Lista : '';
}

function insertarUnContactoArray($Contacto, $PConeccionBD)
{

    $DNIPersona = $Contacto['DNIPersona'];
    $TipoContacto = $Contacto['TipoContacto'];
    $ValueContacto = $Contacto['Contacto'];




    $SQL = "INSERT INTO `contacto`
    (`contact`,
    `id_tipoContacto`)
    VALUES('$ValueContacto','$TipoContacto');";

    $consulta = mysqli_query($PConeccionBD, $SQL);

    if ($consulta) {
        //consulto por el contacto


        $SQL = "SELECT idContacto FROM
    contacto WHERE
    contact=$ValueContacto AND idContacto NOT IN
    (SELECT `idContacto`
        FROM `contacto_persona`);";

        $rs = mysqli_query($PConeccionBD, $SQL);
        $consulta = mysqli_fetch_array($rs);

        $IDContacto = $consulta[0];

        if (!empty($IDContacto)) {

            $SQL = "INSERT INTO `contacto_persona` (`dni_persona`,`idContacto`) 
            VALUES
            ('$DNIPersona', 
            '$IDContacto')";

            $consulta = mysqli_query($PConeccionBD, $SQL);

            if (!$consulta) {
                //si no se cargo borrar el contacto
                $SQL = "DELETE FROM `contacto` WHERE `contacto`.`idContacto` = $IDContacto";
                $delete = mysqli_query($PConeccionBD, $SQL);
            }
        }
    }




    return $consulta;
}
function ConocerContactoDNI($DNI, $PConeccionBD)
{


    $sql = "SELECT C.contact as Contacto, TC.tipo_Contacto as TipoContacto FROM contacto_persona as CP , contacto as C, tipo_contacto as TC WHERE CP.dni_persona= '$DNI' and CP.idContacto=C.idContacto and C.id_tipoContacto= TC.idTipo_Contacto";

    $rs = mysqli_query($PConeccionBD, $sql);


    $i = 0;
    while ($data = mysqli_fetch_array($rs)) {
        $Contacto[$i]['CONTACTO'] = $data['Contacto'];
        $Contacto[$i]['TIPOCONTACTO'] = $data['TipoContacto'];
        $i++;
    }
    if (!empty($Contacto)) {
        return  $Contacto;
    } else {
        $Contacto[0]['CONTACTO'] = "Por Favor, Solicite un contacto para registrar";
        $Contacto[0]['TIPOCONTACTO'] = "No posee";
        return $Contacto;
    }
}
function ConocerContacto($contacto, $TipoContacto, $PConeccionBD)
{

    $SQL = "SELECT `idContacto`, `contact`, `id_tipoContacto` FROM `contacto` WHERE `contact`='$contacto'AND `id_tipoContacto`='$TipoContacto'";
    $rs = mysqli_query($PConeccionBD, $SQL);
    $i = 0;
    while ($data = mysqli_fetch_array($rs)) {
        $Contacto[$i]['IDCONTACTO'] = $data['idContacto'];
        $Contacto[$i]['CONTACTO'] = $data['contact'];
        $Contacto[$i]['IDTIPOCONTACTO'] = $data['id_tipoContacto'];
        $i++;
    }
    return $Contacto ??$data;
}
function registrarContacto($contacto, $TipoContacto, $PConeccionBD)
{
    $SQL = "INSERT INTO `contacto`
    (`contact`,
    `id_tipoContacto`)
    VALUES('$contacto','$TipoContacto');";

    $rs = mysqli_query($PConeccionBD, $SQL);
    return $rs;
}

function registrarContacto_proveedor($cuitProveedor,$idContacto,$PConeccionBD){

    $SQL="INSERT INTO `contacto_proveedor`(`id_Propietario`, `idContacto`) VALUES ('$cuitProveedor','$idContacto')";
    $rs = mysqli_query($PConeccionBD, $SQL);
    return $rs;
}

function eliminarAsociacionProveedorContacto($cuitProveedor,$PConeccionBD){

    


}
