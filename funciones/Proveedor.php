
<?php function conocerTodosProveedor($PConeccionBD)
{
    $Lista = array();
    $data = array();




    $sql = "SELECT * FROM `proveedor`";

    $rs = mysqli_query($PConeccionBD, $sql);
   

    $i = 0;
    while ($data = mysqli_fetch_array($rs)) {
        $Lista[$i]['Proveedor_ID'] = $data['cuitProveedor'];
        $Lista[$i]['Proveedor_Nombre'] = $data['nom_prove'];
        $Lista[$i]['Proveedor_IDDomicilio'] = $data['idDomicilio'];
        $Lista[$i]['Proveedor_IdBibliotecario'] = $data['idBibliotecario'];
        $Lista[$i]['Proveedor_IdCategoria'] = $data['idCategoria_Provee'];
        $i++;
    }

    return !empty($Lista) ?  $Lista : '';
}
?>