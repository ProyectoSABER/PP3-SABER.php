<?php require_once('./Inc/menus/navbar.inc.php'); ?>
  <!-- Sidebar menu-->
  <?php require_once('./Inc/menus/sidebar.inc.php'); ?>
 
 <!-- fin Sidebar menu-->

<div class="row">
      <div class="col-md-3">
        <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
          <div class="info">
            <h4>Usuarios</h4>
            <p><b><?php echo $CantUsuarios?></b></p>
          </div>
        </div>
      </div>  
    </div> 
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

<!-- Modal Nuevo Usuario-->
<div class="modal fade" id="newUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cargar Nuevo Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- DATOS DEL USUARIO -->
        
<form class="needs-validation" novalidate name="registroUsuarioModal" action="Handler/usuario/HandlerRegistroUsuarioModal.php" method="POST"> 

<div class="form-floating mb-3">
  <input type="text" class="form-control" id="inputNameModal" name="inputNameModal" placeholder="name@example.com" required>
  <label for="floatingInput">Nombre</label>
  <div class="valid-feedback">
        todo bien.
      </div>
  <div class="invalid-feedback">
        complete los datos.
      </div>
</div>
<div class="form-floating mb-3">
  <input type="text" class="form-control" id="inputApellidoModal" name="inputApellidoModal" placeholder="Escriba su apellido" required>
  <label for="floatingInput">Apellido</label>
</div>
<div class="form-floating mb-3">
  <input type="number" class="form-control" id="inputDocumentoModal" name="inputDocumentoModal" minlength="7" placeholder="ingrese su documento" required>
  <label for="floatingInput">Documento</label>
</div>
<div class="form-floating mb-3" >
  <input type="email" class="form-control" id="inputEmailModal" name="inputEmailModal"  placeholder="name@example.com" required>
  <label for="floatingInputValue">Email</label>
</div>
<div class="form-floating">
  <input type="password" class="form-control" id="inputPasswordModal" name="inputPasswordModal" placeholder="Password" value='' required>
  <label for="floatingPassword">Password</label>
</div>
<br>
<div class="form-floating">
<label for="tipousuario">Tipo de Usuario</label>
<br>
  <select class="form-select" id="selectRolModal" name="selectRolModal" aria-label="Floating label select example" required> 
    <!-- Buscar info y mostrar oopciones segun BD -->
    <option selected value=''>Seleccione una opción</option>
    <option value="1">1-Administrador</option>
    <option value="2">2-Bibliotecario</option>
    <option value="3">3-Docente</option>
    <option value="4">4-Socio</option>
    <option value="5">5-Visitante</option>
  </select>
  <div class="invalid-feedback">
        recuerde seleccionar un elemento.
      </div>
</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
        <button type="submit" name="NuevoUsuario" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</form>
</div>


<!-- Modal Modificar Usuario-->
<div class="modal fade" id="EditarUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- DATOS DEL USUARIO -->
        
<form class="needs-validation" action="Handler/usuario/HandlerRegistroUsuarioModal.php" method="POST"> 

<input type="hidden" name="update_id" id="update_id">

<div class="form-floating mb-3">
  <input type="text" class="form-control" id="nombreEditUser" name="nombreEditUser" readonly >
  <label for="floatingInput">Nombre</label>
</div>

<div class="form-floating mb-3">
  <input type="text" class="form-control" id="apellidoEditUser" name="apellidoEditUser" readonly >
  <label for="floatingInput">Apellido</label>
</div>

<div class="form-floating mb-3">
  <input type="number" class="form-control" id="dniEditUser" name="dniEditUser" minlength="7"  readonly >
  <label for="floatingInput">Documento</label>
</div>

<div class="form-floating mb-3" >
  <input type="email" class="form-control" id="mailEditUser" name="mailEditUser"  placeholder="name@example.com" value="mail@ejemplo.com">
  <label for="floatingInputValue">Email</label>
</div>

<div class="form-floating">
  <input type="text" class="form-control" id="passwordEditUser" name="passwordEditUser" placeholder="Password">
  <label for="floatingPassword">Password</label>
</div>

<br>
<div class="form-floating">
<label for="tipousuario">Tipo de Usuario</label>
  <select class="form-select" id="rolEditUser" name="rolEditUser" aria-label="Floating label select example">
    <!-- Buscar info y mostrar oopciones segun BD -->
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
        
        <button type="submit" name="ModificarUsuario" class="btn btn-primary">Guardar Cambios</button>
      </div>
    </div>
  </div>
</form>

<script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>
</div>



<!--AUTOCOMPLETADO DE FORMULARIO-->
<script src="https://code.jquery.com/jquery-3.3.1.js"></script> <!-- POR QUE TENGO QUE PONER ESTO PARA QUE FUNCIONE XD!!!!!--->

<script>

