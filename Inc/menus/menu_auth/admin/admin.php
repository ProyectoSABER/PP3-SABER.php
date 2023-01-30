

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
   
<!--comienza modal-->

<!-- Button trigger modal -->

<div class="row" style="color: green;" >
      <div class="col-md-3" >
        <div class="widget-small " style="color: green;" ><i class="icon fa fa-users fa-3x "style="color: green;" ></i>
          <div class="info" style="color: green;" >
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newUser"><h4>Nuevo Usuario</h4></button>
          <!-- Button trigger modal -->
          </div>
        </div>
      </div>

<!-- Modal -->
<div class="modal fade" id="newUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cargar Nuevo Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- DATOS DEL USUARIO -->
<form name="registroUsuarioModal" action="registroUsuarioModal.php" method="POST"> 

<div class="form-floating mb-3">
  <input type="text" class="form-control" id="inputNameModal" name="inputNameModal" placeholder="name@example.com">
  <label for="floatingInput">Nombre</label>
</div>
<div class="form-floating mb-3">
  <input type="text" class="form-control" id="inputApellidoModal" name="inputApellidoModal" placeholder="name@example.com">
  <label for="floatingInput">Apellido</label>
</div>
<div class="form-floating mb-3">
  <input type="text" class="form-control" id="inputDocumentoModal" name="inputDocumentoModal" placeholder="name@example.com">
  <label for="floatingInput">Documento</label>
</div>
<div class="form-floating mb-3" >
  <input type="email" class="form-control" id="inputEmailModal" name="inputEmailModal"  placeholder="name@example.com" value="mail@ejemplo.com">
  <label for="floatingInputValue">Email</label>
</div>
<div class="form-floating">
  <input type="password" class="form-control" id="inputPasswordModal" name="inputPasswordModal" placeholder="Password">
  <label for="floatingPassword">Password</label>
</div>
<br>
<div class="form-floating">
<label for="tipousuario">Tipo de Usuario</label>
  <select class="form-select" id="selectRolModal" name="selectRolModal" aria-label="Floating label select example">
    <!-- Buscar info y mostrar oopciones segun BD -->
    <option selected>Seleccione una opción</option>
    <option value="1">1-Administrador</option>
    <option value="2">2-Bibliotecario</option>
    <option value="3">3-Docente</option>
    <option value="4">4-Socio</option>
    <option value="5">5-Visitante</option>
  </select>
 
</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</form>
</div>

<div class="col-md-12">
  <div class="tile">
    <h3 class="tile-title">Usuarios Registrados  </h3>
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
              
              
              <!-- UTILIZAMOS ID USUARIO PARA PODER HABILITAR/DESHABILITAR -->
              <?php $usuID = $Usuarios[$i]['IDUSUARIO']; ?>

                    
              <td><!-- BOTON DE OPCIONES -->

              <div class="btn-group">
                <button type="button" class="btn btn-primary">Action</button>
                <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="visually-hidden">Toggle Dropdown</span>
                </button>
              <ul class="dropdown-menu">
                
                
                 
              

                 <li><button type="button" class="dropdown-item" onClick="deshabilitarUsuario('<?php echo $usuID;?>');" Deshabilitar ><a class="dropdown-item" href="#"> Limitar <i class="fa fa-power-off" aria-hidden="true"></i></a></button></li>
                    
                 <li><button type="button" class="dropdown-item" onClick="habilitarUsuario('<?php echo $usuID;?>');" Habilitar ><a class="dropdown-item" href="#">Habilitar<i class="fa fa-power-off" aria-hidden="true"></i></a></button></li>

                <!--<li><a class="dropdown-item" href="#">Limitar Acceso <i class="fa fa-ban fa-fw"></i></a></li>-->
                <li><a class="dropdown-item" href="#">Modificar<i class="fa fa-pencil fa-fw"></i></a></li>
                
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

<script> 
function deshabilitarUsuario(data) {
  Swal.fire({
  title: 'Esta seguro que desea dehabilitar el usuario?',
  showDenyButton: true,
 
  confirmButtonText: 'Si, confirmar',
  denyButtonText: `No, Cancelar`,
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
    window.location='UsuarioModalLimitar.php?usuID='+data;
    Swal.fire('Usuario deshabilitado!', '', 'success')
  } else if (result.isDenied) {
    Swal.fire('Cancelo los cambios', '', 'info')
  }
})}
function habilitarUsuario(data) {
  Swal.fire({
  title: 'Esta seguro que desea habilitar el usuario?',
  showDenyButton: true,
 
  confirmButtonText: 'Si, confirmar',
  denyButtonText: `No, Cancelar`,
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
    Swal.fire('Usuario Habilitado!', '', 'success')
    window.location='UsuarioModalHabilitar.php?usuID='+data;
  } else if (result.isDenied) {
    Swal.fire('Cancelo los cambios', '', 'info')
  }
})}
/*
  console.log(data);
  let text = "Press a button!\nEither OK or Cancel.";
  if (confirm(text) == true) {
window.location='UsuarioModalLimitar.php?usuID='+data;
   
  }

}*/


</script>
