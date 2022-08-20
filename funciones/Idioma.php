<?php


function conocerTodosIdioma($PConeccionBD)
{
    $Lista = array();
    $data = array();




    $sql = "SELECT * FROM `idioma`";

    $rs = mysqli_query($PConeccionBD, $sql);
   

    $i = 0;
    while ($data = mysqli_fetch_array($rs)) {
        $Lista[$i]['Idioma_ID'] = $data['id_idioma'];
        $Lista[$i]['Idioma_Nombre'] = $data['nom_idioma'];
        $i++;
    }

    return !empty($Lista) ?  $Lista : '';
}






function cargarIdioma($idEditorial, $PConeccionBD)
{
}
