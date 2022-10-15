<?php 
/* falta concluir */
?>

<div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">Mis prestamos</h3><br>
          <h5 class="tile-subtitle">Activos:<?php echo $CantPrestamosActivos?></h5>
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


      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">Solicitudes de Libros</h3><br>
          <h5 class="tile-subtitle">Solicitados:<?php echo $cantPrestamosSolicitados?></h5>
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
               
                <?php for ($i = 0; $i < $cantPrestamosSolicitados; $i++) { ?>



                  <tr class=<?php echo ($i % 2 == 0) ?  'table-info' : ''; ?>>
                    <td><?php echo $i ?></td>
                    <td><?php echo $PrestamosSolicitados[$i]['ID_LIBRO'] ?></td>
                    <td><?php echo $PrestamosSolicitados[$i]['ID_INST_EJEMPLAR'] ?></td>
                    <td><?php echo $PrestamosSolicitados[$i]['TITULO'] ?></td>
                    <td><?php echo $PrestamosSolicitados[$i]['FECHA_PRESTAMO'] ?></td>
                    <td><?php echo $PrestamosSolicitados[$i]['FECHA_ADEVOLVER'] ?></td>
                    <td><?php echo $PrestamosSolicitados[$i]['TIPOPRESTAMO'] ?></td>
                    <td><?php echo $PrestamosSolicitados[$i]['ESTADO'] ?></td>
                    
                  </tr>
                <?php } ?>
                </form>
                
             </tbody>
            </table>
          </div>
        </div>
      </div>