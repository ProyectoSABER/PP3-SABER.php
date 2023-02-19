<?php

require_once('../../funciones/conexion.php');


$conn = ConexionBD();
if(isset($_POST["NuevoUsuario"])){
//Declaramos variables enviadas por POST

$nombre = $_POST['inputNameModal'];
$apellido =  $_POST['inputApellidoModal'];
$documento  = $_POST['inputDocumentoModal'];
$email  = $_POST['inputEmailModal'];
$password = md5($_POST['inputPasswordModal']);
$rol = $_POST['selectRolModal'];

//Validaria que la mensajeria sea correcta y que los retornos sean correctos a las paginas que correspondan
if(empty($email) || empty($password) || empty($rol)){
    echo "<script>window.location.href = 'http://localhost:8080/PP3-SABER.php/index.php?respuesta=ErrorDatoFaltante';</script>";   
   
}else{

    $sql = "SELECT us.id_Usuario,per.id_usuario FROM usuario us
    LEFT JOIN persona per ON per.id_usuario = us.id_Usuario
    WHERE mail_Usuario = '$email' or dni_Persona = '$documento'";

    $cs = mysqli_query($conn,$sql);
    $usuarioExistente = mysqli_fetch_array($cs);

    if(!empty($usuarioExistente)){
        
        echo "<script>window.location.href = 'http://localhost:8080/PP3-SABER.php/index.php?respuesta=ErrorUsuarioDuplicado';</script>";   
    
    }else{
        
        $sql = "INSERT INTO usuario(mail_Usuario,clave_Usuario,idTipo_Usuario,metodoCifrado_Usuario)VALUES('$email','$password','$rol','md5')";
        $cs = mysqli_query($conn,$sql);
      
     if($cs == 1){
         $sql = "SELECT id_Usuario FROM usuario WHERE mail_Usuario = '$email' AND clave_Usuario='$password'";
         $cs = mysqli_query($conn,$sql);
         $resul = mysqli_fetch_array($cs);
   
          if(!empty($resul)){
              $idUsuario = $resul[0];
         }

         }else{
       
        echo "<script>window.location.href = 'http://localhost:8080/PP3-SABER.php/index.php?respuesta=ErrorRegistro';</script>";   
      }


if(isset($idUsuario)){
    //Primera validacion INFORMACION PARA PERSONA
    if(empty($nombre) || empty($apellido) || empty($documento)){
        echo "<script>window.location.href = 'http://localhost:8080/PP3-SABER.php/index.php?respuesta=ErrorDatoFaltante';</script>";   

        }
        else
        {
            $sql = "INSERT INTO persona(dni_Persona,tipoDNI_persona,nombre_Persona,apellido_persona,id_domicilio,id_usuario)VALUES('$documento',1,'$nombre','$apellido',1,'$idUsuario')";
            $cs = mysqli_query($conn,$sql);
            if($cs==1){
                    
                echo "<script>window.location.href = 'http://localhost:8080/PP3-SABER.php/index.php?respuesta=RegistroExitoso';</script>";   
            } 
              else{
       
                echo "<script>window.location.href = 'http://localhost:8080/PP3-SABER.php/index.php?respuesta=ErrorRegistro';</script>";   

          }   
        }
    }else{
        echo "<script>window.location.href = 'http://localhost:8080/PP3-SABER.php/index.php?respuesta=ErrorRegistro';</script>";   
       
}
}
 
}

}


elseif (isset($_POST["ModificarUsuario"])){
    //Include_once o Require_once al archivo de conexion.
    
    
    $conn = ConexionBD();
    
    $idUser = $_POST['update_id'];
    $nombreUser = $_POST['nombreEditUser'];
    $apellidoUser = $_POST['apellidoEditUser'];
    $dniUser = $_POST['dniEditUser'];
    $mailUser = $_POST['mailEditUser'];
    $passUser = md5($_POST['passwordEditUser']);
    $rolUser = $_POST['rolEditUser'];
    
    
    $sql = "UPDATE usuario SET mail_Usuario = '$mailUser', clave_Usuario = '$passUser', idTipo_Usuario = '$rolUser' WHERE id_usuario = '$idUser' ";
    $cs = mysqli_query($conn,$sql);
    
        if($cs==1){
       
      
             /*   NO EDITAMOS POR DNI ES CLAVE FORANEA
                 $sql = "UPDATE persona SET dni_persona = '$dni_persona', nombre_Persona = '$nombreUser', apellido_Persona = '$apellidoUser'
                 WHERE id_usuario = '$idUser' ";
                 $cs = mysqli_query($conn,$sql);
            */
           
            echo "<script>window.location.href = 'http://localhost:8080/PP3-SABER.php/index.php?respuesta=EdicionOk';</script>";   
   
         
    }  else{
        echo "<script>alert('EDICION NO CORRECTA')</script>";
        echo "<script>window.history.back();</script>";
    }
    
    
    
    }
    


















?>