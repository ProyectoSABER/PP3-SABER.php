<?php
require_once './Handler/HandlerRegistrarEjemplarLibro.php'
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
        <h1><i class="fa fa-edit"></i> Registrar Libros</h1>
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
            <form method="POST" class="row justify-content-center">

              <div class="col-md-8">

                <!-- Nombre Libro -->

                <div class="form-group">
                  <label class="control-label">Título Libro</label> <i class="fa fa-asterisk" aria-hidden="true"></i>
                  <select class="form-control titulo_libro"  placeholder="Titulo" name="ISBN" onchange="">
                    <option disabled hidden selected>Titulo Libro</option>
                    
                  <?php for ($i = 0; $i < $CantLibros; $i++) { ?>
                      <option value="<?php echo  $Libros[$i]['Libro_ISBN'] ?>"><?php echo $Libros[$i]['Libro_Titulo'] ?></option>
                    <?php } ?>
                  </select>
                </div>

                <!-- ISBN Libro -->

                <div class="form-group">
                  <label class="control-label">ISBN Libro</label>
                 <!--  ="" -->
                  <input class="form-control ISBN_libro"  type="text" placeholder="ISBN Libro"  disabled >
                </div>

                <!-- Numero de Ejemplar -->

                <div class="form-group">
                  <label class="control-label">Codigo Ejemplar Institucional</label> <i class="fa fa-asterisk" aria-hidden="true"></i>
                  <input class="form-control" name="NEjemplar" placeholder="Codigo Ejemplar Institucional">
                </div>


                


                <!-- Estado Libro -->
                <div class="form-group">
                  <label class="control-label">Estado Libro</label> <i class="fa" aria-hidden="true"></i>
                  <select class="form-control" value="" name="EstadoLibro">
                  <option disabled hidden selected>Estado Libro</option>
                    <option value=1 selected>Disponible</option>
                    <option value=2>Prestado </option>
                    <option value=3>Reservado</option>
                  </select>


                </div>



                <!--Botones-->
                <button class="btn btn-primary" type="submit" name="Registrar" value="Registrar"><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>&nbsp;&nbsp;&nbsp;


                <a class="btn btn-secondary" href="index.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
              </div>
          </div>

        </div>

        </form>
      </div>
    </div>

    </div>
  </main>
  <!-- Essential javascripts for application to work-->
  <!-- Js Personalizado -->
  <script src="./js/Personalizados/RegistrarEjemplarLibro.js"></script>
  <?php require_once('./Inc/js/js.inc.php'); ?>

</body>

</html>