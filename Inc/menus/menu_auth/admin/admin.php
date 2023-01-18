

<div class="row">
      <div class="col-md-3">
        <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
          <div class="info">
            <h4>Usuarios</h4>
            <p><b><?php echo $CantUsuarios?></b></p>
          </div>
        </div>
      </div>
      <!-- <div class="col-md-3">
        <div class="widget-small info coloured-icon"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
          <div class="info">
            <h4>Incidencias Finalizadas</h4>
            <p><b>205</b></p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
          <div class="info">
            <h4>Incidencias en proceso</h4>
            <p><b>100</b></p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
          <div class="info">
            <h4>Incidencias Iniciadas</h4>
            <p><b>500</b></p>
          </div>
        </div>
      </div> -->
    </div>

<div class="col-md-12">
  <div class="tile">
    <h3 class="tile-title">Usauarios Registrados  </h3>
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>DNI</th>
            <th>ID Usuario</th>
            <th>Email</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Estado Usuario</th>
            <th>Fecha Alta</th>
            <th>OPCIONES</th>
            

          </tr>
        </thead>
        <tbody>
          <?php for ($i = 0; $i < $CantUsuarios; $i++) { ?>

              
          
            <tr class=<?php echo ($i%2==0)?  'table-info' : '';?>>
              <td><?php echo $i ?></td>
              <td><?php echo $Usuarios[$i]['DNI'] ?></td>
              <td><?php echo $Usuarios[$i]['IDUSUARIO'] ?></td>
              <td><?php echo $Usuarios[$i]['MAIL'] ?></td>
              <td><?php echo $Usuarios[$i]['NOMBRE'] ?></td>
              <td><?php echo $Usuarios[$i]['APELLIDO'] ?></td>
              <td><?php echo $Usuarios[$i]['ESTADO'] ?></td>
              <td><?php echo convertir_fecha($Usuarios[$i]['FECALTA']) ?></td>
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