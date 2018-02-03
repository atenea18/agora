<div class="col-md-10 col-md-offset-1">
    <table class="table table-striped" id="tabla">
    	<thead>
        	<tr>
            	<th width="50px">N°</th>
                <th width="400px">Nombre</th>
                <th width="100px">Periodo: <?php echo split("_", $periodo)[1] ?></th>
            </tr>
        </thead>
        <tbody id="cuerpoTabla">
            <?php

               foreach($datos  as $clave => $valor){
               echo "<tr>
               			<td>".($clave+1)."</td>
						<td>".utf8_encode($valor['primer_apellido']." ".$valor['segundo_apellido'])." ".utf8_encode($valor['primer_nombre']." ".$valor['segundo_nombre'])."</td>
					";
					if($valor['periodo'] != NULL) { 
                        echo "<td class='editable'><input data-student='".$valor['id_estudiante']."' data-asignatura='".$valor['id_asignatura']."' data-periodo='".$periodo."' type='text' value='".$valor['periodo']."' class='form-control'/></td>";
                    }else{ 
                        echo "<td class='editable'><input data-student='".$valor['id_estudiante']."' data-asignatura='".$valor['id_asignatura']."' data-periodo='".$periodo."' type='text' value='' class='form-control'/></td>";}	
               	echo "</tr>";
               }
            ?>
        </tbody>
    </table>
	<input type="hidden" name="db" id="bd"  value="<?php echo $database;?>"/>
</div>

<script type="text/javascript">
	$('#tabla').dataTable( {
       	"lengthChange": false,
       	"paging": false,
		language: {
            search: "Buscar:",
            emptyTable:"No se encontraron resultados",
            info: "Mostrando registros del _PAGE_  al _END_ de un total de _PAGES_ registros",
            infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
        }
    });	
	
	$(function(){
		$("input").keydown(function(event){
        	if(event.which == 40){
        		$(this).parent().parent().next().find("input").focus();
        	}else if(event.which == 38){
        		$(this).parent().parent().prev().find("input").focus();
        	}
        });
		
		$("td input").focus(function(){
            var oldContent = $(this).val();

            $(this).blur(function() {
                var newContent = $(this).val(),
                id_estudiante = $(this).attr('data-student'),
                id_asignatura = $(this).attr('data-asignatura'),
                periodo = $(this).attr('data-periodo'),
				database = $("#bd").val();

                if(newContent != oldContent){
                    $(this).attr("value", newContent);
                    actualizarPeriodo(periodo, id_estudiante,id_asignatura,newContent, database);
                }
                $(this).unbind("blur");
            });
        });
		
        /*$("td input").blur(function(){
            var newContent = $(this).val(),
                id_estudiante = $(this).attr('data-student'),
                id_asignatura = $(this).attr('data-asignatura'),
                periodo = $(this).attr('data-periodo'),
				database = $("#bd").val();
			
			if(newContent > 0){
            	actualizarPeriodo(periodo, id_estudiante,id_asignatura,newContent, database);
			}
        });*/

        function actualizarPeriodo(periodo, id_estudiante, id_asignatura, valor,database){
        	$.ajax({

            type: "GET",
            // dataType: "json",
            url: '<?php echo URL?>/form_joe/docente/actualizarPeriodo/'+periodo+'/'+id_estudiante+'/'+id_asignatura+'/'+valor+'/'+database,

            success: function(data){
                console.log(data);
            },
            error(xhr, estado){
               console.log(xhr);
               console.log(estado);
            }
         });
        }
    });
</script>