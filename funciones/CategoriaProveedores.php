<?php


function conocerTodasCatProveedores($PConeccionBD)
{
    $Lista = array();
    $data = array();




    $SQL = "SELECT `idCategoria_Provee`, `tipo_provee` FROM `categoria_provee`";

    $rs = mysqli_query($PConeccionBD, $SQL);
    

    $i = 0;
    while ($data = mysqli_fetch_array($rs)) {
        $Lista[$i]['IDCATEGORIA'] = $data['idCategoria_Provee'];
        $Lista[$i]['CATEGORIA'] = $data['tipo_provee'];
        $i++;
    }

    return !empty($Lista) ?  $Lista : '';
}








