<?php
require_once './Handler/HandlerRegistrarLibro.php'
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
              <strong>Los campos con <i class="fa fa-asterisk text-danger   " aria-hidden="true"></i> son obligatorios</strong>
            </div>
          </div>
          <div class="tile-body">

            <!-- Formulario -->
            <form method="POST" class="row">

              <div class="col-md-3">
                <!-- ISBN -->

                <div class="form-group">
                  <label class="control-label">ISBN</label> <i class="fa fa-asterisk text-danger   " aria-hidden="true"></i>
                  <input class="form-control" name="ISBN" minlength="10" maxlength="13" required placeholder="Introduzca el ISBN sin Guiones Minimo 13 carácteres">
                </div>
                <!-- Titulo -->

                <div class="form-group">
                  <label class="control-label">Título Libro</label> <i class="fa fa-asterisk text-danger   " aria-hidden="true"></i>
                  <input class="form-control" placeholder="Titulo" name="Titulo" required>
                </div>

                <!-- SubTitulo -->
                <div class="form-group">
                  <label class="control-label">SubTitulo</label> <i class="fa" aria-hidden="true"></i>
                  <input class="form-control" name="SubTitulo" placeholder="Subtitulo Opcional">
                </div>

                <!-- Idioma -->

                <div class="form-group">
                  <label class="control-label">Idioma</label> <i class="fa fa-asterisk text-danger   " aria-hidden="true"></i>
                  <select class="form-control" name="Idioma">
                    <?php for ($i = 0; $i < $CantIdioma; $i++) { ?>
                      <option value="<?php echo  $Idioma[$i]['Idioma_ID'] ?>"><?php echo $Idioma[$i]['Idioma_Nombre'] ?></option>
                    <?php } ?>
                  </select>
                </div>

                <!-- N° Edicion -->

                <div class="form-group">
                  <label class="control-label">N° Edicion</label> <i class="fa fa-asterisk text-danger   " aria-hidden="true"></i>
                  <input class="form-control" type="number" min="1" value="1" name="NEdicion">
                </div>

              </div>

              <div class="col-md-3">
                <!-- Editorial -->

                <div class="form-group">
                  <label class="control-label">Editorial</label> <i class="fa fa-asterisk text-danger   " aria-hidden="true"></i>
                  <select class="form-control" name="Editorial">
                    <?php for ($i = 0; $i < $CantEditorial; $i++) { ?>
                      <option value="<?php echo  $Editorial[$i]['Editorial_ID'] ?>"><?php echo $Editorial[$i]['Editorial_Nombre'] ?></option>
                    <?php } ?>
                  </select>
                </div>


                <!-- Categoria Libro -->

                <div class="form-group">
                  <label class="control-label">Categoria Libro</label> <i class="fa fa-asterisk text-danger   " aria-hidden="true"></i>
                  <select class="form-control" name="CategoriaLibro">
                    <?php for ($i = 0; $i < $CantCatLi; $i++) { ?>
                      <option value="<?php echo  $CatLibros[$i]['CatLibro_ID'] ?>"><?php echo $CatLibros[$i]['CatLibro_Nombre'] ?></option>
                    <?php } ?>
                  </select>
                </div>
                <!-- Fecha Publicacion -->

                <div class="form-group">
                  <label class="control-label">Fecha Publicacion</label> <i class="fa fa-asterisk text-danger   " aria-hidden="true"></i>
                  <input class="form-control" type="date" name="FechaPublicacion">
                </div>

                <!-- Cantidad de ejemplares -->

                <div class="form-group">
                  <label class="control-label">Cantidad de ejemplares</label> <i class="fa fa-asterisk text-danger   " aria-hidden="true"></i>
                  <input class="form-control" type="number" min="1" value="1" name="CantEjemplar">
                </div>
                <!-- Proveedor -->

                <div class="form-group">
                  <label class="control-label">Proveedor de Libro</label> <i class="fa fa-asterisk text-danger  " aria-hidden="true"></i>
                  <select class="form-control" name="ProveedorLibro">
                    <?php for ($i = 0; $i < $CantProveedores; $i++) { ?>
                      <option value="<?php echo  $Proveedor[$i]['Proveedor_ID'] ?>"><?php echo $Proveedor[$i]['Proveedor_Nombre'] ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>

              <div class="col-md-4">
                <!-- Ubicación -->

                <div class="form-group">
                  <label class="control-label">Ubicación en estanteria</label> <i class="fa fa-asterisk text-danger " aria-hidden="true"></i>
                  <input class="form-control" name="UbicacionEstanteria" placeholder="N° Estanteria (1...n), N° Estante (1...n), Ejemplo: (X,Y)">
                </div>



                <!-- <div class="form-group">
                    <label class="control-label">Puedes subir una captura de pantalla</label>
                    <input class="form-control" type="file">
                  </div> -->

                <div class="tile-footer">
                  <!--Botones-->
                  <button class="btn btn-primary" type="submit" name="Registrar" value="Registrar"><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>&nbsp;&nbsp;&nbsp;

                  

                  <a class="btn btn-warning" href="index.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
                </div>
                <div class="tile-footer"><button type="reset" class="btn btn-secondary">Limpiar Campos</button></div>
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