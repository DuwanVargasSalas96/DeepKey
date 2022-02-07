<!----------------------------------
  Modal Register Keys
----------------------------------->

<!--Body-->
<section>
	<div class="modal modal-fade" tabindex="-1" id="modalDeepKey">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title text-secondary">Registrar Key</h4>
					<div class="d-inline">
						<button class="btn btn-primary" id="btnEditKey" type="button"><i class="fas fa-pen"></i></button>
						<button class="btn btn-danger" id="btnDeleteKey" type="button"><i class="fas fa-trash"></i></button>
						<button class="btn btn-secondary" id="btnClose" data-dismiss="modal" type="button"><i class="fas fa-times"></i></button>
					</div>
				</div>
				<form id="formDeepKey">
					<div class="modal-body">
						<div class="form-group">
							<input class="form-control" type="text" id="deepkeyName" placeholder="Nombre">
						</div>
						<div class="form-group">
							<input class="form-control" type="text" id="deepkeyUser" placeholder="Usuario">
						</div>
						<div class="input-group mb-3">
							<input class="form-control" type="password" id="deepkeyPassword" placeholder="Contraseña">
							<div class="input-group-append">
								<span class="input-group-text" >
									<i class="fas fa-eye"></i>
								</span>
							</div>
						</div>
						<div class="form-group">
							<textarea class="form-control" id="deepkeyNotes" placeholder="Notas"></textarea>
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