<?php
namespace App\ModelPDF;
use Lib\merge\FPDF as FPDF;
/**
* 
*/
class GradeBook2PDF extends FPDF
{
	public $institution = array();	
	public $group = array();
	public $gradeBook = array();
	public $performances = array();
	public $valorations = array();
	// INFORME FINAL
	public $finalReportList = array();
	public $averageAreaFinalReport = array();
	public $positions = array();
	// MENSAJES INFORME FINAL
	public $finalReportMessages = array();

	public $minAsignature = 0;
	public $typeReprobate = '';

	private $_h_c = 4;

	function header()
	{
		if($this->institution['logo_byte'] != NULL)
		{
			$pic = 'data:image/png;base64,'.base64_encode(
				$this->institution['logo_byte']
			);

			$info = getimagesize($pic);

		    // Logo
		    $this->Image($pic, 12, 14, 15, 15, 'png');
		}

		//Marco
	    $this->Cell(0, 24, '', 1,0);
	    $this->Ln(0);

	    // NOMBRE DE LA INSTITUCIÓN
	    $this->SetFont('Arial','B',12);
	    $this->Cell(0, 6, ($this->institution['nombre_inst']), 0, 0, 'C');
	    $this->Ln(6);

	    $this->SetFont('Arial','B',9);
	    // NOMBRE DE LA SEDE
	    if($this->group['sede'] != NULL):
		    $this->Cell(0,4, 'SEDE: '.strtoupper(($this->group['sede'])), 0, 0, 'C');
		    
	    endif;

	    $this->Ln(4);

	    // TITULO DEL PDF
	    $this->Cell(0, 4, strtoupper($this->gradeBook['tittle']), 0, 0, 'C');
	    $this->Ln();

	    // NOMBRE DEL GRUPO
	    $this->SetFont('Arial','',8);
	    $this->Cell(20, 4, '', 0,0);
	    $this->Cell(90, 4, 'GRUPO: '.$this->group['nombre_grupo'], 0, 0, 'L');

	    // DIRECTOR DE GRUPO
	     $this->Cell(0,4, 'DIR. DE GRUPO: '.
	    	$this->group['doc_primer_nomb']." ".
	    	$this->group['doc_segundo_nomb']." ".
	    	$this->group['doc_primer_ape']." ".
	    	$this->group['doc_segundo_ape'], 0, 0, 'L');
	    $this->Ln();

	    // NOMBRE DEL ESTUDIANTE
	    $this->Cell(20, 4, '', 0,0);
	    $this->Cell(90, 4, 'ESTUDIANTE: '.utf8_decode($this->gradeBook['student']['name']), 0, 0, 'L');

	    // FECHA
	    $this->Cell(0, 4, 'FECHA: '.$this->gradeBook['date'], 0,0, 'L');
	    // Salto de línea
	    $this->Ln(8);

	    $this->subHeader();
	}

	private function subHeader()
	{
		if($this->gradeBook['config'][0]['periodIF']):
			$this->Cell(140, $this->_h_c, utf8_decode($this->gradeBook['tittle_if']), 1,0, 'L'); 
		else:
			$this->Cell(140, $this->_h_c, $this->gradeBook['tittle'].utf8_decode(' PERIODO '.$this->gradeBook["current_period"].' - AÑO LECTIVO ').date('Y'), 1,0, 'L'); 
		endif;

		$this->Cell(10, $this->_h_c, 'IHS', 1,0, 'C');
		$this->Cell(17, $this->_h_c, 'VAL', 1,0, 'C');
		$this->Cell(0, $this->_h_c, utf8_decode('DESEMPEÑO'), 1,0, 'C');

		$this->Ln($this->_h_c+4);
	}

	/**
	*
	*
	*/
	public function createGradeBook()
	{
		
		// AÑADIMOS UNA PAGINA EN BLANCO
		$this->addPage();

		// RECOREMOS LOS PERIODOS
		foreach($this->gradeBook['periods'] as $periodKey => $period):

			// PREGUNTAMOS SI EL PERIODO RECORRIDO ES IGUAL AL PERIOD SOLICITADO
			if($period['period'] == $this->gradeBook['current_period']):

				// MOSTRAMOS LAS AREAS
				$this->showAreas($period['areas']);
				$this->Cell(0, $this->_h_c, '', 'T',0, 'L');
			endif;

		endforeach;

		$this->Ln();

		if($this->gradeBook['config'][0]['combinedEvaluation']):
			// MOSTRAMOS EL CUADRO ACUMULATIVO
			$this->showCombineEvaluation();

			// MOSTRAMOS EL PROMEDIO GENERAL
			$this->showScore();

			// MOSTRAMOS EL PUESTO OCUPADO
			$this->showPosition();
		endif;

		// 
		if($this->gradeBook['config'][0]['tableDetail']):

			$this->showTableDetail($period);

		endif;

		// MOSTRAR ESCALA VALORATIVA
		if($this->gradeBook['config'][0]['valorationScale']):
			$this->showValueScale();
		endif;

		// MOSTRAMOS LAS INASISTENCIA EN CASO DE QUE SEA UN CURSO INFERIOR A 6°
		if($this->gradeBook['grade'] < 10):

			$this->showTotalAttendanceByPeriod();

		endif;

		// MOSTRAMOS SI EL ESTUDIANTE APROBO O REPROBO
		if(!empty($this->finalReportList) && $this->gradeBook['config'][0]['includeIF'])
			$this->showAproveOrDisaprove();

		// MOSTRAMOS LOS MENSAJES DEL INFORME FINA
		if(!empty($this->finalReportMessages))
			$this->showFinalReportMessages();

		// MOSTRAMOS LAS OBSERVACIONES GENERALES
		$this->showGeneralObservation($this->gradeBook['observation']);

		if($this->gradeBook['config'][0]['doubleFace']	):
			$this->DoubleFace();
		endif;
	}

