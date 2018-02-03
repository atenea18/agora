<?php

//var_dump($puestos);

?>


<div id="contentConsol" class="content-tabla-grupo">

	
	
	<div class="page-header" data-pos="<?php echo $informacionGrupo['id_grupo'] ?>">
		<h4>
			<span>Grupo:</span> <?php echo ($informacionGrupo['nombre_grupo']);?> 
			<input type="hidden" name="gruposId" value="<?php echo $informacionGrupo['id_grupo'] ?>">
			<span>Director Grupo:</span> ... 
		</h4> 
	</div>
	<table id="table_id"  data-pos="<?php echo $info['id_grupo'] ?>" class="cell-border">
		<thead>

			<tr id="fila-asignaturas">
				<td>#</td>
				<td>Nombre y Apellidos</td>
				<td width="70px">Puesto</td>
				<td>PGG</td>
				<?php
				if(isset($asignaturasEvaluadas) && $asignaturasEvaluadas != false){
					foreach ($asignaturasEvaluadas as $key => $asignatura) {

						echo '<th>'.$asignatura['n_simpl'].'</th>';
					}
				}

				?>
			</tr>
		</thead>

		<?php
		$id=0;
		$puesto=1;
		$pggAux=0;
		$contador=1;
		if(isset($estudiantesPromedios) && $estudiantesPromedios != false){
			foreach ($estudiantesPromedios as $key => $estudiante) {
				if($estudiante['id_estudiante'] != $id){
					$id = $estudiante['id_estudiante'];


					?>
					<tr class="fila-asignaturas">
						
						<td width="100px"><?php echo $contador; $contador++; ?></td>
						
						<td data-id="" class="left-align"><?=$estudiante['primer_apellido']." ".$estudiante['primer_nombre'];?></td>
						<td width="100px">
							<?php
								foreach ($puestoPromedio as $key => $value) {
									if($value['id']== $estudiante['id_estudiante']){
										echo $value['puesto'];
									}
								}
							?>
						</td>
						<?php						
						$class = '';

						//REMPLAZAR EL 33333333333333
						if($estudiante['pgg']<3.0)
						{
							$class = 'r-rojo';
						}
						
						echo "<td class=".$class."> ".$estudiante['pgg']."</td>";
						?>

						<?php

						foreach ($tablaConsolidados as $registro)
						{
							$class = '';
							if($registro['id_estudiante'] == $id)
							{
								if($registro['Valoracion']<3)
								{
									$class = 'r-rojo';
								}
								if($registro['Valoracion']>=3)
								{
									$class = 'notas';
								}
								$valoracionF = $registro['Valoracion']==0?"":$registro['Valoracion'];
								echo "<td class=".$class."> ".$valoracionF."</td>";
								
							}
						}
						?>	

					</tr>
					<?php

				}
				else{

				}
			}
		}
		?>

		<tbody>


		</tbody>
	</table>

	



</div>