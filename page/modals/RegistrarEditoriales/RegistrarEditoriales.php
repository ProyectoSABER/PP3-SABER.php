<!-- Modal Registrar Editoriales -->
<div class="modal fade" id="EditorialesModal" tabindex="-1" aria-labelledby="EditorialesModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="EditorialesModalLabel">Registrar Editoriales</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <p class="h6">Registro de nuevos Editoriales</p>
        </div>
        <form id="form_nuevosEditoriales" class="mb-2">

          <div class="mb-3">
            <label for="nuevoEditorial" class="col-form-label">Nombre de Editorial:</label>
            <input type="text" required name="nombreEditorial" class="form-control" id="nuevoEditorial" title="Registre un nuevo editorial" value="">
          </div>
          <button type="submit" id="btn_registrarNuevoEditorial" class="btn btn-primary" name="registrarEditorial">Registrar</button>

        </form>
        <table class="table mt-4" id="TablaEditoriales">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nombre de Editorial</th>
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

<!-- Modal Editar Editoriales-->
<div class="modal fade" id="ModificarEditorial" tabindex="-1" aria-labelledby="ModificarEditorialLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="ModificarEditorialLabel">Modificar Editoriales</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <p class="h6">Modificar Editorial</p>
        </div>
        <form id="form_ModificarEditoriales" class="mb-2">

          <div class="mb-3">
            <label for="EditarEditorial" class="col-form-label"> Modificar Nombre y Apellido:</label>
            <input type="text" required name="EditarEditorial" class="form-control" id="EditarEditorial"  title="Modifique el  editorial" value="">
          </div>
          <input type="text"  name="idEditorial" class="form-control" id="idEditorial"  hidden>
          <button type="submit" id="btn_editarEditorial" class="btn btn-primary" name="modificarEditorial" value="Modificar">Modificar</button>

        </form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button class="btn btn-primary" data-bs-target="#EditorialesModal" data-bs-toggle="modal">Volver al registro</button>
      </div>
    </div>
  </div>
</div>
