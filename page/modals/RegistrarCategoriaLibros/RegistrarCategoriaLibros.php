<!-- Modal Registrar CategoriaLibros -->
<div class="modal fade" id="CategoriaLibrosModal" tabindex="-1" aria-labelledby="CategoriaLibrosModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="CategoriaLibrosModalLabel">Registrar CategoriaLibros</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <p class="h6">Registro de nuevos CategoriaLibros</p>
        </div>
        <form id="form_nuevosCategoriaLibros" class="mb-2">

          <div class="mb-3">
            <label for="nuevoCategoriaLibro" class="col-form-label">Nombre de categoria:</label>
            <input type="text" required name="nombreCategoriaLibro" class="form-control" id="nuevoCategoriaLibro" title="Registre un nuevo categoriaLibro" value="">
          </div>
          <button type="submit" id="btn_registrarNuevoCategoriaLibro" class="btn btn-primary" name="registrarCategoriaLibro">Registrar</button>

        </form>
        <table class="table mt-4" id="TablaCategoriaLibros">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nombre de CategoriaLibro</th>
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

<!-- Modal Editar CategoriaLibros-->
<div class="modal fade" id="ModificarCategoriaLibro" tabindex="-1" aria-labelledby="ModificarCategoriaLibroLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="ModificarCategoriaLibroLabel">Modificar CategoriaLibros</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <p class="h6">Modificar CategoriaLibro</p>
        </div>
        <form id="form_ModificarCategoriaLibros" class="mb-2">

          <div class="mb-3">
            <label for="EditarCategoriaLibro" class="col-form-label"> Modificar Nombre y Apellido:</label>
            <input type="text" required name="EditarCategoriaLibro" class="form-control" id="EditarCategoriaLibro"  title="Modifique el  categoriaLibro" value="">
          </div>
          <input type="text"  name="idCategoriaLibro" class="form-control" id="idCategoriaLibro"  hidden>
          <button type="submit" id="btn_editarCategoriaLibro" class="btn btn-primary" name="modificarCategoriaLibro" value="Modificar">Modificar</button>

        </form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button class="btn btn-primary" data-bs-target="#CategoriaLibrosModal" data-bs-toggle="modal">Volver al registro</button>
      </div>
    </div>
  </div>
</div>
