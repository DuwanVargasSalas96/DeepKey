<!----------------------------------
  Modal Register Keys
----------------------------------->

<!--Custom Script-->
<script src="views/js/controls/keys.js"></script>
<script src="views/js/requests/keys.js"></script>
<script src="views/js/ui/keys.js"></script>

<!--Body-->
<section>
	<div class="modal modal-fade" tabindex="-1" id="modalKeys">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title text-secondary"></h4>
					<div class="d-inline">
						<button class="btn btn-primary" id="btnEditKey" type="button"><i class="fas fa-pen"></i></button>
						<button class="btn btn-danger" id="btnDeleteKey" type="button"><i class="fas fa-trash"></i></button>
						<button class="btn btn-secondary" data-dismiss="modal" type="button"><i class="fas fa-times"></i></button>
					</div>
				</div>
				<form id="formKey">
					<div class="modal-body">
						<div class="form-group">
							<input class="form-control" type="text" id="keyName" placeholder="Nombre">
						</div>
						<div class="form-group">
							<input class="form-control" type="text" id="keyUser" placeholder="Usuario">
						</div>
						<div class="input-group mb-3">
							<input class="form-control" type="password" id="keyPwd" placeholder="Contraseña">
							<div class="input-group-append">
								<span class="input-group-text" >
									<i class="fas fa-eye"></i>
								</span>
							</div>
						</div>
						<div class="form-group">
							<textarea class="form-control" id="keyNotes" placeholder="Notas"></textarea>
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" data-dismiss="modal" type="button">Cancelar</button>
						<button class="btn btn-primary" type="submit">Guardar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>