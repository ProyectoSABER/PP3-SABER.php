<?php
/* falta concluir */
?>

<div class="col-md-12">
  <div class="tile">
    <h3 class="tile-title">Prestamos Diarios Activos <?php echo $CantPDiarios ?></h3>
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>ISBN</th>
            <th>ID Institucional</th>
            <th>Título</th>
            <th>Estado</th>
            <th>Socio</th>
            <th>DNI</th>
            <th>Fecha A devolver </th>
            <th>Tipo Prestamo</th>
            <th>Opciones</th>

          </tr>
        </thead>
        <tbody>
          <form id="RegistrarDevolucion" method="post">
            <?php for ($i = 0; $i < $CantPDiarios; $i++) { ?>



              <tr class=<?php echo ($i % 2 == 0) ?  'table-info' : ''; ?>>
                <td><?php echo $i ?></td>
                <td><?php echo $PDiarios[$i]['ID_LIBRO'] ?></td>
                <td><?php echo $PDiarios[$i]['ID_INST_EJEMPLAR'] ?></td>
                <td><?php echo $PDiarios[$i]['TITULO'] ?></td>
                <td><?php echo $PDiarios[$i]['ESTADO'] ?></td>
                <td><?php echo $PDiarios[$i]['APELLIDO_SOCIO'] . ' ' . $PDiarios[$i]['NOMBRE_SOCIO'] ?></td>
                <td><?php echo $PDiarios[$i]['DNI'] ?></td>
                <td><?php echo $PDiarios[$i]['FECHA_ADEVOLVER'] ?></td>
                <td><?php echo $PDiarios[$i]['TIPOPRESTAMO'] ?></td>
                <td><button type="submit" name='Devolucion' value="<?php echo $PDiarios[$i]['ID'] ?>" class="btn btn-warning btn-xs">DEVUELTO</button></td>
              </tr>
            <?php } ?>
          </form>

        </tbody>
      </table>
    </div>
  </div>
</div>

<?php if ($cantReservaSolicitados > 0) { ?>
  <?php /* echo print_r($ReservasSolicitadas) */ ?>
  <div class="col-md-12">
    <div class="tile">


      <div class="row">
        <div class="col-md-12">

          <div class="accordion accordion-flush" id="accordionFlushExample">
            <!-- Accordion #1 -->
            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#acordion1" aria-expanded="true" aria-controls="flush-collapseOne ">
                  <h3 class="tile-title">Solicitudes de Libros</h3><br>
                  
                </button>
                <h5 class="tile-subtitle">Solicitados: <?php echo $cantReservaSolicitados ?></h5>
              </h2>
              <!-- Container Accordion #1 -->
              <div id="acordion1" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <!-- Body Acordion -->
                <div class="accordion-body">
                  <!-- Elements in Body Acordion -->
                  
                  <div class="tile-body">
                    <div class="table-responsive">
                      <table class="table" id="tabla-reservas">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>ISBN</th>
                            <th>ID Institucional</th>
                            <th>Título</th>
                            <th>Socio</th>
                            <th>DNI</th>
                            <th>Fecha de Solicitud</th>
                            <th>Tipo Prestamo</th>
                            <th>Estado Prestamo</th>
                            <th>Acciones</th>


                          </tr>
                        </thead>
                        <tbody>

                          <?php for ($i = 0; $i < $cantReservaSolicitados; $i++) {
                            if ($ReservasSolicitadas[$i]['ID_ESTADO_RESERVA'] > 2) {
                              continue;
                            } ?>



                            <tr class=<?php echo ($i % 2 == 0) ?  'table-info' : ''; ?>>
                              <td><?php echo $i ?></td>
                              <td><?php echo $ReservasSolicitadas[$i]['ID_ISBN'] ?></td>
                              <td><?php echo $ReservasSolicitadas[$i]['ID_INST_EJEMPLAR'] ?></td>
                              <td><?php echo $ReservasSolicitadas[$i]['TITULO'] ?></td>
                              <td><?php echo $ReservasSolicitadas[$i]['SOCIO'] ?></td>
                              <td><?php echo $ReservasSolicitadas[$i]['DNI'] ?></td>
                              <td><?php echo $ReservasSolicitadas[$i]['FECHA_RESERVA'] ?></td>

                              <td><?php echo $ReservasSolicitadas[$i]['TIPOPRESTAMO'] ?></td>
                              <td><?php echo $ReservasSolicitadas[$i]['ESTADO'] ?></td>
                              <td>

                                <button name="anularReserva" value="" onclick="anularReserva(<?php echo $ReservasSolicitadas[$i]['ID'] ?>)" class=" btn btn-xs btn-danger m-1"><i class="icon fas fa-exclamation-triangle"></i>Anular</button>
                                <?php if ($ReservasSolicitadas[$i]['ID_ESTADO_RESERVA'] == 1) { ?>
                                  <button name="anularReserva" value="" onclick="listoParaRetiro(<?php echo $ReservasSolicitadas[$i]['ID'] ?>)" class=" btn btn-xs btn-primary m-1"><i class="icon fas fa-info"></i>Preparado</button>&nbsp;&nbsp;&nbsp;
                                <?php } ?>
                                <?php if ($ReservasSolicitadas[$i]['ID_ESTADO_RESERVA'] == 2) { ?>
                                  <button name="registrarPrestamo" value="" onclick="registrarPrestamo(<?php echo $ReservasSolicitadas[$i]['ID'] ?>)" class=" btn btn-xs btn-primary m-1"><i class="icon fas fa-check"></i>Retirado</button>&nbsp;&nbsp;&nbsp;
                                <?php } ?>
                              </td>




                            </tr>
                          <?php } ?>
                          </form>

                        </tbody>

                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php } ?>