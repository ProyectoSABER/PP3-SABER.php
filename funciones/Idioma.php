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








function registrarIdioma($idioma,$PConeccionBD)
{
    




    $sql = "INSERT INTO `idioma`( `nom_idioma`) VALUES ('$idioma')";

    $rs = mysqli_query($PConeccionBD, $sql);
   

   
    return $rs;
}

function modificarIdioma($id,$Nombre,$PConeccionBD)
{
    

    $sql = "UPDATE `idioma` SET `nom_idioma`='$Nombre' WHERE `id_idioma`='$id'";

    $rs = mysqli_query($PConeccionBD, $sql);
   

   
    return $rs;
}

function eliminarIdioma($id,$PConeccionBD)
{
    

    $sql = "DELETE FROM `idioma` WHERE `id_idioma`='$id'";

    $rs = mysqli_query($PConeccionBD, $sql);
   

   
    return $rs;
}