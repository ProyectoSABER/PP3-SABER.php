<?php

require_once './Handler/cobro/HandlerCuotasNoAbonadas.php'

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

        <p id="title">Listado de Cuotas No Abonadas</p>

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
          <h3 class="tile-title">Total de cuotas no Abonadas: <?php echo $CantCuota ?? '' ?> </h3>
          <!-- Table -->
          <div class="row">
            <div class="table-responsive-md">
              <table id="t-TotalCuotas" class="table table-light">
                <thead>
                  <tr>
                    <th scope="col"># Cuota</th>
                    <th scope="col">Socio</th>
                    <th scope="col">Categoria Socio</th>
                    
                    <th scope="col">Domicilio</th>
                    <th scope="col">Localidad</th>
                    <th scope="col">Fecha Venc</th>
                    <th scope="col">Estado Venc</th>
                    <th scope="col">Estado Cuota</th>

                    <th scope="col">Cuota</th>

                    <th class="no-print">opciones</th>
                    



                  </tr>
                </thead>
                <tbody>
                  <?php
                  for ($i = 0; $i < $CantCuota; $i++) {

                  ?>
                    <tr class="">

                      <td scope="row"><?php echo convertir_fechaMesAnio($res[$i]["detalleCuota"]["MESANIOCUOTA"]) ?></td>


                      <td><?php echo $res[$i]["detalleSocio"]["APELLIDO"] . " " . $res[$i]['detalleSocio']['NOMBRE'] ?></td>
                      <td><?php echo $res[$i]["detalleSocio"]["CATEGORIA"] ?></td>
                      
                      <td><?php echo $res[$i]['detalleSocio']['CALLE'].$res[$i]['detalleSocio']['ALT']??'S/N' ?></td>
                      <td><?php echo $res[$i]['detalleSocio']['LOCALIDAD']?></td>
                      <td><?php echo convertir_fecha($res[$i]["detalleCuota"]["FECHAVENCIMIENTO"]) ?></td>
                      <td><?php echo estadoCuota(date('d/m/y'),convertir_fecha($res[$i]["detalleCuota"]["FECHAVENCIMIENTO"])) ; ?></td>

                      <td><?php echo $res[$i]["detalleCuota"]["ESTADOCOBROCUOTA"]??"SIN PAGAR" ?></td>
                      <td>$<?php echo $res[$i]["detalleCuota"]["VALORCUOTA"] ?></td>
                      <td>
                      
                      <a class="btn btn-info btn-sm" role="button" href="DetalleSocio.php?SOCIO_ID=<?php echo $res[$i]['detalleSocio']['ID']?>" ><i class="app-menu__icon fa fa-address-card" aria-hidden="true"></i>Contacto</a></td>
                    </tr>
                  <?php
                    
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
  <script src="js/Personalizados/Cobro/ListadoCuotasVencidasSinAbonar.js"></script>


</body>

</html>