	private function showAreas($areas = array())
	{
		// RECORREMOS LAS AREAS
		foreach($areas as $areaKey => $area):

			// FONDO PARA LAS CELDAS DE LAS AREAS
			$this->SetFillColor(230,230,230);
			$this->SetFont('Arial','B',8);

			if($area['nota'] != NULL):
				// PREGUNTAMOS SI EL PERIODO IF ESTA ACTIVO
				if(!$this->gradeBook['config'][0]['periodIF']):
					// PREGUNTAMOS SI LAS AREAS NO SE DESACTIVAN
					if(!$this->gradeBook['config'][0]['areasDisabled']):

						$this->Cell(150, $this->_h_c, utf8_decode($area['name']), 'TBL',0, 'L', true);
						$this->Cell(17, $this->_h_c, $area['nota'], 'TB',0, 'C', true);
						$this->Cell(0, $this->_h_c, strtoupper($area['valoration']), 'TBR', 0, 'C', true);
					
					else:

						$this->Cell(0, $this->_h_c, utf8_decode($area['name']), 1,0, 'L', true);

					endif;
					$this->Ln();
				else:
					foreach($this->averageAreaFinalReport as $report):
						if($area['id_area'] == $report['id_area'] && $report['id_student'] == $this->gradeBook['student']['id']):
							// PREGUNTAMOS SI LAS AREAS NO SE DESACTIVAN
							if(!$this->gradeBook['config'][0]['areasDisabled']):
								$this->Cell(150, $this->_h_c, ($report['area'])." ".$report['type'], 'TBL',0, 'L', true);
								$this->Cell(17, $this->_h_c, $report['note'], 'TB',0, 'C', true);
								$this->Cell(0, $this->_h_c, strtoupper($report['valoration']), 'TBR', 0, 'C', true);
							else:
								$this->Cell(0, $this->_h_c, utf8_decode($report['area']), 1,0, 'L', true);
							endif;
						$this->Ln();
						endif;
					endforeach;
				endif;
				// RECORREMOS LAS ASIGNATURAS
				$this->showAsignature($area['asignatures']);
			endif;

			
		endforeach;
	}

	/**
	*
	*
	*/
	private function showAsignature($asignatires = array())
	{	
		// 
		foreach($asignatires as $keyAsignature => $asignature):

			if($this->determineShowValoration($asignature)):
				
				// if($asignature['nota'] > 0):

					if($this->gradeBook['config'][0]['periodIF']):
						foreach($this->finalReportList as $report):
							if($this->gradeBook['student']['id']==$report['id_student'] && $report['id_asignature'] == $asignature['id_asignatura']):
								$def = $report['nota'];

								$this->showValoration($report, $asignature['ihs'], true);
							endif;
						endforeach;
					else:
						// MOSTRAMOS LA VALORACIÓN
						$this->showValoration($asignature, $asignature['ihs'], false);
					endif;

					if(!$this->gradeBook['config'][0]['periodIF']):
						// MOSTRAMOS LOS DESEMPEÑOS (LOGROS)
						$this->SetFont('Arial','',8);
						$this->showPerformance($asignature['performances']);

						// MOSTRAMOS LAS OBSERVACIONES
						$this->showObservationsByAsignature($asignature);
					endif;

					// MOSTRAMOS AL DOCENTE
					if($this->gradeBook['config'][0]['showTeacher']):
						$this->showTeacher($asignature['teacher']);
					endif;

				// endif;

				
			endif;
			
		endforeach;
	}


