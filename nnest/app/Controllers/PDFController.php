<?php
namespace Controllers;
use Config\View 	as View;
use Model\FPDFModel as FPDF;
use Model\InstitucionModel as Institucion;
use Model\ConsolidadosModel as Consolidados;
use Model\PromedioGrupoModel as PromedioGrupo;



class PDFController{

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



	public function getConsolidadoAction(){

		

	}

	public function getPromedioGrupoAction(){

		$grupo = $_POST['grupo'];
		$periodo = $_POST['periodo'];
		$db =$_POST['db'];
		$reprobados = $_POST['reprobados'];	
		$academicas	= $_POST['academicas'];
		$area = $_POST['area'];	
		$tablaPuestos =array();

		$promedioGrupo_obj = new PromedioGrupo($db);
		$informacionGrupo_obj = new Institucion($db);
		$informacionGrupo = $informacionGrupo_obj->getInformacionGrupo($grupo);
		$estudiantesPuestos = array();
		$puestoPromedio = array();

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
		if($area=="1"){

			if ($reprobados=="0") {
				$tablaPuestos = $promedioGrupo_obj->getPromedioPuestosAreas($grupo, $periodo, $academicas);
			}
			if($reprobados=="1"){
				$tablaPuestos = $promedioGrupo_obj->getPromedioPuestosAreasReprobados($grupo, $periodo,$academicas);
			}
			$estudiantesPuestos =  $promedioGrupo_obj->getPromedioPuestosAreas($grupo, $periodo, $academicas);	
			$puestoPromedio = $this->obtenerPromedios($estudiantesPuestos, $db);

		}

		
		$header = array('No.', 'NOMBRES Y APELLIDOS', 'PUESTO', 'S',"A","Bs","Bj","TAV","PROMEDIO","DESEMPEÑO");
		$elemento = array($grupo, "como", $periodo, "que tal" );
		$data = array($elemento, $elemento, $elemento, $elemento);
		$pdf = new FPDF();
		$pdf->TableHeader($informacionGrupo,$periodo);
		$pdf->AddPage();

		$pdf->SetFont('Arial','B',8);		
		$pdf->FancyTable($header,$tablaPuestos, $puestoPromedio);
		$pdf->Output("I");

	}





}
?>