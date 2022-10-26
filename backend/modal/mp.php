<div class="modal fade" id="addNewDocument" tabindex="-1" role="dialog" aria-labelledby="addNewDocumentLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="addNewDocumentLabel">Nuevo cliente</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form class="row gutters" method="POST">
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
							<div class="form-group">
								<label for="docTitle">Documento</label>
								<select class="form-control" name="mddoc" required>
									<option>Seleccione documento</option>
									<option value="DNI">DNI</option>
									<option value="PASAPORTE">PASAPORTE</option>
									<option value="CARNET DE EXTRANJERIA">CARNET DE EXTRANJERIA</option>
								</select>
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
							<div class="form-group">
								<label for="dovType">Nº de documento</label>
								<input type="text" maxlength="14" class="form-control"  name="mdnum" placeholder="Nº de documento">
							</div>
						</div>


						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
							<div class="form-group">
								<label for="dovType">Nombre del cliente</label>
								<input type="text"  class="form-control"  name="mdnom" placeholder="Nombre del cliente">
							</div>
						</div>

						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
							<div class="form-group">
								<label for="dovType">Apellido del cliente</label>
								<input type="text"  class="form-control"  name="mdap" placeholder="Apellido del cliente">
							</div>
						</div>


						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
							<button type="submit" name="md_insert" class="btn btn-primary">Guardar</button>
						</div>
						
					</form>
				</div>
				
			</div>
		</div>
</div>