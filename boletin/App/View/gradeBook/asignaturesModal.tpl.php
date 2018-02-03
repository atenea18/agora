<!-- Modal -->
<div class="modal fade" id="mMinAsignature" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
	    <div class="modal-content">
	    	<form action="" id="formMinAsignatures">
		    	<div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Maximo de Asignaturas o Areas para reprobar el año lectivo</h4>
		      	</div>
		      	<div class="modal-body">
		      		<div class="container-fluid">
		      			<div class="row">
		      				<div class="col-md-5">
		      					<div class="form-group">
		      						<label for="">Tipo</label>
		      						<select name="typeReprobate" id="typeReprobate" class="form-control">
		      							<option value="area">Area</option>
		      							<option value="asignatura">Asignatura</option>
		      						</select>
		      					</div>
		      				</div>
		      				<div class="col-md-7">
		      					<div class="form-group">
		      						<label for="">Cantidad</label>
		      						<input type="text" name="asignatures" id="asignatures" class="form-control">
		      					</div>
		      				</div>
		      			</div>
						<div class="row">
		      				<div class="col-md-12">
		      					<div class="form-group">
		      						<label for="academicCheckbox">
		      							<input type="checkbox" id="academicCheckbox" value="academic" checked>
		      							Solo académicas	
		      						</label>
		      					</div>
		      				</div>
		      			</div>
		      		</div>
		      	</div>
		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
		        	<button type="submit" class="btn btn-primary">Guardar</button>
		      	</div>
	      	</form>
	    </div>
	</div>
</div>