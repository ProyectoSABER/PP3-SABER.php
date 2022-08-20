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
        <h1><i class="fa fa-edit"></i> Registrar Socio</h1>
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



                <!-- NOMBRE y Apellido-->

                <div class="form-group">
                  <label class="control-label">Seleccione un APELLIDO Y NOMBRE</label> <i class="fa fa-asterisk" aria-hidden="true"></i>

                  <select class="form-control NombreApellido" name="DNI">
                    <option selected disabled hidden>Seleccione un Apellido y Nombre</option>
                    <?php for ($i = 0; $i < $CantNoSocio; $i++) { ?>
                      <option value="<?php echo  $NoSocio[$i]['DNI'] ?>"><?php echo $NoSocio[$i]['APELLIDO'] . ' ' . $NoSocio[$i]['NOMBRE'] ?></option>
                    <?php } ?>
                  </select>
                </div>
                <!-- DNI -->
                <div class="form-group">
                  <label class="control-label">DNI</label> <i class="fa " aria-hidden="true"></i>
                  <input class="form-control DNI" placeholder="DNI" disabled>

                </div>

                <!-- Categoria Socio -->
                <div class="form-group">
                  <label class="control-label">Seleccione una Categoria de Socio</label> <i class="fa fa-asterisk" aria-hidden="true"></i>
                  <select class="form-control CatSocio" name="IDCategoriaSocio">
                    <option selected disabled hidden>Seleccione una categoria de Socio</option>
                    <?php for ($i = 0; $i < $CantCatSocio; $i++) { ?>
                      <option class="optionCategoriaSocio" value="<?php echo  $CategoriaSocio[$i]['IDCATEGORIA'] ?>" data-cuota="<?php echo $CategoriaSocio[$i]['VCUOTA'] ?>"><?php echo $CategoriaSocio[$i]['CATEGORIA'] ?></option>
                    <?php } ?>
                  </select>
                </div>

                <!-- CUOTA-->
                <div class="form-group">
                  <label class="control-label">CUOTA</label> <i class="fa fa-asterisk" aria-hidden="true"></i>
                  <input class="form-control ValorCuota" placeholder="VALOR CUOTA" disabled>
                </div>
              </div>
              <div class="col-md-6">

                <!-- Estado Socio -->
                <div class="form-group">
                  <label class="control-label">Seleccione un Estado Incial Para el socio</label> <i class="fa fa-asterisk" aria-hidden="true"></i>
                  <select class="form-control" name="IDEstadoSocio">
                    <?php for ($i = 0; $i < $CantEstadoSocio; $i++) { ?>
                      <option value="<?php echo  $EstadoSocio[$i]['IDESTADOSOCIO'] ?>"><?php echo $EstadoSocio[$i]['ESTADOSOCIO'] ?></option>
                    <?php } ?>
                  </select>
                </div>




                <div class="tile-footer">
                  <!--Botones-->
                  <button class="btn btn-primary" type="submit" name="Registrar" value="Registrar"><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>&nbsp;&nbsp;&nbsp;



                  <a class="btn btn-warning" href="index.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
                </div>
                <div class="tile-footer"><button type="reset" class="btn btn-secondary">Reset Button</button></div>
              </div>
          </div>

        </div>

        </form>
      </div>
    </div>

    </div>

  </main>
  <!-- Personalizado -->
  <script src="./js/Personalizados/RegistrarSocio.js"></script>

  <!-- Essential javascripts for application to work-->
  <?php require_once('./Inc/js/js.inc.php'); ?>

</body>

</html>