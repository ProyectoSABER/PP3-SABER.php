<?php


function conocerTodasCatLibros($PConeccionBD)
{
    $Lista = array();
    $data = array();




    $SQL = "SELECT * FROM categorialibro";

    $rs = mysqli_query($PConeccionBD, $SQL);
    

    $i = 0;
    while ($data = mysqli_fetch_array($rs)) {
        $Lista[$i]['CatLibro_ID'] = $data['id_CateLibro'];
        $Lista[$i]['CatLibro_Nombre'] = $data['categoria_cateLibro'];
        $i++;
    }

    return !empty($Lista) ?  $Lista : '';
}






function cargarCatLibros($idEditorial, $PConeccionBD)
{
}
