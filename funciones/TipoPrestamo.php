

<?php

function conocerTodoTipoPrestamos($PConeccionBD){
    $Lista = array();
    $data = array();
    
    $sql = "SELECT * FROM `tipoprestamo`";

    $rs = mysqli_query($PConeccionBD, $sql);
   

    $i = 0;
    while ($data = mysqli_fetch_array($rs)) {
        $Lista[$i]['ID'] = $data['id_TPrestamo'];
        $Lista[$i]['TipoPrestamo'] = $data['nom_TipoPrestamo'];
        $Lista[$i]['CantEjemplares'] = $data['cantEjemplares_TipoPrestamo'];
        $i++;
    }

    return $Lista;

}


?>