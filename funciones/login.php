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
    

    $sql = "UPDATE usuario SET ultAcceso_Usuario = '$Pdate' WHERE id_Usuario = '$PidUsuario'";
   $estadoRegistro=mysqli_query($PConeccionBD,$sql);

return $estadoRegistro;

}


function RegistrarLogin($PidUsuario,$Pdate,$PConeccionBD){ 
    
        $EstadoSesion="login";
        $sql ="INSERT INTO sesion 
( `evento_Sesion`, `fechaHora_Sesion`, `id_Usuario`) 
VALUES ('$EstadoSesion', '$Pdate', '$PidUsuario')";
        
        $estadoRegistro=mysqli_query($PConeccionBD,$sql);
   
        return $estadoRegistro;

}
function RegistrarLogout($PidUsuario,$Pdate,$PConeccionBD){ 
    
        $EstadoSesion="logout";
        $sql ="INSERT INTO sesion 
        ( `evento_Sesion`, `fechaHora_Sesion`, `id_Usuario`) 
        VALUES ('$EstadoSesion', '$Pdate', '$PidUsuario')";
        
        $estadoRegistro=mysqli_query($PConeccionBD,$sql);
   
        return $estadoRegistro;

}



function RegistrarNewUser($PUsername,$PClave,$PConeccionBD){ 
    
        
        $sql ="INSERT INTO `usuario`(`mail_Usuario`, `clave_Usuario`, `idTipo_Usuario`, `metodoCifrado_Usuario`) VALUES ('$PUsername',MD5('$PClave'),'4','md5')";
        
        $estadoRegistro=mysqli_query($PConeccionBD,$sql);
   
        return $estadoRegistro;


}
function ValidarEmail($Pemail,$PConeccionBD){
        $Usuario=array();
        $data=array();
        
        $SQL="SELECT * FROM usuario WHERE mail_Usuario='$Pemail'";
        
        $rs= mysqli_query($PConeccionBD, $SQL);
        
        $data=mysqli_fetch_array($rs);
        
        if(!empty($data)){
            return true;
              
        }
        
        
        return false;
        
        }

?>
