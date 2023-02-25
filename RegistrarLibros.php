<?php
require_once './Handler/HandlerRegistrarLibro.php'
?>
<link rel="stylesheet" type="text/css" href="./assets/css/bootstrap-select.min.css" />


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
          <?php /* echo '<p>' . print_r($_POST) . '<p>' */
          /* echo '<p>'.print_r($_SESSION) .'<p>' */ ?>

          <?php /* echo '<p>'.print_r($GLOBALS) .'<p>' */ ?>



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
            <form method="POST" class="row" id="form_registrarLibro" enctype="multipart/form-data">

              <div class="col-md-4">
                <!-- ISBN -->

                <div class="form-group">
                  <label class="control-label">ISBN <i class="fa fa-asterisk text-danger   " aria-hidden="true"></i> Formato(13 digitos consecutivos sin espacios)</label>
                  <input class="form-control" name="ISBN" minlength="10" maxlength="13" required placeholder="Introduzca el ISBN sin Guiones Minimo 13 carácteres" title="Introduzca el ISBN sin Guiones Minimo 13 carácteres">
                </div>
                <!-- Titulo -->

                <div class="form-group">
                  <label class="control-label">Título Libro</label> <i class="fa fa-asterisk text-danger   " aria-hidden="true"></i>
                  <input class="form-control" placeholder="Titulo" name="Titulo" required title="Registre el Titulo del libro">
                </div>

                <!-- SubTitulo -->
                <div class="form-group">
                  <label class="control-label">SubTitulo</label> <i class="fa" aria-hidden="true"></i>
                  <input class="form-control" name="SubTitulo" placeholder="Subtitulo Opcional" title="Subtitulo Opcional, registre un titulo secundario">
                </div>
                <!-- Autor -->
                <div class="row align-items-center align-content-center justify-content-center">

                  <div class="form-group col-10 ">
                    <label class="control-label">Autor/es</label> <i class="fa fa-asterisk text-danger" aria-hidden="true"></i>
                    <select id="select_Autor" class="form-control border border-dark selectpicker" data-style="bg-transparent" multiple data-live-search="true" name="Autor" title="Selecciona los Autores" data-selected-text-format="count >3" required>

                      <?php for ($i = 0; $i < $CantAutores; $i++) { ?>
                        <option value="<?php echo  $Autores[$i]['ID'] ?>"><?php echo $Autores[$i]['NOMBRE'] ?></option>
                      <?php } ?>
                    </select>

                  </div>
                  <div class="col-2 ">
                    <button type="button" class="btn btn-sm btn-primary" title="Añadir Autores" data-bs-toggle="modal" data-bs-target="#AutoresModal" data-bs-whatever="@mdo"><i class="fa-solid fa-person-circle-plus"></i></button>

                  </div>


                </div>
                <!-- Idioma -->

                <div class="row align-items-center align-content-center justify-content-center">

                  <div class="form-group col-10">
                    <label class="control-label">Idioma</label> <i class="fa fa-asterisk text-danger   " aria-hidden="true"></i>
                    <select id="select_Idioma" class="form-control border border-dark selectpicker" data-style="bg-transparent" data-live-search="true" name="Idioma" required title="Registre el Idioma del libro">
                      <option disabled="" hidden="" selected=""> Seleccione un Idioma</option>
                      <?php for ($i = 0; $i < $CantIdioma; $i++) { ?>
                        <option value="<?php echo  $Idioma[$i]['Idioma_ID'] ?>"><?php echo $Idioma[$i]['Idioma_Nombre'] ?></option>
                      <?php } ?>
                    </select>

                  </div>
                  <div class="col-2 ">

                    <button type="button" class="btn btn-sm btn-primary" title="Añadir Idiomas" data-bs-toggle="modal" data-bs-target="#IdiomasModal"><i class="fa-solid fa-language"></i><i class="fa-solid fa-plus"></i></button>

                  </div>
                </div>

              </div>


              <div class="col-md-4">
                <!-- N° Edicion -->

                <div class="form-group">
                  <label class="control-label">N° Edicion</label> <i class="fa fa-asterisk text-danger   " aria-hidden="true"></i>
                  <input class="form-control" type="number" min="1" value="1" name="NEdicion" placeholder="Registre el numero de Edición" required title="Registre el numero de Edición, si es Edicion unica Ingrese 1">
                </div>
                <!-- Editorial -->
                <div class="row align-items-center align-content-center justify-content-center">

                  <div class="form-group col-10">
                    <label class="control-label">Editorial</label> <i class="fa fa-asterisk text-danger   " aria-hidden="true"></i>
                    <select id="select_Editorial" class="form-control border border-dark  selectpicker" data-style="bg-transparent" data-live-search="true" name="Editorial" required title="Seleccione una Editorial para el libro">
                      <option disabled="" hidden="" selected=""> Seleccione una Editorial</option>
                      <?php for ($i = 0; $i < $CantEditorial; $i++) { ?>
                        <option value="<?php echo  $Editorial[$i]['Editorial_ID'] ?>"><?php echo $Editorial[$i]['Editorial_Nombre'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="col-2 ">

                    <button type="button" class="btn btn-sm btn-primary" title="Añadir Editorial" data-bs-toggle="modal" data-bs-target="#EditorialesModal"><i class="fa-regular fa-newspaper"></i><i class="fa-solid fa-plus"></i></button>

                  </div>
                </div>



                <!-- Categoria Libro -->
                <div class="row align-items-center align-content-center justify-content-center">

                  <div class="form-group col-10">
                    <label class="control-label">Categoria Libro</label> <i class="fa fa-asterisk text-danger   " aria-hidden="true"></i>
                    <select id="select_CategoriaLibro" class="form-control border border-dark  selectpicker" data-style="bg-transparent" data-live-search="true" name="CategoriaLibro" required title="Seleccione una categoria de clasificación del libro">
                      <option disabled="" hidden="" selected=""> Seleccione una categoria de libro</option>
                      <?php for ($i = 0; $i < $CantCatLi; $i++) { ?>
                        <option value="<?php echo  $CatLibros[$i]['CatLibro_ID'] ?>"><?php echo $CatLibros[$i]['CatLibro_Nombre'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="col-2 ">

                    <button type="button" class="btn btn-sm btn-primary" title="Añadir CategoriaLibro" data-bs-toggle="modal" data-bs-target="#CategoriaLibrosModal"><i class="fa-solid fa-landmark"></i><i class="fa-solid fa-plus"></i></button>

                  </div>
                </div>
                <!-- Fecha Publicacion -->

                <div class="form-group">
                  <label class="control-label">Fecha Publicacion</label> <i class="fa fa-asterisk text-danger   " aria-hidden="true"></i>
                  <input class="form-control" type="date" name="FechaPublicacion" required title="Registre la fecha de Publicación">
                </div>

                <!-- Cantidad de ejemplares -->

                <div class="form-group">
                  <label class="control-label">Cantidad de ejemplares</label> <i class="fa fa-asterisk text-danger   " aria-hidden="true"></i>
                  <input class="form-control" type="number" min="1" value="1" name="CantEjemplar" placeholder="Registre el numero de Ejemplares" title="Esté valor sera remplazado cuando registre los ejemplares">
                </div>

              </div>
              
              <div class="col-md-4">
              <!-- Proveedor -->
              <div class="row align-items-center align-content-center justify-content-center">

                <div class="form-group col-10">
                  <label class="control-label">Proveedor de Libro</label> <i class="fa fa-asterisk text-danger  " aria-hidden="true"></i>
                  <select id="select_Proveedor" class="form-control border border-dark  selectpicker" data-style="bg-transparent" data-live-search="true" name="ProveedorLibro" required title="Seleccione el provedor de libro">
                    <option disabled="" hidden="" selected=""> Seleccione un proveedor</option>
                    <?php for ($i = 0; $i < $CantProveedores; $i++) { ?>
                      <option value="<?php echo  $Proveedor[$i]['Proveedor_ID'] ?>"><?php echo $Proveedor[$i]['Proveedor_Nombre'] ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="col-2 ">

                    <button type="button" class="btn btn-sm btn-primary" title="Añadir Proveedor" data-bs-toggle="modal" data-bs-target="#ProveedoresModal"><i class="fa-solid fa-person"></i></i><i class="fa-solid fa-plus"></i></button>

                  </div>
                </div>
                <!-- Ubicacion Estanteria -->

                <div class="form-group">
                  <label class="control-label">Ubicación: Librero N°</label> <i class="fa fa-asterisk text-danger  " aria-hidden="true"></i><i class=" ms-3 fa-solid fa-circle-question " data-toggle="popover" data-img="./images/System/Librero.jfif" data-popover-title="Librero" title="Mueble con estantes para colocar libros" data-popover-content="Librero='Mueble con estantes para colocar libros'"></i>

                  <select class="form-control" name="Librero" title="Librero='Mueble con estantes para colocar libros'">
                    <option disabled="" hidden="" selected=""> Seleccione el número del Librero</option>
                    <?php for ($i = 1; $i <= $cantLibreros; $i++) { ?>
                      <option value="<?php echo $i ?>"><?php echo 'Librero N°: ' . $i ?></option>
                    <?php } ?>
                  </select>
                </div>
                <!-- Ubicacion Estante -->

                <div class="form-group">
                  <label class="control-label">Ubicación: Estante N°</label> <i class="fa fa-asterisk text-danger  " aria-hidden="true"></i><i class=" ms-4 fa-solid fa-circle-question " data-toggle="popover" data-img="./images/System/Estante.jfif" data-popover-title="Estante" data-popover-content="Estante='Cada una de las tablas dispuestas horizontalmente en un mueble o en la pared para colocar objetos sobre ellas.'" title="Estante"></i>
                  <select class="form-control" name="Estante" required title="Estante='Cada una de las tablas dispuestas horizontalmente en un mueble o en la pared para colocar objetos sobre ellas.'">
                    <option disabled="" hidden="" selected=""> Seleccione el número del Estante</option>
                    <?php for ($i = 1; $i <= $cantEstantes; $i++) { ?>
                      <option value="<?php echo  $i ?>"><?php echo 'Estante N°: ' . $i ?></option>
                    <?php } ?>

                  </select>
                </div>

                <input type="hidden" name="hidden_autor" id="hidden_autor">




                <div class="form-group">
                  <label class="control-label">Puedes subir una imagen de portada del libro</label>
                  <input type="file" class="form-control" id="archivo" name="archivo" accept="image/*">
                </div>

                <div class="tile-footer">
                  <!--Botones-->
                  <button class="btn btn-primary" type="submit" name="Registrar" value="Registrar"><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>&nbsp;&nbsp;&nbsp;



                  <a class="btn btn-warning" href="index.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
                </div>

              </div>

          </div>

          </form>
        </div>
      </div>

    </div>
    <?php require_once('./page/modals/RegistrarAutores/RegistrarAutores.php') ?>
    <?php require_once('./page/modals/RegistrarIdiomas/RegistrarIdiomas.php') ?>
    <?php require_once('./page/modals/RegistrarEditoriales/RegistrarEditoriales.php') ?>
    <?php require_once('./page/modals/RegistrarCategoriaLibros/RegistrarCategoriaLibros.php') ?>
    <?php require_once('./page/modals/RegistrarProveedor/RegistrarProveedor.php') ?>


  </main>
  <!-- Essential javascripts for application to work-->
  <?php require_once('./Inc/js/js.inc.php'); ?>
  <script>
    let tooltipTriggerList = Array.prototype.slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)


    })
  </script>

  <script src="./js/plugins/bootstrap-select.min.js"></script>
  <script src="./js/sweetalert2.all.js"></script>


  <script type="text/javascript" src="./js/plugins/jquery.validate.js"></script>


  <script type="text/javascript" src="./js/Personalizados/registrarLibros/registrarLibros.js"></script>

</body>

</html>