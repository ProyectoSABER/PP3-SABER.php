<?php


function conocerTodosEstadoSocio($PConeccionBD)
{
    $Lista = array();
    $data = array();




    $SQL = "SELECT id_EstadoSocio as IDEstado, nom_EstadoSocio as EstadoSocio FROM estadosocio";

    $rs = mysqli_query($PConeccionBD, $SQL);
    

    $i = 0;
    while ($data = mysqli_fetch_array($rs)) {
        $Lista[$i]['IDESTADOSOCIO'] = $data['IDEstado'];
        $Lista[$i]['ESTADOSOCIO'] = $data['EstadoSocio'];
      
        $i++;
    }

    return !empty($Lista) ?  $Lista : '';
}






function cargarEstadoSocios($idEditorial, $PConeccionBD)
{
}
