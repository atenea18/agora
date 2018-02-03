<!--
Plantilla para:
Pablo Emilio Carvajal,
Cabal,
José Ramón Bejarano
Normal,
Diocesano,
Comfamar

-->
<?php
$status = false;
$comfamar = false;
$cabal = false;

if($baseDatos=='agoranet_iensjl' || $baseDatos=='agoranet_diocesano'){
    $status = true;

}
if ($baseDatos=='agoranet_comfamar'){
    $comfamar = true;
}

if ($baseDatos=='agoranet_cabal'){
    $cabal = true;
}


?>

<table class="table content-table " id="content-inputs">


    <!-- On rows -->
    <thead class="">
        <tr id="background-rows-table"  valign="middle">
            <th rowspan="2">#</th>
            <th rowspan="2">APELLIDOS Y Nombres Estudiante</th>
            <th rowspan="2"> <span data-toggle="tooltip" data-placement="top" title="ESTADO"> Est</span></th>
            <th rowspan="2"> <span data-toggle="tooltip" data-placement="top" title="NOVEDADES">Nov</span></th>
            <th rowspan="2">O.A.</th>
            <th rowspan="2"> <span data-toggle="tooltip" data-placement="top" title="INASISTENCIA">FAA</span></th>

            <th colspan="<?=($status?5:6)?>"> <?php echo $porcentajes['etiqueta_grupo_1']." ".($porcentajes['porcentaje_efp']+$porcentajes['porcentaje_grupo1']); ?> %


            </th>
            <th rowspan="2"></th>
            <th colspan="<?=($cabal?4:5)?>" ><?=$porcentajes['etiqueta_grupo_2']; ?> <?=$porcentajes['porcentaje_grupo2']?>%</th>
            <th rowspan="2"> </th>
            <th colspan="<?=($cabal?4:5)?>" ><?=$porcentajes['etiqueta_grupo_3']; ?> <?=$porcentajes['porcentaje_grupo3']?>%</th>
            <th rowspan="2">
            </th>

            <th rowspan="2" class="<?=($status?"hidden":"")?><?=($comfamar?"hidden":"")?>" > <span data-toggle="tooltip" data-placement="top" title="AUTOEVALUACIÓN"> AEE</span></th>
            <th rowspan="2" class="<?=($status?"hidden":"")?>">VAEE <?=$porcentajes['porcentaje_autoevaluacion']?>%</th>
            <th rowspan="2">VAL</th>

        </tr>
        <tr id="item-posicion" valign="middle" class="border-th">


            <th data-update="dc1" data-estado="false" data-tipo="1"></th>

            <th data-update="dc2" data-estado="false" data-tipo="1"></th>
            <th data-update="dc3" data-estado="false" data-tipo="1"></th>
            <th data-update="dc4" data-estado="false" data-tipo="1"></th>
            <th data-update="dc5" data-estado="false" data-tipo="1"></th>

			<th class="<?=($status?"hidden":"")?>"><span data-toggle="tooltip" data-placement="top" title="EXAMEN FINAL DE PERIODO">EFP</span> <?=$porcentajes['porcentaje_efp']; ?>%</th>


            <th data-update="dp1">
				<span data-toggle="tooltip" data-placement="top" title="<?=$criterios[0]['criterio']?>">
                <?=$criterios[0]['abreviacion']?>                
				</span>
            </th>
            <th data-update="dp2">
				<span data-toggle="tooltip" data-placement="top" title="<?=$criterios[1]['criterio']?>">
                <?=$criterios[1]['abreviacion']?>                
				</span>
            </th>
            <th data-update="dp3">
				<span data-toggle="tooltip" data-placement="top" title="<?=$criterios[2]['criterio']?>">
                <?=$criterios[2]['abreviacion']?>                
				</span>
            </th>
            <th data-update="dp4">
				<span data-toggle="tooltip" data-placement="top" title="<?=$criterios[3]['criterio']?>">
                <?=$criterios[3]['abreviacion']?>                
				</span>
            </th>
            <?php
            if(!$cabal){
                ?>
                <th data-update="dp5">
					<span data-toggle="tooltip" data-placement="top" title="<?=$criterios[4]['criterio']?>">
                    <?=$criterios[4]['abreviacion']?>         
					</span>
                </th>
                <?php
            }
            ?>


            <th data-update="ds1">
				<span data-toggle="tooltip" data-placement="top" title="<?=$criterios[($cabal?4:5)]['criterio']?>">
                <?=$criterios[($cabal?4:5)]['abreviacion']?>
				</span>
            </th>
            <th data-update="ds2">
				<span data-toggle="tooltip" data-placement="top" title="<?=$criterios[($cabal?5:6)]['criterio']?>">
                <?=$criterios[($cabal?5:6)]['abreviacion']?>
				</span>
            </th>
            <th data-update="ds3">
				<span data-toggle="tooltip" data-placement="top" title="<?=$criterios[($cabal?6:7)]['criterio']?>">
                <?=$criterios[($cabal?6:7)]['abreviacion']?>
				</span>
            </th>
            <th data-update="ds4">
				<span data-toggle="tooltip" data-placement="top" title="<?=$criterios[($cabal?7:8)]['criterio']?>">
                <?=$criterios[($cabal?7:8)]['abreviacion']?>
				</span>
            </th>        
            <?php
            if(!$cabal){
                ?>
                <th data-update="ds5" >
					<span data-toggle="tooltip" data-placement="top" title="<?=$criterios[($cabal?8:9)]['criterio']?>">
                    <?=$criterios[($cabal?8:9)]['abreviacion']?>
					</span>
                </th>
                <?php
            }
            ?>

        </tr>


    </thead>


    <?php
    $cont = 0;
    $num = 1;
    $active = 'active';


    foreach ($datos  as $clave => $row) {

      $estudiante = $row['primer_apellido']." ".$row['segundo_apellido']." ". $row['primer_nombre']." ".$row['segundo_nombre'];
      ?>

      <tr class="<?=$active = $num%2==0?'active':''?> inputs editable" id="<?=$row['id_estudiante']?>" >

        <th>
            <?=$num++;?>
        </th>
        <td>
            <span data-id="<?=$row['id_estudiante']?>">

               <?= $estudiante?>


           </span>
       </td>

       <td>
        <span data-id="<?=$row['id_estudiante']?>"> <?=$row['estatus']?> </span>
    </td>
    <td>
        <span> <?=$row['novedad']?></span>
    </td>
    <td>
        <button data-student="<?= $estudiante?>" data-id="<?=$row['id_estudiante']?>" data-click="aggObsAsig" data-request="openModal" class="btn btn-primary btn-sm" title="Agregar Observación en la Asignatura">
            <i class="fa fa-user-plus" aria-hidden="true"></i>
        </button>
    </td>

    <td >
        <input data-id="<?=$row['id_estudiante']?>" name="inasistencia_p<?=$p;?>" data-cont="<?=$cont++;?>" step="1.0"  type="number"  class="form-control"   value="<?=$row['inasistencia_p'.$p]?>">


    </td>
    <td>
        <input data-id="<?=$row['id_estudiante']?>" data-desemp="dc" name="dc1_<?=$p;?>"  data-cont="<?=$cont++;?>" step="0.1" type="text" class="form-control " value="<?=$row['dc1_'.$p]?>">
    </td>
    <td>
        <input data-id="<?=$row['id_estudiante']?>" data-desemp="dc" name="dc2_<?=$p;?>" data-cont="<?=$cont++;?>" step="0.1"   type="text"  class="form-control"    value="<?=$row['dc2_'.$p]?>">
    </td>

    <td>
        <input data-id="<?=$row['id_estudiante']?>" data-desemp="dc" name="dc3_<?=$p;?>" data-cont="<?=$cont++;?>" step="0.1"   type="text"  class="form-control" placeholder=""
        value="<?=$row['dc3_'.$p]?>">

    </td>
    <td>
        <input data-id="<?=$row['id_estudiante']?>" data-desemp="dc" name="dc4_<?=$p;?>" data-cont="<?=$cont++;?>" step="0.1"   type="text"  class="form-control"   value="<?=$row['dc4_'.$p]?>">
    </td>

    <td>
        <input data-id="<?=$row['id_estudiante']?>" data-desemp="dc" name="dc5_<?=$p;?>" data-cont="<?=$cont++;?>" step="0.1"   type="text"   class="form-control"   value="<?=$row['dc5_'.$p]?>">
    </td>


    <td class="<?=($status?"hidden":"")?>">
        <?php
        if (!$status){ ?>
        <input data-id="<?=$row['id_estudiante']?>" data-desemp="<?=($status?"":"dt")?>" name="dc6_<?=$p;?>" data-cont="<?=($status?"":$cont++)?>" step="0.1"   type="text"   class="form-control"   value="<?=$row['dc6_'.$p]?>">
        <?php } ?>

    </td>
    <td>
        <?php
        if (!$status){ ?>
        <input data-id="<?=$row['id_estudiante']?>" data-desemp="" name="dc7_<?=$p;?>" step="0.1"   type="hidden" value="<?php echo $row['dc6_'.$p]*
        ($porcentajes['porcentaje_efp']/100) ?>"  class="form-control epfInput" >
        <?php } ?>
        <input data-id="<?=$row['id_estudiante']?>" data-desemp="grupodc" name="pcent_dc_<?=$p;?>" data-grupo="lista" type="number" step="0.1"   type="text"  class="form-control input-sin-borde" readonly disabled   value="<?=$row['pcent_dc_'.$p]?>">
    </td>








    <td>
        <input data-id="<?=$row['id_estudiante']?>" data-desemp="dp" name="dp1_<?=$p;?>" data-cont="<?=$cont++;?>" step="0.1"   type="text"  class="form-control"   value="<?=$row['dp1_'.$p]?>">
    </td>
    <td>
        <input data-id="<?=$row['id_estudiante']?>" data-desemp="dp" name="dp2_<?=$p;?>" data-cont="<?=$cont++;?>" step="0.1"   type="text"  class="form-control"   value="<?=$row['dp2_'.$p]?>">
    </td>
    <td>
        <input data-id="<?=$row['id_estudiante']?>" data-desemp="dp" name="dp3_<?=$p;?>" data-cont="<?=$cont++;?>" step="0.1"   type="text"  class="form-control"   value="<?=$row['dp3_'.$p]?>">
    </td>
    <td>
        <input data-id="<?=$row['id_estudiante']?>" data-desemp="dp" name="dp4_<?=$p;?>" data-cont="<?=$cont++;?>" step="0.1"   type="text"  class="form-control"   value="<?=$row['dp4_'.$p]?>">
    </td>

    <?php
    if(!$cabal){
        ?>
        <td>
            <input data-id="<?=$row['id_estudiante']?>" data-desemp="dp" name="dp5_<?=$p;?>" data-cont="<?=$cont++;?>" step="0.1"   type="text"  class="form-control"   value="<?=$row['dp5_'.$p]?>">
        </td>
        <?php
    }
    ?>


    <td>
        <input data-id="<?=$row['id_estudiante']?>" data-desemp="grupodp"  name="pcent_dp_<?=$p;?>" data-grupo="lista"  type="number" class="form-control input-sin-borde" readonly disabled   value="<?=$row['pcent_dp_'.$p]?>">

    </td>
    <td>
        <input data-id="<?=$row['id_estudiante']?>" data-desemp="ds" name="ds1_<?=$p;?>" data-cont="<?=$cont++;?>" step="0.1"   type="text"  class="form-control"  value="<?=$row['ds1_'.$p]?>">
    </td>
    <td>
        <input data-id="<?=$row['id_estudiante']?>" data-desemp="ds" name="ds2_<?=$p;?>" data-cont="<?=$cont++;?>" step="0.1"   type="text"  class="form-control"  value="<?=$row['ds2_'.$p]?>">
    </td>
    <td>
        <input data-id="<?=$row['id_estudiante']?>" data-desemp="ds" name="ds3_<?=$p;?>" data-cont="<?=$cont++;?>" step="0.1"   type="text"  class="form-control" value="<?=$row['ds3_'.$p]?>">
    </td>
    <td>
        <input data-id="<?=$row['id_estudiante']?>" data-desemp="ds" name="ds4_<?=$p;?>" data-cont="<?=$cont++;?>" step="0.1"   type="text"  class="form-control" value="<?=$row['ds4_'.$p]?>">
    </td>
    <?php
    if(!$cabal){
        ?>
        <td>
            <input data-id="<?=$row['id_estudiante']?>" data-desemp="ds" name="ds5_<?=$p;?>" data-cont="<?=$cont++;?>" step="0.1"   type="text"  class="form-control" value="<?=$row['ds5_'.$p]?>">
        </td>
        <?php
    }
    ?>
    <td>
        <input data-id="<?=$row['id_estudiante']?>" data-desemp="grupods" name="pcent_ds_<?=$p;?>" data-grupo="lista" type="number" class="form-control input-sin-borde" readonly disabled   value="<?=$row['pcent_ds_'.$p]?>">

    </td>
    <td class="<?=($status?"hidden":"")?><?=($comfamar?"hidden":"")?>">
        <?php
        if (!$status){ ?>
        <input data-id="<?=$row['id_estudiante']?>" data-desemp="da" name="aeep_<?=$p;?>" data-cont="<?=($status?"":$cont++)?>" step="0.1"   type="text"  class="form-control" value="<?=$row['aeep_'.$p]?>">
        <?php } ?>
    </td>
    <td class="<?=($status?"hidden":"")?>">
        <?php
        if($comfamar){
          foreach($disciplina as $registro){
             if($registro['id_estudiante'] == $row['id_estudiante']){									
                 ?>
                 <input data-id="<?=$row['id_estudiante']?>" data-desemp="grupoda" data-p="pae" data-grupo="lista" name="porcent_aeep_<?=$p;?>" type="text" class="form-control input-sin-borde" readonly disabled   value="<?=round(($registro['eval_'.$p.'_per']*($porcentajes['porcentaje_grupo3']/100)),1)?>">				
                 <?php
             }
         }
     }
     ?>
     <?php
     if (!$status && !$comfamar){ ?>
     <input data-id="<?=$row['id_estudiante']?>" data-desemp="grupoda" data-p="pae" data-grupo="lista" name="porcent_aeep_<?=$p;?>" type="text" class="form-control input-sin-borde" readonly disabled   value="<?=$row['porcent_aeep_'.$p]?>">
     <?php } ?>

 </td>
 <td>
    <input data-id="<?=$row['id_estudiante']?>" data-desemp="periodo" name="eval_<?=$p;?>_per" step="0.1" type="text" class="form-control input-sin-borde" readonly disabled value="<?=$row['eval_'.$p.'_per']?>">

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