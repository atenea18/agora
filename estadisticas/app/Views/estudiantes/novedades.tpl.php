

<br>
<div class="content-tabla-grupo">
	<?php
	$cont = 1;

	?>	
	<table id="table_id" class="cell-border">
		<thead>
			<tr>
				<th>No.</th>				
				<th class="left-align">NOMBRE COMPLETO</th>
				<th>GRUPO</th>
			</tr>
		</thead>


		<tbody>
			<?php
			//var_dump($tablaPuestos);
			if(isset($estudiantes) and $estudiantes!= false){
				foreach ($estudiantes as $key => $value) {

					?>
					<tr>
						<td width="100px"><?=$cont?></td>
						<td data-id="" class="left-align"><?=$value['primer_apellido']." ".$value['segundo_apellido']." ".$value['primer_nombre']." ".$value['segundo_nombre']?></td>	
						<td>
							<?=$value['nombre_grupo']?>
						</td>							
					</tr>
					<?php
					$cont++;
				}

			}
			?>

		</tbody>
	</table>
	
	
</div>