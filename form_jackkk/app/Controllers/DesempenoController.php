<?php 

namespace Controllers;
use Config\View 	as View;
use Model\DesempenoModel as Desempeno;
use Model\AreasModel as Areas;


class DesempenoController{


	

	public function getExisteAction($grado, $grupo , $asignatura, $cod_desemp,  $periodo, $posicion, $database){

		
		$respuesta = $desempeno->existePosicion($grado, $grupo , $asignatura, $cod_desemp, $periodo, $posicion);
		$desempeno = new Desempeno($database);	
		
		if($respuesta['estado']){
			echo 'true';
		}else{
			echo'false';
		}

	}

	public function getAreasGradosAction($grados,$database){

		$areas = new Areas($database);
		$resultado = $areas->getAreaPorGrados($grados);
		echo '<option value=0>SELECCIONE UN AREA</option>';
		if($resultado['estado']){
			$resultado = $resultado['datos'];
			
			
			foreach ($resultado as $key => $value) {
				echo '<option value="'.$value['id_area'].'">'.$value['area'].'</option>';	
				
			}		
			
		}
	}

	public function nuevoRegistroAction($database){
		$desempeno = new Desempeno($database);

		$desempeno->insertarDesempeno();

	}
	
	

	public function getAsignaturaGradosAction($area,$grados ,$database){

		$areas = new Areas($database);
		$resultado = $areas->getAsignaturaGrados($grados,$area);
		echo '<option value=0>SELECCIONE UNA ASIGNATURA</option>';
		if($resultado['estado']){
			$resultado = $resultado['datos'];
			//var_dump($resultado);
			
			foreach ($resultado as $key => $value) {
				echo '<option value="'.$value['id_asignatura'].'">'.$value['asignatura'].'</option>';	

				
			}		
			
		}
	}

	

	

	
	

	public function setUpdateAction($id_estudiante, $id_grupo, $id_asignatura, $database)
	{

		if($_POST)
		{			

			$evaluacion_obj = new Evaluacion($database);
			$resultado = $evaluacion_obj->actualizarPeriodo($id_estudiante, $id_grupo, $id_asignatura, $_POST);
				//var_dump($resultado['estado']);
		}


	}





}
?>