$('.editbtn').on('click',function(){

$tr=$(this).closest('tr');
var datos=$tr.children("td").map(function (){
return $(this).text();

});


$('#update_id').val(datos[0]);
$('#nombre').val(datos[1]);
$('#apellido').val(datos[2]);
$('#dni').val(datos[3]);
$('#mail').val(datos[4]);
$('#password').val(datos[5]);
$('#rol').val(datos[6]);

       

});

</script>


<!--/AUTOCOMPLETADO DE FORMULARIO-->



<div class="col-md-12">
  <div class="tile">
    <h3 class="tile-title">Usuarios Registrados  </h3>
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            
          
          
          <th>#</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>DNI</th>
          <th>Email</th>
          <th>ID Usuario</th>
          <th>Estado Usuario</th>
          <th>Fecha Alta</th>
          <th>OPCIONES</th>
            

          </tr>
        </thead>
        <tbody>
          <?php for ($i = 0; $i < $CantUsuarios; $i++) { ?>

              
          
            <tr class=<?php echo ($i%2==0)?  'table-info' : '';?>>
              <td><?php echo $i ?></td>
              <td><?php echo $Usuarios[$i]['NOMBRE'] ?></td>
              <td><?php echo $Usuarios[$i]['APELLIDO'] ?></td>
              <td><?php echo $Usuarios[$i]['DNI'] ?></td>
              <td><?php echo $Usuarios[$i]['MAIL'] ?></td>
              <td><?php echo $Usuarios[$i]['IDUSUARIO'] ?></td> 
              <td><?php echo $Usuarios[$i]['ESTADO'] ? 'Habilitado' : 'Deshabilitado' ?></td>
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

                 <li><button type="button" class="btn btn-success" data-bs-toggle="modal"
                  onclick="enviarModal('<?php echo $Usuarios[$i]['NOMBRE'] ?>',
                  '<?php echo $Usuarios[$i]['APELLIDO'] ?>',
                  '<?php echo $Usuarios[$i]['DNI'] ?>',
                 '<?php echo $Usuarios[$i]['MAIL'] ?>',
                  '<?php echo $Usuarios[$i]['PASSWORD'] ?>',
                 '<?php echo $Usuarios[$i]['IDTIPOUSER'] ?>',
                 '<?php echo $Usuarios[$i]['NOMTIPOUSER'] ?>',
                 '<?php echo $Usuarios[$i]['IDUSUARIO'] ?>')
                 " data-bs-target="#EditarUsuario">Modificar<i class="fa fa-pencil fa-fw"></i></h4></button><li>

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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
function enviarModal(nombre,apellido,dni,mail,password,idTipoUser,NomTipoUser,idUser)
{
  $('#update_id').val(idUser);
  $('#nombreEditUser').val(nombre);
  $('#apellidoEditUser').val(apellido);
  $('#dniEditUser').val(dni);
  $('#mailEditUser').val(mail);
  $('#passwordEditUser').val(password);
  $("#rolEditUser").val(idTipoUser).change();

}

</script>






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

function EditarUsuario(data) {
  Swal.fire({
  title: 'Esta seguro que desea modificar el usuario?',
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

function showMessageError(data){
if(data == "ErrorUsuarioDuplicado"){
  Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Usuario duplicado!',
  footer: '<a href="http://localhost:8080/PP3-SABER.php/index.php">Ok</a>',
  showConfirmButton: false
    })
  }
if(data == "ErrorDatoFaltante"){

Swal.fire({
icon: 'error',
title: 'Oops...',
text: 'Falta informacion, por favor antes de enviar verifique la informacion cargada.',
footer: '<a href="http://localhost:8080/PP3-SABER.php/index.php">Ok</a>',
showConfirmButton: false
  })

}
if(data == "ErrorRegistro"){

Swal.fire({
icon: 'error',
title: 'Oops...',
text: 'No se pudo registrar el nuevo usuario, inténtenlo nuevamente més tarde.',
footer: '<a href="http://localhost:8080/PP3-SABER.php/index.php">Ok</a>',
showConfirmButton: false
  })

}
if(data == "EdicionOk"){

Swal.fire({
  icon: 'success',
title: 'Bien...',
text: 'Edicion exitosa.',
footer: '<a href="http://localhost:8080/PP3-SABER.php/index.php">Ok</a>',
showConfirmButton: false
  })

}





if(data == "RegistroExitoso"){

Swal.fire({
  icon: 'success',
title: 'Bien...',
text: 'Registro exitoso.',
footer: '<a href="http://localhost:8080/PP3-SABER.php/index.php">Ok</a>',
showConfirmButton: false
  })

}


}


</script>

<?php 
if(isset( $_GET['respuesta'])){
$formularioEnviado = $_GET['respuesta'];

echo '<script>  
showMessageError("'.$formularioEnviado.'");
</script>  ';
}
?>
