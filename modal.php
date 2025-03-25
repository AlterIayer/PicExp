<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Beneficiario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <form id="formBeneficiario">
          <div class="form-group">
            <label for="nombre-ben" class="col-form-label">Nombre:</label>
            <input disabled type="text" class="form-control" id="nombre-ben">
          </div>
          <div class="form-group">
            <label for="apellidos-ben" class="col-form-label">Apellidos:</label>
            <input disabled type="text" class="form-control" id="apellidos-ben">
          </div>
          <div class="form-group">
            <label for="telefono1-ben" class="col-form-label">Teléfono Principal:</label>
            <input type="text" class="form-control" id="telefono1-ben">
          </div>
          <div class="form-group">
            <label for="telefono2-ben" class="col-form-label">Teléfono Secundario:</label>
            <input type="text" class="form-control" id="telefono2-ben">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button id="guardarCambios" type="button" class="btn btn-primary">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>
