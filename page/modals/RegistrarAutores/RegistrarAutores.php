
<!-- Modal Registrar Autores -->
<div class="modal fade" id="AutoresModal" tabindex="-1" aria-labelledby="AutoresModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="AutoresModalLabel">Registrar Autores</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <p class="h6">Registro de nuevos Autores</p>
        </div>
        <form id="form_nuevosAutores" class="mb-2">

          <div class="mb-3">
            <label for="nuevoAutor" class="col-form-label">Nombre y Apellido:</label>
            <input type="text" required name="nombreAutor" class="form-control" id="nuevoAutor" title="Registre el nombre y apellido del autor" value="">
          </div>
          <button type="submit" id="btn_registrarNuevoAutor" class="btn btn-primary" name="registrarAutor">Registrar</button>

        </form>
        <table class="table mt-4" id="TablaAutores">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nombre de Autor</th>
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

<!-- Modal Editar Autores-->
<div class="modal fade" id="ModificarAutor" tabindex="-1" aria-labelledby="ModificarAutorLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="ModificarAutorLabel">Modificar Autores</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <p class="h6">Modificar Autor</p>
        </div>
        <form id="form_ModificarAutores" class="mb-2">

          <div class="mb-3">
            <label for="EditarAutor" class="col-form-label"> Modificar Nombre y Apellido:</label>
            <input type="text" required name="EditarAutor" class="form-control" id="EditarAutor"  title="Registre el nombre y apellido del autor" value="">
          </div>
          <input type="text"  name="idAutor" class="form-control" id="idAutor"  hidden>
          <button type="submit" id="btn_editarAutor" class="btn btn-primary" name="modificarAutor" value="Modificar">Modificar</button>

        </form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button class="btn btn-primary" data-bs-target="#AutoresModal" data-bs-toggle="modal">Volver al registro</button>
      </div>
    </div>
  </div>
</div>
