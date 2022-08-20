<?php

function conocerBibliotecario($IdUsuario,$PConeccionBD){

    $Lista = array();
    $data = array();

    $sql="SELECT Bibl.id_bibliotecario from bibliotecario AS Bibl, persona AS Per  WHERE PER.dni_Persona=Bibl.dni_Bibliotecario AND PER.dni_Persona= '$IdUsuario'";
    $rs = mysqli_query($PConeccionBD, $sql);
    $data = mysqli_fetch_array($rs);

    if(!empty($data)){
        $Lista['Bibliotecario_ID'] = $data['id_bibliotecario'];

    }

    return $Lista;
}


function conocerTodosBibliotecario($PConeccionBD)
{
    /* $Lista = array();
    $data = array();




    $sql = "SELECT * FROM `editorial`";

    
   

    $i = 0;
    while ($data = mysqli_fetch_array($rs)) {
        
        $Lista[$i]['Editorial_Nombre'] = $data['nom_editorial'];
        $i++;
    }
 */
    
}

?>