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
          <h3 class="tile-title">Total de Libros <?php echo $CantEjLibros ?> </h3>
          <div class="table-responsive">
            <table class="table" id="tabla-Ejemplares">
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



                  <tr class=<?php echo ($i % 2 == 0) ?  'table-info' : ''; ?>>
                    <td><?php echo $i ?></td>
                    <td><?php echo $ISBN ?></td>
                    <td><?php echo $Ejlibros[$i]['IDINSTEJEMPLAR'] ?></td>
                    <td><?php echo $Ejlibros[$i]['TITULO'] ?></td>
                    <td><?php echo $Ejlibros[$i]['ESTADO'] ?></td>
                    <td> <a class="btn btn-sm btn-info" href="#"><i class="fa fa-search"></i> Detalles</a>&nbsp;&nbsp;
                    </td>
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
  <script type="text/javascript" src="./assets/plugins/DataTables/datatables.js"></script>
  <script>
    

    $(function() {

      $('#tabla-Ejemplares').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "language": {

          "sProcessing": "Procesando...",

          "sLengthMenu": "Mostrar _MENU_ registros",

          "sZeroRecords": "No se encontraron resultados",

          "sEmptyTable": "Ningún dato disponible en esta tabla",

          "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",

          "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",

          "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",

          "sInfoPostFix": "",

          "sSearch": "Buscar:",

          "sUrl": "",

          "sInfoThousands": ",",

          "sLoadingRecords": "Cargando...",

          "oPaginate": {

            "sFirst": "Primero",

            "sLast": "Último",

            "sNext": "Siguiente",

            "sPrevious": "Anterior"

          },

          "oAria": {

            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",

            "sSortDescending": ": Activar para ordenar la columna de manera descendente"

          }
        }
      });
    });
  </script>
</body>

</html>