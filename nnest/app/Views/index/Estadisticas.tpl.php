<!DOCTYPE html>
<html>
<head>
	<title>ESTADÍSTICAS</title>
	<meta charset="UTF-8" />   
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?=URL?>/web/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?=URL?>/web/css/estilos.css">
	<link rel="stylesheet" type="text/css" href="<?=URL?>/web/css/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
</head>
<body>
	<br><br>



	<div class="container">
		<div class="row titles-rows seconds">
			<div class="panel panel-primary"> 
				<div class="panel-heading"> 
					
					<center><h4>ESTADISTICAS</h4></center>

				</div> 
				<div class="panel-body"> 
					

					<nav class="navbar navbar-default">
						<div class="container-fluid">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								
							</div>

							<!-- Collect the nav links, forms, and other content for toggling -->
							
							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
								<ul class="nav navbar-nav" >



									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Estudiantes<span class="caret"></span></a>
										<ul class="dropdown-menu">

											<li data-accion="click" data-v="EJ" data-value="/Estudiantes/getListadoGenero/"><a href="#">Matriculados por sexo</a></li>
											<li data-accion="click" data-v="EJ" data-value="/Estudiantes/getEficiencia/"><a  href="#">Eficiencia</a></li>

										</ul>
									</li>
									<li data-accion="click" data-v="" data-value="/Consolidado/getConsolidado/"><a  href="#">Consolidado</a></li>								
									<li data-accion="click" data-v="" data-value="/PromedioGrupo/getPromedioGrupo/"><a  href="#">Promedio Grupo</a></li>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reprobadas<span class="caret"></span></a>
										<ul class="dropdown-menu">

											<li data-accion="click" data-v="RR" data-value="/Reprobadas/getReprobadas/"><a href="#">Estudiantes Reprobados</a></li>
											<li data-accion="click" data-v="RF" data-value="/Reprobadas/getReprobadasFiltro/"><a  href="#">Reprobados Detallados</a></li>

										</ul>
									</li>

									<li data-v="" data-accion="click" data-v="" data-value="Docentes"><a href="#">Docentes</a></li>
									<li data-v="" data-accion="click" data-v="" data-value="Areas"><a href="#">Areas</a></li>

								</ul>



							</div><!-- /.navbar-collapse -->
							
						</div><!-- /.container-fluid -->
					</nav>
				</div> 

			</div>	

			<div class="col-md-3 ocultar-panel" >	
				<form id="idform" action=""  method="post">

					<input type="hidden" name="db" value="<?php echo $db?>">
					<input type="hidden" name="grupo" id="inputGrupo">
					<input type="hidden" name="periodo" id="inputPeriodo">
					<input type="hidden" name="academicas" id="inputAcademica">
					<input type="hidden" name="area" id="inputArea">
					<input type="hidden" name="reprobados" id="inputReprobadas">
					<input type="submit" class="btn btn-primary btn-md" name="" value="PDF" id="btnpdf">
					<!--<a href="#" class="btn btn-success btn-md" id="btnexcel">EXCEL</a>	-->
				</form>				
				
				
			</div>
			<div class="col-md-6  ocultar-panel">
				<div class="form-group" id="gruposCheckbox">
					<label class="radio-inline">
						<input type="checkbox" id="idcheckAreas" name=""> Ver por Áreas
					</label>
					<label class="radio-inline" id="labelReprobados">
						<input type="checkbox" id="idReprobados" name=""> Reprobados
					</label>
					<label class="radio-inline academicas">
						<input type="checkbox" id="idAcademicas" name=""> Solo Acdémicas
					</label>
				</div>
			</div>

			<div class="col-md-3">

			</div>



		</div>
	</div>
	<br>
	
	<div class="container" id="contenedor-estadisticas">

		

	</div>
	<div class="container" id="contentGrupos">
		
	</div>



	<input type="hidden" id= name="">
	<input type="hidden" id="gradoDB" value="<?=$grado; ?>">
	<input type="hidden" id="grupoDB" value="<?php echo $grupo ?>">
	<input type="hidden" id="asignaturaDB" value="<?php echo $asignatura ?>">
	<input type="hidden" id="databaseDB" value="<?php echo $db?>">
	<input type="hidden" id="periodoDB" value="1">

	<input type="hidden" id="minimo" value="<?php echo $valoracion[1]['minimo'] ?>">
	<input type="hidden" id="maximo" value="<?php echo $valoracion[3]['maximo'] ?>">


	<input type="hidden" id="porcentaje_grupo1" value="<?=$porcentajes['porcentaje_grupo1']; ?>">
	<input type="hidden" id="porcentaje_grupo2" value="<?=$porcentajes['porcentaje_grupo2']?>">
	<input type="hidden" id="porcentaje_grupo3" value="<?=$porcentajes['porcentaje_grupo3']?>">
	<input type="hidden" id="porcentaje_autoeva" value="<?=$porcentajes['porcentaje_autoevaluacion']?>">
	

	<script src="<?=URL?>/web/js/jquery-1.12.4.js"></script>   
	<script src="<?=URL?>/web/js/bootstrap.min.js"></script>
	<script src="<?=URL?>/web/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/plug-ins/1.10.15/sorting/formatted-numbers.js"></script>
	<script src="<?=URL?>/web/js/app.js"></script>


</body>
</html>