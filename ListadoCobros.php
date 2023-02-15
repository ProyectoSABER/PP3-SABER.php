<?php

require_once './Handler/Cobro/HandlerRegistrarCobro.php'

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
        <h1><i class="fa fa-th-list"></i> Cobro</h1>

        <p>Cobro Cuotas Sociales</p>

      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home fa-lg"></i></a></li>
        <li class="breadcrumb-item active"><a href="#">Pagos</a></li>
        <li class="breadcrumb-item active"><a href="#">Registrar Pago</a></li>
      </ul>
    </div>
    <div class="tile">
      <h3 class="tile-title">Listado Cuotas Pagas</h3>
      <!-- Mensaje de campo obligatorios -->
      <div class="bs-component">
        <div class="alert alert-dismissible alert-info">
          <strong>Los campos con <i class="fa fa-asterisk text-danger" aria-hidden="true"></i> son obligatorios</strong>
        </div>
      </div>
      <!-- Body -->
      <div class="tile-body">
        <div class="row">
          <div class="col-md-12">

            <div class="accordion accordion-flush" id="accordionFlushExample">
              <!-- Accordion #1 -->
              <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#acordion1" aria-expanded="false" aria-controls="flush-collapseOne ">
                    <p class="h5">Buscar Socio</p>

                  </button>
                </h2>
                <!-- Container Accordion #1 -->
                <div id="acordion1" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                  <!-- Body Acordion -->
                  <div class="accordion-body">
                    <!-- Elements in Body Acordion -->
                    <div class="container d-flex">
                      <div class="col-md-4">
                        <label class="control-label h5">Buscar Socio por </label> <i class="fa fa-asterisk text-danger" aria-hidden="true"></i>

                      </div>
                      <!-- RadiosCheckBox -->
                      <div class="btn-group ml-2  " data-bs-toggle="buttons" id="container_RadioCheck1">
                        <label class="btn btn-primary ">
                          <input type="radio" class="me-2" name="buscarSocio" id="dni-socio" value="DNI" autocomplete="off"> DNI
                        </label>
                        <label class="btn btn-primary">
                          <input type="radio" name="buscarSocio" id="N°-socio" value="N°SOCIO" autocomplete="off"> N° de Socio
                        </label>
                        <label class="btn btn-primary">
                          <input type="radio" name="buscarSocio" id="Nombre y apellido" value="NOMBREAPELLIDO" autocomplete="off"> Nombre Apellido
                        </label>
                      </div>
                    </div>
                    <!-- input -->
                    <div class="container d-md-flex justify-content-md-center">
                      <div class="input-group col-xxl-12 col-lg-8 col-md-6  ">
                        <input id="search-input" type="search" class="form-control " placeholder="Buscar Socio" aria-label="Buscar Socio" aria-describedby="button-addon2" autocomplete="off">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fa fa-search" aria-hidden="true"></i></button>
                      </div>
                    </div>
                    <!-- //hidden=true -->
                    <div class="container-md-12" id="Resultados">
                      <p class="h5 d-flex justify-content-center mt-3">Seleccione un resultado <i class="fa fa-asterisk text-danger" aria-hidden="true"></i>

                      </p>
                      <p class="h6 d-flex justify-content-center mt-2">(DobleClick sobre el resultado para Confirmar)</p>
                      <!-- Table Socios -->
                      <div class="table-responsive-md">
                        <table id="table-Socios" class="table ">
                          <caption>Coincidencias de búsqueda</caption>
                          <thead>
                            <tr>
                            <tr>
                              <th scope="col"># Id Socio</th>
                              <th scope="col">DNI</th>
                              <th scope="col">Nombre</th>
                              <th scope="col">Apellido</th>
                              <th scope="col">Tipo Socio</th>
                              <th scope="col">Estado Cuenta</th>
                            </tr>
                          </thead>

                          </thead>
                          <tbody>
                          
                          </tbody>
                        </table>
                      </div>

                    </div>


                  </div>
                </div>
              </div>

              <!-- Accordion #2 -->
              <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwo">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#acordion2" aria-expanded="false" aria-controls="flush-collapseTwo">
                    <p class="h5">Cuota</p>
                  </button>
                </h2>
                <!-- Container Accordion #2 -->
                <div id="acordion2" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                  <div class="accordion-body">
                    <div class="container-md-12">

                      <div class="row d-flex">
                        
                        <!-- <p class="h6 d-flex justify-content-center mt-2">(DobleClick sobre el resultado para Confirmar)</p> -->
                        </p>
                      </div>
                      <!-- Table -->
                      <div class="row">
                        <div class="table-responsive-md">
                          <table id="t-Cuota" class="table table-warning">
                            <thead>
                              <tr>
                                <th scope="col"># Cuota</th>
                                <th scope="col">Mes-Año</th>
                                <th scope="col">Tipo Cuota</th>
                                <th scope="col">Fecha Venc</th>
                                <th scope="col">Estado Venc</th>
                                <th scope="col">Estado Cuota</th>
                                <th scope="col">Fecha Pago</th>
                                <th scope="col">$ Cuota</th>
                                <th scope="col">$ Recargo</th>
                                <th scope="col">$ Total</th>
                                <th scope="col" class="no-print">Opciones</th>
                                
                                
                              </tr>
                            </thead>
                            <tbody>
                              <tr class="">
                                
                              </tr>

                            </tbody>
                          </table>
                        </div>

                      </div>
                     

                    </div>
                  </div>
                </div>
              </div>
              <!-- Accordion #3 -->
              
            </div>
            <!-- /panel-body -->
          </div>
          <!-- /.panel -->
        </div>
      </div>
    </div>

  </main>
  <!-- Essential javascripts for application to work-->
  <?php require_once('./Inc/js/js.inc.php'); ?>
  <script src="./assets/plugins/DataTables/DataTables-1.12.1/js/jquery.dataTables.min.js"></script>
<script src="./assets/plugins/DataTables/Buttons-2.2.3/js/dataTables.buttons.min.js"></script>
<script src="./assets/plugins/DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
<script src="./assets/plugins/DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
<script src="./assets/plugins/DataTables/Buttons-2.2.3/js/buttons.html5.min.js"></script>
  <script type="text/javascript" src="./js/Personalizados/Cobro/ListadoCobro.js"></script>


</body>

</html>