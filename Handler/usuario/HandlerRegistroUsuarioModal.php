<?php

require_once('../../funciones/conexion.php');


$conn = ConexionBD();
//Declaramos variables enviadas por POST
$nombre = $_POST['inputNameModal'];
$apellido =  $_POST['inputApellidoModal'];
$documento  = $_POST['inputDocumentoModal'];
$email  = $_POST['inputEmailModal'];
$password = md5($_POST['inputPasswordModal']);
$rol = $_POST['selectRolModal'];

//Validaria que la mensajeria sea correcta y que los retornos sean correctos a las paginas que correspondan
if(empty($email) || empty($password) || empty($rol)){
    echo "<script>alert('DEBE COMPLETAR NOMBRE APELLIDO Y DOCUMENTO PARA REGISTRAR UN USUARIO')</script>";
    echo "<script>window.history.back();</script>"; 
}else{
    $sql = "INSERT INTO usuario(mail_Usuario,clave_Usuario,idTipo_Usuario)VALUES('$email','$password','$rol')";
    $cs = mysqli_query($conn,$sql);
        
     if($cs == 1){
         $sql = "SELECT id_Usuario FROM usuario WHERE mail_Usuario = '$email' AND clave_Usuario='$password'";
         $cs = mysqli_query($conn,$sql);
         $resul = mysqli_fetch_array($cs);
   
          if(!empty($resul)){
              $idUsuario = $resul[0];
         }

    }

 
}

if(isset($idUsuario)){
    //Primera validacion INFORMACION PARA PERSONA
    if(empty($nombre) || empty($apellido) || empty($documento)){
            echo "<script>alert('DEBE COMPLETAR NOMBRE APELLIDO Y DOCUMENTO PARA REGISTRAR UNA PERSONA')</script>";
            echo "<script>window.history.back();</script>";
        }
        else
        {
            $sql = "INSERT INTO persona(dni_Persona,tipoDNI_persona,nombre_Persona,apellido_persona,id_domicilio,id_usuario)VALUES('$documento',1,'$nombre','$apellido',1,'$idUsuario')";
            $cs = mysqli_query($conn,$sql);
            if($cs==1){
                    echo "<script>alert('REGISTRO EXITOSO')</script>";
                    echo "<script>window.history.back();</script>";
            }       
        }
    }else{
      echo "<script>alert('No se pudo registrar el usuario, verifique la informacion ingresada por favor.')</script>";
      echo "<script>window.history.back();</script>";
}























?>