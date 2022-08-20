<?php


function conocerTodosTipoDni($PConeccionBD)
{
    $Lista = array();
    $data = array();




    $sql = "SELECT * FROM `tipodocumento`";

    $rs = mysqli_query($PConeccionBD, $sql);
   

    $i = 0;
    while ($data = mysqli_fetch_array($rs)) {
        $Lista[$i]['ID'] = $data['id_TipoDocumento'];
        $Lista[$i]['TIPO'] = $data['nom_TipoDocumento'];
        $i++;
    }

    return !empty($Lista) ?  $Lista : '';
}






function cargarTipoDni($idEditorial, $PConeccionBD)
{
}
