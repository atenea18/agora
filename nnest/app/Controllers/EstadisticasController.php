<?php 

namespace Controllers;
use Config\View 	as View;
use Model\PuestosModel as Puestos;
use Model\InstitucionModel as Institucion;


class EstadisticasController{


	public function setIndexAction($db){

		//$grados_obj = new Puestos($db);
		//$objeto =  $grados_obj->obtenerPuestos($id_grado, $id_grupo, 1);

		//var_dump($objeto);
		
		$view = new View('index', 'Estadisticas', ['db'=>$db]);
		$view->execute();


	}


	public function getSeleccionarGrupoAction($db){
		
		$institucion_obj = new Institucion($db);	
		$accion = $_POST['accion'];



		$periodos = $institucion_obj->getPeriodos()['datos'];
		$grados = $institucion_obj->getGrados()['datos'];
		$jornadas = $institucion_obj->getJornadas();
		$anos = $institucion_obj->getAnosLectivos();

		$view = new View('index', 'seleccionar', 
			[
			'grados' => $grados, 
			'periodos' => $periodos, 
			'accion' => $accion, 
			'jornadas' =>$jornadas,
			'anos' =>$anos
			]
			);
		$view->execute();	

	}

	public function getPeriodosAction($periodo, $id_grupo, $id_asignatura, $database){

		$codigos_obj = new Codigos($database);
		$porcentajes_obj = new Porcentajes($database);			
		$evaluacion_obj = new Evaluacion($database);

		$codigos = $codigos_obj->obtenerCodigos($id_grupo, $id_asignatura, $periodo);
		$resultado = $evaluacion_obj->obtenerEvaluacion($id_grupo, $id_asignatura);
		$result_porcentajes = $porcentajes_obj->obtenerPorcentajes();	

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

$view = new View($modelo, $periodo, ['datos'=>$resultado, 'porcentajes' => $result_porcentajes[0], 'codigos' => $codigos, 'baseDatos' => $database  ]);
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