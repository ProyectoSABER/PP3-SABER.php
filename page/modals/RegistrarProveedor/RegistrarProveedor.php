<!-- Modal Registrar Proveedores -->
<div class="modal fade" id="ProveedoresModal" tabindex="-1" aria-labelledby="ProveedoresModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="ProveedoresModalLabel">Registrar Proveedores</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <p class="h6">Registro de nuevos Proveedores</p>
        </div>
        <div class="container-fluid">

          <form id="form_nuevosProveedores" class="mb-2">
            <!-- Datos del Proveedor -->
            <div class="container border mt-2">
              <label class="col-form-label ms-auto">
                <h6>Datos del Proveedor</h6>
              </label>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-floating mb-2">
                    <input type="number" min="20000000000" placeholder="Cuit Proveedor:" required name="cuitProveedor" class="form-control" id="cuitProveedor" title="Registre el cuit del proveedor Numerico Sin espacios ni guiones">
                    <label for="cuitProveedor" class="">Cuit Proveedor:</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating mb-2">
                    <input type="text" placeholder="Nombre y Apellido" required name="nombreYapellido" class="form-control" id="nombreYapellido" title="Registre el Nombre y apellido del proveedor">
                    <label for="nombreYapellido">Nombre y Apellido:</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating mb-2">
                    <select required name="CategoriaProveedor" class="form-control" id="CategoriaProveedor" title="Seleccione una categoria del proveedor">
                      <option selected disabled hidden value="-1">Seleccione una categoria</option>
                    </select>
                    <label for="CategoriaProveedor" class="">Categoria Proveedor:</label>
                  </div>
                </div>
              </div>
            </div>
            <!-- Dirección -->
            <div class="container border mt-2">
              <label class="col-form-label ms-auto">
                <h6>Dirección</h6>
              </label>
              <div class="row">
                <!-- Pais -->
                <div class="col-md-4">

                  <div class="input-group mb-2">
                    <div class="form-floating flex-grow-1">
                      <select required name="pais" class="form-control" id="pais" title="Seleccione el pais del proveedor">
                        <option selected disabled hidden value="-1">Seleccione un Pais</option>
                      </select>
                      <label for="pais">Pais:</label>
                    </div>
                    <button class="btn btn-outline-secondary"><i class="fas fa-plus"></i></button>

                  </div>
                </div>
                <!-- Provincia -->
                <div class="col-md-4">
                  <div class="input-group mb-2">

                    <div class="form-floating flex-grow-1">
                      <select required disabled name="Provincia" class="form-control" id="Provincia" title="Seleccione la Provincia de la direccion del proveedor">
                        <option selected disabled hidden value="-1">Seleccione una Provincia</option>
                      </select>
                      <label for="Provincia" class="">Provincia:</label>
                    </div>
                    <button class="btn btn-outline-secondary" disabled><i class="fas fa-plus"></i></button>

                  </div>
                </div>

                <!-- Localidad -->
                <div class="col-md-4">
                  <div class="input-group input-group-sm mb-2">
                    <div class="form-floating  form-floating-sm flex-grow-1">
                      <select required disabled name="Localidad" class="form-control" id="Localidad" title="Seleccione la Localidad de la direccion del proveedor">
                        <option selected disabled hidden value="-1">Seleccione una Localidad</option>
                      </select>
                      <label for="Localidad">Localidad:</label>
                    </div>
                    <button class="btn btn-outline-secondary"><i class="fas fa-plus"></i></button>

                  </div>
                </div>



              </div>
              <div class="row">
                <!-- Barrio -->
                <div class="col-md-4">
                  <div class="input-group mb-2">
                    <div class="form-floating flex-grow-1">

                      <select required name="Barrio" disabled class="form-control" id="Barrio" title="Seleccione el barrio de la direccion del proveedor">
                        <option selected disabled hidden value="-1">Seleccione un barrio</option>
                      </select>
                      <label for="Barrio" class="">Barrio:</label>
                    </div>
                    <button class="btn btn-outline-secondary"><i class="fas fa-plus"></i></button>

                  </div>
                </div>
                <!-- Calle -->
                <div class="col-md-4">
                  <div class="form-floating mb-2">
                    <input type="text" placeholder="Calle" required name="Calle" class="form-control" id="Calle" title="Registre la Calle del proveedor">
                    <label for="Calle" class="">Calle:</label>
                  </div>
                </div>
                <!-- Altura -->
                <div class="col-md-3">
                  <div class="form-floating mb-2">
                    <input type="number" placeholder="Altura" required name="Altura" class="form-control" id="Altura" title="Registre la Altura de la direccion del proveedor">
                    <label for="Altura" class="">Altura:</label>
                  </div>
                </div>


              </div>



            </div>

            <!-- Contacto -->

            <div class="container border mt-2">
              <label class="col-form-label ms-auto">
                <h6>Contacto</h6>
              </label>
              <div class="row" id="contenedor_contacto">
                <div class="col-md-4">
                  <div class="form-floating mb-2">
                    <select required name="TipoContacto" class="form-control" id="TipoContacto" title="Seleccione un Tipo de Contacto del proveedor">
                      <option selected disabled hidden value="-1">Seleccione un Tipo Contacto:</option>
                    </select>
                    <label for="Pais">Tipo Contacto:</label>
                  </div>
                </div>

              </div>

            </div>


          </form>
        </div>


      </div>
      <div class=" modal-footer">
        <button type="button" id="btn_registrarNuevoProveedor" class="btn btn-primary" name="registrarProveedor">Registrar</button>
        <button class="btn btn-primary" data-bs-target="#TablaProveedor" data-bs-toggle="modal">Listado de proveedores</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Editar Proveedores-->
<div class="modal fade" id="ModificarProveedor" tabindex="-1" aria-labelledby="ModificarProveedorLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="ModificarProveedorLabel">Modificar Proveedores</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <p class="h6">Modificar Proveedor</p>
        </div>
        <form id="form_ModificarProveedores" class="mb-2">

          <div class="mb-3">
            <label for="EditarProveedor" class="col-form-label"> Modificar Nombre y Apellido:</label>
            <input type="text" required name="EditarProveedor" class="form-control" id="EditarProveedor" title="Modifique el  proveedor" value="">
          </div>
          <input type="text" name="idProveedor" class="form-control" id="idProveedor" hidden>
          <button type="submit" id="btn_editarProveedor" class="btn btn-primary" name="modificarProveedor" value="Modificar">Modificar</button>

        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button class="btn btn-primary" data-bs-target="#ProveedoresModal" data-bs-toggle="modal">Volver al registro</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Tabla Proveedores-->
<div class="modal fade" id="TablaProveedor" tabindex="-1" aria-labelledby="TablaProveedorLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="TablaProveedorLabel">Tabla Proveedores</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <p class="h6">Tabla de Proveedores</p>
        </div>
        <table class="table mt-4" id="TablaProveedores">
          <thead>
            <tr>
              <th scope="col">Cuit de Proveedor</th>
              <th scope="col">Nombre de Proveedor</th>
              <th scope="col">Opciones</th>

            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button class="btn btn-primary" data-bs-target="#ProveedoresModal" data-bs-toggle="modal">Volver al registro</button>
      </div>
    </div>
  </div>
</div>