	/**
	*
	*
	*/
	private function determineShowValoration($asignature=array())
	{
		foreach($this->gradeBook['periods'] as $keyPeriod => $period):

			foreach($period['areas'] as $keyAreas => $area):

				foreach($area['asignatures'] as $keyAsignature => $asignaturee):

					if($asignature['id_asignatura'] == $asignaturee['id_asignatura'] && $asignaturee['nota'] > 0):

						return true;

					endif;

				endforeach;

			endforeach;

		endforeach;

		return false;
	}

	/**
	*
	*
	*/
	private function showValoration($asignature, $ihs = 0, $utf8_encode = false)
	{	
		$this->SetFont('Arial','B',8);

		$pahtImage = "http://agora.dev/Public/img/";
		$height = 0;
		$note = 0;
		$valoration = '';

		if($this->gradeBook['config'][0]['NumberValoration']):
			$note = $asignature['nota'];
			$valoration = strtoupper($asignature['valoration']);
		else: 
			$note = '';
			$valoration = '';
		endif;

		$ihs = ($ihs == 0) ? '' : $ihs;
		
		if($this->gradeBook['config'][0]['showFaces'] == true):
			$height = 11;
		else:
			$height = $this->_h_c;
		endif;

		if(!$utf8_encode)
			$this->Cell(140, $height, utf8_decode($asignature['name']), 'L',0, 'L');
		else
			$this->Cell(140, $height, ($asignature['name']), 'L',0, 'L');

		$this->Cell(10, $height, $ihs, 0,0, 'C');

		$this->Cell(17, $height, $note, 0,0, 'C');

		if($this->gradeBook['config'][0]['showFaces'] == true):

			$this->Image($pahtImage.strtolower($asignature['valoration']).'.jpg', 185, $this->GetY()+1, 9, 9, 'JPG');
			$this->Cell(0, $height, '', 'R', 0, 'C');

		else:

			$this->Cell(0, $this->_h_c, $valoration, 'R', 0, 'C');
		endif;

		$this->Ln($height);
	}

	/**
	*
	*
	*/
	private function showPerformance($performances = array())
	{
		if($this->gradeBook['config'][0]['showPerformance'] == 'indicators'):

			foreach($performances['indicators'] as $parameterKey => $parameter):

				if(!empty($parameter['performances']) && $this->gradeBook['config'][0]['performanceRating']):

					$this->SetFont('Arial','B',8);
					$this->Cell(0, $this->_h_c, utf8_decode($parameter['parameter']), 'LR',0,'L');
					$this->Ln();
				endif;
				

				foreach($parameter['performances'] as $indicatorsKey => $performance):

					$this->determineCell(
						utf8_decode('   * '.strtoupper($performance['observation'])), 
					'LR');

				endforeach;

			endforeach;

		else:

			foreach($performances['asignature'] as $parameterKey => $parameter):

				if(!empty($parameter['performances']) && $this->gradeBook['config'][0]['performanceRating']):

					$this->SetFont('Arial','B',8);
					$this->Cell(0, $this->_h_c, utf8_decode($parameter['parameter']), 'LR',0,'L');
					$this->Ln();
				endif;

				foreach($parameter['performances'] as $indicatorsKey => $performance):
					
					$this->determineCell(
						utf8_decode('   * '.strtoupper($performance['observation'])
						), 
					'LR');
				
				endforeach;

			endforeach;
		endif;
	}

	/**
	*
	*
	*/
	private function showTeacher($teacher)
	{	
		$this->SetFont('Arial','B',8);
		$this->Cell(0, $this->_h_c,'DOCENTE: '. utf8_decode($teacher), 'LR',0,'R');

		$this->Ln($this->_h_c);
	}
	/**
	*
	*
	*/
	private function determineCell($data, $border)
	{	
		$this->SetFont('Arial','',8);

		if(strlen($data) > 100 && strlen($data) > 0)
			$this->MultiCell(0, $this->_h_c, strip_tags($data), $border, 'L');
		else if(strlen($data) > 0)
		{
			$this->Cell(0, $this->_h_c, strip_tags($data), $border,0, 'L');
			$this->Ln(4);
		}
	}


