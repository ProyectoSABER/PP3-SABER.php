<?php
require_once('./Inc/session.inc.php');


require_once 'funciones/conexion.php';
require_once 'funciones/registrarIncidencias.php';
$MiConexion = ConexionBD();

$MensajeError = "";
$MensajeExito = "";



if (!empty($_POST['Registrar'])) {

  if (!empty($_POST['Titulo'])) {

    if (!empty($_POST['Descripcion'])) {

      if (!empty($_POST['Prioridad'])) {

        $estadoRegistro = registrarIncidencia($MiConexion, $_POST['Titulo'], $_POST['Descripcion'],$_SESSION['USUARIO_ID'], $_POST['Prioridad']);

        if ($estadoRegistro != false) {

          $MensajeExito = "Registro almacenado!";
          $MensajeError="";
        }else{
          $MensajeError = "El Registro no se almaceno!"; 
        }
      } else {

        $MensajeError = "Debes selecionar una Prioridad";
      }
    } else {

      $MensajeError = "Debes ingresar minimo 10 carateres en Descripción";
    }
  } else {

    $MensajeError = "Debes ingresar minimo 10 carateres en Titulo";
  }
}

require_once('./Inc/menus/head.inc.php');
?>


<body class="app sidebar-mini">
  <!-- Navbar-->
  <?php require_once('./Inc/menus/navbar.inc.php'); ?>
  <!-- Sidebar menu-->
  <?php require_once('./Inc/menus/sidebar.inc.php'); ?>
  <!-- fin Sidebar menu-->
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-edit"></i> Registra aqui tu incidencia</h1>
        <p>Detalla lo mas que puedas el problema que se presenta</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Inicio</li>
        <li class="breadcrumb-item"><a href="#">Registro</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">Ingresa los datos solicitados</h3>


<?php if (!empty($MensajeError)){?>
          <div class="bs-component">
            <div class="alert alert-dismissible alert-danger">
              <strong><?php echo $MensajeError?> .</strong>
            </div>
          </div>
          <?php } else if (!empty($MensajeExito)) {?>

          

          <div class="bs-component">
            <div class="alert alert-dismissible alert-success">
              <strong><?php echo $MensajeExito?></strong>
            </div>
          </div>
          <?php }?>

          <div class="bs-component">
            <div class="alert alert-dismissible alert-info">
              <strong>Los campos con <i class="fa fa-asterisk" aria-hidden="true"></i> son obligatorios</strong>
            </div>
          </div>
          <div class="tile-body">
            <!-- Formulario -->
            <form method="POST">
              <!-- Titulo -->
              <div class="form-group">
                <label class="control-label">Título</label> <i class="fa fa-asterisk" aria-hidden="true"></i>
                <input class="form-control" name="Titulo">
              </div>
              <!-- Descripcion -->
              <div class="form-group">
                <label class="control-label">Descripción del problema <i class="fa fa-asterisk" aria-hidden="true"></i></label>
                <textarea class="form-control" rows="4" placeholder="Ingresa los detalles..." name="Descripcion"></textarea>
              </div>
              <!-- Radio Button Prioridades -->
              <div class="form-group">
                <label class="control-label">Prioridad</label> <i class="fa fa-asterisk" aria-hidden="true"></i>
                <div class="form-check">

                  <label class="form-check-label">
                    <input class="form-check-input"  selected type="radio" name="Prioridad" value="1">Alta
                  </label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="Prioridad" value="2">Media
                  </label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="Prioridad" value="3">Baja
                  </label>
                </div>
              </div>
              <!-- /Radio Button Prioridades -->
              <!--
                <div class="form-group">
                  <label class="control-label">Puedes subir una captura de pantalla</label>
                  <input class="form-control" type="file">
                </div>
                -->
              <div class="tile-footer">
                <!--Botones-->
                <button class="btn btn-primary"  type="submit" name="Registrar" value="Registrar"><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>&nbsp;&nbsp;&nbsp;


                <a class="btn btn-secondary" href="index.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
              </div>
          </div>

          </form>
        </div>
      </div>

    </div>
  </main>
  <!-- Essential javascripts for application to work-->
  <?php require_once('./Inc/js/js.inc.php'); ?>

</body>

</html>