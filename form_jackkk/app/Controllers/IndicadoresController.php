<?php 

namespace Controllers;
use Config\View 	as View;
use Model\IndicadoresModel as Indicadores;
use Model\AsignaturaModel as Asignatura;
use Model\GradosModel as Grados;
use Model\PeriodosModel as Periodos;
use Model\CodigosModel as Codigos;

class IndicadoresController{


	

	public function getIndicadoresJsonAction($grado, $asignatura, $categoria, $periodo, $database){

		
		$indicador_obj = new Indicadores($database);	
		$indicadores = $indicador_obj->obtenerIndicadoresJson($grado, $asignatura, $categoria, $periodo);
		

		$asignatura_obj = new Asignatura($database);
		$asignaturas = $asignatura_obj->getAsignaturas();

		$grados_obj = new Grados($database);
		$grados = $grados_obj->getGrados();
		$periodos_obj = new Periodos($database);

		
		
		
		$periodos = $periodos_obj->getPeriodos();
				

		if($indicadores['estado']){				
			$indicadores = $indicadores['datos'];
			$asignaturas = $asignaturas['datos'];
			$grados = $grados['datos'];
			
			$periodos = $periodos['datos'];
			//var_dump($categorias);

				//var_dump($datosTitulos['nombre_grupo']);
			$view = new View('indicadores', 'tabla', ['indicadores'=>$indicadores, 'asignaturas' => $asignaturas,  'grado' => $grado, 'grados' => $grados, 'asignatura' => $asignatura, 'periodo' => $periodo, 'periodos' => $periodos]);
			$view->execute();
		}else{
			echo "<p><center> No existen indicadores relacionados al criterio seleccionado.</center>";
		}		

	}


public function obtenerCodigosIdAction($id, $grupo, $asignatura, $periodo, $grado,  $database){
		$indicador_obj = new Codigos($database);	

		echo ($indicador_obj->obtenerCodigosPorId($id, $grupo, $asignatura, $periodo, $grado));

}

public function insertarCodigosDesempAction($database){

		$indicador_obj = new Codigos($database);	

		$indicador_obj->insertDesempCodigos();

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