	/**
	*
	*
	*/
	private function showCombineEvaluation()
	{

		$hasIF = count($this->gradeBook['periods']) == $this->gradeBook['current_period'];
		$withHeader = (!empty($this->finalReportList)) ? (95 + (22 * count($this->gradeBook['periods']))+8) : (96 + (22 * count($this->gradeBook['periods']))) ;

		$this->SetFont('Arial','B',8);

		$this->Cell( $withHeader , $this->_h_c, utf8_decode('VALORACIONES ACUMULADAS DURANTE EL AÑO LECTIVO'), 1, 0, 'C');

		$this->Ln();

		$this->Cell(90, $this->_h_c, 'AREAS / ASIGNATURAS', 1,0, 'C');
		$this->Cell(6, $this->_h_c, 'IHS', 1,0, 'C');

		// RECORREMOS LOS PERIODOS
		foreach($this->gradeBook['periods'] as $periodKey => $period):

			$this->Cell(6, $this->_h_c, 'Fa', 1,0, 'C');
			$this->Cell(8, $this->_h_c, 'P'.$period['period'], 'LTB',0, 'C');
			$this->Cell(8, $this->_h_c, $period['percentage'], 'TRB', 0,'C');
		endforeach;

		// SI EL PERIODO A IMPRIMIR EL EL ULTIMO SE MUESTRA LA COLUMNA IF
		if($hasIF && $this->gradeBook['config'][0]['includeIF'])
		{
			$this->Cell(7, $this->_h_c, 'IF', 'LRT',0, 'C');
		}

		$this->Ln();
		
		// 
		$this->Cell(90, $this->_h_c, '', 1,0, 'C');
		$this->Cell(6, $this->_h_c, '', 1,0, 'C');

		foreach($this->gradeBook['periods'] as $periodKey => $period):

			$this->Cell(6, $this->_h_c, '', 1,0, 'C');
			$this->Cell(8, $this->_h_c, 'VAL', 1,0, 'C');
			$this->Cell(8, $this->_h_c, 'SUP', 1, 0,'C');

		endforeach;

		if($hasIF && $this->gradeBook['config'][0]['includeIF'])
		{
			$this->Cell(7, $this->_h_c, 'VAL', 1,0, 'C');
			// $this->Cell(7, $this->_h_c, 'SUP', 1, 0,'C');
		}

		$this->Ln();

		foreach($this->gradeBook['periods'] as $periodKey => $period):

			if($this->gradeBook['current_period'] == $period['period']):
				// MOSTRAMOS LAS AREAS 
				$this->showAreaTableDetail($period);
			endif;
		endforeach;
	}

	/**
	*
	*
	*/
	private function showTableDetail($period=array())
	{
		$this->Ln($this->_h_c);

		$this->SetFont('Arial','B',8);

		$this->Cell( (100 + (22 * count($this->gradeBook['periods'])) ), $this->_h_c, utf8_decode('CUADRO DETALLADO DURANTE EL AÑO LECTIVO'), 1, 0, 'C');

		$this->Ln();
		
		$this->Cell(96, $this->_h_c, 'AREAS / ASIGNATURAS', 1,0, 'C');
		// $this->Cell(6, $this->_h_c, 'IHS', 1,0, 'C');

		

		// MOSTRAMOS LOS DESEMPEÑOS
		// $this->showPerformanceTableDetail();

		// 
		foreach($this->gradeBook['periods'] as $keyPeriod => $period):

			if($this->gradeBook['current_period'] == $period['period']):

				$this->showAreaTableDetail($period, 'tableDetail');

			endif;
		endforeach;
	}

	/**
	*
	*
	*/
	private function showPerformanceTableDetail()
	{
		foreach($this->gradeBook['eParameters'] as $keyParameters => $parameter):

			$name = explode(' ', $parameter['parametro']);
			$name1 = (isset($name[0])) ? substr($name[0],0,1) : '';
			$name2 = (isset($name[1])) ? substr($name[1],0,1) : '';
			$nameFull = $name.". ".$name2;
			$this->Cell(11, $this->_h_c, $nameFull, 'LTB',0, 'C');
			$this->Cell(10, $this->_h_c, $parameter['peso']."%", 'TBR',0,'C');

		endforeach;

		// MOSTRAMOS EL CAMPO PARA LA VALORACIÓN FINAL
		$this->Cell(10, $this->_h_c, "VAL", 'TBR',0,'C');

		$this->Ln();
	}

	/**
	*
	*
	*/
	private function showAreaTableDetail($period=array(), $type = 'combinedEvaluation')
	{

		foreach($period['areas'] as $areaKey => $area):
			// FONDO PARA LAS CELDAS DE LAS AREAS
			$this->SetFillColor(230,230,230);
			$this->SetFont('Arial','B',8);

			$this->Cell(96 , $this->_h_c, 
				utf8_decode(
					substr($area['name'], 0, 58)
				),
			1,0, 'L', true);

			if($type == "combinedEvaluation"):
				// MOSTRAMOS LA VALORACION DE CADA PERIODO
				$this->showPeriodValorationByArea($area);

			endif;
			
			$this->Ln();

			// MOSTRAMOS LAS ASIGNATURAS
			$this->showAsignatureTableDetail($area['asignatures'], $type);

			
		endforeach;
	}

