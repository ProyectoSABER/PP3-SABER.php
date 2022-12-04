<?php
/* falta concluir */
?>

<div class="col-md-12">
  <div class="tile">
    <h3 class="tile-title">Mis prestamos</h3><br>
    <h5 class="tile-subtitle">Activos:<?php echo $CantPrestamosActivos ?></h5>
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>

            <th>#</th>
            <th>ISBN</th>
            <th>ID Institucional</th>
            <th>Título</th>
            <th>Fecha de Retiro</th>
            <th>Fecha A devolver</th>
            <th>Tipo Prestamo</th>
            <th>Estado Prestamo</th>


          </tr>
        </thead>
        <tbody>

          <?php for ($i = 0; $i < $CantPrestamosActivos; $i++) { ?>



            <tr class=<?php echo ($i % 2 == 0) ?  'table-info' : ''; ?>>
              <td><?php echo $i ?></td>
              <td><?php echo $PrestamosActivos[$i]['ID_LIBRO'] ?></td>
              <td><?php echo $PrestamosActivos[$i]['ID_INST_EJEMPLAR'] ?></td>
              <td><?php echo $PrestamosActivos[$i]['TITULO'] ?></td>
              <td><?php echo $PrestamosActivos[$i]['FECHA_PRESTAMO'] ?></td>
              <td><?php echo $PrestamosActivos[$i]['FECHA_ADEVOLVER'] ?></td>
              <td><?php echo $PrestamosActivos[$i]['TIPOPRESTAMO'] ?></td>
              <td><?php echo $PrestamosActivos[$i]['ESTADO'] ?></td>

            </tr>
          <?php } ?>
          </form>

        </tbody>
      </table>
    </div>
  </div>
</div>

<?php if ($cantReservaSolicitados > 0) { ?>
  <div class="col-md-12">
    <div class="tile">
      <h3 class="tile-title">Solicitudes de Libros</h3><br>
      <h5 class="tile-subtitle">Solicitados:<?php echo $cantReservaSolicitados ?></h5>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>ISBN</th>
              <th>ID Institucional</th>
              <th>Título</th>
              <th>Fecha de Retiro</th>

              <th>Tipo Prestamo</th>
              <th>Estado Prestamo</th>
              <th>Acciones</th>


            </tr>
          </thead>
          <tbody>

            <?php for ($i = 0; $i < $cantReservaSolicitados; $i++) { ?>



              <tr class=<?php echo ($i % 2 == 0) ?  'table-info' : ''; ?>>
                <td><?php echo $i ?></td>
                <td><?php echo $ReservasSolicitadas[$i]['ID_ISBN'] ?></td>
                <td><?php echo $ReservasSolicitadas[$i]['ID_INST_EJEMPLAR'] ?></td>
                <td><?php echo $ReservasSolicitadas[$i]['TITULO'] ?></td>
                <td><?php echo $ReservasSolicitadas[$i]['FECHA_RESERVA'] ?></td>

                <td><?php echo $ReservasSolicitadas[$i]['TIPOPRESTAMO'] ?></td>
                <td><?php if($ReservasSolicitadas[$i]['ESTADO']='Pendiente Retiro'){echo 'Listo para Retirar';}else{echo $ReservasSolicitadas[$i]['ESTADO'];} ?></td>
                <td><?php if ($ReservasSolicitadas[$i]['ID_ESTADO_RESERVA'] < 3) ?> <button name="anularReserva" value="" onclick="anularReserva(<?php echo $ReservasSolicitadas[$i]['ID'] ?>)" class=" btn btn-sm btn-warning">Anular Reserva</button></td>

              </tr>
            <?php } ?>
            </form>

          </tbody>

        </table>
      </div>
    </div>
  </div>
<?php } ?>