

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
function conocerTodoTipoPrestamosSegunTipoUsuario($UsuarioIdTipo,$PConeccionBD){
    $Lista = array();
    $data = array();
    
    $sql = "SELECT * FROM `tipoprestamo`";

    $rs = mysqli_query($PConeccionBD, $sql);
   
    if($UsuarioIdTipo==4){
    $i = 0;
    while ($data = mysqli_fetch_array($rs)) {
        if ($data['id_TPrestamo']==2||$data['id_TPrestamo']==4){
            continue;
        }
        $Lista[$i]['ID'] = $data['id_TPrestamo'];
        $Lista[$i]['TipoPrestamo'] = $data['nom_TipoPrestamo'];
        $Lista[$i]['CantEjemplares'] = $data['cantEjemplares_TipoPrestamo'];
        $i++;
    }
}elseif($UsuarioIdTipo<4){
    $i = 0;
    while ($data = mysqli_fetch_array($rs)) {
        if ($data['id_TPrestamo']==3||$data['id_TPrestamo']==5){
            continue;
        }
        $Lista[$i]['ID'] = $data['id_TPrestamo'];
        $Lista[$i]['TipoPrestamo'] = $data['nom_TipoPrestamo'];
        $Lista[$i]['CantEjemplares'] = $data['cantEjemplares_TipoPrestamo'];
        $i++;
    }

}else{
    $Lista[0]['ID'] = null;
        $Lista[0]['TipoPrestamo'] = "El Usuario no Está asocido, Acerquese a la biblioteca";
}

    return $Lista;

}
?>