	/**
	*
	*
	*/
	private function showAsignatureTableDetail($asignatures=array(), $type='combinedEvaluation')
	{
		foreach($asignatures as $keyAsignature => $asignature):
			$this->SetFont('Arial','',8);

			if($this->determineShowValoration($asignature)):

				if($type == 'combinedEvaluation'):

					$this->Cell(90, $this->_h_c, 
					utf8_decode(substr($asignature['name'], 0, 51)),'TBL',0, 'L');

					$this->Cell(6, $this->_h_c, 
					($asignature['ihs']== 0) ? '' : $asignature['ihs'], 1,0, 'C');
					// MOSTRAMOS LA VALORACION DE LOS PERIODOS
					$this->showPeriodValorationByAsignature($asignature);

				else:
					$this->Cell(96, $this->_h_c, 
					utf8_decode(substr($asignature['name'], 0, 51)),'TBL',0, 'L');

					$this->showValorationPerformanceTableDetail($asignature);
				endif;

				$this->Ln();

			endif;
		endforeach;
	}

	/**
	*
	*
	*/
	private function showValorationPerformanceTableDetail($asignature=array())
	{

		foreach($asignature['indicators'] as $keyIndicators => $performance):

			$noteIndicator = 0;

			foreach($performance['indicators'] as $keySubIndicator => $indicator):

				$noteIndicator +=$indicator['value'];

			endforeach;
			$this->Cell(11, $this->_h_c, $noteIndicator, 'LTB',0, 'C');
			$this->Cell(10, $this->_h_c, $performance['percentage'], 'TBR',0,'C');

		endforeach;

		$this->Cell(10, $this->_h_c, $asignature['nota'], 'TBR',0,'C');
	}

	/**
	*
	*
	*/
	private function showPeriodValorationByArea($area=array())
	{

		foreach($this->gradeBook['periods'] as $periodKey => $period):

			$note = '';
			if(!empty($period['areas']) && $period['period'] <= $this->gradeBook['current_period']):
				foreach($period['areas'] as $areaKey => $areaa):


					if($area['id_area'] == $areaa['id_area'] && !$this->gradeBook['config'][0]['areasDisabled']):

						$note = $areaa['nota'];

					endif;

				endforeach;
			endif;

			$this->Cell(6, $this->_h_c, '', 1,0, 'C', true);

			$this->Cell(8, $this->_h_c, $note, 1,0, 'C', true);
					
			$this->Cell(8, $this->_h_c, '', 1, 0,'C', true);

		endforeach;

		if(!empty($this->finalReportList) && $this->gradeBook['config'][0]['includeIF']):
			$this->showAreaFinalReport($area);			
		endif;
	}

	/**
	*
	*
	*/
	private function showPeriodValorationByAsignature($asignature=array())
	{
		foreach($this->gradeBook['periods'] as $periodKey => $period):

			$note = '';
			$noAttendace = '';
			$recovery_note = '';

			if(!empty($period['areas']) && $period['period'] <= $this->gradeBook['current_period']):
				foreach($period['areas'] as $areaKey => $areaa):

					foreach($areaa['asignatures'] as $asignaturee):
						if($asignature['id_asignatura'] == $asignaturee['id_asignatura']):

							if($asignaturee['recovery']['recovery_note'] > 0):
								$note = $asignaturee['recovery']['old_note'];
								$recovery_note = $asignaturee['recovery']['recovery_note'];	
							else:
								$note = ($asignaturee['nota'] > 0) ? $asignaturee['nota'] : ''; 
							
							endif;
							
							if($this->gradeBook['grade'] >= 10):
								$noAttendace = $asignaturee['inasistencia'];
							endif;

						endif;

					endforeach;

				endforeach;

			endif;
			
			$this->Cell(6, $this->_h_c, $noAttendace, 1,0, 'C');

			$this->Cell(8, $this->_h_c, ($note == 0) ? '': $note, 1,0, 'C');
						
			$this->Cell(8, $this->_h_c, $recovery_note, 1, 0,'C');

		endforeach;

			if(!empty($this->finalReportList) && $this->gradeBook['config'][0]['includeIF']):
				$maxPeriod = count($this->gradeBook['periods']) - 1;
				$finalPeriod = $this->gradeBook['periods'][$maxPeriod];
				$this->showAsignatureFinalReport($finalPeriod, $asignature);
			endif;

	}

	/*
	 *
	 */
	public function showAsignatureFinalReport($period, $asignature)
	{
		$def = 0;
		$next = false;

		foreach($this->finalReportList as $report):
			if($this->gradeBook['student']['id']==$report['id_student'] && $report['id_asignature'] == $asignature['id_asignatura'])
				$def = $report['nota'];
		endforeach;

		$this->Cell(7, $this->_h_c, ($def == 0)? '': $def, 1,0, 'C');
	}

	/*
	 *
	 */
	public function showAreaFinalReport($area)
	{
		$def = 0;
		$next = false;

		foreach($this->averageAreaFinalReport as $report):
			if($this->gradeBook['student']['id']==$report['id_student'] && $report['id_area'] == $area['id_area'])
				$def = $report['note'];
		endforeach;
		
		if(!$this->gradeBook['config'][0]['areasDisabled'])
			$this->Cell(7, $this->_h_c, $def, 1,0, 'C', true);	
		else
			$this->Cell(7, $this->_h_c, '', 1,0, 'C', true);	
	}

