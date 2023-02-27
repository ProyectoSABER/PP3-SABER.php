<?php

require_once './Handler/HandlerBlack.php'

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
        <h1><i class="fa fa-dashboard"></i> Black</h1>
        <p>Panel de Pruebas</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
        <li class="breadcrumb-item"><a href="javascript:history.back()" class="btn "><i class="fa-solid fa-backward"></i> Volver Atrás</a></li>
        <li class="breadcrumb-item"><a href="javascript:history.back()" class="btn "><i class="fa-regular fa-backward"></i>Volver Atrás</a></li>
      </ul>
    </div>
    <div class="row">

      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">Black </h3>
          <p><?php print_r($_SESSION) ?></p>
          <p><?php echo $acceso ?></p>
          <p><?php echo $_SERVER['REQUEST_METHOD'] ?></p>
          <p> pruebas de Host</p>
          <p><?php echo $host ?></p>
          <p><?php echo $_SERVER['HTTP_HOST'] ?></p>
          <p> pruebas de $path INFo</p>
          <p><?php echo $path ?></p>
          <p><?php echo $_SERVER['PATH_INFO']
              ?></p>
          <p> pruebas de $filname</p>
          <p><?php echo $filname ?></p>
          <p><?php echo $_SERVER['SCRIPT_FILENAME'] ?></p>

          <p> pruebas de $self</p>
          <p><?php echo $self ?></p>
          <p><?php echo $_SERVER['PHP_SELF'] ?></p>

          <p> pruebas de $metodoPath()</p>
          <p><?php echo $metodoPath ?></p>
          <p><?php echo get_include_path();
              ?></p>
          <p> pruebas de $root()</p>
          <p><?php echo $root ?></p>
          <p><?php echo $_SERVER['DOCUMENT_ROOT'];
              ?></p>
          <p>
            Constantes Magicas php <br />
            <?php echo '__DIR__ =' . __DIR__ . '<br/>' ?>
            <?php echo '__FILE__ =' . __FILE__ . '<br/>' ?>
            <?php echo '__LINE__ =' . __LINE__ . '<br/>' ?>
            <?php echo '__CLASS__ =' . __CLASS__ . '<br/>' ?>
            <?php echo '__METHOD__ =' . __METHOD__ . '<br/>' ?>
            <?php echo '__FUNCTION__ =' . __FUNCTION__ . '<br/>' ?>
            <?php echo '__NAMESPACE__ =' . __NAMESPACE__ . '<br/>' ?>

          </p>

          <p>
            obtner el directorio padre actual <br />
            Conbinamos funciones basename(__DIR__) <br />


            <?php echo 'basename(__DIR__)=' . basename(__DIR__) . '<br/>' ?>
            <br />
            Conbinamos funciones dirname(__FILE__) <br />


            <?php echo 'dirname(__FILE__)=' . dirname(__FILE__) . '<br/>' ?>
            <br />

            Obtner el directorio base actual <br />
            Conbinamos funciones basename(__FILE__) <br />


            <?php echo 'basename(__DIR__)=' . basename(__FILE__) . '<br/>' ?>
            <?php echo '_RAIZ=' . defined(_RAIZ) . '<br/>' ?>
            <?php echo '_RAIZ=' . _RAIZ . '<br/>' ?>
            <?php echo 'RAIZ=' . $RAIZ . '<br/>' ?>
            <?php
            require_once('./dirs.php');


            echo 'ROOT_PATH=' . ROOT_PATH . '<br/>' ?>
            <?php echo '_RAIZ=' . _RAIZ . '<br/>' ?>




          </p>

          <!-- /Form -->
          <form id="form-Prueba">

            <div class="form-group">
              <label class="control-label">Seleccione un Mes para la cuota</label> <i class="fa fa-asterisk text-danger" aria-hidden="true"></i>
              <input id="InputMes" class="form-control " type="month" name="Mes" min="<?php echo $año = date("Y-m"); ?>" required>
            </div>
            <div class="col-md-4">
              <div class="input-group input-group-sm mb-2">
                <div class="form-floating  form-floating-sm flex-grow-1">
                  <select required name="Localidad" class="form-control" id="Localidad" title="Seleccione la Localidad de la direccion del proveedor">
                    <option selected disabled hidden value="-1">Seleccione una Localidad</option>
                  </select>
                  <label for="Localidad">Localidad:</label>
                </div>
                <button class="btn btn-outline-secondary"><i class="fas fa-plus"></i></button>

              </div>
            </div>
            <div class="form-floating  form-floating-lg flex-grow-1">
              <select required name="Localidad" class="form-control" id="Localidad" title="Seleccione la Localidad de la direccion del proveedor">
                <option selected disabled hidden value="-1">Seleccione una Localidad</option>
              </select>
              <label for="Localidad">Localidad:</label>
            </div>





          </form>
          <button type="submit" id="prueba" class="btn btn-success">iniciar Prueba</button>
          <div class="container mt-3">
            <?php require_once "./page/modals/RegistrarPago/RegistrarPago.php"?>
          </div>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>

    </div>





  </main>
  <!-- Essential javascripts for application to work-->
  <?php require_once('./Inc/js/js.inc.php'); ?>


  <script>
    $(document).ready(function() {

      $("#prueba").click(function(e) {
        e.preventDefault();
        data = $("#form-Prueba").serialize();
        console.log(data);
        console.log("Envio de Solicitud");
        $.ajax({
          type: "POST",
          url: "Handler/HandlerBlack.php",
          data,

          success: function(response) {
            console.log(response)
          }
        });
      })



    })
  </script>

</body>

</html>