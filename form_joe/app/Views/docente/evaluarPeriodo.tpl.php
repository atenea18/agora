<!DOCTYPE html>
<html>
<head>
	<title>Evaluar Periodos</title>
	<link href="<?php echo URL?>/form_joe/web/css/bootstrap.css" rel="stylesheet" type="text/css">
  	 <link href="<?php echo URL?>/form_joe/web/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css">
   	<link href="<?php echo URL?>/form_joe/web/css/style.css" rel="stylesheet" type="text/css">
	
	<script src="https://use.fontawesome.com/08b028b3f7.js"></script>
</head>
<body>
<div class="container" style="margin-top:10px">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading clearfix">
				<h3 class="pull-left">
					<?php date_default_timezone_set("America/Bogota"); echo "Fecha: ".date("d-m-Y"); ?>
				</h3>
				<a class="btn btn-primary pull-right" href="/grid_t_grupos">Atras</a>
			</div>
			<div class="panel-body">
				<div class="row">
				  <div class="col-md-8">
					 <h4><?php echo utf8_encode($datos['asignatura'])." | ".utf8_encode($datos['nombre_grupo']); ?></h4>
				  </div>
				  <div class="col-md-4">
					 <form action="">
						<div class="form-group">
						   <label for="">periodo</label>
						   <select name="" id="periodos" class="form-control">
							  <option value="0">- Selecciona un periodo -</option>
							  <option value="eval_1_per">Primer periodo</option>
							  <option value="eval_2_per">Segundo periodo</option>
							  <option value="eval_3_per">Tercer periodo</option>
							  <option value="eval_4_per">Cuarto periodo</option>
						   </select>
						</div>
					 </form>
				  </div>
			   </div>
			</div>
		</div>
   </div>
	
	<input type="hidden" id="url" value="<?php echo $_GET['url'];?>">
   <div class="row" id="contenedorTabla">
      
   </div>
</div>
	
   <script src="<?php echo URL?>/form_joe/web/js/jquery-1.12.4.js"></script>
   <script src="<?php echo URL?>/form_joe/web/js/jquery.dataTables.min.js"></script>
   <script src="<?php echo URL?>/form_joe/web/js/dataTables.bootstrap.min.js"></script>
   
   <script type="text/javascript">
     
	 var url = $('#url').val();
	 var arreglo = url.split('/');
	   console.log(url);
	 

      $('#periodos').change(function(){
		
         if(this.value == 0){
            console.log("Nada");
         }else{
            $.ajax({
				//this.value  
               	type: "GET",
				crossDomain: true,
               	url: '<?php echo URL?>/form_joe/docente/getPeriodo/'+this.value+'/'+arreglo[3]+'/'+arreglo[2]+'/'+arreglo[4],
				//dataType: "html",
               success: function(data){
				   console.log(data);
                  $('#contenedorTabla').empty().append(data);
                  // console.log(data);
               },
               error(xhr, estado){
                  console.log(xhr);
               }
            });
         }
      });
   </script>
</body>
</html>