	/**
	*
	*
	*/
	private function showPosition()
	{	
		$this->SetFont('Arial','B',8);

		$this->Cell(90 , $this->_h_c, 
				utf8_decode(
					'PUESTO EN EL GRUPO:'
				),
			1,0, 'R');
		$this->Cell(6 , $this->_h_c, '',	1,0, 'R');

		foreach($this->gradeBook['periods'] as $periodKey => $period):

			// MOSTRAMOS LOS PUESTOS DE CADA PERIODO
			$this->showPeriodPositions($period['period']);
		endforeach;

		// PERIODO FINAL
		if(!empty($this->finalReportList) && $this->gradeBook['config'][0]['includeIF']):
			$position = 0;
			foreach($this->finalReportList as $report):
				if($this->gradeBook['student']['id'] == $report['id_student']):
					$position = $report['puesto'];
					break;
				endif;
			endforeach;
			$this->Cell(7, $this->_h_c, $position, 1,0, 'C');
		endif;

		$this->Ln();
	}

	/**
	*
	*
	*/
	private function showPeriodPositions($period)
	{

		// 
		foreach($this->positions as $keyPP => $pperiod):
			if(!empty($pperiod) && $period <= $this->gradeBook['current_period']):
				foreach($pperiod as $keyPosition => $position):
					
					if($position['period'] == $period && $position['id_student'] == $this->gradeBook['student']['id']):
						$this->Cell(6, $this->_h_c, '', 1,0, 'C');

						$this->Cell(8, $this->_h_c, $position['position'], 1,0, 'C');
									
						$this->Cell(8, $this->_h_c, '', 1, 0,'C');
					endif;
				endforeach;
			endif;
		endforeach;
	}

	/**
	*
	*
	*/
	private function showScore()
	{	
		$this->SetFont('Arial','B',8);

		$this->Cell(90 , $this->_h_c, 
				utf8_decode(
					'PROMEDIO GENERAL DEL ESTUDIANTE:'
				),
			1,0, 'R');
		$this->Cell(6 , $this->_h_c, '',	1,0, 'R');

		foreach($this->gradeBook['periods'] as $periodKey => $period):
			// MOSTRAMOS LOS PUESTOS DE CADA PERIODO
			$this->showPeriodScores($period['period']);
		endforeach;

		// PERIODO FINAL
		if(!empty($this->finalReportList) && $this->gradeBook['config'][0]['includeIF']):
			$score = 0;
			foreach($this->finalReportList as $report):
				if($this->gradeBook['student']['id'] == $report['id_student']):
					$score = $report['promedio'];
					break;
				endif;
			endforeach;
			$this->Cell(7, $this->_h_c, $score, 1,0, 'C');
		endif;

		$this->Ln();
	}

	/**
	*
	*
	*/
	private function showPeriodScores($period)
	{

		foreach($this->positions as $keyPP => $pperiod):

			if(!empty($pperiod) && $period <= $this->gradeBook['current_period']):
				foreach($pperiod as $keyPosition => $position):
					
					if($position['period'] == $period && $position['id_student'] == $this->gradeBook['student']['id']):

						$this->Cell(6, $this->_h_c, '', 1,0, 'C');

						$this->Cell(8, $this->_h_c, $position['average'], 1,0, 'C');
									
						$this->Cell(8, $this->_h_c, '', 1, 0,'C');

					endif;

				endforeach;
			endif;
		endforeach;
	}

	/**
	*
	*
	*/
	private function showValueScale()
	{
		$this->Ln($this->_h_c * 2);

		$this->SetFont('Arial','B',8);
		
		$this->Cell(0, $this->_h_c, utf8_decode('ESCALA DE VALORACIÓN:'), 0, 0, '');
		$this->Ln($this->_h_c);

		$this->SetFont('Arial','',8);
		foreach ($this->valorations as $key => $valoration):
			
			$this->Cell(0, $this->_h_c, utf8_decode('DESEMPEÑO '.$valoration['val'].': '.$valoration['minimo'].' A '.$valoration['maximo']), 0,0, '');
			$this->Ln($this->_h_c);
		endforeach;
	}

	/**
	*
	*
	*/
	private function DoubleFace()
	{
		if($this->PageNo()% 2 != 0 && $this->PageNo() >= 1):
			$this->AddPage();
		endif;
	}

	/**
	*
	*
	*/
	private function showObservationsByAsignature($asignature = array())
	{	

		if(isset($asignature['observations'][0]['observation']) && $asignature['observations'][0]['observation']!= NULL):
			$this->SetFont('Arial','B',8);
			
			$this->Cell(0, $this->_h_c, 'OBSERVACIONES', 'LR', 0, 'L');
			
			$this->Ln();
			
			$this->determineCell('   * '.strtoupper($this->hideTilde($asignature['observations'][0]['observation'])),
			'LR');

			// $this->Ln();
		endif;
	}

