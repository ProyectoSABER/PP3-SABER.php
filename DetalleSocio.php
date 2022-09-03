<?php

require_once './Handler/socios/HandlerDetalleSocio.php'

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

        <p>Listado de Socios</p>

      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Listado</li>
        <li class="breadcrumb-item active"><a href="#">Detalle de Socio</a></li>
      </ul>
    </div>
    <div class="row">

      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">ID Socio <?php echo $Socio["SOCIO_ID"] ?> </h3>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>

                  <th>DNI</th>

                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Categoria</th>
                  <th>Cuota</th>
                  <th>EstadoSocio</th>
                  <th>Fecha Alta</th>
                  <th>Usuario</th>
                  <th>OPCIONES</th>


                </tr>
              </thead>
              <tbody>




                <tr class='table-info'>

                  <td><?php echo $Socio['SOCIO_DNI'] ?></td>

                  <td><?php echo $Socio['SOCIO_NOMBRE'] ?></td>
                  <td><?php echo $Socio['SOCIO_APELLIDO'] ?></td>
                  <td><?php echo $Socio['SOCIO_CATEGORIA'] ?></td>
                  <td><?php echo $Socio['SOCIO_CUOTA'] ?></td>
                  <td><?php echo $Socio['SOCIO_ESTADOSOCIO'] ?></td>
                  <td><?php echo convertir_fecha($Socio['SOCIO_FECHAALTA']) ?></td>
                  <td><?php echo $PERSONA['USUARIO'] ?></td>
                  <td><a href="#">Ver detalles...</a></td>
                </tr>



              </tbody>
            </table>
          </div>
        </div>

      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Dirección De Socio</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <table class="table table-sm">
              <thead>
                <tr>

                  <th>Calle</th>
                  <th>Altura Calle</th>
                  <th>Barrio</th>
                  <th>Localidad</th>
                  <th>Provincia</th>
                </tr>
              </thead>
              <tbody>
                <tr>

                  <td><?php echo $PERSONA['CALLE'] ?></td>
                  <td><?php echo $PERSONA['ALTURACALLE'] ?></td>
                  <td><?php echo $PERSONA['BARRIO'] ?></td>
                  <td><?php echo $PERSONA['LOCALIDAD'] ?></td>
                  <td><?php echo $PERSONA['PROVINCIA'] ?></td>

                </tr>

              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Contacto De Socio</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <table class="table table-sm">
              <thead>
                <tr>

                  <th>Calle</th>
                  <th>Altura Calle</th>
                  <th>Barrio</th>
                  <th>Localidad</th>
                  <th>Provincia</th>
                </tr>
              </thead>
              <tbody>
                <tr>

                  <td><?php echo $PERSONA['CALLE'] ?></td>
                  <td><?php echo $PERSONA['ALTURACALLE'] ?></td>
                  <td><?php echo $PERSONA['BARRIO'] ?></td>
                  <td><?php echo $PERSONA['LOCALIDAD'] ?></td>
                  <td><?php echo $PERSONA['PROVINCIA'] ?></td>

                </tr>

              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
      </div>

      <div class="clearfix"></div>


    </div>
  </main>
  <!-- Essential javascripts for application to work-->
  <?php require_once('./Inc/js/js.inc.php'); ?>

</body>

</html>