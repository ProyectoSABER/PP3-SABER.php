<?php


function DatosLogin($Pemail,$Pclave,$PConeccionBD){
$Usuario=array();
$data=array();

$SQL="SELECT * FROM usuario WHERE mail_Usuario='$Pemail' AND clave_Usuario=MD5('$Pclave')";

$rs= mysqli_query($PConeccionBD, $SQL);

$data=mysqli_fetch_array($rs);

if(!empty($data)){
    $Usuario['USUARIO_ID'] = $data['id_Usuario'];
      
      $Usuario['USUARIO_EMAIL'] = $data['mail_Usuario'];
      
      $Usuario['USUARIO_IDTIPO'] = $data['idTipo_Usuario']; 
      
      $Usuario['USUARIO_ULT_ACCESO'] = $data['ultAcceso_Usuario'];
      
      $Usuario['USUARIO_ACTIVO'] = $data['activo_Usuario'];
      
}


return $Usuario;

}


function RegistrarUltimoAcceso($PidUsuario,$Pdate,$PConeccionBD){ 
    

    $sql = "UPDATE usuarios SET ultAcceso_Usuario = '$Pdate' WHERE id_Usuario = '$PidUsuario'";
   $estadoRegistro=mysqli_query($PConeccionBD,$sql);

return $estadoRegistro;

}


function RegistrarLogin($PidUsuario,$Pdate,$PConeccionBD){ 
    
        $EstadoSesion="login";
        $sql ="INSERT INTO `sesion` (`id_Sesion`, `evento_Sesion`, `fechaHora_Sesion`, `id_Usuario`) VALUES (auto, '$EstadoSesion', $Pdate, $PidUsuario)";
        
        $estadoRegistro=mysqli_query($PConeccionBD,$sql);
   
        return $estadoRegistro;

}
function RegistrarLogout($PidUsuario,$Pdate,$PConeccionBD){ 
    
        $EstadoSesion="logout";
        $sql ="INSERT INTO `sesion` (`id_Sesion`, `evento_Sesion`, `fechaHora_Sesion`, `id_Usuario`) VALUES (auto, '$EstadoSesion', $Pdate, $PidUsuario)";
        
        $estadoRegistro=mysqli_query($PConeccionBD,$sql);
   
        return $estadoRegistro;

}

function ActualizarNuevoSocio($idUsuario,$NtipoUsuario=4,$PConeccionBD){
        $tipoUsuario=$NtipoUsuario;
        $sql="UPDATE
        `usuario`
    SET `idTipo_Usuario` = '$tipoUsuario'
    WHERE
    `id_Usuario` =$idUsuario";

$estadoRegistro=mysqli_query($PConeccionBD,$sql);

return $estadoRegistro;

}
function DatosUsuario($idUsuario,$PConeccionBD){


        $Usuario=array();
        $data=array();
        
        $SQL="SELECT * FROM usuario WHERE id_Usuario='$idUsuario' ";
        
        $rs= mysqli_query($PConeccionBD, $SQL);
        
        $data=mysqli_fetch_array($rs);
        
        if(!empty($data)){
            $Usuario['USUARIO_ID'] = $data['id_Usuario'];
              
              $Usuario['USUARIO_EMAIL'] = $data['mail_Usuario'];
              
              $Usuario['USUARIO_IDTIPO'] = $data['idTipo_Usuario']; 
              
              $Usuario['USUARIO_ULT_ACCESO'] = $data['ultAcceso_Usuario'];
              
              $Usuario['USUARIO_ACTIVO'] = $data['activo_Usuario'];
              
        }
        
        
        return $Usuario;
        
}

function modificarClave($Email,$NuevaClave,$PConeccionBD){

        $SQL="UPDATE `usuario` SET `clave_Usuario`=MD5('$NuevaClave') WHERE `mail_Usuario`='$Email'";
        $rs= mysqli_query($PConeccionBD, $SQL);
        return $rs;
}