	/**
	*
	*/
	private function showTotalAttendanceByPeriod()
	{
		
		$this->Ln($this->_h_c);

		$noAttendace = 0;

		foreach($this->gradeBook['periods'] as $key => $period):

			if($this->gradeBook['current_period'] == $period['period']):

				$noAttendace = $period['inasistencia'];

			endif;

		endforeach;

		if($noAttendace > 0):

			$this->SetFont('Arial','',8);

			$this->Cell(53, $this->_h_c, "Faltas de asistencia durante el periodo {$this->gradeBook['current_period']}: ", 0,0);

			$this->SetFont('Arial','B',8);

			$this->Cell(0, $this->_h_c, $noAttendace, 0, 0);

		endif;
	}

	private function showGeneralObservation($observations=array())
	{

		$this->Ln($this->_h_c*2);

		$this->SetFont('Arial','B',8);
		$this->Cell(0, $this->_h_c, 'OBSERVACIONES GENERALES:', 0,0, 'L');

		if(empty($observations)):	
			// MOSTRAMOS LAS LINEAS
			$this->Ln($this->_h_c * 1.5);
			$this->Cell(190, $this->_h_c, '', 'B',0, 'L');
			
			$this->Ln($this->_h_c * 1.5);
			$this->Cell(190, $this->_h_c, '', 'B',0, 'L');

			$this->Ln($this->_h_c * 1.5);
			$this->Cell(190, $this->_h_c, '', 'B',0, 'L');
		else:

			foreach($observations as $observation):
				$this->Ln();
				$this->determineCell($this->hideTilde($observation), 0);

			endforeach;

		endif;

		$this->Ln($this->_h_c * 4);
		// DIRECTOR DE GRUPO
	     $this->Cell(0,4, $this->group['doc_primer_nomb']." ".
	    	$this->group['doc_segundo_nomb']." ".
	    	$this->group['doc_primer_ape']." ".
	    	$this->group['doc_segundo_ape'], 0, 0, 'L');

	    $this->Ln();

	    $this->SetFont('Arial','',8);
	    $this->Cell(0, $this->_h_c, 'DIRECTOR DE GRUPO', 0,0);
	}

	// 
	/**
	*
	*
	*/
	private function hideTilde($text)
	{	
		$content = $text;
		$decoded = false;

		if(strstr($content, '&eacute;')){
			$content = str_replace('&eacute;', 'é', $content);
			$decoded = true;
		}
		
		if(strstr($content, '&Eacute;')){
			$content = str_replace('&Eacute;', 'É', $content);
			$decoded = true;
		}

		if(strstr($content, '&aacute;')){
			$content = str_replace('&aacute;', 'á', $content);
			$decoded = true;
		}
		
		if(strstr($content, '&Aacute;')){
			$content = str_replace('&Aacute;', 'Á', $content);
			$decoded = true;
		}
		
		if(strstr($content, '&iacute;')){
			$content = str_replace('&iacute;', 'í', $content);
			$decoded = true;
		}
		
		if(strstr($content, '&Iacute;')){
			$content = str_replace('&Iacute;', 'Í', $content);
			$decoded = true;
		}

		if(strstr($content, '&oacute;')){
			$content = str_replace('&oacute;', 'ó', $content);
			$decoded = true;
		}
		
		if(strstr($content, '&Oacute;')){
			$content = str_replace('&Oacute;', 'Ó', $content);
			$decoded = true;
		}
		
		if(strstr($content, '&uacute;')){
			$content = str_replace('&uacute;', 'ú', $content);
			$decoded = true;
		}
		
		if(strstr($content, '&Uacute;')){
			$content = str_replace('&Uacute;', 'Ú', $content);
			$decoded = true;
		}
		
		if(strstr($content, '&ntilde;')){
			$content = str_replace('&ntilde;', 'ñ', $content);
			$decoded = true;
		}
		
		if(strstr($content, '&Ntilde;')){
			$content = str_replace('&Ntilde;', 'Ñ', $content);
			$decoded = true;
		}
		
		if(strstr($content, '&ldquo;')){
			$content = str_replace('&ldquo;', '"', $content);
			$decoded = true;
		}
		
		if(strstr($content, '&rdquo;')){
			$content = str_replace('&rdquo;', '"', $content);
			$decoded = true;
		}
		
		if(strstr($content, '&hellip;')){
			$content = str_replace('&hellip;', '...', $content);
			$decoded = true;
		}	
		
		if(strstr($content, '&iquest;')){
			$content = str_replace('&iquest;', '¿', $content);
			$decoded = true;
		}
		
		if(strstr($content, '&nbsp;')){
			$content = str_replace('&nbsp;', ' ', $content);
			$decoded = true;
		}
		
		return ($decoded) ? utf8_decode($content) : $content;
	}

