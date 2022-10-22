<?php
require_once './Handler/cuotas/HandlerRegistrarCuota.php'
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
        <h1><i class="fa fa-edit"></i> Registrar Cuota</h1>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
        <li class="breadcrumb-item"><a href="#">Registrar Cuota</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">Ingresa los datos solicitados</h3>
          <?php /* echo '<p>'.print_r($IngresoRegistro) .'<p>' */ ?>

          <!-- Mensaje de error -->
          <?php if (!empty($MensajeError)) { ?>
            <div class="bs-component">
              <div class="alert alert-dismissible alert-danger">
                <strong><?php echo $MensajeError ?> .</strong>
              </div>
            </div>
          <?php } else if (!empty($MensajeExito)) { ?>


            <!-- Mensaje de Exito -->
            <div class="bs-component">
              <div class="alert alert-dismissible alert-success">
                <strong><?php echo $MensajeExito ?></strong>
              </div>
            </div>
          <?php } ?>
          <!-- Mensaje de campo obligatorios -->
          <div class="bs-component">
            <div class="alert alert-dismissible alert-info">
              <strong>Los campos con <i class="fa fa-asterisk" aria-hidden="true"></i> son obligatorios</strong>
            </div>
          </div>
          <!-- Body -->
          <div class="tile-body">

            <!-- Formulario -->
            <form method="POST" id="formAñadirCuota">

              <div class="row justify-content-space-around">
                <div class="col-md-5">

                  <!--Input Mes -->

                  <div class="form-group">
                    <label class="control-label">Seleccione un Mes para la cuota</label> <i class="fa fa-asterisk" aria-hidden="true"></i>
                    <input id="InputMes" class="form-control " type="month" name="Mes" min="<?php echo $año = date("Y-m"); ?>" required>
                  </div>
                </div>
                <div class="col-md-5">
                  <!-- Input Fecha de Vencimiento -->

                  <div class="form-group FVencimiento">
                    <label class="control-label">Seleccione la fecha de vencimiento </label> <i class="fa fa-asterisk" aria-hidden="true"></i>
                    <input id="FVencimiento" class="form-control" type="date" name="FVencimiento" min="" max="">
                  </div>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-md-12">

                  <!-- Selectores Categoria de socio y valor de cuota-->

                  <div class="Categoria_Socios ">
                    <div class="form-group ">
                      <label class="control-label">Seleccione las categorias de Socios a insertar</label> <i class="fa fa-asterisk" aria-hidden="true"></i>

                      <div class="row">
                        <?php foreach ($catSocios as $Valor) { ?>
                          <div class="col-md-3">
                            <!-- Input Check Socios -->
                            <label for="Socio<?php echo $Valor["CATEGORIA"] ?>"><?php echo $Valor["CATEGORIA"] ?></label>

                            <!-- Label Check Socios -->
                            <input class="form-checks checkSocio <?php echo $Valor["CATEGORIA"] ?> " type="checkbox" id="Socio<?php echo $Valor["CATEGORIA"] ?>" name="Socio-<?php echo $Valor["CATEGORIA"]  ?>" value="<?php echo $Valor["CATEGORIA"] ?>">
                            <div class="input_valorCuota input-group flex-column">
                              <div class="row">
                                <label for="ValorCuota-<?php echo $Valor["CATEGORIA"] ?>">Ingrese el Valor $ de la cuota</label>
                              </div>
                              <div class="row flex-nowrap">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">$</span>
                                </div>
                                <input class="inputVcuota form-control" type="number" min=1 name="VCuota-<?php echo $Valor["CATEGORIA"] ?>">
                              </div>
                            </div>


                          </div>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>



              <div class="tile-footer row justify-content-center">
                <!--Botones-->
               
                <button id="btn_registrar" class="btn btn-primary" type="button" name="Registrar" value="Registrar"><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>&nbsp;&nbsp;&nbsp;
                


                <a class="btn btn-warning" href="index.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
              </div>





            </form>
          </div>
        </div>

      </div>
      <!-- Modal -->
      <?php require_once("./page/modals/RegistrarCuotas/ModalRegistrarCuota.php") ?>
  </main>
  <!-- Essential javascripts for application to work-->
  <?php require_once('./Inc/js/js.inc.php'); ?>
  <script type="text/javascript" src="./js/Personalizados/Cuotas/registrarCuotas.js">

  </script>

</body>

</html>