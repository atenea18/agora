<table class="table content-table " id="content-inputs">
	
	
	<!-- On rows -->
	<thead class="">
		<tr id="background-rows-table"  valign="middle">
			<th rowspan="2">#</th>
			<th rowspan="2">APELLIDOS Y Nombres Estudiante</th>
			<th rowspan="2"> <span data-toggle="tooltip" data-placement="top" title="ESTADO"> Est</span></th>
			<th rowspan="2"> <span data-toggle="tooltip" data-placement="top" title="NOVEDADES">Nov</span></th>
			<th rowspan="2">afa</th>
			<th rowspan="2"> <span data-toggle="tooltip" data-placement="top" title="INASISTENCIA">FAA</span></th>

			<th colspan="5">AMBITO ACADÉMICO</th>
			
			<th rowspan="2" ><?=$porcentajes['porcentaje_grupo1']; ?>%</th>

			<th colspan="5" >AMBITO ACTITUDINAL</th>			
			<th rowspan="2"><?=$porcentajes['porcentaje_grupo2']?>%</th>

			<!--
			<th colspan="3" >DESEMPEÑO SOCIAL</th>			
			<th rowspan="2"><?=$porcentajes['porcentaje_grupo3']?>%
			
			</th>
			-->

			<th rowspan="2">aee</th>
			<th rowspan="2">VAEE <?=$porcentajes['porcentaje_autoevaluacion']?>%</th>
			<th rowspan="2">per 1</th>
			<th rowspan="2">..</th>
			<th rowspan="2">..</th>
		</tr>
		<tr valign="middle" class="border-th">


			<th data-update="dc">
				<?php //foreach ($codigos  as  $row) 	{ echo $row['posicion']=='dc1'?$row["cod_desemp"]:'';}?>				
			</th>

			<th data-update="dc">
				
			</th>
			<th data-update="dc">
				
			</th>
			<th data-update="dc">
				
			</th>
			<th data-update="dc">
				
			</th>

			<th></th>
			<th></th>
			<th></th>

			<th></th>
			<th></th>
		

		</tr>


	</thead>

	<?php
	$cont = 0;
	$num = 1;
	$active = 'active';


	foreach ($datos  as $clave => $row) {


		?>

		<tr class="<?=$active = $num%2==0?'active':''?> inputs" id="<?=$row['id_estudiante']?>" >

			<th>
				<?=$num++;?>
			</th>
			<td>
				<span data-id="<?=$row['id_estudiante']?>">

					<?= $row['primer_apellido']." ".$row['segundo_apellido']." ". $row['primer_nombre']." ".$row['segundo_nombre']?>


				</span>  
			</td>

			<td>
				<span data-id="<?=$row['id_estudiante']?>"> <?=$row['estatus']?> </span>
			</td>
			<td>
				<span> <?=$row['novedad']?></span>
			</td>
			<td>
				<i data-id="<?=$row['id_estudiante']?>" class="fa fa-user" aria-hidden="true"></i>
			</td>

			<td >
				<input data-id="<?=$row['id_estudiante']?>" name="inasistencia_p1" data-cont="<?=$cont++;?>" step="1.0"  type="number"  class="form-control"   value="<?=$row['inasistencia_p1']?>"> 


			</td>       
			<td>
				<input data-id="<?=$row['id_estudiante']?>" data-desemp="dc" name="dc1"  data-cont="<?=$cont++;?>" step="0.1" type="text" class="form-control " value="<?=$row['dc1']?>">                 
			</td>
			<td>
				<input data-id="<?=$row['id_estudiante']?>" data-desemp="dc" name="dc2" data-cont="<?=$cont++;?>" step="0.1"   type="text"  class="form-control"    value="<?=$row['dc2']?>">                
			</td>

			<td>              
				<input data-id="<?=$row['id_estudiante']?>" data-desemp="dc" name="dc3" data-cont="<?=$cont++;?>" step="0.1"   type="text"  class="form-control" placeholder=""
				value="<?=$row['dc3']?>">  

			</td>
			<td>
				<input data-id="<?=$row['id_estudiante']?>" data-desemp="dc" name="dc4" data-cont="<?=$cont++;?>" step="0.1"   type="text"  class="form-control"   value="<?=$row['dc4']?>">                
			</td>
			<td>
				<input data-id="<?=$row['id_estudiante']?>" data-desemp="dc" name="dc5" data-cont="<?=$cont++;?>" step="0.1"   type="text"   class="form-control"   value="<?=$row['dc5']?>">               
			</td>
			<td>  

				<input data-id="<?=$row['id_estudiante']?>" data-desemp="grupodc" name="pcent_dc" data-grupo="lista" type="number" step="0.1"   type="text"  class="form-control input-sin-borde" readonly disabled   value="<?=$row['pcent_dc']?>">  


			</td>
			<td>  
				<input data-id="<?=$row['id_estudiante']?>" data-desemp="dp" name="dp1" data-cont="<?=$cont++;?>" step="0.1"   type="text"  class="form-control"   value="<?=$row['dp1']?>">                
			</td>
			<td>
				<input data-id="<?=$row['id_estudiante']?>" data-desemp="dp" name="dp2" data-cont="<?=$cont++;?>" step="0.1"   type="text"  class="form-control"   value="<?=$row['dp2']?>">                
			</td>
			<td>
				<input data-id="<?=$row['id_estudiante']?>" data-desemp="dp" name="dp3" data-cont="<?=$cont++;?>" step="0.1"   type="text"  class="form-control"   value="<?=$row['dp3']?>">                
			</td>
			<td>
				<input data-id="<?=$row['id_estudiante']?>" data-desemp="dp" name="dp4" data-cont="<?=$cont++;?>" step="0.1"   type="text"  class="form-control"   value="<?=$row['dp3']?>">                
			</td>
			<td>
				<input data-id="<?=$row['id_estudiante']?>" data-desemp="dp" name="dp5" data-cont="<?=$cont++;?>" step="0.1"   type="text"  class="form-control"   value="<?=$row['dp3']?>">                
			</td>
			<td>
				<input data-id="<?=$row['id_estudiante']?>" data-desemp="grupodp"  name="pcent_dp" data-grupo="lista"  type="number" class="form-control input-sin-borde" readonly disabled   value="<?=$row['pcent_dp']?>">  

			</td>

			<!--
			<td>
				<input data-id="<?=$row['id_estudiante']?>" data-desemp="ds" name="ds1" data-cont="<?=$cont++;?>" step="0.1"   type="text"  class="form-control"  value="<?=$row['ds1']?>">               
			</td>
			<td>
				<input data-id="<?=$row['id_estudiante']?>" data-desemp="ds" name="ds2" data-cont="<?=$cont++;?>" step="0.1"   type="text"  class="form-control"  value="<?=$row['ds2']?>">               
			</td>
			<td>
				<input data-id="<?=$row['id_estudiante']?>" data-desemp="ds" name="ds3" data-cont="<?=$cont++;?>" step="0.1"   type="text"  class="form-control" value="<?=$row['ds3']?>">                 
			</td>
			<td>
				<input data-id="<?=$row['id_estudiante']?>" data-desemp="grupods" name="pcent_ds" data-grupo="lista" type="number" class="form-control input-sin-borde" readonly disabled   value="<?=$row['pcent_ds']?>">     

			</td>
			-->
			<td>
				<input data-id="<?=$row['id_estudiante']?>" data-desemp="da" name="aeep1" data-cont="<?=$cont++;?>" step="0.1"   type="text"  class="form-control"  value="<?=$row['aeep1']?>">                
			</td>
			<td>
				<input data-id="<?=$row['id_estudiante']?>" data-desemp="grupoda" data-p="pae" data-grupo="lista" name="porcent_aeep1" type="text" class="form-control input-sin-borde" readonly disabled   value="<?=$row['porcent_aeep1']?>">					              
			</td>
			
			<td>
				<input data-id="<?=$row['id_estudiante']?>" data-desemp="periodo" name="eval_1_per" step="0.1" type="text" class="form-control input-sin-borde" readonly disabled   value="<?=$row['eval_1_per']?>">

			</td>

			<td>..</td>
			<td>..</td>

		</tr>


		<?php

	}

	?>
	<input type="hidden" id="numRegistro" name="" value="<?=$num?>">
	<input type="hidden" id="numInputs" name="" value="<?=$cont;?>">

</table>


<script src="<?=URL?>/web/js/jquery-1.12.4.js"></script>   
<script src="<?=URL?>/web/js/bootstrap.min.js"></script>
<script src="<?=URL?>/web/js/jquery.dataTables.min.js"></script>
<script src="<?=URL?>/web/js/app.js"></script>