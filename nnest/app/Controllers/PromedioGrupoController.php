<?php
namespace Controllers;


use Config\View 	as View;
use Model\InstitucionModel as Institucion;
use Model\ConsolidadosModel as Consolidados;
use Model\PromedioGrupoModel as PromedioGrupo;


class PromedioGrupoController{

	

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
		
		//var_dump($estudiantesPromedios);
		
		$contador=0;
		$puestos= array();
		
		foreach ($estudiantesPromedios as $key => $value) {
			$estudiante = array('id' => $value['id_estudiante'], 'pgg' => $value['pgg'] );
			$puestos[$contador] = $estudiante;
			$contador++;
		}

		

		return $this->generarPuesto($puestos);
	}

	public function getPromedioGrupoAction($db){

		$periodo = $_POST['periodo'];		
		$grupo = $_POST['grupo'];
		$area = $_POST['area'];				
		$reprobados = $_POST['reprobados'];	
		$academicas	= $_POST['academicas'];
		$puestoPromedio = array();
		$estudiantesPuestos = array();

		$promedioGrupo_obj = new PromedioGrupo($db);
		$informacionGrupo_obj = new Institucion($db);
		

		$informacionGrupo = $informacionGrupo_obj->getInformacionGrupo($grupo);		

		if($area=="0"){

			if ($reprobados=="0") {
				$tablaPuestos = $promedioGrupo_obj->getPromedioPuestos($grupo, $periodo, $academicas);	

			}
			if ($reprobados=="1") {
				$tablaPuestos = $promedioGrupo_obj->getPromedioPuestosReprobados($grupo, $periodo, $academicas);	
			}	
			$estudiantesPuestos =  $promedioGrupo_obj->getPromedioPuestos($grupo, $periodo, $academicas);	
			$puestoPromedio = $this->obtenerPromedios($estudiantesPuestos, $db);			
		}				
		if($area=="1")
		{				
			if ($reprobados=="0") {
				$tablaPuestos = $promedioGrupo_obj->getPromedioPuestosAreas($grupo, $periodo, $academicas);
			}
			if($reprobados=="1"){
				$tablaPuestos = $promedioGrupo_obj->getPromedioPuestosAreasReprobados($grupo, $periodo,$academicas);
			}
			$estudiantesPuestos =  $promedioGrupo_obj->getPromedioPuestosAreas($grupo, $periodo, $academicas);	
			$puestoPromedio = $this->obtenerPromedios($estudiantesPuestos, $db);
		}		
		
		/*
			'asignaturasEvaluadas' => $asignaturasEvaluadas, 
			'informacionGrupo' => $informacionGrupo[0], 
			'estudiantesPromedios'=>$estudiantesPromedios,
			'puestoPromedio' => $puestoPromedio
		
	*/
			$view = new View(
				'promedioGrupo', 
				'puestos', 
				[
				'tablaPuestos' => $tablaPuestos,
				'puestoPromedio' => $puestoPromedio

				]);

			$view->execute();

			$_POST['data']=null;
	


			
		}

		






	}
	?>