<?php
namespace Controllers;
use Config\View 	as View;
use Model\InstitucionModel as Institucion;
use Model\ConsolidadosModel as Consolidados;


class ConsolidadoController{

	

	private function generarPuesto($estudiante){
		$contador=1;
		$contadorAux=1;
		$pggAux=0;
		$puestos = array();
		foreach ($estudiante as $key => $value) {

			if($value['pgg']>$pggAux){
				$estudiantePgg = array('id' => $value['id'], 'puesto' => $contadorAux , 'pgg' => $value['pgg'] );
				$pggAux = $value['pgg'];
				$puestos[$contador]= $estudiantePgg;
				$contadorAux++;
			}
			if($value['pgg']==$pggAux){
				$estudiantePgg = array('id' => $value['id'], 'puesto' => $contadorAux-1, 'pgg' => $value['pgg']  );
				$pggAux=$value['pgg'];
				$puestos[$contador] = $estudiantePgg;
			}
			if($value['pgg']<$pggAux){
				$estudiantePgg = array('id' => $value['id'], 'puesto' => $contadorAux, 'pgg' => $value['pgg']  );
				$pggAux=$value['pgg'];
				$puestos[$contador] = $estudiantePgg;
				$contadorAux++;
			}
			$contador++;
		}

		return $puestos;
	}

	public function obtenerPromedios($estudiantesPromedios, $db){
		$consolidado_obj = new Consolidados($db);	

		
		$contador=0;
		$puestos= array();
		foreach ($estudiantesPromedios as $key => $value) {
			$estudiante = array('id' => $value['id_estudiante'], 'pgg' => $value['pgg'] );
			$puestos[$contador] = $estudiante;
			$contador++;
		}

		return $this->generarPuesto($puestos);
	}

	public function getConsolidadoAction($db){

		$periodo = $_POST['periodo'];		
		$grupo = $_POST['grupo'];
		$area = $_POST['area'];				
		$reprobados = $_POST['reprobados'];	
		$academicas	= $_POST['academicas'];
		$puestoPromedio = array();
		$estudiantesPuestos = array();

		$consolidado_obj = new Consolidados($db);
		$informacionGrupo_obj = new Institucion($db);

		$informacionGrupo = $informacionGrupo_obj->getInformacionGrupo($grupo);
		

		if($area=="0"){
			$tablaConsolidados = $consolidado_obj->getPromediosAsiganturas($grupo, $periodo,$academicas);
			$asignaturasEvaluadas = $consolidado_obj->getAsignaturasEvaludadas($grupo, $periodo,$academicas);

			if($reprobados == "0"){
				$estudiantesPromedios = $consolidado_obj->getEstudiantesPromedios($grupo, $periodo,$academicas);
			}
			if($reprobados == "1"){

				$estudiantesPromedios = $consolidado_obj->getEstudiantesPromediosReprobados($grupo, $periodo,$academicas);	
				
			}
			$estudiantesPuestos = $consolidado_obj->getEstudiantesPromedios($grupo, $periodo, $academicas);
			$puestoPromedio = $this->obtenerPromedios($estudiantesPuestos, $db);


		}		
		
		if($area=="1")
		{
			$tablaConsolidados = $consolidado_obj->getPromediosAreas($grupo, $periodo,$academicas);
			$asignaturasEvaluadas = $consolidado_obj->getAreasEvaluadas($grupo, $periodo,$academicas);
			

			if($reprobados == "0"){
				$estudiantesPromedios = $consolidado_obj->getEstudiantesPromediosAreas($grupo, $periodo,$academicas);
			}
			if($reprobados == "1"){

				$estudiantesPromedios = $consolidado_obj->getEstudiantesAreasReprobadas($grupo, $periodo,$academicas);
				
			}
			$estudiantesPuestos = $consolidado_obj->getEstudiantesPromediosAreas($grupo, $periodo,$academicas);
			$puestoPromedio = $this->obtenerPromedios($estudiantesPuestos, $db);

		}		
		

		$view = new View(
			'consolidado', 
			'consolidado', 
			[
			'tablaConsolidados' => $tablaConsolidados, 
			'asignaturasEvaluadas' => $asignaturasEvaluadas, 
			'informacionGrupo' => $informacionGrupo[0], 
			'estudiantesPromedios'=>$estudiantesPromedios,
			'puestoPromedio' => $puestoPromedio
			]);

		$view->execute();

		$_POST['data']=null;		

	}



	


}
?>