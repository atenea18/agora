<?php 

namespace Controllers;
use Config\View 	as View;
use Model\EvaluacionModel as Evaluacion;
use Model\PorcentajesModel as Porcentajes;
use Model\ValoracionModel as Valoracion;
use Model\CodigosModel as Codigos;
use Model\GradosModel as Grados;
use Model\PeriodosModel as Periodos;
use Model\AsignaturaModel as Asignatura;
use Model\IndicadoresModel as Indicadores;


class EvaluacionController{


	public function getEvaluacionAction($id_grupo, $id_asignatura, $database){


		$evaluacion_obj = new Evaluacion($database);
		$valoracion_obj = new Valoracion($database);
		$porcentajes_obj = new Porcentajes($database);
		$grados_obj = new Grados($database);
		$periodos_obj = new Periodos($database);
		$asignatura_obj = new Asignatura($database);
		$indicador_obj = new Indicadores($database);


		$datosTitulos = $evaluacion_obj->obtenerDatos($id_grupo, $id_asignatura);
		$asignaturas = $asignatura_obj->getAsignaturas();
		$grados = $grados_obj->getGrados();
		$periodos = $periodos_obj->getPeriodos();
		$categorias = $indicador_obj->obtenerCategorias();
		
		

		if($datosTitulos['estado']){

			$grado = $grados_obj->obtenerGrado($id_grupo)['datos'][0];			
			$valoraciones = $valoracion_obj->obtenerValoraciones()['datos'];
			$result_porcentajes = $porcentajes_obj->obtenerPorcentajes()['datos'];	
			$datosTitulos = $evaluacion_obj->obtenerDatos($id_grupo, $id_asignatura)['datos'][0];

			$asignaturas = $asignaturas['datos'];
			$grados = $grados['datos'];
			$periodos = $periodos['datos'];
			$categorias = $categorias['datos'];

				//var_dump($datosTitulos['nombre_grupo']);
			$view = new View('calificaciones', 'calificaciones', 
							 [
								 'grupo'=>$id_grupo, 
								 'titulos' =>$datosTitulos, 
								 'asignaturas' => $asignaturas, 
								 'grados' => $grados, 
								 'asignatura'=>$id_asignatura, 
								 'valoracion'=>$valoraciones,  
								 'porcentajes' => $result_porcentajes[0] , 
								 'grado' => $grado['id_grado'], 
								 'categorias' => $categorias, 
								 'periodos' => $periodos, 
								 'database'=>$database
								
							 ]);
			$view->execute();
		}else{
			echo "<br> <br> <br><br>  <center><p><strong> NO SE ENCUENTRA DISPONIBLE EN EL MOMENTO... </strong> </p> </center>";
		}

	}

	public function getPeriodosAction($periodo, $id_grupo, $id_asignatura, $database){

		$codigos_obj = new Codigos($database);
		$porcentajes_obj = new Porcentajes($database);			
		$evaluacion_obj = new Evaluacion($database);

		$codigos = $codigos_obj->obtenerCodigos($id_grupo, $id_asignatura, $periodo);
		$resultado = $evaluacion_obj->obtenerEvaluacion($id_grupo, $id_asignatura);
		$result_porcentajes = $porcentajes_obj->obtenerPorcentajes();	
		$criterios = $porcentajes_obj->obtenerCriterios()['datos'];
		
		if($resultado['estado']){
			$resultado = $resultado['datos'];
			$result_porcentajes = $result_porcentajes['datos'];
			
			//$codigos = $codigos['datos'];
			$modelo;
			if($database == 'agoranet_ieag')
			{$modelo = 'modelo_a';
			}
			if($database == 'agoranet_ipec' || $database == 'agoranet_cabal' || $database == 'agoranet_jrbejarano' )
			{$modelo = 'modelo_b';				
			}
			if($database == 'agoranet_iean')
			{$modelo = 'modelo_c';				
			}
			if($database == 'agoranet_simonb' ||$database == 'agoranet_liceo' )
			{$modelo = 'modelo_d';				
			}

				$view = new View($modelo, $periodo, 
								 ['datos'=>$resultado, 
								  'porcentajes' => $result_porcentajes[0], 
								  'codigos' => $codigos, 
								  'baseDatos' => $database,
								  'criterios' =>$criterios
								 ]);
				$view->execute();
			
		}
		else
		{
			echo "<center> <p> EL GRADO Y LA ASIGNATURA SELECCIONADA NO SE ENCUENTRAN RELACIONADA EN LA TABLA T EVALUACIÓN. </p> </center>";
		}								

	}

	public function tableAction(){
		$datos = array(
			'data' => array(
				'0' => 'ok',
				'1' => 'okg', 
				'2' => 'okh')
			
			);
//Devolvemos el array pasado a JSON como objeto
		echo json_encode($datos, JSON_FORCE_OBJECT);
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