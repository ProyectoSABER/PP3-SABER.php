
<?php function conocerTodosAutores($PConeccionBD)
{
    $Lista = array();
    $data = array();




    $sql = "SELECT `id_Autor`, `nomb_Autor` FROM `autor`";

    $rs = mysqli_query($PConeccionBD, $sql);
   

    $i = 0;
    while ($data = mysqli_fetch_array($rs)) {
        $Lista[$i]['ID'] = $data['id_Autor'];
        $Lista[$i]['NOMBRE'] = $data['nomb_Autor'];
        
        $i++;
    }

    return $Lista ??$data;
}


function registrarAutor($NombreAutor,$PConeccionBD)
{
    




    $sql = "INSERT INTO `autor`( `nomb_Autor`) VALUES ('$NombreAutor')";

    $rs = mysqli_query($PConeccionBD, $sql);
   

   
    return $rs;
}
function modificarAutor($idAutor,$NombreAutor,$PConeccionBD)
{
    

    $sql = "UPDATE `autor` SET `nomb_Autor`='$NombreAutor' WHERE `id_Autor`='$idAutor'";

    $rs = mysqli_query($PConeccionBD, $sql);
   

   
    return $rs;
}
function eliminarAutor($idAutor,$PConeccionBD)
{
    

    $sql = "DELETE FROM `autor` WHERE `id_Autor`='$idAutor'";

    $rs = mysqli_query($PConeccionBD, $sql);
   

   
    return $rs;
}
?>