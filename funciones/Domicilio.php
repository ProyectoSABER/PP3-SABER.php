<?php


function conocerTodosDomicilioCompleto($PConeccionBD)
{
    $Lista = array();
    $data = array();



    $SQL ="SELECT dom.nom_calle, dom.alt_calle, barr.nom_barrio, loc.nom_localidad, pro.nom_prov
    FROM domicilio as dom, barrio as barr, localidad as loc, provincia as pro WHERE barr.idBarrio=dom.idBarrio and loc.idLocalidad=barr.idLocalidad and pro.idProvincia=loc.idProvincia";
    

    $rs = mysqli_query($PConeccionBD, $SQL);
   

    $i = 0;
    while ($data = mysqli_fetch_array($rs)) {
        $Lista[$i]['Domiclio_Calle'] = $data['nom_calle'];
        $Lista[$i]['Domiclio_AltCalle'] = $data['alt_calle'];
        $Lista[$i]['Domiclio_Barrio'] = $data['nom_barrio'];
        $Lista[$i]['Domiclio_Localidad'] = $data['nom_localidad'];
        $Lista[$i]['Domiclio_Provincia'] = $data['nom_prov'];
        $i++;
    }

    return !empty($Lista) ?  $Lista : '';
}






function cargarDomicilio($idEditorial, $PConeccionBD)
{
}
