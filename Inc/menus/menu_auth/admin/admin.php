

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


  

    <div class="row" style="color: green;" >
      <div class="col-md-3" >
        <div class="widget-small " style="color: green;" ><i class="icon fa fa-users fa-3x "style="color: green;" ></i>
          <div class="info" style="color: green;" >
          <button type="button" class="btn btn-primary"><h4>Nuevo Usuario</h4></button>
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
              <td><!-- Example split danger button -->

              <div class="btn-group">
                <button type="button" class="btn btn-primary">Action</button>
                <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="visually-hidden">Toggle Dropdown</span>
                </button>
              <ul class="dropdown-menu">
                
                <li><a class="dropdown-item" href="#">Eliminar <i class="fa fa-trash-o fa-fw"></i></a></li>
                <li><a class="dropdown-item" href="#">Limitar Acceso <i class="fa fa-ban fa-fw"></i></a></li>
                
              </ul>
              </div>
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


