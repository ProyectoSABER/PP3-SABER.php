<?php 

function nivelUsuario($tipoUsuario,$PConeccionBD)
{
    $Usuario=array();
    $data=array();
    
    if($tipoUsuario){


        $SQL="SELECT `idTipo_Usuario`, `nom_TipoUsuario` FROM `tipo_usuario` WHERE `idTipo_Usuario`= '$tipoUsuario'";
        
        $rs= mysqli_query($PConeccionBD, $SQL);
        
        $data=mysqli_fetch_array($rs);
        
        if(!empty($data)){

            $Usuario['USUARIO_NOMTIPOUSUARIO'] = $data['nom_TipoUsuario'];

        }

        
    }

    return $Usuario;
}



?>