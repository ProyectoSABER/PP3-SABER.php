<?php

require_once './Handler/cobro/HandlerCuotasAbonadasSocio.php'

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

        <p id="title">Listado de Cuotas Abonadas</p>

      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Listado</li>
        <li class="breadcrumb-item active"><a href="#">Listado de Cuotas Abonadas</a></li>
      </ul>
    </div>
    
    <div class="row">

      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">Total de cuotas abonadas: <?php echo $CantCuota ?? '' ?> </h3>

          <!-- Table -->
          <div class="row">
            <div class="table-responsive-md">
              <table id="t-TotalCuotas" class="table table-light">
                <thead>
                  <tr>
                    <th scope="col"># Cuota (Mes-Año)</th>


                    <th scope="col">Socio</th>
                    <th scope="col">Categoria Socio</th>

                    <th scope="col">Fecha Venc</th>
                    <th scope="col">Estado Venc</th>
                    <th scope="col">Estado Cuota</th>

                    <th scope="col">Fecha Pago</th>
                    <th scope="col">Bibliotecario</th>
                    <th scope="col">Cuota</th>
                    <th scope="col">Recargo</th>
                    <th scope="col">Total</th>
                    <th scope="col" class="no-print">Opciones</th>



                  </tr>
                </thead>
                <tbody>
                  <?php $total = 0;
                  if ($idUsuario) {
                    for ($i = 0; $i < $CantCuota; $i++) {

                  ?>
                      <tr class="">

                        <td scope="row"><?php echo convertir_fechaMesAnio($res[$i]["MesCuota"]) ?></td>


                        <td><?php echo $res[$i]["APELLIDOSOCIO"] . " " . $res[$i]['NOMBRESOCIO'] ?></td>
                        <td><?php echo $res[$i]["CatSocio"] ?></td>
                        <td><?php echo convertir_fecha($res[$i]["FVENC"]) ?></td>
                        <td><?php echo estadoCuota(convertir_fecha($res[$i]["FVENC"]), convertir_fecha($res[$i]["FCOBRO"])) ?></td>

                        <td><?php echo $res[$i]["ESTADOCOBRO"] ?></td>
                        <td><?php echo convertir_fecha($res[$i]["FCOBRO"]) ?></td>
                        <td><?php echo $res[$i]["APELLIDOBIBLIOTECARIO"] . ' ' . $res[$i]["NOMBREBIBLIOTECARIO"] ?></td>
                        <td>$<?php echo $res[$i]["VCUOTA"] ?></td>
                        <td>$<?php echo $res[$i]["RECARGO"] ?></td>

                        <td class="table-info">$<?php echo $subtotal = $res[$i]["VCUOTA"] + $res[$i]["RECARGO"]; ?></td>
                        <td><a class="btn btn-outline-light" role="button" onClick="imprimirComprobante(<?php echo $res[$i]["idDetalleCuota"] ?>)"><i class="fas fa-file-pdf"></i></a></td>
                      </tr>
                  <?php
                      $total += $subtotal;
                    }
                  } ?>

                </tbody>
                <tfoot>
                  <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                  </tr>
                </tfoot>
              </table>
            </div>

          </div>
        </div>
      </div>
      <div class="clearfix"></div>

    </div>
  </main>
  <!-- Essential javascripts for application to work-->
  <?php require_once('./Inc/js/js.inc.php'); ?>
  <script type="text/javascript" src="./assets/plugins/DataTables/datatables.js"></script>

  <!-- Essential javascripts for application to Export pdf-->
  <script src="assets/plugins/DataTables/DataTables-1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="assets/plugins/DataTables/Buttons-2.2.3/js/dataTables.buttons.min.js"></script>
  <script src="assets/plugins/DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
  <script src="assets/plugins/DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
  <script src="assets/plugins/DataTables/Buttons-2.2.3/js/buttons.html5.min.js"></script>
  <script src="assets/plugins/DataTables/Api/sum/js/sum().js"></script>
  <script src="js/Personalizados/Cobro/ListadoTodosCobros.js"></script>


</body>

</html>