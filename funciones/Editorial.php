<?php


function conocerTodasEditorial($PConeccionBD)
{
    $Lista = array();
    $data = array();




    $sql = "SELECT * FROM `editorial`";

    $rs = mysqli_query($PConeccionBD, $sql);
   

    $i = 0;
    while ($data = mysqli_fetch_array($rs)) {
        $Lista[$i]['Editorial_ID'] = $data['id_Editorial'];
        $Lista[$i]['Editorial_Nombre'] = $data['nom_editorial'];
        $i++;
    }

    return !empty($Lista) ?  $Lista : '';
}






function cargarEditorial($idEditorial, $PConeccionBD)
{
}
