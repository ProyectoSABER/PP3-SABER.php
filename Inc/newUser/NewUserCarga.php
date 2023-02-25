<!-- Formulario 1 -->
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <h3 class="tile-title">Finaliza tu registro</h3>
      <h3 class="tile-title">Ingresa los datos solicitados</h3>
      <?php /* echo '<p>'.print_r($IngresoRegistro) .'<p>' */ ?>


      <?php if (!empty($MensajeError)) { ?>
        <div class="bs-component">
          <div class="alert alert-dismissible alert-danger">
            <strong><?php echo $MensajeError ?> .</strong>
          </div>
        </div>
      <?php } else if (!empty($MensajeExito)) { ?>



        <div class="bs-component">
          <div class="alert alert-dismissible alert-success">
            <strong><?php echo $MensajeExito ?></strong>
          </div>
        </div>
      <?php } ?>

      <div class="bs-component">
        <div class="alert alert-dismissible alert-info">
          <strong>Los campos con <i class="fa fa-asterisk text-danger" aria-hidden="true"></i> son obligatorios</strong>
        </div>
      </div>
      <div class="tile-body">

        <!-- Formulario -->
        <form method="POST" class="row " id="form_newUser">

          <div class="col-md-6">
            <!-- DNI -->

            <div class="form-group">
              <label class="control-label">DNI</label> <i class="fa fa-asterisk text-danger" aria-hidden="true"></i>

              <input class="form-control" id="input_Dni" placeholder="Ingresa tu DNI" name="DNI" type="number" minlength="8" required data-bs-toggle="tooltip" data-bs-placement="right" title="Ingresa un Dni, debe contener 8 caracteres minimo">

            </div>
            <!-- TIPO DNI -->
            <div class="form-group">
              <label class="control-label">Tipo DNI</label> <i class="fa fa-asterisk text-danger" aria-hidden="true"></i>
              <select id="select_tipoDni" class="form-control" name="TipoDni" required data-bs-toggle="tooltip" data-bs-placement="right" title="Selecciona un tipo de documento">
                <?php for ($i = 0; $i < $CantipoDni; $i++) { ?>
                  <option value="<?php echo  $tipoDni[$i]['ID'] ?>"><?php echo $tipoDni[$i]['TIPO'] ?></option>
                <?php } ?>
              </select>
            </div>


            <!-- NOMBRE -->
            <div class="form-group">
              <label class="control-label">NOMBRE</label> <i class="fa fa-asterisk text-danger" aria-hidden="true"></i>
              <input id="input_Nombre" class="form-control" placeholder="Ingresa tu Nombre" name="NOMBRE" required data-bs-toggle="tooltip" data-bs-placement="right" title="Ingresa tu Nombre">
            </div>


            <!-- Apellido -->
            <div class="form-group">
              <label class="control-label">Apellido</label> <i class="fa fa-asterisk text-danger" aria-hidden="true"></i>
              <input id="input_Apellido" class="form-control" placeholder="Ingresa tu Apellido" name="Apellido" required data-bs-toggle="tooltip" data-bs-placement="right" title="Ingresa tu Apellido">
            </div>
          </div>
          <div class="col-md-6">

            <!-- TIPO Contacto -->
            <div class="form-group">
              <label class="control-label">Tipo Contacto</label> <i class="fa fa-asterisk text-danger" aria-hidden="true"></i>
              <select id="tipo_contacto" class="form-control" name="TipoContacto" required data-bs-toggle="tooltip" data-bs-placement="right" title="Selecciona un tipo de contacto">

                <?php for ($i = 0; $i < $CantipoContacto; $i++) { ?>
                  <option value="<?php echo  $tipoContacto[$i]['ID'] ?>"><?php echo $tipoContacto[$i]['TIPO'] ?></option>
                <?php } ?>
              </select>
            </div>

            <!-- Celular -->

            <div class="form-group">
              <label class="control-label">Código área</label> <i class="fa fa-asterisk text-danger" aria-hidden="true"></i>
              <input id="input_codigoArea" class="form-control" type="number" min=0 placeholder="Codigo area" name="CodigoArea" required data-bs-toggle="tooltip" data-bs-placement="right" title="Ingresa un codigo de Area">

              <label class="control-label">N° Celular</label> <i class="fa fa-asterisk text-danger" aria-hidden="true"></i>
              <input id="input_celular" class="form-control" type="number" min=0 placeholder="Número de Celular" name="Ncelular" required data-bs-toggle="tooltip" data-bs-placement="right" title="Ingresa un numero de celular">
              </select>
            </div>



            <!-- <div class="form-group">
                  <label class="control-label">Puedes subir una captura de pantalla</label>
                  <input class="form-control" type="file" disabled>
                </div> -->

            <div class="tile-footer">
              <!--Botones-->
              <button class="btn btn-primary" type="submit" name="RegistrarUser" value="Registrar"><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>&nbsp;&nbsp;&nbsp;



              <a class="btn btn-warning" href="cerrarSesion.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
            </div>
            <div class="tile-footer"><button type="reset" class="btn btn-secondary">Limpiar Campos</button></div>
          </div>

      </div>

      </form>
      
      

    </div>
  </div>

</div>
<!-- /Formulario 1 -->