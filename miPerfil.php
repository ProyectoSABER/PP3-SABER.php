<?php
require_once('./Handler/Usuario/HandlerMiPerfil.php');

require_once('./Inc/menus/head.inc.php');



?>

<body class="app sidebar-mini sidenav-toggled">
  <!-- Navbar-->
  <?php require_once('./Inc/menus/navbar.inc.php'); ?>
  <!-- Sidebar menu-->
  <?php require_once('./Inc/menus/sidebar.inc.php'); ?>
  <!-- fin Sidebar menu-->
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-th-list"></i>Perfil</h1>

        <p>Configurar mi Perfil</p>


      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Perfil</li>
        <li class="breadcrumb-item active"><a href="#">Mi Perfil</a></li>
      </ul>
    </div>
    <!-- /nav -->
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">

          </div>
          <!-- .panel-heading -->
          <div class="panel-body">
            <section class="content">
              <div class="container-fluid">
                <div id="div_flex" class="row justify-content-center">

                  <div class="col-md-3 ">
                    <!-- Profile card menu -->
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                      <div class="card-body box-profile">
                        <div class="text-center">
                          <img class="profile-user-img img-fluid img-circle" src="<?php echo (!empty($_SESSION['USUARIO_Foto'])) ? $_SESSION['USUARIO_Foto']  : 'Profile_avatar.png';  ?>" alt="<?php echo $_SESSION['USUARIO_NOMBRE'] . $_SESSION['USUARIO_APELLIDO'] ?>">
                        </div>

                        <h3 class="profile-username text-center"><?php echo $_SESSION['USUARIO_NOMBRE'] . " " . $_SESSION['USUARIO_APELLIDO'] ?></h3>

                        <p class="text-muted text-center"><?php echo $_SESSION['USUARIO_NOMTIPOUSUARIO'] ?></p>





                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title">Acerca de Mi</h3>
                      </div>
                      <!-- /.card-header -->

                      <div class="card-body">
                        <?php if (isset($_SESSION['USUARIO_EDUCACION'])) { ?>
                          <strong><i class="fas fa-book mr-1"></i> Education</strong>

                          <p class="text-muted">
                            <?php echo $_SESSION['USUARIO_EDUCACION'] ?>

                          </p>

                          <hr>
                        <?php } ?>
                        <?php if (isset($_SESSION['USUARIO_LOCALIDAD'])) { ?>
                          <strong><i class="fas fa-map-marker-alt mr-1"></i> Domicilio</strong>

                          <p class="text-muted"><?php echo $_SESSION['USUARIO_LOCALIDAD'] ?>, <?php echo $_SESSION['USUARIO_PROVINCIA'] ?></p>
                          <p class="text-muted">Calle: <?php echo $_SESSION['USUARIO_CALLE'] . " " ?> N° <?php echo $_SESSION['USUARIO_ALTURACALLE'] ?></p>
                          <p class="text-muted">Barrio: <?php echo $_SESSION['USUARIO_BARRIO'] ?></p>


                          <hr>
                        <?php } ?>

                        <strong><i class="fas fa-pencil-alt mr-1"></i> Mis Datos</strong>

                        <p class="text-muted">


                        <p class="text-muted ">Email: <?php echo $_SESSION['USUARIO_EMAIL'] ?></p>
                        <p class="text-muted ">DNI: <?php echo $_SESSION['USUARIO_DNI'] ?></p>
                        <p class="text-muted ">Contacto <?php echo $_SESSION['USUARIO_DNI'] ?></p>



                        </p>

                        <hr>
                        <ul class="nav nav-pills">

                          <li class="nav-item"><a class="nav-link active" href="#menu-settings" data-bs-toggle="collapse">Editar Mis Datos</a></li>

                        </ul>

                        <?php if (isset($_SESSION['USUARIO_NOTA'])) { ?>
                          <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                          <p class="text-muted"><?php echo $_SESSION['USUARIO_NOTA'] ?></p>

                        <?php } ?>

                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                  </div>
                  <!-- /.col -->

                  <!-- Menu Activity timeline Setting -->
                  <div class="col-md-9 collapse" id="menu-settings">
                    <div class="card">
                      <!-- Card-Header -->
                      <div class="card-header p-2">
                        <ul class="nav nav-pills btn-group">

                          <li class="nav-item"><a class="btn  nav-link active" href="#settings" data-bs-toggle="tab">Editar Mis Datos</a></li>
                          <li class="nav-item"><a class="btn  nav-link" href="#editar_Foto" data-bs-toggle="tab">Editar Mi Foto</a></li>
                          <li class="nav-item"><a class="btn  nav-link" href="#editar_clave" data-bs-toggle="tab">Editar Mi Clave</a></li>
                        </ul>
                      </div><!-- /.card-header -->

                      <div class="card-body ">
                        <div class="tab-content">
                          <!-- setting -->
                          <div class="tab-pane active" id="settings">
                            <form id="form_NewMyInfo" class="form-horizontal" method="post">
                              <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Nombre</label>
                                <div class="col-sm-10">
                                  <input type="text" required class="form-control" id="inputName" name="name" placeholder="Nombre" value="<?php echo $_SESSION["USUARIO_NOMBRE"] ?>">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Apellido</label>
                                <div class="col-sm-10">
                                  <input type="text" required class="form-control" id="inputlastName" name="lastname" placeholder="Apellido" value="<?php echo $_SESSION["USUARIO_APELLIDO"] ?>">
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="inputExperience" class="col-sm-2 col-form-label">Nota</label>
                                <div class="col-sm-10">
                                  <textarea class="form-control" id="inputNote" placeholder="Proximamente" <?php
                                                                                                            if (isset($_SESSION["USUARIO_NOTA"])) {
                                                                                                              echo 'value=' . $_SESSION["USUARIO_NOTA"];
                                                                                                            } ?> disabled> </textarea>
                                </div>
                              </div>


                              <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                  <button type="submit" name="datosPersonales" class="btn btn-danger">Guardar</button>
                                </div>
                              </div>
                            </form>
                          </div>
                          <!-- /.tab-pane -->
                          <!-- .tab-pane editar_Foto-->
                          <div class="tab-pane" id="editar_Foto">
                            <form id="form_NewImg" class="form-horizontal" enctype="multipart/form-data" method="post">
                              <div class="form-group row">
                                <label for="archivo" class="col-sm-2 col-form-label">Imagen usuario</label>
                                <div class="col-sm-5">
                                  <input type="file" class="form-control" id="archivo" name="archivo" accept="image/*">
                                </div>
                              </div>
                              <div class="form-group row justify-content-center">
                                <div class="col-sm-10">
                                  <img id="imagenPrevisualizacion" width="300"  height="280">
                                </div>
                              </div>
                              <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                  <button type="submit" name="file" class="btn btn-danger">Guardar</button>
                                </div>
                              </div>
                            </form>
                          </div>
                          <!-- /.tab-pane editar_Foto -->
                          <!-- .tab-pane editar_clave -->
                          <div class="tab-pane" id="editar_clave">
                            <form class="form-horizontal" id="form_NewPassword" method="post">

                              <div class="form-group row">
                                <label for="emailActual" class="col-sm-2 col-form-label">Email Actual</label>
                                <div class="col-sm-10">
                                  <input type="email" required name="emailActual" class="form-control" id="emailActual" placeholder="Email Actual">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="claveActual" class="col-sm-2 col-form-label">Clave Actual</label>
                                <div class="col-sm-10">
                                  <input type="password" required name="claveActual" class="form-control" id="claveActual" placeholder="Clave Actual">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="nuevaClave" class="col-sm-2 col-form-label">Nueva Clave</label>
                                <div class="col-sm-10">
                                  <input type="password" required name="nuevaClave" class="form-control" id="nuevaClave" placeholder="Nueva Clave">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="confirmClave" class="col-sm-2 col-form-label">Reingrese la Clave</label>
                                <div class="col-sm-10">
                                  <input type="password" required class="form-control" name="confirmClave" id="confirmClave" placeholder="Reingrese la Clave">
                                </div>
                              </div>
                              <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                  <button type="submit" name="clave" class="btn btn-danger">Guardar</button>
                                </div>
                              </div>
                            </form>
                          </div>





                        </div>
                        <!-- /.tab-pane editar_clave-->
                      </div>
                      <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
          </div><!-- /.container-fluid -->
          </section>
        </div>
        <!-- .panel-body -->
      </div>
      <!-- /.panel -->
    </div>
    </div>
  </main>
  <!-- Essential javascripts for application to work-->
  <?php require_once('./Inc/js/js.inc.php'); ?>
  <script type="text/javascript" src="js/plugins/jquery.validate.js"></script>
  <script>
    $(function() {

      $.validator.addMethod("passwordcheck", function(value) {
        return /^[a-zA-Z0-9!@#$%^&()=[\]{};':"\|,.<>\/?+-]+$/.test(value) &&
          /[a-z]/.test(value) // has a lowercase letter 
          &&
          /\d/.test(value) //has a digit 
          &&
          /[!@#$%^&()=[\]{};':"\|,.<>\/?+-]/.test(value) // has a special character
      }, "La contraseña debe contener de 8 a 15 carácteres alfanuméricos (a-z A-Z), contener mínimo un dígito (0-9) y un carácter especial (_-=).");

      $("#form_NewPassword").validate({
        rules: {
          emailActual: {
            required: true,
            email: true
          },
          claveActual: {
            required: true,
          },
          nuevaClave: {
            required: true,
            minlength: 8,
            maxlength: 15,
            passwordcheck: true
          },
          confirmClave: {
            required: true,
            equalTo: "#nuevaClave",
            passwordcheck: true
          }
        },
        messages: {
          emailActual: {
            required: "Campo Obligatorio",
            email: "proporcione un email valido"
          },
          claveActual: {
            required: "Campo Obligatorio"
          },
          nuevaClave: {
            required: "Campo Obligatorio",
            minlength: "Formato contraseña incorrecto."
          },
          confirmClave: {
            required: "Campo Obligatorio",
            minlength: "Formato contraseña incorrecto.",
            equalTo: "Las contraseñas no coinciden"
          }
        },
        errorLabelContainer: "dt",
        wrapper: "dd"
      });
    });
  </script>
  <script>

    // Obtener referencia al input y a la imagen

    const $seleccionArchivos = document.querySelector("#archivo"),
      $imagenPrevisualizacion = document.querySelector("#imagenPrevisualizacion");

    // Escuchar cuando cambie
    $seleccionArchivos.addEventListener("change", () => {
      // Los archivos seleccionados, pueden ser muchos o uno
      const archivos = $seleccionArchivos.files;
      // Si no hay archivos salimos de la función y quitamos la imagen
      if (!archivos || !archivos.length) {
        $imagenPrevisualizacion.src = "";
        return;
      }
      // Ahora tomamos el primer archivo, el cual vamos a previsualizar
      const primerArchivo = archivos[0];
      // Lo convertimos a un objeto de tipo objectURL
      const objectURL = URL.createObjectURL(primerArchivo);
      // Y a la fuente de la imagen le ponemos el objectURL
      $imagenPrevisualizacion.src = objectURL;
    });


  </script>



  <?php if (isset($msgError)) {
    echo '<script>
function mostrarMsgError(array) {
  array.forEach((msg) => {
    toastr["error"](`${msg}`, "Atención!!");
  });

  toastr.options = {
    closeButton: true,
    debug: false,
    newestOnTop: false,
    progressBar: true,
    positionClass: "toast-top-right",
    preventDuplicates: false,
    onclick: null,
    showDuration: "300",
    hideDuration: "0",
    timeOut: 10000,
    extendedTimeOut: 3000,
    showEasing: "swing",
    hideEasing: "linear",
    showMethod: "fadeIn",
    hideMethod: "fadeOut",
    tapToDismiss: false,
  };
}
mostrarMsgError(["' . $msgError . '"])</script>';
  } ?>


  <?php if (isset($msgExito)) {
    echo '<script>function mostrarMsgExito(array) {
    array.forEach((msg) => {
      toastr["success"](`${msg}`, "Atención!!");
    });
  
    toastr.options = {
      closeButton: true,
      debug: false,
      newestOnTop: false,
      progressBar: true,
      positionClass: "toast-top-right",
      preventDuplicates: false,
      onclick: null,
      showDuration: "300",
      hideDuration: "3000",
      timeOut: 3000,
      extendedTimeOut: 1000,
      showEasing: "swing",
      hideEasing: "linear",
      showMethod: "fadeIn",
      hideMethod: "fadeOut",
      tapToDismiss: false,
    };
  }
  mostrarMsgExito(["' . $msgExito . '"])</script>';
  } ?>



</body>

</html>