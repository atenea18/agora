<?php 

$getTextformatoRequereridasAsignatura = function ($valoracion_requerida,$superacion=null)use(
	$min_bajo, $min_basico, $max_superior, $cantidad_periodos, $cantidad_periodos_evaluados, $informe
){
	
	$valoracion_requerida = $valoracion_requerida<$superacion?$superacion:$valoracion_requerida;
	if($cantidad_periodos = $cantidad_periodos_evaluados)	{
		$valoracion_asignatura = $valoracion_requerida>=$min_basico?"APRO":$valoracion_asignatura;
		$valoracion_asignatura = $valoracion_requerida<$min_basico?"REP":$valoracion_asignatura;
	}
	else{
		$valoracion_asignatura = $valoracion_requerida>$min_basico?"REP":$valoracion_asignatura;
	}

	$span_valoracion = "<span>".$valoracion_asignatura."</span>";	
	return $span_valoracion;
};

?>


<div id="contentConsol" class="content-tabla-grupo">	
	<table id="table_id"  class="cell-border">
		<thead>
			<tr id="fila-asignaturas">
				<th>No.</th>
				<th>Nombres y Apellidos</th>
				<th>Puesto</th>
				<th>Periodo</th>
				<th>PGG</th>
				<th>TAV</th>
				<?php
				if(isset($asignaturasEvaluadas) && $asignaturasEvaluadas != false){
					foreach ($asignaturasEvaluadas as $asignatura) {
						echo '<th>'.$asignatura['n_simpl'].'</th>';
					}
				}?>
			</tr>
		</thead>
		
		<tbody>
			<?php	
			$nombre_novedad = "NOVEDAD";
			$nombre_informe = "INFORME FINAL";
			//var_dump($array_estudiantes_asignaturas);
			
			if(isset($array_estudiantes_asignaturas) && $array_estudiantes_asignaturas != false)
			{				
				$contador=1;
				$id_estudiante=0;
				foreach ($array_estudiantes_asignaturas as $array_estudiante_evaluado_) 
				{	
					if($id_estudiante != $array_estudiante_evaluado_['id_estudiante']){

						$id_estudiante = $array_estudiante_evaluado_['id_estudiante'];


						?>
						<tr class="fila-asignaturas">
							
							<td width="50px" rowspan="2" ><?php echo $contador; $contador++; ?> </td>						
							<td data-id="" class="left-align" rowspan="2">										
								<?=$array_estudiante_evaluado_['primer_apellido']." ".
								$array_estudiante_evaluado_['segundo_apellido']." ".
								$array_estudiante_evaluado_['primer_nombre']." ".
								$array_estudiante_evaluado_['segundo_nombre'];?>
							</td>

							<td class="bg-success" rowspan="2">
								<?=$array_estudiante_evaluado_['puesto']?>
							</td>
							<td class="bg-success">
								<strong><?=$nombre_informe?></strong>
							</td>							
							<td class="bg-success">
								<?=$array_estudiante_evaluado_['promedio']?>
							</td>
							<td class="bg-success">

							</td>
							<?php	
							
							foreach ($asignaturasEvaluadas as $asignatura) {								
							 	$promedio_acumulado_asig = "";
								foreach($array_estudiantes_asignaturas as $estu){
									if($asignatura['id_asignatura'] == $estu['id_asignatura'] && $estu['id_estudiante'] == $id_estudiante){
									$promedio_acumulado_asig = $estu['nota_superacion']!=""?$estu['nota']." / ".$estu['nota_superacion']:$estu['nota'];
									}
								}				
									

								?>								
								<td class=bg-success>									
									<span class=""><?=$promedio_acumulado_asig?></span>
								</td>
								<?php
							}							
							?>
						</tr>	
						<td  class="bg-warning">
							<span data-toggle="tooltip" data-placement="top" title="">
								<strong><?=$nombre_novedad?></strong>
							</span>
						</td>						
						<td class=bg-warning></td>
						<td class=bg-warning></td>
						<?php
						foreach ($asignaturasEvaluadas as $asignatura) {
							$promedio_acumulado_asigg = "";
								foreach($array_estudiantes_asignaturas as $estu){
									if($asignatura['id_asignatura'] == $estu['id_asignatura'] && $estu['id_estudiante'] == $id_estudiante){
									$promedio_acumulado_asigg = $getTextformatoRequereridasAsignatura($estu['nota'],$estu['nota_superacion']) ;
									}
								}	
						
							echo "<td class=bg-warning>".$promedio_acumulado_asigg."</td>";
							
						}							
						?>
					</tr>
					<?php					
				}
			}
		}
		?>	
	</tbody>
</table>
<br>
<br>
</div>

