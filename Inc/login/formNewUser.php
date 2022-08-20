<form class="newUserForm" method="post">
        <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Nuevo Usuario?</h3>
      <!--   <div class="bs-component">
          <div class="alert alert-dismissible alert-info">
            <strong>Tu clave será reseteada</strong>
          </div>
        </div> -->
        <!-- este es el mensaje de error- -->
        <?php  if ($noValidateEmailnewUSer) {  ?>
          <div class="bs-component">
            <div class="alert alert-dismissible alert-danger">
              <strong>El mail ingresado ya existe</strong>
            </div>
          </div>
          <?php } ?>

        <!-- este es el mensaje de ok!
          <div class="bs-component">
            <div class="alert alert-dismissible alert-success">
              <strong>Listo! Ya puedes loguearte</strong>
            </div>
          </div>
           --------------->

        <div class="form-group">
          <label class="control-label">Ingresa un correo</label>
          <input class="form-control <?php echo ($noValidateEmailnewUSer)? 'is-invalid': '' ; ?> " type="email" name="emailNewUser" placeholder="Email" required value="<?php echo !empty($_POST['email']) ? $_POST['email'] : '' ?>">
        </div>
        <div class="form-group">
          <label class="control-label">Ingresa una Clave</label>
          <input id="password" class="form-control" type="password" name="Clave" placeholder="Debe de ser mínimo 8 caracteres" required minlength="8">
        </div>
        <div class="form-group">
          <label class="control-label">Reingresa la Clave</label>
          <input id="validationPass" class="form-control" type="password" placeholder="Repite la clave" required minlength="8">
        </div>
        <div class="form-group btn-container ">
          <button class="btn btn-primary btn-block" type='submit' name='SigUpNewUser' value='newUser'><i class="fa fa-unlock fa-lg fa-fw"></i>REGISTRAR</button>
        </div>
        <div class="form-group mt-3">
          <p class="semibold-text mb-0"><a href="#" data-toggle="NewUser"><i class="fa fa-angle-left fa-fw"></i> Ir al Login</a></p>
        </div>
      </form>