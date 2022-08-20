<?php 
/* falta concluir */
?>

<div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">Prestamos Diarios Activos <?php echo $CantPDiarios?></h3>
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
                    <td><button type="submit" onclick="location.reload(true)" name='Devolucion' value="<?php echo $PDiarios[$i]['ID'] ?>" class="btn btn-warning btn-xs">DEVUELTO</button></td>
                  </tr>
                <?php } ?>
                </form>
                
             </tbody>
            </table>
          </div>
        </div>
      </div>