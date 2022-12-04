<?php
require_once './Handler/prestamos/HandlerRegistrarPrestamoLibro2.php';
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
        <h1><i class="fa fa-edit"></i> Registrar Prestamo de Libros</h1>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Inicio</li>
        <li class="breadcrumb-item"><a href="#">Registro Prestamo</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">Ingresa los datos solicitados</h3>
          <!-- ************************************ -->
          <!-- *****IMPRIMIR ARRAY EN PANTALA****** -->
          <!-- ************************************ -->
          <?php /* echo '<p>' . print_r($IngresoRegistro) . '<p>' */ ?>
          <!-- ************************************ -->
          <!-- ************************************ -->


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
              <strong>Los campos con <i class="fa fa-asterisk text-danger" aria-hidden="true"></i> son obligatorios</strong>
            </div>
          </div>

          <!-- Formulario 1-->
          <div class="tile-body">
            <div class="col-md-12">






              <form method="POST" class="row">
                <div class="col-md-6">
                  <!-- ISBN -->

                  <div class="form-group">
                    <label class="control-label">ISBN</label> <i class="fa fa-asterisk text-danger" aria-hidden="true"></i>
                    <input class="form-control" placeholder="<?php
                                                              echo $ISBNlibro
                                                              ?>" disabled>
                  </div>
                  <!-- TITULO -->

                  <div class="form-group">
                    <label class="control-label">TITULO</label> <i class="fa fa-asterisk text-danger" aria-hidden="true"></i>
                    <input class="form-control" placeholder="<?php
                                                              echo $Libro['Libro_Titulo']
                                                              ?>" disabled>
                  </div>
                </div>
                <div class="col-md-6">
                  <!-- IDSOCIO -->

                  <div class="form-group">
                    <label class="control-label">IDSOCIO</label> <i class="fa fa-asterisk text-danger" aria-hidden="true"></i>
                    <input class="form-control" placeholder="<?php
                                                              echo $IDSocio
                                                              ?>" disabled>
                  </div>
                  <!-- Apellido y Nombre de Socio -->

                  <div class="form-group">
                    <label class="control-label">Apellido y Nombre del Socio</label> <i class="fa fa-asterisk text-danger" aria-hidden="true"></i>
                    <input class="form-control" placeholder="<?php
                                                              echo $Socio['SOCIO_APELLIDO'] . ' ' . $Socio['SOCIO_NOMBRE'];
                                                              ?>" disabled>
                  </div>
                </div>
                <!-- Ejemplares Disponibles -->
                <div class="col-md-12 tile-footer">
                  <div class="form-group">

                    <label class="control-label">Selecciona un ID de Ejemplar Disponibles </label> <i class="fa fa-asterisk text-danger" aria-hidden="true"></i>
                    <!-- revisar a futuro -->
                    <select class="form-control" name="IDEJEMPLARLIBRO">
                      <option disabled hidden selected>
                        <?php if (!empty($_GET['IDEJEMPLARLIBRO'])) {
                          echo $_GET['IDEJEMPLARLIBRO'];
                        } else {
                          echo 'ID EJEMPLAR LIBRO';
                        } ?></option>

                      <?php for ($i = 0; $i < $CantEjemplaresDispo; $i++) { ?>
                        <option value="<?php echo  $EjemplaresDispo[$i]['EJEMPLARLIBRO_ID'] ?>"><?php echo $EjemplaresDispo[$i]['EJEMPLARLIBRO_IDINSTEJEMPLAR']  ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <!-- /Ejemplares Disponibles -->
                <!-- Tipo Prestamo -->
                <div class="col-md-12 tile-footer">
                  <div class="form-group">



                    <!-- Radio Button Prioridades -->
                    <div class="form-group ml-4">
                      <label class="control-label">Selecciona un Tipo de Prestamo </label> <i class="fa fa-asterisk text-danger" aria-hidden="true"></i>

                      <?php for ($i = 0; $i < $CantTipoPrestamo; $i++) { ?>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="TPrestamo" <?php if ($TipoPrestamo[$i]['ID'] == 1) {
                                                                                            echo 'checked';
                                                                                          } ?> value=" <?php echo $TipoPrestamo[$i]['ID'] ?>">
                            <?php echo $TipoPrestamo[$i]['TipoPrestamo'] ?>
                          </label>
                        </div>
                      <?php } ?>


                    </div>
                    <!-- /Radio Button Prioridades -->
                  </div>
                </div>
                <!-- /Tipo Prestamo -->






            </div>
            <!--/Formulario 1-->



            <!--Botones-->
            <div class="tile-footer">
              <button class="btn btn-primary" type="submit" name="RegistrarPrestamo" value="RegistrarPrestamo" <?php if ($BtnDisabled) {
                                                                                                                  echo 'disabled';
                                                                                                                } ?>><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>&nbsp;&nbsp;&nbsp;



              <a class="btn btn-warning" href="index.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>&nbsp;&nbsp;&nbsp;
              <button type="reset" class="btn btn-secondary">Reset Button</button>
            </div>


            <!--/Botones-->

            </form>




          </div>

        </div>

  </main>
  <!-- Essential javascripts for application to work-->
  <?php require_once('./Inc/js/js.inc.php'); ?>

</body>

</html>