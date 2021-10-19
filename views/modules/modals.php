<section>
    <div class="modal modal-fade" tabindex="-1" id="modalKey">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-primary">Registrar Key</h4>
                    <div class="d-inline">
                        <button class="btn btn-primary" id="btnEditKey" type="button"><i class="fas fa-pen"></i></button>
                        <button class="btn btn-danger" id="btnDeleteKey" type="button"><i class="fas fa-trash"></i></button>
                        <button class="btn btn-secondary" id="btnCLose" data-dismiss="modal" type="button"><i class="fas fa-times"></i></button>
                    </div>
                </div>
                <form id="formKey">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="keyname">Nombre</label>
                            <input class="form-control" type="text" id="keyName" placeholder="Nombre">
                        </div>
                        <div class="form-group">
                            <label for="keyuser">Usuario</label>
                            <input class="form-control" type="text" id="keyUser" placeholder="Usuario">
                        </div>
                        <div class="form-group">
                            <label for="keypassword">Contraseña</label>
                            <input class="form-control" type="text" id="keyPassword" placeholder="Contraseña">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal" type="button">Cancelar</button>
                        <button class="btn btn-primary" id="btnSaveKey" type="submit">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>