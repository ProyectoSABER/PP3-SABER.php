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
      <h3 class="tile-title">Registrar Cobro</h3>
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
                        <p class="h5 ml-md-5">Seleccione las cuotas a cobrar</p>
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
                                <th scope="col">$ Cuota</th>
                                <th scope="col">Fecha Venc</th>
                                <th scope="col">Estado Venc</th>
                                <th scope="col">Seleccionar</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr class="">
                                
                              </tr>

                            </tbody>
                          </table>
                        </div>

                      </div>
                      <div class="d-flex justify-content-center">
                      <button type="button" class="btn btn-md btn-success" id="ConfirmarCuotas">Confirmar</button>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
              <!-- Accordion #3 -->
              <div class="accordion-item ">
                <h2 class="accordion-header" id="flush-headingThree">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#acordion3" aria-expanded="false" aria-controls="flush-collapseThree">
                    <p class="h5">Registrar de Cobro</p>
                  </button>
                </h2>
                <!-- Container Accordion #2 -->
                <div id="acordion3" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                  <div class="accordion-body">
                    <!-- Body Acordion -->
                    <div class="container-md-12">
                      <div class="row">
                        <p class="h6" id="detFact-fecha">Fecha:</p>
                      </div>
                      <div class="row">

                        <div class="col">
                          <div class="row">
                            <p class="h6" id="detFact-nSocio">N° Socio:</p>
                          </div>
                          <div class="row">
                            <p class="h6" id="detFact-nomApellSocio">Nombre y Apellido Socio:</p>
                          </div>

                        </div>
                        <div class="col">
                          <div class="row">
                            <p class="h6" id="detFact-tipoSocio">Tipo Socio:</p>

                          </div>
                          <div class="row">
                            <p class="h6" id="detFact-dniSocio">DNI Socio:</p>
                          </div>
                        </div>
                        <div class="col">
                          <div class="row">
                            <p class="h6" id="detFact-idBibliotecario">Id Bibliotecario:</p>
                          </div>
                          <div class="row">
                            <p class="h6" id="detFact-nomApellBibliotecario">Nombre y Apellido Bibliotecario:</p>
                          </div>

                        </div>



                        

                      </div>
                      <div class="row mt-4">
                        <div class="row "><p class="h5">Detalle de cuota</p></div>
                        <div class="table-responsive-md mt-1">
                          <table class="table   table-bordered" id="t-cobro">
                            <thead class="table-light">
                              <tr>
                                <th scope="col">Mes-Año</th>
                                <th scope="col">fecha Venc</th>
                                <th scope="col">Estado Venc</th>
                                <th scope="col">$ Cuota</th>
                                <th scope="col">Recargo</th>
                                <th scope="col" class="table-info">Sub Total</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr class="">
                                <td scope="row">R1C1</td>
                                <td>R1C2</td>
                                <td>R1C3</td>
                                <td>R1C3</td>
                                <td>R1C3</td>
                                <td class="table-info">R1C3</td>
                              </tr>
                              <tr class="">
                                <td scope="row">Item</td>
                                <td>Item</td>
                                <td>Item</td>
                                <td>Item</td>
                                <td>Item</td>
                                <td class="table-info">Item</td>
                              </tr>
                              <tr class="">
                                <td scope="row" colspan="4" class="table-light"></td>
                                
                                <td class="table-success">Total</td>
                                <td class="table-success">$</td>
                              </tr>
                              
                            </tbody>
                          </table>
                        </div>
                        <div class="d-flex justify-content-center">
                      <button type="button" class="btn btn-md btn-warning" id="CobrarCuotas">Cobrar Cuota</button>
                      </div>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
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
  <script type="text/javascript" src="./js/Personalizados/Cobro/registrarCobro.js"></script>


</body>

</html>