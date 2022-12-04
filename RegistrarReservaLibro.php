<?php
require_once './Handler/reserva/HandlerRegistrarReserva.php';



if (!empty($_GET['ID_ISBN'])) {
  $idISBN = $_GET['ID_ISBN'];
}

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
        <h1><i class="fa fa-edit"></i> Registrar Solicitud de Reserva de Material</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">

        <div class="tile">
          <h3 class="tile-title">Selecciona el libro que deseas solicitar</h3>
          <h4>Libros disponibles</h4>
<!-- ************************************ -->
            <!-- *****IMPRIMIR ARRAY EN PANTALA****** -->
            <!-- ************************************ -->
            
            <?php  /* echo '<p>' . print_r($_SESSION) . '<p>'  */ ?>
            <?php  /* echo '<p>' . print_r($TipoPrestamo) . '<p>' */  ?>
            <?php  /* echo '<p>' . print_r($dni) . '<p>' */  ?>
            <?php  /* echo '<p>' . print_r($PERSONA) . '<p>' */  ?>
            <?php  /* echo '<p>' . print_r($Contacto) . '<p>' */  ?>
          
            <?php /* echo '<p>' . print_r($_POST['TipoDNI']) . '<p>'  */ ?>
            
            <?php /*  if(isset($idUsuario)){ echo '<p>'.print_r($idUsuario) .'<p>'; } else{ echo "nada aqui";} */ ?>
            <!-- ************************************ -->
            <!-- ************************************ -->
          <div class="table-responsive">
            <table id="example" class="display">
              <thead>
                <tr>
                  <th>ISBN</th>
                  <th>Titulo</th>
                  <th>Subtitulos</th>
                  <th>Ubicacion</th>
                  <th>Idioma</th>
                  <th>Categoria</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($Libros as $libro) {
                ?>

                  <tr>
                    <td><?php echo $libro['Libro_ISBN']  ?></td>
                    <td><?php echo $libro['Libro_Titulo']  ?></td>
                    <td><?php echo $libro['Libro_Subtitulo']  ?></td>
                    <td><?php echo $libro['Libro_UbicacionEstanteria']  ?></td>
                    <td><?php echo $libro['Libro_Idioma']  ?></td>
                    <td><?php echo $libro['Libro_CategoriaLibro']  ?>
                    </td>

                    <td>
                      <button type="button" onclick="registrarPrestamo('<?php echo $libro['Libro_ISBN'] ?>','<?php echo $libro['Libro_IdEjemplar']  ?>')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                        <i class="app-menu__icon fa fa-book "></i>Solicitar Reserva
                      </button>

                  </tr>

                <?php
                } ?>

              </tbody>
              <tfoot>

              </tfoot>
            </table>
            <!-- The Modal -->
            <div class="modal" id="myModal">
              <div class="modal-dialog">
                <div class="modal-content">
                  <form method="POST" name="finalizaModal" action="Handler/reserva/HandlerRegistrarReserva.php">
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">Seleccione el tipo de Prestamo</h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                      <input type="text" name="registrarPrestamoSocio" id="registrarPrestamoSocio" value="1" style="visibility:hidden">

                      <select class="form-select" name="idTipoPrestamo" id="idTipoPrestamo">
                        <?php if (count($TipoPrestamo) > 0) {
                          foreach ($TipoPrestamo as $var) {

                            echo "<option value=" . $var['ID'] . ">" . $var['TipoPrestamo'] . "</option>";
                          }
                        }  ?></br>

                      </select>
                      <input type="text" name="idISBN" id="idISBN" style="visibility:hidden">
                      <input type="text" name="idEJEM" id="idEJEM" style="visibility:hidden">
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Confirmar</button>
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>

                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  </div>
  </div>
  </div>




  <!-- Essential javascripts for application to work-->
  <?php require_once('./Inc/js/js.inc.php'); ?>
  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"> -->
  <!--   <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css"/> -->



  <script>
    function registrarPrestamo(idISBN, idEJEM) {

      $("#idISBN").val(idISBN);
      $("#idEJEM").val(idEJEM);
      console.log(idISBN);
      console.log(idEJEM);

    }


    $(document).ready(function() {
      $('#example').DataTable({
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
    })
  </script>
</body>


</html>