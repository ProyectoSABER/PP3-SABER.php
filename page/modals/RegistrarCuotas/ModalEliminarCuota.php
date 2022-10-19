<div class="modal fade" id="md_EliminarCuotas" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Eliminar Cuota</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario Modal -->
                <div class="modal-body">
                    <h5>Confirme la Eliminación de la cuota.
                    </h5>
                    <p><b>¡Está Accion no se podrá deshacer!!</b> <br/>
                    No se verán afectadas las cuotas ya abonadas.
                    </p>
                    
                    <table class="table table-striped" id="tabla_InsertarCuotas">
                        <thead>
                            <tr>
                                <th>Mes/Año</th>
                                <th>Fecha Vencimiento</th>
                                <th>Categoria Socio</th>
                                <th>Valor de Cuota</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>

                    <button id="modal_delete" class="btn btn-primary btn-danger" type="button" name="modal_reg" value="modal_reg"><i class="fa fa-fw fa-lg fa-check-circle"></i>ELIMINAR</button>&nbsp;&nbsp;&nbsp;


                    
                </div>



            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>