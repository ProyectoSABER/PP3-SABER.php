<?php


function conocerTodasEditorial($PConeccionBD)
{
    $Lista = array();
    $data = array();




    $sql = "SELECT * FROM `editorial`";

    $rs = mysqli_query($PConeccionBD, $sql);
   

    $i = 0;
    while ($data = mysqli_fetch_array($rs)) {
        $Lista[$i]['Editorial_ID'] = $data['id_Editorial'];
        $Lista[$i]['Editorial_Nombre'] = $data['nom_editorial'];
        $i++;
    }

    return !empty($Lista) ?  $Lista : '';
}






function registrarEditorial($editorial,$PConeccionBD)
{
    




    $sql = "INSERT INTO `editorial`( `nom_editorial`) VALUES ('$editorial')";

    $rs = mysqli_query($PConeccionBD, $sql);
   

   
    return $rs;
}

function modificarEditorial($id,$Nombre,$PConeccionBD)
{
    

    $sql = "UPDATE `editorial` SET `nom_editorial`='$Nombre' WHERE `id_Editorial`='$id'";

    $rs = mysqli_query($PConeccionBD, $sql);
   

   
    return $rs;
}

function eliminarEditorial($id,$PConeccionBD)
{
    

    $sql = "DELETE FROM `editorial` WHERE `id_Editorial`='$id'";

    $rs = mysqli_query($PConeccionBD, $sql);
   

   
    return $rs;
}