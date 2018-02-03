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
						<h3 class="panel-title">Libro de notas</h3>
					</div>
					<div class="panel-body">
						<form action="<?php echo pb;?>/pdf/bookNote" method="POST" enctype="application/x-www-form-urlencoded" target="_blank">
					    	<div class="row">
					    		<div class="col-md-4">
					    			<div class="form-group">
					    				<label for="">Sedes</label>
							    		<select name="sede" id="selectSedeBook" class="form-control" required>
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
					    				<select name="grupo" id="selectGrupoBook" class="form-control" required>
							    			<?php
							    				
							    			?>
							    		</select>
					    			</div>
					    		</div>
					    		<div class="col-md-3">
					    			<div class="form-group">
					    				<label for="">Fecha</label>
					    				<input type="date" name="fecha" class="form-control">
					    			</div>
					    		</div>
					    	</div>
					    	<div class="row">
					    		<div class="col-md-5">
					    			<div class="form-group">
					    				<select name="" id="selectStudentBook" class="form-control" multiple="multiple" size="13">
							    			<?php
							    				
							    			?>
							    		</select>
					    			</div>
					    		</div>
					    		<div class="col-md-2">
					    			<button type="button" class="btn btn-default btn-block" id="selectStudentBook_rightAll"><i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
					    			<button type="button" id="selectStudentBook_rightSelected" class="btn btn-default btn-block"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
					    			<button type="button" id="selectStudentBook_leftSelected" class="btn btn-default btn-block"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
					    			<button type="button" id="selectStudentBook_leftAll" class="btn btn-default btn-block"><i class="fa fa-angle-double-left" aria-hidden="true"></i></button>
					    		</div>
					    		<div class="col-md-5">
					    			<div class="form-group">
							    		<select name="students[]" id="selectStudentBook_to" class="form-control" multiple="multiple" size="13">
							    			<?php
							    				
							    			?>
							    		</select>
							    	</div>
					    		</div>
					    	</div>
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
					    		<input type="submit" name="btn_p_superacion" class="btn btn-primary" value="Crear Libro">
					    	</div>
					    </form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php 
		// include('asignaturesModal.tpl.php');
		// include('messages.tpl.php');
	?>
	<script src="<?php echo pb;?>/Public/js/jquery-1.12.4.js"></script>
   	<script src="<?php echo pb;?>/Public/js/bootstrap.min.js"></script>
   	<script src="<?php echo pb;?>/Public/js/multiselect.js"></script>
   	<script>
   		$(document).ready(function(){

   			var periods = <?= count($periods) ?>;
			var urls = "http://2017.ateneasas.com/boletin";
   			var db = $("#db").val();
   			// 
   			$('#selectSedeBook').change(function(){
   				var db = $("#db").val();
   				$.ajax({
	                type: "GET",
	                dataType: "html",
	                url: urls+'/ajax/getGroups/'+this.value+"/"+db,
	                success: function(data){
	                    $('#selectGrupoBook').empty();
	                    $('#selectStudentBook').empty();

	                    $('#selectGrupoBook').append(
	                    	$('<option>- Sellecione un grupo -</option>')
	                    )
	                    $('#selectGrupoBook').append(data);
	                },
	                error(xhr, estado){
	                    console.log(xhr);
	                    console.log(estado);
	            	}
	            });
   			});

   			// 
   			$('#selectGrupoBook').change(function(){
   				
   				$.ajax({
	                type: "GET",
	                dataType: "html",
	                url: urls+'/ajax/getStudents/'+this.value+"/"+db,
	                success: function(data){
	                    $('#selectStudentBook').empty().append(data);
	                },
	                error(xhr, estado){
	                    console.log(xhr);
	                    console.log(estado);
	            	}
	            });
   			});

   			// 
   			$('#selectStudentBook').multiselect({
				search: {
				 
				left: '<input type="text" name="ql" class="form-control" placeholder="Buscar..." style="margin-bottom:5px;"/>',
				 
				right: '<input type="text" name="qr" class="form-control" placeholder="Buscar..." style="margin-bottom:5px;"/>',
				 
				}
			});

			$('#mMinAsignature').submit(function(e){
				e.preventDefault();
				var form = $(this);

				$('#minAsignatures').val(
					form.find('#asignatures').val()
				);

				$('#reprobate').val(
					form.find('#typeReprobate').val()
				);

				// Checkboc
				if($("#academicCheckbox").is(':checked')){
					$("#academicCheck").val($("#academicCheckbox").val());
				}else{
					$("#academicCheck").val("");
				}
					
				$("#mMinAsignature").modal('hide');
			});
   		});
   	</script>
</body>
</html>