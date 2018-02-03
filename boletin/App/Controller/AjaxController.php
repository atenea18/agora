<?php

namespace App\Controller;

use App\Config\View as View;
use App\Model\GroupModel as Group;
use App\Model\TeacherModel as Teacher;
use App\Model\PerformanceModel as Performance;
use App\Model\InstitutionModel as Institution;
use App\Model\EvaluationPeriodModel as Evaluation;
use App\Model\NoveltyModel as Novelty;
/**
* 
*/
class AjaxController
{
	
	function __construct()
	{
		
	}

	public function indexAction(){
		echo "string";
	}

	public function getPeriodoAction($column, $id_asignature, $id_group,$db){

		$evaluation = new Evaluation($db);

		$response = $evaluation->getPeriodsWithOutEvaluating($column, $id_asignature, $id_group)['data'];
		
		header("Access-Control-Allow-Origin: *");
		$view = new View(
			'teacher',
			'formEvaluatePeriodRender',
			[
				'info'	=> $response,
				'periodo'	=>	$column
			]
		);

		$view->execute();
	}

	public function updatePeriodAction($period, $id_student, $id_asignature, $value,$db)
	{
		$evaluation = new Evaluation($db);

		echo $evaluation->updatePeriod($period, $id_student, $id_asignature, $value);
	}

	public function getEvaluationSheetAction(
		$db, 
		$model, 
		$maxPeriod, 
		$id_asignature, 
		$id_group
	){

		$performance = new Performance($db);
		$evaluation = new Evaluation($db);

		$ind_DP = $performance->getPerformanceIndicadors(2)['data'];
		$ind_DS = $performance->getPerformanceIndicadors(3)['data'];

		$resp = $evaluation->getPeriods(
					split('_', $maxPeriod)[1],
					$id_asignature,
					$id_group
				)['data'];
		
		header("Access-Control-Allow-Origin: *");
		$view = new View(
			'reportPDF',
			'evaluationSheet-'.$model.'-render',
			[
				'DP'	 =>	$ind_DP,
				'DS'	 =>	$ind_DS,
				'periodo'=>	split('_', $maxPeriod)[1],
				'datos'	 =>	$resp,
				'info'	 =>	$resp[0],
				'model'	 =>	$model
			]
		);

		$view->execute();
	}

	public function getGroupsAction($id_sede, $db)
	{
		$institution = new Institution($db);

		$groups = $institution->getGroups($id_sede)['data'];
		
		header("Access-Control-Allow-Origin: *");
		foreach ($groups as $key => $value) {
			echo "<option value='".$value['id_grupo']."'>".utf8_encode($value['nombre_grupo'])."</option>";	
		}
	}

	public function getStudentsAction($id_group, $db)
	{
		$group = new Group($db);
		$novelty = new Novelty($db);

		$students = $group->getClassRoomList($id_group)['data'];
		$novelties = $novelty->getByGroup($id_group)['data'];
		
		header("Access-Control-Allow-Origin: *");
		/*foreach ($students as $key => $value) {
			echo "<option value='".$value['idstudents']."'>".utf8_encode($value['primer_ape_alu']." ".$value['segundo_ape_alu']." ".$value['primer_nom_alu']." ".$value['segundo_nom_alu'])."</option>";	
		}*/
		foreach ($students as $key => $value):
			$reprobate = false;
			foreach($novelties as $novelty1):
				if($novelty1['idstudents'] == $value['idstudents']  && ($novelty1['id_novedad'] == 47 || $novelty1['id_novedad'] == 9) ):
					$reprobate = true;
				endif;	
			endforeach;
			if(!$reprobate):
				echo "<option value='".$value['idstudents']."'>".
						utf8_encode(
							$value['primer_ape_alu']." ".
							$value['segundo_ape_alu']." ".
							$value['primer_nom_alu']." ".
							$value['segundo_nom_alu']).
					"</option>";
			endif;
		endforeach;
	}


//********************************************* lo nuevo
	public function getDocentesAction($db, $id_sede)
	{
		$institution = new Institution($db);

		$docentes = $institution->getDocentes($id_sede)['data'];
		
		header("Access-Control-Allow-Origin: *");
		foreach ($docentes as $key => $value) 
		{
			echo "<option value='".$value['id_docente']."'>".utf8_encode(
					 $value['primer_nombre'].' '.$value['segundo_nombre'].' '.$value['primer_apellido'].' '.$value['segundo_apellido'])."</option>";	
		}
			
		// foreach ($docentes as $key => $value) 
		// 	echo json_encode(
		// 		array( 'data' => array(
		// 			'id_docente' => $value['id_docente'],
		// 			'docente'	=> $value['segundo_apellido'].' '.$value['primer_apellido'].' '.$value['primer_nombre'].' '.$value['segundo_nombre'],
		// 			'id_sede'	=> $value['id_sede']
		// 		))
		// 	);
		
	}

	public function getAsignaturesByTeacherAction($db, $id_teacher)
	{
		$teacher = new Teacher($db);
		$asignatures = $teacher->getAsignaturesAndGroups($id_teacher)['data'];
		header("Access-Control-Allow-Origin: *");
		foreach ($asignatures as $key => $value) 
		{
			echo "<option value='".$value['id_asignatura']."-".$value['id_grupo']."'>".utf8_encode($value['nombre_grupo'].' - '.
					 $value['asignatura'])."</option>";	
		}
	}
	
	// Final Report
	public function getMessageFinalReportAction($db='')
	{
		$evaluation = new Evaluation($db);

		$messages = $evaluation->getFinalReportMessages();

		if($messages['state']):
			echo json_encode($messages['data'][0]);
		endif;
	}

	public function saveFinalReportMessagesAction($db)
	{
		$evaluation = new Evaluation($db);

		$messages = $evaluation->getFinalReportMessages();

		if($messages['state']):
			echo json_encode($evaluation->updateFinalReportMessages($_POST));
		else:
			echo json_encode($evaluation->saveFinalReportMessages($_POST));
		endif;	
	}
	
	//
	public function getFirmasAction($db)
	{
		$evaluation = new Evaluation($db);

		$certificados = $evaluation->getCertificado();

		if($certificados['state']):
			echo json_encode($certificados['data'][0]);
		endif;
	}

	public function saveFirmasAction($db)
	{
		$evaluation = new Evaluation($db);
		$certificados = $evaluation->getCertificado();

		if($certificados['state']):
			echo json_encode($evaluation->updateFirmas($_POST));
		else:
			echo json_encode($evaluation->saveFirmas($_POST));
		endif;
	}
}
?>