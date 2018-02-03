<?php

//var_dump($puestos);

?>


<br>
<div class="content-tabla-grupo">
	<?php
	$cont = 1;



	?>
	<input type="hidden" name="gruposId" value="<?php echo $info['id_grupo'] ?>">
	<table id="table_id"  class="cell-border" >
		<thead>
			<tr>
				<th>N#</th>
				<th class="left-align">NOMBRES Y APELLIDOS</th>
				<th class="left-align">Asignaturas</th>				
				<th>DEF</th>				
			</tr>
		</thead>


		<tbody>
			<?php
			//var_dump($array_asignaturas);
			
			if(isset($array_listado_estudiantes) and $array_listado_estudiantes!= false){
				$id_estudiante=0;
				foreach ($array_listado_estudiantes as $estudiante_) {				

					$contador=0;
					$id_estudiante=$estudiante_['id_estudiante'];
					?>
					<input type="hidden" name="" value="<?php echo $id_estudiante;?>">
					<?php

					foreach ($array_asignaturas as $registro) {
						if($id_estudiante==$registro['id_estudiante']){
							$contador++;
						}
					}
					$clase=($cont%2)==0?'gris':'';
					echo "<tr class=".$clase.">";
					echo "<td rowspan=".$contador.">".$cont."</td>";
					echo "<td rowspan=".$contador." class=left-align>".
					$estudiante_['primer_apellido']." ".
					$estudiante_['segundo_apellido']." ".
					$estudiante_['primer_nombre']." ".
					$estudiante_['segundo_nombre']
					."</td>";

					foreach ($array_asignaturas as $registro) {


						if($id_estudiante == $registro['id_estudiante'])
						{													
							
							echo "<td class='".$clase." left-align'> ".$registro['Asignatura']."</td>";						
							echo "<td class=".$clase."> ".$registro['valoracion']."</td>";							
							echo "</tr>";
						}


					}

					$cont++;
					
					

				}
			}
			?>

		</tbody>
	</table>