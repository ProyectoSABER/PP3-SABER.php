<?php


function conocerTodosDomicilioCompleto($PConeccionBD)
{
    $Lista = array();
    $data = array();



    $SQL ="SELECT dom.idDomicilio,dom.nom_calle, dom.alt_calle, barr.nom_barrio, loc.nom_localidad, pro.nom_prov
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
        $Lista[$i]['Domicilio_Completo'] = $data['nom_prov']."-".$data['nom_localidad']."-".$data['nom_calle']."-".$data['alt_calle'];
        $i++;
    }

    return !empty($Lista) ?  $Lista : '';
}






function cargarDomicilio($idEditorial, $PConeccionBD)
{
}
