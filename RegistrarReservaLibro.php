<?php
require_once './Handler/reserva/HandlerRegistrarReserva.php';




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
            <table id="tablaLibrosDisponible" class="display">
              <thead>
                <tr>
                  <th>ISBN</th>
                  <th>Titulo</th>
                  <th>Subtitulos</th>
                  <th>N° Edicion</th>
                  <th>Idioma</th>
                  <th>Categoria</th>
                  <th>Cant. Disponible</th>
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
                    <td><?php echo $libro['Libro_NEdicion']  ?></td>
                    <td><?php echo $libro['Libro_Idioma']  ?></td>
                    <td><?php echo $libro['Libro_CategoriaLibro'] ?>
                    <td><?php echo $libro['Libro_Stock'] ?>
                    </td>

                    <td class="td_opciones">
                      <button type="button" class="btn btn-primary" data-isbnlibro="<?php echo $libro['Libro_ISBN'] ?>" data-bs-toggle="modal" data-bs-target="#myModal">
                        <i class="app-menu__icon fa fa-book "></i>Solicitar Prestamo
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
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <form method="POST" id="form_modal" >
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">Seleccione el tipo de Prestamo</h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                      <div class="container-md border  mb-3 ">
                        <label for="">
                          <h5>Libro Solicitado</h5>
                        </label>
                        <table id="tablaLibroSeleccionado" class="table table-responsive">
                          <thead>
                            <tr>
                              <th>ISBN</th>
                              <th>Titulo</th>
                              <th>Subtitulos</th>
                              <th>N° Edicion</th>
                              <th>Idioma</th>
                              <th>Categoria</th>

                            </tr>
                          </thead>
                          <tbody>

                          </tbody>

                        </table>
                      </div>

                      <label for="idTipoPrestamo">Seleccione un tipo de préstamo a solicitar:</label>
                      <select class="form-select" name="idTipoPrestamo" id="idTipoPrestamo">
                        <?php if (count($TipoPrestamo) > 0) {
                          foreach ($TipoPrestamo as $var) {

                            echo "<option value=" . $var['ID'] . ">" . $var['TipoPrestamo'] . "</option>";
                          }
                        }  ?></br>

                      </select>
                      <input type="text" name="idISBN" id="idISBN" style="visibility:hidden">

                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="submit" disabled class="btn btn-success" data-bs-dismiss="modal" onclick="">Confirmar</button>
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

  <script src="./js/sweetalert2.all.js"></script>


  <script src="./js/Personalizados/RegistrarReserva/registrarReserva.js">
    
  </script>
  <script>
    <?php $mostrarSolicitudExitoso ? "mensajeExito()" : "" ?>
  </script>





</body>


</html>