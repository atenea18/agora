<!DOCTYPE html>
<html>
<head>
	<title>Boletin</title>
	<link href="<?php echo pb;?>/Public/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="<?php echo pb;?>/Public/css/style.css" rel="stylesheet" type="text/css">
	<script src="https://use.fontawesome.com/08b028b3f7.js"></script>
</head>
<body>
	
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-primary" style="margin-top: 10px;">
					<div class="panel-heading">
						<h3 class="panel-title">Boletines de notas</h3>
					</div>
					<div class="panel-body">
						<form action="<?php echo pb;?>/pdf/certificate" method="POST" enctype="application/x-www-form-urlencoded" target="_blank">
					    	<div class="row">
					    		<div class="col-md-4">
					    			<div class="form-group">
					    				<label for="">Sedes</label>
							    		<select name="sede" id="selectSedeCertificate" class="form-control" required>
							    			<option value="">- Selecciona una sede -</option>
							    			<?php
							    				foreach ($sedes as $sede) {
							    					echo "<option value='".$sede['id_sede']."' >".utf8_encode($sede['sede'])."</option>";
							    				}
							    			?>
							    		</select>
							    	</div>
					    		</div>
					    		<div class="col-md-3">
					    			<div class="form-group">
					    				<label for="">Grupos</label>
					    				<select name="grupo" id="selectGrupoCertificate" class="form-control" required>
							    			<?php
							    				
							    			?>
							    		</select>
					    			</div>
					    		</div>
								<div class="col-md-3">
					    			<div class="form-group">
					    				<label for="">Año</label>
					    				<select name="anio" id="anio" class="form-control" required>
											<option value="2017">2017</option>
											<option value="2018">2018</option>
							    		</select>
					    			</div>
					    		</div>
					    	</div>
					    	<div class="row">
					    		<div class="col-md-5">
					    			<div class="form-group">
					    				<select name="" id="selectStudentCertificate" class="form-control" multiple="multiple" size="13">
							    			<?php
							    				
							    			?>
							    		</select>
					    			</div>
					    		</div>
					    		<div class="col-md-2">
					    			<button type="button" class="btn btn-default btn-block" id="selectStudentCertificate_rightAll"><i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
					    			<button type="button" id="selectStudentCertificate_rightSelected" class="btn btn-default btn-block"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
					    			<button type="button" id="selectStudentCertificate_leftSelected" class="btn btn-default btn-block"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
					    			<button type="button" id="selectStudentCertificate_leftAll" class="btn btn-default btn-block"><i class="fa fa-angle-double-left" aria-hidden="true"></i></button>
					    		</div>
					    		<div class="col-md-5">
					    			<div class="form-group">
							    		<select name="students[]" id="selectStudentCertificate_to" class="form-control" multiple="multiple" size="13">
							    			<?php
							    				
							    			?>
							    		</select>
							    	</div>
					    		</div>
					    	</div>
					    	<hr>
					    	<div class="row">
					    		<div class="col-md-12 text-center">
					    			<div class="form-group">
									    <label class="radio-inline">
									    	<input type="checkbox" name="showArea" checked> Mostrar Areas
									    </label>
										<label class="radio-inline">
									     	<input type="checkbox" name="showAsignature" checked> Mostrar Asignatura
									    </label>
									    <label class="radio-inline" title="Incluir decimales">
									     	<input type="checkbox" name="decimals" checked> Incluir Decimales
									    </label>
					    			</div>
					    		</div>
					    	</div>
					    	<div class="form-group text-center">
					    		<input type="hidden" id="db" name="db" value="<?php echo $db;?>">
					    		<button type="button" name="btn_config_msgs" class="btn btn-default" data-toggle="modal" data-target="#mFirmas">Configurar firmas</button>
					    		<input type="submit" name="btn_p_superacion" class="btn btn-primary" value="Crear certificado">
					    	</div>
					    </form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php 
		include('firmas.tpl.php');
	?>
	<script src="<?php echo pb;?>/Public/js/jquery-1.12.4.js"></script>
   	<script src="<?php echo pb;?>/Public/js/bootstrap.min.js"></script>
   	<script src="<?php echo pb;?>/Public/js/multiselect.js"></script>
   	<script>
   		$(document).ready(function(){

   			var periods = <?= count($periods) ?>;
			var urls ="http://2017.ateneasas.com/boletin";
   			var db = $("#db").val();
   			// 
   			$('#selectSedeCertificate').change(function(){
   				var db = $("#db").val();
   				$.ajax({
	                type: "GET",
	                dataType: "html",
	                url: urls+'/ajax/getGroups/'+this.value+"/"+db,
	                success: function(data){
	                	console.log(data);
	                    $('#selectGrupoCertificate').empty();
	                    $('#selectStudentCertificate').empty();

	                    $('#selectGrupoCertificate').append(
	                    	$('<option>- Sellecione un grupo -</option>')
	                    )
	                    $('#selectGrupoCertificate').append(data);
	                },
	                error(xhr, estado){
	                    console.log(xhr);
	                    console.log(estado);
	            	}
	            });
   			});

   			// 
   			$('#selectGrupoCertificate').change(function(){
   				
   				$.ajax({
	                type: "GET",
	                dataType: "html",
	                url: urls+'/ajax/getStudents/'+this.value+"/"+db,
	                success: function(data){
	                    $('#selectStudentCertificate').empty().append(data);
	                },
	                error(xhr, estado){
	                    console.log(xhr);
	                    console.log(estado);
	            	}
	            });
   			});

   			// 
   			$('#selectStudentCertificate').multiselect({
				search: {
				 
				left: '<input type="text" name="ql" class="form-control" placeholder="Buscar..." style="margin-bottom:5px;"/>',
				 
				right: '<input type="text" name="qr" class="form-control" placeholder="Buscar..." style="margin-bottom:5px;"/>',
				 
				}
			});

			// 
			// $('#period').change(function(){
			// 	var input = $('#minAsignatures'),
			// 		period = $(this).val();

			// 	if(periods == period || period == 'if'){
			// 		$("#mMinAsignature").modal('show');
			// 	}
			// });

			// $('#mMinAsignature').submit(function(e){
			// 	e.preventDefault();
			// 	var form = $(this);

			// 	$('#minAsignatures').val(
			// 		form.find('#asignatures').val()
			// 	);

			// 	$('#reprobate').val(
			// 		form.find('#typeReprobate').val()
			// 	);

			// 	// Checkboc
			// 	if($("#academicCheckbox").is(':checked')){
			// 		$("#academicCheck").val($("#academicCheckbox").val());
			// 	}else{
			// 		$("#academicCheck").val("");
			// 	}
					
			// 	$("#mMinAsignature").modal('hide');
			// });

			// // final report messages

			$("#mFirmas").on('show.bs.modal', function(){
				var _that = $(this);

				$.get(urls+'/ajax/getFirmas/'+db, function(data, status, xhr){
					
					$.each(data, function(ind, item){
						var elem = $('#'+ind);

						if(elem.length > 0)
						{
							elem.val(item);
						}
					});

				}, 'json');
			});

			$("#formFirmas").submit(function(e){
				e.preventDefault();

				var _that = $(this);

				$.ajax({
					url: urls+'/ajax/saveFirmas/'+db,
					method: 'POST',
					data: _that.serialize(),
					beforeSend: function(){
						_that.find("#btncancelMessage").prop('disabled', true);
						_that.find("#btnMessageSave").text('Guardando..').prop('disabled', true);
					},
					success: function(data){
						
						_that.find("#btncancelMessage").prop('disabled', false);
						_that.find("#btnMessageSave").text('Guardar').prop('disabled', false);
						$("#mMessages").modal('hide');
					}
				});
			});
   		});
   	</script>
</body>
</html>