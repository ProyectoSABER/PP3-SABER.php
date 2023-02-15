<?php
// Inicializar la sesion al principio
session_start();
require_once './Handler/HandlerLogin.php';
?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="assets/css/main.css">
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/login.css">
   <!-- Estilos Sweet Alert-->
  <link rel="stylesheet" href="assets/plugins/dist/sweetalert2.min.css">




  <title>S.A.B.E.R Sistema de Gestion bibliotecario</title>
</head>

<body>
  
  <section class="material-half-bg">
    <div class="cover"></div>
  </section>
  <section class="login-content">
    <div class="logo">
    <h1>S.A.B.E.R</h1>
    <h2>Sistema Administracion de Bibliotecas Escolares</h2>
    </div>
    <div class="login-box <?php echo ($noValidateEmailnewUSer)? 'NewUser': ''; ?> ">
      <form class="login-form" role="form" method="POST">
        <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>INGRESA AL PANEL</h3>

        <!-- *******************************************
        
           esto se debe mostrar solo si hay errores en el logueo, y no mostrar la otra de Ingresa tus datos
          
           *******************************************
          -------->

        <?php if (empty($MensajeError)) { ?> <div class="bs-component">
            <div class="alert alert-dismissible alert-info">
              <strong>Ingresa tus datos</strong>

              <!-- si hay errores se muestra la seccion anterior, y esta no -->
            </div> <?php } else { ?><div class="bs-component">
              <div class="alert alert-dismissible alert-danger">
                <strong><?php echo $MensajeError; ?></strong>
              </div>

            <?php } ?>
            </div>
            <!-------->
            <?php if (!empty($MensajeValidacion)) { ?>
              <div class="alert alert-warning">
                <?php echo $MensajeValidacion; ?>
              </div>
            <?php } ?>


            <div class="form-group">
              <!-- Email-->
              <label class="control-label">USUARIO</label>
              <input class="form-control" placeholder="Ingrese direccion mail registrada" type="email" required name="email" autofocus value="<?php echo !empty($_POST['email']) ? $_POST['email'] : '' ?>">
            </div>
            <div class="form-group">
              <!-- Password-->
              <label class="control-label">PASSWORD</label>
              <input class="form-control" placeholder="Password" type="password" required minlength="8" name="clave">
            </div>
            <div class="form-group">
              <div class="utility">
                <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Olvidaste la clave ?</a></p>
                <p class="semibold-text mb-2"><a href="#" data-toggle="NewUser">¿Nuevo Usuario?</a></p>
                
              </div>
            </div>
            <div class="form-group btn-container">
              <button class="btn btn-primary btn-block" type="submit" name="Ingresar" value="Ingresar"><i class="fa fa-sign-in fa-lg fa-fw"></i>INGRESAR</button>
            </div>
      </form>
      <?php require_once './Inc/login/formReset.inc.php';
      require_once './Inc/login/formNewUser.php';
       ?>

    </div>

  

  </section>
  <?php require_once('./Inc/js/js.inc.php'); ?>

  
  <!-- The javascript plugin to display page loading on top-->
  <script src="js/plugins/pace.min.js"></script>
  <script src="./js/Personalizados/ValidatorNewUser.js"></script>
  <script type="text/javascript">
    // Login Page Flipbox control
    $('.login-content [data-toggle="flip"]').click(function() {
      $('.login-box').toggleClass('flipped');
      return false;
    });
    // Login Page Flipbox control New User
    $('.login-content [data-toggle="NewUser"]').click(function() {
      $('.login-box').toggleClass('NewUser');
      return false;
    });
  </script>
</body>

<script src="assets/plugins/dist/sweetalert2.all.min.js"></script>

</html>
