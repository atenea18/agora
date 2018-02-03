<?php

namespace App\Controller;

use Lib\merge\FPDI as FPDI;
use App\Model\GroupModel as Group;
use App\Model\TeacherModel as Teacher;
use App\Model\StudentModel as Student;
use App\Model\GradeBookModel as GradeBook;
use App\Model\PerformanceModel as Performance;
use App\Model\InstitutionModel as Institution;
use App\ModelPDF\GradeBookPDF as GradeBookPDF;
use App\ModelPDF\GradeBook2PDF as GradeBook2PDF;
use App\Model\ReportPeriodModel as ReportPeriod; //Cambio
use App\Model\EvaluationPeriodModel as Evaluation;
use App\ModelPDF\PlanillaAsistencia as PlanillaAsistencia;
use App\ModelPDF\EvaluationSheetPDF as EvaluationSheetPDF;
use App\ModelPDF\GeneralPeriodReportPDF as GeneralPeriodReportPDF; //Cambio
use App\ModelPDF\CertificateFinal as CertificateFinal;
use App\Model\NoveltyModel as Novelty;
use App\ModelPDF\BookNotePDF as BookNotePDF;
/**
* 
*/
class PdfController
{
	
	function __construct()
	{
		# code...
	}

	public function indexAction(){

	}

	// Cambio
	private function generateGeneralPeriodReport($content, $path, $student=array(), $institution=array(), $group=array())
	{

		$pdf = new GeneralPeriodReportPDF('P', 'mm', 'A4');
		$pdf->institution = $institution;
		$pdf->infoStudent = $student;
		$pdf->infoGroupAndAsig = $group;
		$pdf->content = (empty($content)) ? 'No hay reporte' : $content;
		$pdf->date = (isset($_POST['fecha']) && $_POST['fecha'] != '') ? date('d-m-Y', strtotime($_POST['fecha'])) : date('d-m-Y');
		$pdf->createReportGeneralPeriod();
		$pdf->Output($path.'informe.pdf', 'F');
	}

	private function mergePDF($path, $orientation='p')
	{	
		$pdi = new FPDI();

		$dir = opendir($path);
		$files = array();
		while ($archivo = readdir($dir)) {
				
			if (!is_dir($archivo)){
				echo $archivo."<br />";
				array_push($files, $archivo);
			}
		}

		asort($files);
		
		foreach ($files as $file) 
		{ 
			$pageCount = $pdi->setSourceFile($path.'/'.$file); 

			for ($i=1; $i <= $pageCount; $i++) { 
				
				$tpl = $pdi->importPage($i);
				$pdi->addPage($orientation); 

				$pdi->useTemplate($tpl); 
			}
		}

		ob_clean();
		$buffer = $pdi->Output('I','merged.pdf');

		system('rm -rf ' . escapeshellarg($path), $retval);
	}

	public function getAveragesByGroupAction($db, $period, $id_group){
		$evaluation = new Evaluation($db);
		$gradeBook = new GradeBook($db);

		echo json_encode($gradeBook->resolvePeriod(100137, $id_group, $period, true));
	}

