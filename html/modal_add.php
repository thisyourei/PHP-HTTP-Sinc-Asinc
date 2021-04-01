<div id="addDiscModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="add_disc" id="add_disc">
					<div class="modal-header">						
						<h4 class="modal-title">Agregar disco</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Código*</label>
							<input type="text" name="code"  id="code" class="form-control" maxlength="20" required>
						</div>
						<div class="form-group">
							<label>Disco*</label>
							<input type="text" name="name" id="name" class="form-control" maxlength="50" required>
						</div>
						<div class="form-group">
							<label>Autor* (es un campo de la misma tabla)</label>
							<input type="text" name="author" id="author" class="form-control" maxlength="50" required>
						</div>
						<div class="form-group">
							<label>Stock*</label>
							<input type="number" name="stock" id="stock" class="form-control" maxlength="20" max=999 required>
						</div>
						<div class="form-group">
							<label>Precio* (en dólares para validar decimales, 2 máximo)</label>
							<input type="number" name="price" id="price" class="form-control" maxlength="12" max=1000000 min="0" step=".01" required>
						</div>					
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-success" value="Guardar datos">
					</div>
				</form>
			</div>
		</div>
	</div>