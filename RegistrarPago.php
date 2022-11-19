<?php

require_once './Handler/HandlerListadoLibros.php'

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
        <h1><i class="fa fa-th-list"></i> BLANK</h1>

        <p>PARRAFO</p>

      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home fa-lg"></i></a></li>
        <li class="breadcrumb-item active"><a href="#">Pagos</a></li>
        <li class="breadcrumb-item active"><a href="#">Registrar Pago</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="dropdown">
          <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            Enlace Dropdown
          </a>

          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href="#">Acción</a></li>
            <li><a class="dropdown-item" href="#">Otra acción</a></li>
            <li><a class="dropdown-item" href="#">Algo más aqui</a></li>
          </ul>
        </div>
        <!-- Example single danger button -->
<div class="btn-group">
  <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
    Acción
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="#">Acción</a></li>
    <li><a class="dropdown-item" href="#">Otra acción</a></li>
    <li><a class="dropdown-item" href="#">Algo más aqui</a></li>
    <li><hr class="dropdown-divider"></li>
    <li><a class="dropdown-item" href="#">Enlace separado</a></li>
  </ul>
</div>
        <!-- .panel-body -->
      </div>
      <!-- /.panel -->
    </div>
    </div>
  </main>
  <!-- Essential javascripts for application to work-->
  <?php require_once('./Inc/js/js.inc.php'); ?>

</body>

</html>