	public function gradeBookAction(){
	
		//print_r($_POST);exit();
		$group = new Group($_POST['db']);
		$evaluation = new Evaluation($_POST['db']);
		$institution = new Institution($_POST['db']);
		$performance = new Performance($_POST['db']);
		$gradeBook = new GradeBook($_POST['db'], $_POST);
		
		$period = ($_POST['period'] == 'if') ? count($gradeBook->periods) : $_POST['period'] ;
		
		$info_inst = $institution->getInfo()['data'][0];
		$info_group = $group->getInfo($_POST['grupo'])['data'][0];
		$valorations = $evaluation->getValoration()['data'];
		$eParameters = $performance->getEvaluationParametersAndIndicators();

		$gradeBook->periods = $institution->getPeriods()['data'];
		$gradeBook->grade = $group->getGrade($_POST['grupo'])['data'][0];
		$gradeBook->valorations = $valorations;
		$gradeBook->eParameters = $eParameters;
		$gradeBook->performances = $performance->getPerformanceByGroup(
			$_POST['grupo'], $period
		)['data'];
		$gradeBook->init();

		$positions = $gradeBook->getAllPositionOfThePeriod($_POST['grupo']);
		//INFORME FINAL
		$finalReportList = array();
		$averageAreaFinalReport = array();
		$typeReprobate = '';
		$minAsignature = 0;
		$finalReportMessages = array();
		
		// PREGUNTAMOS SI EL PERIODO ACTUAL ES EL ULTIMO PERIODO
		if(count($gradeBook->periods) == $_POST['period'] || $_POST['period'] == 'if')
		{
			$averageAreaFinalReport = $gradeBook->getAverageAreaFinalReport($_POST['grupo'], '2017');
			//$finalReportList = $gradeBook->getFinalReportList($_POST['grupo'], '2017');
			$minAsignature = $_POST['minAsignatures'];
			$typeReprobate = $_POST['reprobate'];
			$finalReportMessages = $evaluation->getFinalReportMessages();
		}

		$path = 'pdf/'.time().'-'.$_POST['db'].'-boletin';

		if(!file_exists($path))
		{	
			mkdir($path);
		}

		foreach ($_POST['students'] as $key => $value) 
		{	
			
			if(count($gradeBook->periods) == $_POST['period'] || $_POST['period'] == 'if')
				$report = $gradeBook->getFinalReportListByStudent($value, $_POST['grupo'], $info_group['id_grado'], '2017');
			
			// BOLETIN
			$pdfGradeBook = new GradeBook2PDF('P', 'mm', 'Letter');
			$pdfGradeBook->institution = $info_inst;
			$pdfGradeBook->group = $info_group;
			$pdfGradeBook->positions = $positions;
			$pdfGradeBook->valorations = $valorations;
			//INFORME FINAL
			$pdfGradeBook->finalReportList = $report;
			$pdfGradeBook->averageAreaFinalReport = $averageAreaFinalReport;
			$pdfGradeBook->minAsignature = $minAsignature;
			$pdfGradeBook->typeReprobate = $typeReprobate;
			// MENSAJES INFORME FINAL
			$pdfGradeBook->finalReportMessages = ($finalReportMessages['state']) ? $finalReportMessages['data'][0] : array();
			
			$cal = $gradeBook->getAllByStudent(
				$value, 
				$_POST['fecha'],
				$_POST['grupo'],
				false
			);
			
			
			//echo json_encode($cal);
			$fileName = str_replace(' ', '', $gradeBook->studentName);

			// 
			if($gradeBook->decideGradeBook($cal, $period)):

				$pdfGradeBook->gradeBook = $cal;
				$pdfGradeBook->createGradeBook();
				$pdfGradeBook->Output($path.'/'.$fileName.'boletin.pdf', 'F');

			endif;

			
			if(isset($_POST['generalReportPeriod'])):

				$report = new ReportPeriod($_POST['db']);

				$reportData = $report->getReportPeriodByStudent($value, $period);

				if($reportData['state']):
					$content = $reportData['data'][0]['observaciones'];
					$contentArray = explode('<p>', $content);

					// INFORME GENERAL DEL PERIODO
					$pdfReport = new GeneralPeriodReportPDF('P', 'mm', 'Letter');
					$pdfReport->institution = $info_inst;
					$pdfReport->period = $period;
					$pdfReport->options = $_POST;
					$pdfReport->infoGroupAndAsig = $info_group;
					$pdfReport->infoStudent = $gradeBook->studentName;
					$pdfReport->content = $contentArray;
					$pdfReport->createReportGeneralPeriod();
					$pdfReport->Output($path.'/'.$fileName.'informe.pdf', 'F');
				
				endif;

			endif;
		}	

		$this->mergePDF($path);
	}
	
	
	//
	public function certificateAction()
	{
		$group = new Group($_POST['db']);
		$evaluation = new Evaluation($_POST['db']);
		$institution = new Institution($_POST['db']);
		$performance = new Performance($_POST['db']);
		$gradeBook = new GradeBook($_POST['db'], $_POST);
		$novelty = new Novelty($_POST['db']); //

		$info_inst = $institution->getInfo()['data'][0];
		$info_group = $group->getInfo($_POST['grupo'])['data'][0];
		$valorations = $evaluation->getValoration()['data'];
		$eParameters = $performance->getEvaluationParametersAndIndicators();
		$certificado = $evaluation->getCertificado()['data'];
		$novedades = $novelty->getByGroup($_POST['grupo'])['data'];

		$gradeBook->periods = $institution->getPeriods()['data'];
		$gradeBook->grade = $group->getGrade($_POST['grupo'])['data'][0];
		$gradeBook->valorations = $valorations;
		$gradeBook->eParameters = $eParameters;

		$gradeBook->init();

		$positions = $gradeBook->getAllPositionOfThePeriod($_POST['grupo']);
		$finalReportList = array();
		$averageAreaFinalReport = array();
		$typeReprobate = '';
		$minAsignature = 0;
		$finalReportMessages = array();

		$averageAreaFinalReport = $gradeBook->getAverageAreaFinalReport($_POST['grupo'], $_POST['anio']);
		//$finalReportList = $gradeBook->getFinalReportList($_POST['grupo'], '2017');

		$path = 'pdf/'.time().'-'.$_POST['db'].'-boletin';

		if(!file_exists($path))
		{	
			mkdir($path);
		}

		foreach ($_POST['students'] as $key => $value) 
		{
			$certificate = new CertificateFinal('P', 'mm', 'Letter');
			$student = new Student($_POST['db']);
			
			$report = $gradeBook->getFinalReportListByStudent($value, $_POST['grupo'], $info_group['id_grado'], $_POST['anio']);
			
			$certificate->student_id = $value;
			$certificate->novelties = $novedades;
			$certificate->institution = $info_inst;
			$certificate->group = $info_group;
			$certificate->areas = $averageAreaFinalReport;
			$certificate->asignatures = $report;
			$certificate->certificado = $certificado;
			$certificate->areasEnabled = (isset($_POST['showArea'])) ? true : false;
			$certificate->asignatureEnabled = (isset($_POST['showAsignature'])) ? true : false;
			$data_student = $student->getStudent($value);

			//print_r($report);
			//exit();
			if($data_student['state']):

				$filename = $data_student['data'][0]['primer_ape_alu']." ".$data_student['data'][0]['segundo_ape_alu']." ".$data_student['data'][0]['primer_nom_alu']." ".$data_student['data'][0]['segundo_nom_alu'];

				$certificate->body($filename, $data_student['data'][0]['tipo_identificacion'], $data_student['data'][0]['numero_documento'], $_POST['anio']);
				$certificate->Output($path.'/'.$filename.'certificado.pdf', 'F');

			endif;
		}
		$this->mergePDF($path);
		// print_r($finalReportList);
		
	}
	
