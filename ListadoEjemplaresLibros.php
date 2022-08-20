<?php

require_once './Handler/HandlerListadoEjemplaresLibros.php'

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
       
        <p>Listado de Ejemplares de Libros</p>

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
          <h3 class="tile-title">Total de Libros <?php echo $CantEjLibros?> </h3>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>ISBN</th>
                  <th>ID Institucional</th>
                  <th>Título</th>                  
                  <th>Estado</th>                  
                  <th>Opciones</th>

                </tr>
              </thead>
              <tbody>
                <?php for ($i = 0; $i < $CantEjLibros; $i++) { ?>

                    
                
                  <tr class=<?php echo ($i%2==0)?  'table-info' : '';?>>
                    <td><?php echo $i ?></td>
                    <td><?php echo $ISBN ?></td>
                    <td><?php echo $Ejlibros[$i]['IDINSTEJEMPLAR'] ?></td>
                    <td><?php echo $Ejlibros[$i]['TITULO'] ?></td>
                    <td><?php echo $Ejlibros[$i]['ESTADO'] ?></td>
                    <td><a href="#">Ver detalles...</a></td>
                  </tr>
                <?php } ?>



              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>

    </div>
  </main>
  <!-- Essential javascripts for application to work-->
  <?php require_once('./Inc/js/js.inc.php'); ?>

</body>

</html>