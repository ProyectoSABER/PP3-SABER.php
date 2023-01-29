<?php

require_once './Handler/socios/HandlerListadoSocios.php'

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
        <h1><i class="fa fa-th-list"></i> Listados</h1>

        <p id="title">Listado de Socios</p>

      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Listado</li>
        <li class="breadcrumb-item active"><a href="#">Listado de Libros</a></li>
      </ul>
    </div>
    <div class="row">

      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">Total de SOCIOS <?php echo $CantSocio ?> </h3>
          <div class="table-responsive">
            <table class="table" id="tabla-Socios">
              <thead>
                <tr>
                  <th>#</th>
                  <th>DNI</th>
                  <th>ID Socio</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Categoria</th>
                  <th>Cuota</th>
                  <th>EstadoSocio</th>
                  <th>Fecha Alta</th>
                  <th class="no-print">Opciones</th>



                </tr>
              </thead>
              <tbody>
                <?php for ($i = 0; $i < $CantSocio; $i++) { ?>



                  <tr class=<?php echo ($i % 2 == 0) ?  'table-info' : ''; ?>>
                    <td><?php echo $i+1 ?></td>
                    <td><?php echo $Socio[$i]['SOCIO_DNI'] ?></td>
                    <td><?php echo $Socio[$i]['SOCIO_ID'] ?></td>
                    <td><?php echo $Socio[$i]['SOCIO_NOMBRE'] ?></td>
                    <td><?php echo $Socio[$i]['SOCIO_APELLIDO'] ?></td>
                    <td><?php echo $Socio[$i]['SOCIO_CATEGORIA'] ?></td>
                    <td><?php echo $Socio[$i]['SOCIO_CUOTA'] ?></td>
                    <td><?php echo $Socio[$i]['SOCIO_ESTADOSOCIO'] ?></td>
                    <td><?php echo convertir_fecha($Socio[$i]['SOCIO_FECHAALTA']) ?></td>
                    <td><a  class="btn btn-md btn-info" href="./DetalleSocio.php?SOCIO_ID=<?php echo $Socio[$i]['SOCIO_ID'] ?>"><i class="fa fa-search"></i> Detalle</a>&nbsp;&nbsp;
                      
                    </td>
                  </tr>
                <?php } ?>
                <!-- Idea! Obtner todos los datos de la fila que se presiono Ver Detalles para pasarselo al modal -->


              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
      <!-- <?php require_once("./page/modals/ListadoLibros/ModalDetalleLibros.php") ?>

    </div>

  </main>
  <!-- Essential javascripts for application to work-->
  <?php require_once('./Inc/js/js.inc.php'); ?>
  <!-- DataTable -->
  <script type="text/javascript" src="./assets/plugins/DataTables/datatables.js"></script>
  <!-- Essential javascripts for application to Export pdf-->
  <?php require_once('./Inc/js/jsTableToExport.inc.php'); ?>

  

</body>

</html>