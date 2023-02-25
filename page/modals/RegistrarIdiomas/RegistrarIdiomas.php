<!-- Modal Registrar Idiomas -->
<div class="modal fade" id="IdiomasModal" tabindex="-1" aria-labelledby="IdiomasModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="IdiomasModalLabel">Registrar Idiomas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <p class="h6">Registro de nuevos Idiomas</p>
        </div>
        <form id="form_nuevosIdiomas" class="mb-2">

          <div class="mb-3">
            <label for="nuevoIdioma" class="col-form-label">Nombre del Idioma:</label>
            <input type="text" required name="nombreIdioma" class="form-control" id="nuevoIdioma" title="Registre un nuevo idioma" value="">
          </div>
          <button type="submit" id="btn_registrarNuevoIdioma" class="btn btn-primary" name="registrarIdioma">Registrar</button>

        </form>
        <table class="table mt-4" id="TablaIdiomas">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nombre de Idioma</th>
              <th scope="col">Opciones</th>

            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Editar Idiomas-->
<div class="modal fade" id="ModificarIdioma" tabindex="-1" aria-labelledby="ModificarIdiomaLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="ModificarIdiomaLabel">Modificar Idiomas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <p class="h6">Modificar Idioma</p>
        </div>
        <form id="form_ModificarIdiomas" class="mb-2">

          <div class="mb-3">
            <label for="EditarIdioma" class="col-form-label"> Modificar Nombre y Apellido:</label>
            <input type="text" required name="EditarIdioma" class="form-control" id="EditarIdioma"  title="Modifique el  idioma" value="">
          </div>
          <input type="text"  name="idIdioma" class="form-control" id="idIdioma"  hidden>
          <button type="submit" id="btn_editarIdioma" class="btn btn-primary" name="modificarIdioma" value="Modificar">Modificar</button>

        </form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button class="btn btn-primary" data-bs-target="#IdiomasModal" data-bs-toggle="modal">Volver al registro</button>
      </div>
    </div>
  </div>
</div>
