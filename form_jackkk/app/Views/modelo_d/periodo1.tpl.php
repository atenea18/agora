<!--
Plantilla para: 
Simon Nolivar,

-->

<table class="table content-table " id="content-inputs">
	
	<?php $lic = false; ?>
	<!-- On rows -->
	<thead class="">
		<tr id="background-rows-table"  valign="middle">
			<th rowspan="2">#</th>
			<th rowspan="2">APELLIDOS Y Nombres Estudiante</th>
			<th rowspan="2"> <span data-toggle="tooltip" data-placement="top" title="ESTADO"> Est</span></th>
			<th rowspan="2"> <span data-toggle="tooltip" data-placement="top" title="NOVEDADES">Nov</span></th>
			<th rowspan="2">afa</th>
			<th rowspan="2"> <span data-toggle="tooltip" data-placement="top" title="INASISTENCIA">FAA</span></th>

			<th colspan="5"><?=$porcentajes['etiqueta_grupo_1']; ?></th>
			
			<th rowspan="2" ><?=$porcentajes['porcentaje_grupo1']; ?>%</th>

			<th colspan="5" ><?php echo $porcentajes['etiqueta_grupo_2']; 
				if($baseDatos=='agoranet_liceo') {
					echo " Y ".$porcentajes['etiqueta_grupo_3'];
					$lic = true;
				}
			?> </th>			
			<th rowspan="2"><?=$porcentajes['porcentaje_grupo2']?>%</th>

			<th rowspan="2" class="tagAuto">aee</th>
			<th rowspan="2" class="tagAuto">VAEE <?=$porcentajes['porcentaje_autoevaluacion']?>%</th>			
			<th rowspan="2">per 1</th>
			<th rowspan="2">..</th>
			<th rowspan="2">..</th>
		</tr>
		<tr id="item-posicion" valign="middle" class="border-th">


			<th data-update="dc1" data-estado="false" data-tipo="1">
					
			</th>

			<th data-update="dc2" data-estado="false" data-tipo="1">
				
			</th>
			<th data-update="dc3" data-estado="false" data-tipo="1">
				
			</th>
			<th data-update="dc4" data-estado="false" data-tipo="1">
				
			</th>
			<th data-update="dc5" data-estado="false" data-tipo="1">
				
			</th>

			<th data-update="dc6" data-estado="false" data-tipo="2" ></th>
			<th data-update="dc7" data-estado="false" data-tipo="2"></th>
			<th data-update="dc8" data-estado="false" data-tipo="2" ></th>
			<th data-update="dc9" data-estado="false" data-tipo="2"></th>
			<th data-update="dc10" data-estado="false" data-tipo="2"></th>
			
			


			

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
				<input data-id="<?=$row['id_estudiante']?>" data-desemp="dc" name="dc5" data-cont="<?=$cont++;?>" step="0.1"   type="text"  class="form-control"   value="<?=$row['dc5']?>">                
			</td>
			
			<td>  

				<input data-id="<?=$row['id_estudiante']?>" data-desemp="grupodc" name="pcent_dc" data-grupo="lista" type="number" step="0.1"   type="text"  class="form-control input-sin-borde" readonly disabled   value="<?=$row['pcent_dc']?>">  


			</td>
			<td>  
				<input data-id="<?=$row['id_estudiante']?>" data-desemp="dp" name="<?=$lic?'dc6':'dp1'?>" data-cont="<?=$cont++;?>" step="0.1"   type="text"  class="form-control"   value="<?=$lic?$row['dc6']:$row['dp1']?>">                
			</td>
			<td>
				<input data-id="<?=$row['id_estudiante']?>" data-desemp="dp" name="<?=$lic?'dc7':'dp2'?>" data-cont="<?=$cont++;?>" step="0.1"   type="text"  class="form-control"   value="<?=$lic?$row['dc7']:$row['dp1']?>">                
			</td>
			<td>
				<input data-id="<?=$row['id_estudiante']?>" data-desemp="dp" name="<?=$lic?'dc8':'dp3'?>" data-cont="<?=$cont++;?>" step="0.1"   type="text"  class="form-control"   value="<?=$lic?$row['dc8']:$row['dp3']?>">                
			</td>
			<td>
				<input data-id="<?=$row['id_estudiante']?>" data-desemp="dp" name="<?=$lic?'dc9':'dp4'?>" data-cont="<?=$cont++;?>" step="0.1"   type="text"  class="form-control"   value="<?=$lic?$row['dc9']:$row['dp4']?>">                
			</td>
			<td>
				<input data-id="<?=$row['id_estudiante']?>" data-desemp="dp" name="<?=$lic?'dc10':'dp5'?>" data-cont="<?=$cont++;?>" step="0.1"   type="text"  class="form-control"   value="<?=$lic?$row['dc10']:$row['dp5']?>">                
			</td>
			
			<td>
				<input data-id="<?=$row['id_estudiante']?>" data-desemp="grupodp"  name="pcent_dp" data-grupo="lista"  type="number" class="form-control input-sin-borde" readonly disabled   value="<?=$row['pcent_dp']?>">  

			</td>
			
			<td class="tagAuto">
				<input data-id="<?=$row['id_estudiante']?>"  data-desemp="da" name="aeep1" data-cont="<?=$cont++;?>" step="0.1"   type="text"  class="form-control"  value="<?=$row['aeep1']?>">                
			</td>
			
			
			<td class="tagAuto">
				<input data-id="<?=$row['id_estudiante']?>"  data-desemp="grupoda" data-p="pae" data-grupo="lista" name="porcent_aeep1" type="text" class="form-control input-sin-borde" readonly disabled   value="<?=$row['porcent_aeep1']?>">					              
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