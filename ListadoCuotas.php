<?php

require_once './Handler/cuotas/HandlerListadoCuotas.php';

?>

<body class="app sidebar-mini pace-done ">
  <!-- Navbar-->
  <?php require_once('./Inc/menus/navbar.inc.php'); ?>
  <!-- Sidebar menu-->
  <?php require_once('./Inc/menus/sidebar.inc.php'); ?>
  <!-- fin Sidebar menu-->
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-th-list"></i> Listados</h1>

        <p>Listado de Cuotas</p>

      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Listado</li>
        <li class="breadcrumb-item active"><a href="#">Listado de Cuotas</a></li>
      </ul>
    </div>
    <div class="row">

      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">Total de Cuotas <?php echo $CantCuota ?> </h3>
          <div class="table-responsive">
            <table class="table" id="tabla-Socios">
              <thead>
                <tr>
                  <th>#</th>
                  <th>ID Cuota</th>
                  <th>Mes-Año</th>
                  <th>Tipo Socio</th>
                  <th>$ Valor Cuota</th>
                  <th>Fecha Vencimiento</th>
                  <th>OPCIONES</th>


                </tr>
              </thead>
              <tbody>


              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- <div class="clearfix"></div> -->
      <?php require_once("./page/modals/RegistrarCuotas/ModalEliminarCuota.php") ?>

    </div>

  </main>
  <!-- Essential javascripts for application to work-->
  <?php require_once('./Inc/js/js.inc.php'); ?>
  <!-- DataTable -->
  <script type="text/javascript" src="./assets/plugins/DataTables/datatables.js"></script>
  <script src="js/Personalizados/Cuotas/listadoCuotas.js"></script>
  <script>
    init();

    function init() {
      getData();
    }

    function getData() {
      $('#tabla-Socios').DataTable({
        scrollY: 400
      });
    }
  </script>

</body>

</html>