	public function showAproveOrDisaprove()
	{
		$data = array();

		$this->Ln();
		$this->SetFont('Arial','B',8);
		$this->Cell(0, $this->_h_c, utf8_decode("DECISIONES DE LA COMISIÓN DE EVALUACIÓN Y PROMOCIÓN"), 0,0,'L');
		
		$this->Ln();

		if($this->typeReprobate == 'asignatura'):
			$data = $this->reprobateByAsignature();
		else:
			$data = $this->reprobateByAera();
		endif;

		$this->Cell(19, $this->_h_c, utf8_decode($data['text']), 0,0,'L');
		$this->SetFont('Arial','',8);
		$this->Cell(0, $this->_h_c, utf8_decode("el grado"), 0,0,'L');
	}

	public function reprobateByAsignature()
	{
		$hit = 0;
		$minValoration = $this->getValoration('Basico');	

		if($this->gradeBook['config'][0]['onlyAcademic']):
			foreach($this->finalReportList as $report):
				if($this->gradeBook['student']['id'] == $report['id_student'] && ($report['nota'] < $minValoration['minimo'] && $report['nota'] > 0) && $report['type'] == 'A'):
					$hit++;
				endif;
			endforeach;
		else:
			foreach($this->finalReportList as $report):
				if($this->gradeBook['student']['id'] == $report['id_student'] && ($report['nota'] < $minValoration['minimo'] && $report['nota'] > 0) && $report['type'] != 'C'):
					$hit++;
				endif;
			endforeach;
		endif;

		return ($hit >= $this->minAsignature) ? array('text' => '* NO APROBÓ', 'state'=>false) : array('text' => '* SI APROBÓ', 'state' => true);
	}


	public function reprobateByAera()
	{
		$hit = 0;
		$minValoration = $this->getValoration('Basico');	

		if($this->gradeBook['config'][0]['onlyAcademic']):
			foreach($this->averageAreaFinalReport as $report):
				if($this->gradeBook['student']['id'] == $report['id_student'] && ($report['note'] < $minValoration['minimo'] && $report['note'] > 0) && $report['type'] == 'A'):
					$hit++;
				endif;
			endforeach;
		else:
			foreach($this->averageAreaFinalReport as $report):
				if($this->gradeBook['student']['id'] == $report['id_student'] && ($report['note'] < $minValoration['minimo'] && $report['note'] > 0) && $report['type'] != 'C'):
					$hit++;
				endif;
			endforeach;
		endif;

		return ($hit >= $this->minAsignature) ? array('text' => '* NO APROBÓ', 'state'=>false) : array('text' => '* SI APROBÓ', 'state' => true);
	}

	public function getValoration($val)
	{

		foreach($this->valorations as $valoration):
			if($valoration['valoracion'] == $val):
				return $valoration;
			endif;
		endforeach;

		return array();
	}

	private function showFinalReportMessages()
	{
		$this->Ln(4);
		// if($this->finalReportMessages['alguna_reprobacion'] != NULL)
		// 	$this->determineCell(utf8_decode($this->finalReportMessages['alguna_reprobacion']), false);

		// if($this->finalReportMessages['aprovacion_nitido'] != NULL)
		// 	$this->determineCell(utf8_decode($this->finalReportMessages['aprovacion_nitido']), false);

		if($this->finalReportMessages['mensaje_general'] != NULL)
			$this->determineCell(utf8_decode($this->finalReportMessages['mensaje_general']), false);

		if($this->finalReportMessages['mensaje_para_preescolar'] != NULL)
			$this->showPreeSchoolMessage();
			

		if($this->finalReportMessages['reprobacion_grado'] != NULL)
			$this->showReprobateMessageGrade();
	}

	private function showReprobateMessageGrade()
	{
		$data = array();

		if($this->typeReprobate == 'asignatura'):
			$data = $this->reprobateByAsignature();
		else:
			$data = $this->reprobateByAera();
		endif;
		
		if(!$data['state'])
			$this->determineCell(utf8_decode($this->finalReportMessages['reprobacion_grado']), false);	
	}

	private function showPreeSchoolMessage()
	{
		if($this->gradeBook['grade'] <= 4)
			$this->determineCell(utf8_decode($this->finalReportMessages['mensaje_para_preescolar']), false);
	}

	function footer()
	{
		// Posición: a 1,5 cm del final
	    $this->SetY(-15);
	    // Arial italic 8
	    $this->SetFont('Arial','I',8);
	    // Número de página
	    $this->Cell(0, 4,utf8_decode('Ágora - Página ').$this->PageNo(),0,0,'C');
	}
}
?>