	public function bookNoteAction()
	{
		$group = new Group($_POST['db']);
		$evaluation = new Evaluation($_POST['db']);
		$institution = new Institution($_POST['db']);
		$performance = new Performance($_POST['db']);
		$gradeBook = new GradeBook($_POST['db'], $_POST);

		$period = count($gradeBook->periods);

		$info_inst = $institution->getInfo()['data'][0];
		$info_group = $group->getInfo($_POST['grupo'])['data'][0];
		$valorations = $evaluation->getValoration()['data'];
		$certificado = $evaluation->getCertificado()['data'];
		$eParameters = $performance->getEvaluationParametersAndIndicators();

		$gradeBook->periods = $institution->getPeriods()['data'];
		$gradeBook->grade = $group->getGrade($_POST['grupo'])['data'][0];
		$gradeBook->valorations = $valorations;
		$gradeBook->eParameters = $eParameters;
		$gradeBook->performances = $performance->getPerformanceByGroup(
			$_POST['grupo'], $period
		)['data'];
		$gradeBook->init();

		$positions = $gradeBook->getAllPositionOfThePeriod($_POST['grupo']);
		$finalReportList = array();
		$averageAreaFinalReport = array();
		$typeReprobate = '';
		$minAsignature = 0;
		$finalReportMessages = array();

		// PREGUNTAMOS SI EL PERIODO ACTUAL ES EL ULTIMO PERIODO
		$averageAreaFinalReport = $gradeBook->getAverageAreaFinalReport($_POST['grupo'], '2017');
		// $finalReportList = $gradeBook->getFinalReportList($_POST['grupo'], '2017');
		$minAsignature = $_POST['minAsignatures'];
		$typeReprobate = $_POST['reprobate'];
		$finalReportMessages = $evaluation->getFinalReportMessages();

		$path = 'pdf/'.time().'-'.$_POST['db'].'-libroNota';

		if(!file_exists($path))
		{	
			mkdir($path);
		}

		foreach ($_POST['students'] as $key => $value) 
		{

			$bookNote = new BookNotePDF('P', 'mm', 'Letter');
			$student = new Student($_POST['db']);
			$novelty = new Novelty($_POST['db']);

			$data_student = $student->getStudent($value);
			$novedades = $novelty->getByGroup($_POST['grupo'])['data'];

			if($data_student['state']):


				$filename = $data_student['data'][0]['primer_ape_alu']." ".$data_student['data'][0]['segundo_ape_alu']." ".$data_student['data'][0]['primer_nom_alu']." ".$data_student['data'][0]['segundo_nom_alu'];
				
				$report = $gradeBook->getFinalReportListByStudent($value, $_POST['grupo'], $info_group['id_grado'], '2017');

				$bookNote->institution = $info_inst;
				$bookNote->num_doc = $data_student['data'][0]['numero_documento'];	
				$bookNote->folio = $data_student['data'][0]['folio'];
				$bookNote->group = $info_group;
				$bookNote->student = $filename;
				$bookNote->student_id = $value;
				$bookNote->areas = $averageAreaFinalReport;
				$bookNote->asignatures = $report;
				$bookNote->novelties = $novedades;
				$bookNote->certificado = $certificado;
				$bookNote->areasEnabled = (isset($_POST['showArea'])) ? true : false;
				$bookNote->asignatureEnabled = (isset($_POST['showAsignature'])) ? true : false;


				$bookNote->createBookNote();
				$bookNote->Output($path.'/'.$filename.'libroNotas.pdf', 'F');

			endif;
		}

		$this->mergePDF($path);
	}
}

?>