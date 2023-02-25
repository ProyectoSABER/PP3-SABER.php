
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

    return $Lista ??$rs;
}



function registrarProveedor($cuitProveedor,$nombreYapellido,$idDomicilio,$idBibliotecario,$idcategoriaProveedor,$PConeccionBD)
{
    
    $sql = "INSERT INTO `proveedor`(`cuitProveedor`, `nom_prove`, `idDomicilio`, `idBibliotecario`, `idCategoria_Provee`) VALUES ('$cuitProveedor','$nombreYapellido','$idDomicilio','$idBibliotecario','$idcategoriaProveedor')";

    $rs = mysqli_query($PConeccionBD, $sql);
   

   
    return $rs;
}

function conocerProveedor($cuit,$PConeccionBD)
{
    $Lista = array();
    $data = array();




    $sql = "SELECT * FROM `proveedor`, `categoria_provee` as `CategoriaProveedor` Where `cuitProveedor`= '$cuit'";

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

    return $Lista??$rs;
}







function modificarProveedor($id,$Nombre,$PConeccionBD)
{
    

    $sql = "UPDATE `proveedor` SET `nom_proveedor`='$Nombre' WHERE `id_Proveedor`='$id'";

    $rs = mysqli_query($PConeccionBD, $sql);
   

   
    return $rs;
}

function eliminarProveedor($id,$PConeccionBD)
{
    

    $sql = "DELETE FROM `proveedor` WHERE `id_Proveedor`='$id'";

    $rs = mysqli_query($PConeccionBD, $sql);
   

   
    return $rs;
}
?>