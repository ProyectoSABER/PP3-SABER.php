<div class="modal fade" id="modalMetodPago" tabindex="-1" aria-labelledby="modalMetodPagoLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalMetodPagoLabel">Método de Pago</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <label for="recipient-name" class="col-form-label">
          <h5> Seleccione un Método de Pago:</h5>
        </label>


        <div class="btn-group ms-1 me-1" role="group" aria-label="Basic example">

          <div class="d-flex justify-content-around" id="contendorRadioMetodoPago">
            <div class="col-md-4">
              <div class="d-flex flex-column align-items-center">
                <input type="radio" class="btn-check" id="btn-group_Efectivo" name="metodoPago" value="1" title="Efectivo" autocomplete="off">
                <label for="btn-group_Efectivo" class="btn ">Efectivo<img src="./images/System/metodoPago/Efectivo.jpg" alt="imagen Efectivo" width="75" height="75"></label>
              </div>
              <div class="d-flex flex-column align-items-center">
                <input type="radio" class="btn-check" id="btn-group_Deposito" name="metodoPago" value="4" title="Deposito">
                <label for="btn-group_Deposito" class="btn">Transferecia<img src="./images/System/metodoPago/Deposito_Transferencia.png" alt="imagen Efectivo" width="75" height="75"></label>

              </div>
            </div>
            <div class="col-md-4">
              <div class="d-flex flex-column align-items-center">
                <input type="radio" class="btn-check" id="btn-group_Debito" name="metodoPago" value="2" title="Tarj. Debito">
                <label for="btn-group_Debito" class="btn">Débito<img src="./images/System/metodoPago/debito.png" alt="imagen Efectivo" width="75" height="75"></label>

              </div>
              <div class="d-flex flex-column align-items-center">
                <input type="radio" class="btn-check" id="btn-group_Credito" name="metodoPago" value="3" title="Tarj. Credito">
                <label for="btn-group_Credito" class="btn">Tarj. Credito<img src="./images/System/metodoPago/Credito.png" alt="imagen Efectivo" width="75" height="75"></label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="d-flex flex-column align-items-center">

                <input type="radio" class="btn-check" id="btn-group_MercadoPagoTransferecia" name="metodoPago" value="5" title="MercadoPago Transferecia">
                <label for="btn-group_MercadoPagoTransferecia" class="btn">MercadoPago<img src="./images/System/metodoPago/mercadopago.jpg" alt="imagen Efectivo" width="75" height="75"></label>
              </div>
              <div class="d-flex flex-column align-items-center">

                <input type="radio" class="btn-check" id="btn-group_MercadoPagoQr" name="metodoPago" value="6" title="MercadoPago Qr">
                <label for="btn-group_MercadoPagoQr" class="btn">Mer.Pago Qr<img src="./images/System/metodoPago/MercadoPagoQRjpg.jpg" alt="imagen Efectivo" width="75" height="75"></label>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary"id="btnMetodoPago_cerrar">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnMetodoPago_Seleccionar" disabled>Seleccionar</button>
      </div>
    </div>
  </div>
</div>