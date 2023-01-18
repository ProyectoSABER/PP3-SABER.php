<?php

require_once './Handler/prestamos/HandlerListadoPrestamos.php'

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

        <p>Listado de Prestamos Activos de Libros</p>

      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Listado</li>
        <li class="breadcrumb-item active"><a href="#">Listado de Prestamo</a></li>
      </ul>
    </div>
    <div class="row">

      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">Total de Prestamo Activo <?php echo $CantPrestamos ?> </h3>
          <div class="table-responsive">
            <table class="table" id="tabla-PrestamosActivos">
              <thead>
                <tr>
                  <th>#</th>
                  <th>ISBN</th>
                  <th>ID Institucional</th>
                  <th>Título</th>
                  <th>Socio</th>
                  <th>DNI</th>
                  <th>Estado</th>
                  <th>Fecha de Prestamo</th>
                  <th>Fecha A devolver Prestamo</th>                  
                  <th>Fecha de devolucion</th>
                  <th>Tipo Prestamo</th>
                  <th>Opciones</th>

                </tr>
              </thead>
              <tbody>
                <?php for ($i = 0; $i < $CantPrestamos; $i++) { ?>



                  <tr class=<?php echo ($i % 2 == 0) ?  'table-info' : ''; ?>>
                    <td><?php echo $i ?></td>
                    <td><?php echo $Prestamos[$i]['ID_LIBRO'] ?></td>
                    <td><?php echo $Prestamos[$i]['ID_INST_EJEMPLAR'] ?></td>
                    <td><?php echo $Prestamos[$i]['TITULO'] ?></td>
                    <td><?php echo $Prestamos[$i]['APELLIDO_SOCIO'] . ' ' . $Prestamos[$i]['NOMBRE_SOCIO'] ?></td>
                    <td><?php echo $Prestamos[$i]['DNI'] ?></td>
                    <td><?php echo $Prestamos[$i]['ESTADO'] ?></td>
                    <td><?php echo $Prestamos[$i]['FECHA_PRESTAMO'] ?></td>
                    
                    <td><?php echo $Prestamos[$i]['FECHA_ADEVOLVER']   ?></td>
                    <td><?php echo $Prestamos[$i]['FECHA_DEVOLUCION']  ?></td>
                    <td><?php echo $Prestamos[$i]['TIPOPRESTAMO'] ?></td>
                    <td><a class="btn btn-sm btn-info" href="#"><i class="fa fa-search"></i> Detalle</a>&nbsp;&nbsp;</td>
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

      $('#tabla-PrestamosActivos').DataTable({
        "paging": true,
        "lengthChange": true,
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