<?php


require_once 'funciones/conexion.php';
$MiConexion = ConexionBD();
require_once 'funciones/login.php';
$noValidateEmailnewUSer=false;


if (!empty($_POST['Ingresar'])) {
  
    $MensajeError = '';
    if (strlen($_POST['email']) < 5) {
      
     $MensajeError = "Debe de ingresar un usuario de 5 caracteres o más. <br / >";
    } else if (empty($_POST['clave']) || strlen($_POST['clave']) < 7) {
      $MensajeError = "Debe de ingresar una clave de 7 caracteres o más <br / >";
    } else {
  
      /**************************************
       * 
       * 
       * importamos la funcion d login
       * 
       * 
       * ********************************** */
  
  
      $UsuarioLogueado = DatosLogin($_POST['email'], $_POST['clave'], $MiConexion);
  
      if (empty($UsuarioLogueado)) {
        //Verifico que no exista un usuario o clave
        $MensajeError = 'Datos incorrectos.';
      } else if ($UsuarioLogueado['USUARIO_ACTIVO'] == 0) {
  
        //En caso de existir verifico que el usuario no este activo antes de cargar las variables de sesion
        $MensajeError = 'Usuario no Activo';

      } else {
        //Si las credenciales del usuario estan correctas y es un usuario activo (condicion por descarte)Generamos los Valores de la sesion.
  
        $_SESSION['USUARIO_ID'] = $UsuarioLogueado['USUARIO_ID'];
        $_SESSION['USUARIO_EMAIL'] = $UsuarioLogueado['USUARIO_EMAIL'];
  
    
  
        require_once 'funciones/nivelUsuario.php';
        $TipoUser = nivelUsuario($UsuarioLogueado['USUARIO_IDTIPO'], $MiConexion);
        
        $_SESSION['USUARIO_IDTIPOUSUARIO']=$UsuarioLogueado['USUARIO_IDTIPO'];
        $_SESSION['USUARIO_NOMTIPOUSUARIO'] = $TipoUser['USUARIO_NOMTIPOUSUARIO'];
        $_SESSION['USUARIO_ULT_ACCESO'] = $UsuarioLogueado['USUARIO_ULT_ACCESO'];
  
  
        //Cargamos ultimo Acceso
        $FechaHoraHoy = date('Y-m-d H:i:s');
        RegistrarUltimoAcceso($_SESSION['USUARIO_ID'], $FechaHoraHoy, $MiConexion);
  
        RegistrarLogin($_SESSION['USUARIO_ID'], $FechaHoraHoy, $MiConexion);
  
        
        Header('Location:index.php');
        exit;
      }
    }
  }

  if (!empty($_POST['SigUpNewUser'])){
    if(ValidarEmail($_POST['emailNewUser'],$MiConexion)){
      $noValidateEmailnewUSer=true;

    }
    else 
    if(!empty($_POST['emailNewUser'])&&!empty($_POST['Clave'])){
      $noValidateEmailnewUSer=false;

      $resNewUser=RegistrarNewUser($_POST['emailNewUser'],$_POST['Clave'],$MiConexion);


      if($resNewUser){
        $_POST['email']=$_POST['emailNewUser'];
      }


    }


  }
  

?>