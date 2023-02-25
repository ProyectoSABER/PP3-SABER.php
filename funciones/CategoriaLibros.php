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



function registrarCategoriaLibro($categoriaLibro,$PConeccionBD)
{
    




    $sql = "INSERT INTO `categoriaLibro`( `categoria_cateLibro`) VALUES ('$categoriaLibro')";

    $rs = mysqli_query($PConeccionBD, $sql);
   

   
    return $rs;
}

function modificarCategoriaLibro($id,$Nombre,$PConeccionBD)
{
    

    $sql = "UPDATE `categoriaLibro` SET `categoria_cateLibro`='$Nombre' WHERE `id_CateLibro`='$id'";

    $rs = mysqli_query($PConeccionBD, $sql);
   

   
    return $rs;
}

function eliminarCategoriaLibro($id,$PConeccionBD)
{
    

    $sql = "DELETE FROM `categoriaLibro` WHERE `id_CateLibro`='$id'";

    $rs = mysqli_query($PConeccionBD, $sql);
   

   
    return $rs;
}



