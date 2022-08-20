<?php


function conocerTodasCatSocio($PConeccionBD)
{
    $Lista = array();
    $data = array();




    $SQL = "SELECT id_CategoriaSocio as IDCategoria, nom_CategoriaSocio as Categoria, valorCuota AS VCuota FROM categoriasocio";

    $rs = mysqli_query($PConeccionBD, $SQL);
    

    $i = 0;
    while ($data = mysqli_fetch_array($rs)) {
        $Lista[$i]['IDCATEGORIA'] = $data['IDCategoria'];
        $Lista[$i]['CATEGORIA'] = $data['Categoria'];
        $Lista[$i]['VCUOTA'] = $data['VCuota'];
        $i++;
    }

    return !empty($Lista) ?  $Lista : '';
}






function cargarCatSocios($idEditorial, $PConeccionBD)
{
}
