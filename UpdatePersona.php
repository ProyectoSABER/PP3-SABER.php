<?php
require_once('Handler/socios/HandlerRegistrarSocio.php');

?>


<body class="app sidebar-mini pace-done sidenav-toggled">
  <!-- Navbar-->
  <?php require_once('./Inc/menus/navbar.inc.php'); ?>
  <!-- Sidebar menu-->
  <?php require_once('./Inc/menus/sidebar.inc.php'); ?>
  <!-- fin Sidebar menu-->
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-edit"></i> Registrar Persona</h1>
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
          <?php /* echo '<p>'.print_r($IngresoRegistro) .'<p>' */ ?>


          <?php if (!empty($MensajeError)) { ?>
            <div class="bs-component">
              <div class="alert alert-dismissible alert-danger">
                <strong><?php echo $MensajeError ?> .</strong>
              </div>
            </div>
          <?php } else if (!empty($MensajeExito)) { ?>



            <div class="bs-component">
              <div class="alert alert-dismissible alert-success">
                <strong><?php echo $MensajeExito ?></strong>
              </div>
            </div>
          <?php } ?>

          <div class="bs-component">
            <div class="alert alert-dismissible alert-info">
              <strong>Los campos con <i class="fa fa-asterisk" aria-hidden="true"></i> son obligatorios</strong>
            </div>
          </div>
          <div class="tile-body">

            <!-- Formulario -->
            <form method="POST" class="row ">

              <div class="col-md-6">
                <!-- DNI -->

                <div class="form-group">
                  <label class="control-label">DNI</label> <i class="fa fa-asterisk" aria-hidden="true"></i>
                  <input class="form-control" placeholder="DNI" name="DNI" type="number">
                </div>
                <!-- TIPO DNI -->
                <div class="form-group">
                  <label class="control-label">Tipo DNI</label> <i class="fa fa-asterisk" aria-hidden="true"></i>
                  <select class="form-control" name="Idioma">
                    <?php for ($i = 0; $i < $CantIdioma; $i++) { ?>
                      <option value="<?php echo  $Idioma[$i]['Idioma_ID'] ?>"><?php echo $Idioma[$i]['Idioma_Nombre'] ?></option>
                    <?php } ?>
                  </select>
                </div>


                <!-- NOMBRE -->
                <div class="form-group">
                  <label class="control-label">NOMBRE</label> <i class="fa fa-asterisk" aria-hidden="true"></i>
                  <input class="form-control" placeholder="NOMBRE" name="NOMBRE">
                </div>
              

                <!-- Apellido -->
                <div class="form-group">
                  <label class="control-label">Apellido</label> <i class="fa fa-asterisk" aria-hidden="true"></i>
                  <input class="form-control" placeholder="Apellido" name="Apellido">
                </div>
                </div>
              <div class="col-md-6">

                <!-- Domicilio -->

                <div class="form-group">
                  <label class="control-label">Domicilio</label> <i class="fa fa-asterisk" aria-hidden="true"></i>
                  <select class="form-control" name="Domicilio" placeholder="Domicilio">
                    <?php for ($i = 0; $i < $CantIdioma; $i++) { ?>
                      <option value="<?php echo  $Idioma[$i]['Idioma_ID'] ?>"><?php echo $Idioma[$i]['Idioma_Nombre'] ?></option>
                    <?php } ?>
                  </select>
                </div>

                <!-- Usuario -->

                <div class="form-group">
                  <label class="control-label">Usuario</label> <i class="fa fa-asterisk" aria-hidden="true"></i>
                  <select class="form-control" name="Usuario" placeholder="Usuario">
                    <?php for ($i = 0; $i < $CantIdioma; $i++) { ?>
                      <option value="<?php echo  $Idioma[$i]['Idioma_ID'] ?>"><?php echo $Idioma[$i]['Idioma_Nombre'] ?></option>
                    <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                  <label class="control-label">Puedes subir una captura de pantalla</label>
                  <input class="form-control" type="file" disabled>
                </div>

                <div class="tile-footer">
                  <!--Botones-->
                  <button class="btn btn-primary" type="submit" name="Registrar" value="Registrar"><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>&nbsp;&nbsp;&nbsp;



                  <a class="btn btn-warning" href="index.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
                </div>
                <div class="tile-footer"><button type="reset" class="btn btn-secondary">Reset Button</button></div>
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