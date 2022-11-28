<?php
require_once './Handler/prestamos/HandlerRegistrarPrestamoLibro.php'
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
          <!--  <?php /* echo '<p>' . print_r($IngresoRegistro) . '<p>'  */ ?> -->
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
          <div >
            <div class="col-md-12">






              <form method="GET" class="row">
                <div class="col-md-6">
                  <!-- Titulo -->

                  <div class="form-group">

                    <label class="control-label">Título Libro</label> <i class="fa fa-asterisk text-danger" aria-hidden="true"></i>

                    <select class="form-control" name="ISBN">
                      <option disabled hidden <?php if (empty($_GET['ISBN'])) {
                                                echo 'selected';
                                              } ?>>



                        Seleccione un Libro

                      </option>


                      <?php for ($i = 0; $i < $CantLibros; $i++) { ?>
                        <option <?php if ((!empty($_GET['ISBN'])) && $_GET['ISBN'] == $Libros[$i]['Libro_ISBN']) {
                                  echo 'selected';
                                } ?> value="<?php echo  $Libros[$i]['Libro_ISBN'] ?>"><?php echo $Libros[$i]['Libro_Titulo']  ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <!-- /Titulo -->

                <!-- Nombre Socio -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Socio</label> <i class="fa fa-asterisk text-danger" aria-hidden="true"></i>
                    <select class="form-control" name="IDSocio">


                      <option disabled hidden <?php if (empty($_GET['IDSocio'])) {
                                                echo 'selected';
                                              } ?>>


                        Seleccione un Socio



                      </option>


                      <?php for ($i = 0; $i < $CantSocios; $i++) { ?>
                        <option <?php if ((!empty($_GET['IDSocio'])) && $_GET['IDSocio'] == $Socios[$i]['SOCIO_ID']) {
                                  echo 'selected';
                                } ?> value="<?php echo  $Socios[$i]['SOCIO_ID'] ?>"><?php echo $Socios[$i]['SOCIO_APELLIDO'] . ' ' . $Socios[$i]['SOCIO_NOMBRE']  ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <!-- /Nombre Socio -->
                <!-- Botones Form 1 -->
                <div class="column mb-2">
                  <button class="btn btn-success " type="submit" name="RegistrarForm1" value="CargarLibro">
                    <i class="fa fa-fw fa-lg fa-check-circle"></i>Cargar Datos
                  </button>
                </div>
                <!-- /Botones Form 1 -->
              </form>


            </div>

          </div>
          <!--/Formulario 1-->

          <!-- Formulario 2-->
          <div  <?php if ($PanelLibroHidden) {
                                    echo 'hidden';
                                  } ?>>
            <label class="control-label">Libro Seleccionado</label>
            <div class="col-md-12">
              <form method="POST" class="row">
                <div class="col-md-6">


                  <!-- ISBN -->

                  <div class="form-group">
                    <label class="control-label">ISBN</label> <i class="fa fa-asterisk text-danger" aria-hidden="true"></i>
                    <input class="form-control" name="ISBN" placeholder="<?php if (!empty($_GET['ISBN'])) {
                                                                            echo $LibroISBN['Libro_ISBN'];
                                                                          } else {
                                                                            echo 'ISBN';
                                                                          } ?>" disabled <?php if (!empty($_GET['ISBN'])) {
                                                                                            echo 'value="' . $LibroISBN["Libro_ISBN"] . '"';
                                                                                          } ?>>
                  </div>

                  <!-- Idioma -->

                  <div class="form-group">
                    <label class="control-label">Idioma</label> <i class="fa fa-asterisk text-danger" aria-hidden="true"></i>
                    <input id="Idioma" class="form-control " placeholder="<?php if (!empty($_GET['ISBN'])) {
                                                                            echo $LibroISBN['Libro_Idioma'];
                                                                          } else {
                                                                            echo 'IDIOMA';
                                                                          } ?>" disabled>
                  </div>

                  <!-- N° Edicion -->

                  <div class="form-group">
                    <label class="control-label">N° Edicion</label> <i class="fa fa-asterisk text-danger" aria-hidden="true"></i>
                    <input class="form-control" placeholder="<?php if (!empty($_GET['ISBN'])) {
                                                                echo $LibroISBN['Libro_NEdicion'];
                                                              } else {
                                                                echo 'N° Edicion';
                                                              } ?>" disabled>
                  </div>
                </div>



                <div class="col-md-6">



                  <!-- Categoria Libro -->

                  <div class="form-group">
                    <label class="control-label">Categoria Libro</label> <i class="fa fa-asterisk text-danger" aria-hidden="true"></i>
                    <input id="Categoria_Libro" class="form-control" placeholder="<?php if (!empty($_GET['ISBN'])) {
                                                                                    echo $LibroISBN['Libro_CategoriaLibro'];
                                                                                  } else {
                                                                                    echo 'N° Edicion';
                                                                                  } ?>" disabled>
                  </div>


                  <!-- Cantidad de ejemplares -->

                  <div class="form-group">
                    <label class="control-label">Cantidad de ejemplares Disponibles</label> <i class="fa fa-asterisk text-danger" aria-hidden="true"></i>
                    <input class="form-control" placeholder="<?php if (!empty($_GET['ISBN'])) {
                                                                echo $CantEjemplaresDispo;
                                                              } else {
                                                                echo 'Cantidad de ejemplares Disponibles';
                                                              } ?>" disabled>
                  </div>


                  <!-- Ubicación -->

                  <div class="form-group">
                    <label class="control-label">Ubicación en estanteria</label> <i class="fa fa-asterisk text-danger" aria-hidden="true"></i>
                    <input class="form-control" placeholder="<?php if (!empty($_GET['ISBN'])) {
                                                                echo $LibroISBN['Libro_UbicacionEstanteria'];
                                                              } else {
                                                                echo 'Ubicacion En estanteria';
                                                              } ?>" disabled>
                  </div>
                </div>










            </div>


          </div>
       
        <!-- /Formulario 2-->

        <!-- Formulario 3-->

        <div  <?php if ($PanelSocioHidden) {
                                    echo 'hidden';
                                  } ?>>
          <label class="control-label">Socio Seleccionado</label>
          <?php if (!empty($_GET['IDSocio'])) {
            echo '<h4><strong> ' . $SocioID['SOCIO_APELLIDO'] . ' ' . $SocioID['SOCIO_NOMBRE'] . '</strong></h4>';
          } ?>

          <div class="col-md-12">
            <div class="row">

              <div class="col-md-6">


                <!-- DNI -->

                <div class="form-group">
                  <label class="control-label">DNI</label> <i class="fa fa-asterisk text-danger" aria-hidden="true"></i>
                  <input class="form-control" placeholder="<?php if (!empty($_GET['IDSocio'])) {
                                                              echo $SocioID['SOCIO_DNI'];
                                                            } else {
                                                              echo 'DNI';
                                                            } ?>" disabled>
                </div>

                <!-- ID -->

                <div class="form-group">
                  <label class="control-label">ID</label> <i class="fa fa-asterisk text-danger" aria-hidden="true"></i>
                  <input id="Idioma" class="form-control " name="SOCIO_ID" placeholder="<?php if (!empty($_GET['IDSocio'])) {
                                                                                          echo $SocioID['SOCIO_ID'];
                                                                                        } else {
                                                                                          echo 'ID';
                                                                                        } ?>" disabled <?php if (!empty($_GET['ISBN'])) {
                                                                                                            echo 'value="' . $SocioID['SOCIO_ID'] . '"';
                                                                                                          } ?>>
                </div>
              </div>



              <div class="col-md-6">

                <!-- Categoria -->

                <div class="form-group">
                  <label class="control-label">Categoria Socio</label> <i class="fa fa-asterisk text-danger" aria-hidden="true"></i>
                  <input class="form-control" placeholder="<?php if (!empty($_GET['IDSocio'])) {
                                                              echo $SocioID['SOCIO_CATEGORIA'];
                                                            } else {
                                                              echo 'Categoria Socio';
                                                            } ?>" disabled>
                </div>




                <!-- Estado Socio -->

                <div class="form-group">
                  <label class="control-label">Estado Socio</label> <i class="fa fa-asterisk text-danger" aria-hidden="true"></i>
                  <input id="Categoria_Libro" class="form-control" placeholder="<?php if (!empty($_GET['IDSocio'])) {
                                                                                  echo $SocioID['SOCIO_ESTADOSOCIO'];
                                                                                } else {
                                                                                  echo 'Estado Socio';
                                                                                } ?>" disabled>

                </div>



              </div>









            </div>
          </div>


        </div>
        <!-- /Formulario 3-->


        <!--Botones-->
        <div>
          <button class="btn btn-primary" type="submit" name="RegistrarPrestamo" value="RegistrarPrestamo" <?php if ($BtnDisabled) {
                                                                                                              echo 'disabled';
                                                                                                            } ?>><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>&nbsp;&nbsp;&nbsp;



          <a class="btn btn-warning" href="index.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>&nbsp;&nbsp;&nbsp;
          <button type="reset" class="btn btn-secondary">Limpiar Campos </button>
        </div>

        </form>
        <!--/Botones-->






      </div>

    </div>

  </main>
  <!-- Essential javascripts for application to work-->
  <?php require_once('./Inc/js/js.inc.php'); ?>

</body>

</html>