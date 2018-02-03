<!-- Modal -->
<div class="modal fade" id="mMessages" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
	    <div class="modal-content">
	    	<form action="" id="formMessages" method="POST" action="">
		    	<div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Configurar mensajes del informe final</h4>
		      	</div>
		      	<div class="modal-body">
		      		<div class="container-fluid">
		      			<div class="row">
		      				<div class="col-md-12">
		      					<div class="form-group">
		      						<label for="">Mensaje General</label>
		      						<textarea name="mensaje_general" id="mensaje_general" class="form-control"></textarea>
		      					</div>
		      				</div>
		      			</div>
		      			<div class="row">
		      				<div class="col-md-12">
		      					<div class="form-group">
		      						<label for="">Aprobación Nitido</label>
		      						<textarea name="aprovacion_nitido" id="aprovacion_nitido" class="form-control"></textarea>
		      					</div>
		      				</div>
		      			</div>
		      			<div class="row">
		      				<div class="col-md-12">
		      					<div class="form-group">
		      						<label for="">Alguna Reprobación</label>
		      						<textarea name="alguna_reprobacion" id="alguna_reprobacion" class="form-control"></textarea>
		      					</div>
		      				</div>
		      			</div>
		      			<div class="row">
		      				<div class="col-md-12">
		      					<div class="form-group">
		      						<label for="">Reprobación Grado</label>
		      						<textarea name="reprobacion_grado" id="reprobacion_grado" class="form-control"></textarea>
		      					</div>
		      				</div>
		      			</div>
		      			<div class="row">
		      				<div class="col-md-12">
		      					<div class="form-group">
		      						<label for="">Mensaje para Preescolar</label>
		      						<textarea name="mensaje_para_preescolar" id="mensaje_para_preescolar" class="form-control"></textarea>
		      					</div>
		      				</div>
		      			</div>
		      		</div>
		      	</div>
		      	<div class="modal-footer">
		        	<button type="button" id="btncancelMessage" class="btn btn-default" data-dismiss="modal">Cancelar</button>
		        	<button type="submit" id="btnMessageSave" class="btn btn-primary">Guardar</button>
		      	</div>
	      	</form>
	    </div>
	</div>
</div>