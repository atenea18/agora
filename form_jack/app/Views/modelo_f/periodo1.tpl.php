<!--

JJRondón
ITI
-->
<?php

/*
$iti = false;
$patricio = false;
$tecnico = false;

if($baseDatos=='agoranet_itigvc'){
    $iti = true;
    if($type_asignature == 'T')
        $tecnico = true;
}
if($baseDatos=='agoranet_patricio_oa'){
    $patricio = true;   
}


?>
<table width="490px">
    <tr id="item-posicion" valign="middle" class="border-th">
        <th>DESEMPEÑOS SELECCIONADOS: </th>
        <th data-update="dc1" data-estado="false" data-tipo="1"></th>
        <th data-update="dc2" data-estado="false" data-tipo="1"></th>
        <th data-update="dc3" data-estado="false" data-tipo="1"></th>
        <th data-update="dc4" data-estado="false" data-tipo="1"></th>
        <th data-update="dc5" data-estado="false" data-tipo="1"></th>
    </tr>
</table>
<hr>

<table class="table content-table " id="content-inputs">


    <!-- On rows -->
    <thead class="">


    <tr id="background-rows-table"  valign="middle">
        <th >#</th>
        <th >APELLIDOS Y Nombres Estudiante</th>
        <th > <span data-toggle="tooltip" data-placement="top" title="ESTADO"> Est</span></th>
        <th > <span data-toggle="tooltip" data-placement="top" title="NOVEDADES">Nov</span></th>
        <th >O.A.</th>
        <th > <span data-toggle="tooltip" data-placement="top" title="INASISTENCIA">FAA</span></th>

        <th>
            <strong data-toggle="tooltip" data-placement="top" title="<?=$porcentajeDefinidos[0]['indicador'];?>">
                <?=($porcentajeDefinidos[0]['abreviacion']." ".$porcentajeDefinidos[0]['porcentaje']."%");?>
            </strong>
        </th>
        <th>
            <strong data-toggle="tooltip" data-placement="top" title="<?=$porcentajeDefinidos[1]['indicador'];?>">
                <?=($porcentajeDefinidos[1]['abreviacion']." ".$porcentajeDefinidos[1]['porcentaje']."%");?>
            </strong>
        </th>
        <?php
        if(!$tecnico){

        ?>
        <th>
            <strong data-toggle="tooltip" data-placement="top" title="<?=$porcentajeDefinidos[2]['indicador'];?>">
                <?=($porcentajeDefinidos[2]['abreviacion']." ".$porcentajeDefinidos[2]['porcentaje']."%");?>
            </strong>
        </th>
        <th>
            <strong data-toggle="tooltip" data-placement="top" title="<?=$porcentajeDefinidos[3]['indicador'];?>">
                <?=($porcentajeDefinidos[3]['abreviacion']." ".$porcentajeDefinidos[3]['porcentaje']."%");?>
            </strong>
        </th>
		
        <?php
        }

        ?>
        <th>
            <strong data-toggle="tooltip" data-placement="top" title="<?=$porcentajeDefinidos[4]['indicador'];?>">
                <?=($porcentajeDefinidos[4]['abreviacion']." ".$porcentajeDefinidos[4]['porcentaje']."%");?>
            </strong>
        </th>
		<?php
			if($patricio){
			
		?>
		
		 <th>
            <strong data-toggle="tooltip" data-placement="top" title="<?=$porcentajeDefinidos[5]['indicador'];?>">
                <?=($porcentajeDefinidos[5]['abreviacion']." ".$porcentajeDefinidos[5]['porcentaje']."%");?>
            </strong>
        </th>
		<?php
			}
		?>
        <th >VAL</th>
    </tr>
    </thead>

    <?php
    $cont = 0;
    $num = 1;
    $active = 'active';


    foreach ($datos  as $clave => $row) {

        $estudiante = $row['primer_apellido'] . " " . $row['segundo_apellido'] . " " . $row['primer_nombre'] . " " . $row['segundo_nombre'];
        ?>

        <tr class="<?= $active = $num % 2 == 0 ? 'active' : '' ?> inputs editable" id="<?= $row['id_estudiante'] ?>">

            <th>
                <?= $num++; ?>
            </th>
            <td>
				<span data-id="<?= $row['id_estudiante'] ?>">
					<?= $estudiante ?>
				</span>
            </td>

            <td>
                <span data-id="<?= $row['id_estudiante'] ?>"> <?= $row['estatus'] ?> </span>
            </td>
            <td>
                <span> <?= $row['novedad'] ?></span>
				<input data-id="<?=$row['id_estudiante']?>" data-nov="true" name="novedad" step="1.0" type="hidden" class="form-control"   value="<?=$row['novedad']?>">
            </td>
            <td>
                <button data-student="<?= $estudiante ?>" data-id="<?= $row['id_estudiante'] ?>" data-click="aggObsAsig"
                        data-request="openModal" class="btn btn-primary btn-sm" title="Agregar Observación en la Asignatura">
                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                </button>
            </td>

            <td>
                <input data-id="<?= $row['id_estudiante'] ?>" name="inasistencia_p<?= $p; ?>" data-cont="<?= $cont++; ?>"
                       step="1.0"
                       type="number" class="form-control" value="<?= $row['inasistencia_p' . $p] ?>">
            </td>
            <td>
                <input data-id="<?= $row['id_estudiante'] ?>" data-desemp="ep" name="dc1_<?= $p; ?>" data-cont="<?= $cont++; ?>"
                       step="0.1"
                       type="text" class="form-control " value="<?= $row['dc1_' . $p] ?>">
                <input data-id="<?= $row['id_estudiante'] ?>" data-desemp="grupoep" name="dc6_<?= $p; ?>" data-grupo="lista"
                       type="hidden"
                       step="0.1" type="text" class="form-control input-sin-borde" readonly disabled
                       value="<?= $row['dc6_' . $p] ?>">
            </td>
            <td>
                <input data-id="<?= $row['id_estudiante'] ?>" data-desemp="ex" name="dc2_<?= $p; ?>" data-cont="<?= $cont++; ?>"
                       step="0.1"
                       type="text" class="form-control" value="<?= $row['dc2_' . $p] ?>">
                <input data-id="<?= $row['id_estudiante'] ?>" data-desemp="grupoex" name="dc7_<?= $p; ?>" data-grupo="lista"
                       type="hidden"
                       step="0.1" type="text" class="form-control input-sin-borde" readonly disabled
                       value="<?= $row['dc7_' . $p] ?>">
            </td>

            <?php
            if(!$tecnico){
            ?>
            <td>
                <input data-id="<?= $row['id_estudiante'] ?>" data-desemp="tt" name="dc3_<?= $p; ?>" data-cont="<?= $cont++; ?>"
                       step="0.1"
                       type="text" class="form-control" placeholder=""
                       value="<?= $row['dc3_' . $p] ?>">
                <input data-id="<?= $row['id_estudiante'] ?>" data-desemp="grupott" name="dc8_<?= $p; ?>" data-grupo="lista"
                       type="hidden"
                       step="0.1" type="text" class="form-control input-sin-borde" readonly disabled
                       value="<?= $row['dc8_' . $p] ?>">
            </td>
            <td>
                <input data-id="<?= $row['id_estudiante'] ?>" data-desemp="pz" name="dc4_<?= $p; ?>" data-cont="<?= $cont++; ?>"
                       step="0.1"
                       type="text" class="form-control" value="<?= $row['dc4_' . $p] ?>">
                <input data-id="<?= $row['id_estudiante'] ?>" data-desemp="grupopz" name="dc9_<?= $p; ?>" data-grupo="lista"
                       type="hidden"
                       step="0.1" type="text" class="form-control input-sin-borde" readonly disabled
                       value="<?= $row['dc9_' . $p] ?>">
            </td>

                <?php
            }
            ?>
            <td>

                <?php
                if ($iti) {
                    ?>
                    <input data-id="<?= $row['id_estudiante'] ?>" data-desemp="ad" name="aeep_<?= $p; ?>"
                           data-cont="<?= $cont++; ?>" step="0.1"
                           type="text" class="form-control" value="<?= $row['aeep_' . $p] ?>">
                    <input data-id="<?= $row['id_estudiante'] ?>" data-desemp="grupoad" name="porcent_aeep_<?= $p; ?>"
                           data-grupo="lista" type="hidden"
                           step="0.1" type="text" class="form-control input-sin-borde" readonly disabled
                           value="<?= $row['porcent_aeep_' . $p] ?>">
                    <?php
                } else {

                    ?>
                    <input data-id="<?= $row['id_estudiante'] ?>" data-desemp="ad" name="dc5_<?= $p; ?>"
                           data-cont="<?= $cont++; ?>" step="0.1"
                           type="text" class="form-control" value="<?= $row['dc5_' . $p] ?>">
                    <input data-id="<?= $row['id_estudiante'] ?>" data-desemp="grupoad" name="dc10_<?= $p; ?>" data-grupo="lista"
                           type="hidden"
                           step="0.1" type="text" class="form-control input-sin-borde" readonly disabled
                           value="<?= $row['dc10_' . $p] ?>">
                    <?php
                }
                ?>
            </td>
			<?php
				if($patricio){
			?>
			<td>
			<input data-id="<?= $row['id_estudiante'] ?>" data-desemp="pe" name="dc11_<?= $p; ?>"
                           data-cont="<?= $cont++; ?>" step="0.1"
                           type="text" class="form-control" value="<?= $row['dc11_' . $p] ?>">
			<input data-id="<?= $row['id_estudiante'] ?>" data-desemp="grupope" name="dc12_<?= $p; ?>" data-grupo="lista"
                           type="hidden"
                           step="0.1" type="text" class="form-control input-sin-borde" readonly disabled
                           value="<?= $row['dc12_' . $p] ?>">
			</td>
			<?php
				}
			?>
            <td>
                <input data-id="<?= $row['id_estudiante'] ?>" data-desemp="periodo" name="eval_<?= $p; ?>_per" step="0.1"
                       type="text" class="form-control input-sin-borde" readonly disabled
                       value="<?= $row['eval_' . $p . '_per'] ?>">

            </td>


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