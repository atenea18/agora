<?php
namespace App\ModelPDF;
use Lib\merge\FPDF as FPDF;
/**
* 
*/
class BookNotePDF extends FPDF
{
	public $student = '';
	public $num_doc = 0;
	public $folio = '';
	public $student_id = '';
	public $institution = array();	
	public $group = array();
	public $areas = array();
	public $asignatures = array();
	public $novelties = array();
	public $certificado;

	public $areasEnabled = true;
	public $asignatureEnabled = true;

	private $h_c = 4;

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
	    // if($this->group['sede'] != NULL):
		   //  $this->Cell(0,4, 'SEDE: '.strtoupper(($this->group['sede'])), 0, 0, 'C');
		    
	    // endif;

	    // $this->Ln(4);

	    // TITULO DEL PDF
	    $this->Cell(0, 4, utf8_decode("REGISTRO DE VALORACIÓN FINAL DEL ESTUDIANTE"), 0, 0, 'C');
	    $this->Ln();
		
		$this->SetFont('Arial','',8);
		// NOMBRE DEL ESTUDIANTE
	    $this->Cell(20, 4, '', 0,0);
	    $this->Cell(70, 4, 'ESTUDIANTE: '.utf8_decode($this->student), 0, 0, 'L');
		
		// NOMBRE DEL GRUPO
	    $this->Cell(20, 4, '', 0,0);
	    $this->Cell(20, 4, 'GRUPO: '.$this->group['nombre_grupo'], 0, 0, 'L');
		
		// NOMBRE DEL GRUPO
	    $this->Cell(20, 4, '', 0,0);
	    $this->Cell(0, 4, 'JORNADA: '.strtoupper($this->group['jornada']), 0, 0, 'L');
		
		$this->Ln();
		
		// NOMBRE DEL ESTUDIANTE
	    $this->Cell(20, 4, '', 0,0);
	    $this->Cell(90, 4, 'DOC IDENTIDAD: '.$this->num_doc, 0, 0, 'L');
		
	    // // FECHA
	    $this->Cell(0, 4, utf8_decode('AÑO LECTIVO: 2017'), 0,0, 'L');
		
		
	    // Salto de línea
	    $this->Ln(10);
	}

	public function createBookNote()
	{
		$this->addPage();

		$this->showTable();

		$this->showAproveOrDisaprove();
		
		$this->showGeneralObservation();

		$this->showFirms();
	}

	private function showTable()
	{

		$this->Ln(2);

		$this->SetFont('Arial','B',8);

		$this->Cell( 0 , $this->h_c, utf8_decode('VALORACIONES ACUMULADAS DURANTE EL AÑO LECTIVO'), 1, 0, 'C');

		$this->Ln();

		$this->Cell(140, $this->h_c, 'AREAS / ASIGNATURAS', 'LB',0, 'C');
		$this->Cell(7, $this->h_c, 'IHS', 1,0, 'C');
		$this->Cell(22, $this->h_c, utf8_decode('VALORACIÓN'), 1,0, 'C');
		$this->Cell(0, $this->h_c, utf8_decode('DESEMPEÑO'), 'TBR',1, 'C');

		// $this->Ln(4);

		$this->showAreas();
	}

	private function showAreas()
	{	
		
		foreach($this->areas as $area):
			if($area['id_student'] == $this->student_id):
				$this->SetFillColor(230,230,230);
				$this->SetFont('Arial','B',8);
				// PREGUNTAMOS SI LAS AREAS NO SE DESACTIVAN
				if($this->areasEnabled):
					$this->Cell(140, $this->h_c, ($area['area']), 'TBL',0, 'L', true);
					$this->Cell(7, $this->h_c, "", 1,0, 'L', true);
					$this->Cell(22, $this->h_c, $area['note'], 1,0, 'C', true);
					$this->Cell(0, $this->h_c, strtoupper($area['valoration']), 1, 0, 'C', true);
				else:
					$this->Cell(0, $this->h_c, ($area['area']), 1,0, 'L', true);
				endif;
			$this->Ln();
			$this->showAsignature($area);
			endif;
		endforeach;
	}

	private function showAsignature($area=array())
	{
		// $this->SetFillColor(230,230,230);
		$this->SetFont('Arial','',8);
		foreach($this->asignatures as $asignature):
			if($asignature['id_student'] == $this->student_id && $asignature['id_area'] == $area['id_area'] && $asignature['nota'] > 0):
				// PREGUNTAMOS SI LAS AREAS NO SE DESACTIVAN
				if($this->asignatureEnabled):
					$this->Cell(140, $this->h_c, ($asignature['name']), 'TBL',0, 'L');
					$this->Cell(7, $this->h_c, $asignature['int_hor'], 1,0, 'C');
					$this->Cell(22, $this->h_c, $asignature['nota'], 1,0, 'C');
					$this->Cell(0, $this->h_c, strtoupper($asignature['valoration']), 'TBR', 0, 'C');
				else:
					$this->Cell(0, $this->h_c, ($asignature['name']), 1,0, 'L');
				endif;
				$this->Ln();
			endif;
		endforeach;
	}

	public function showAproveOrDisaprove()
	{
		$data = '';

		$this->Ln();
		$this->SetFont('Arial','B',8);
		$this->Cell(0, $this->h_c, utf8_decode("DECISIONES DE LA COMISIÓN DE EVALUACIÓN Y PROMOCIÓN"), 0,0,'L');
		
		$this->Ln($this->h_c);

		$data = $this->getNoveltyMessage();

		$this->Cell(19, $this->h_c, utf8_decode($data), 0,0,'L');
		$this->SetFont('Arial','',8);
		$this->Cell(0, $this->h_c, utf8_decode("el Grado"), 0,0,'L');
	}

	private function getNoveltyMessage()
	{
		$msg = "";
		$next = false;
		foreach($this->novelties as $novelty):
			if($novelty['idstudents'] == $this->student_id):
				if($novelty['id_novedad']==44)
					$msg = "*NO APROBÓ";
				elseif($novelty['id_novedad']==47)
					$msg = "*NO APROBÓ";
				elseif($novelty['id_novedad']==9)
					$msg = "*NO APROBÓ";

				$next = true;
			endif;
		endforeach;

		if(!$next)
			$msg = "*SI APROBÓ";

		return $msg;
	}
	
	private function showGeneralObservation()
	{	
		$this->Ln($this->h_c*2);
		
		$this->SetFont('Arial','B',8);
		$this->Cell(0, $this->h_c, 'OBSERVACIONES GENERALES:', 0,0, 'L');	
		
		$this->Ln($this->h_c * 1.5);
		$this->Cell(190, $this->h_c, '', 'B',0, 'L');
			
		$this->Ln($this->h_c * 1.5);
		$this->Cell(190, $this->h_c, '', 'B',0, 'L');

		$this->Ln($this->h_c * 1.5);
		$this->Cell(190, $this->h_c, '', 'B',0, 'L');
	}
	
	private function showFirms()
	{
		$this->Ln(25);

		$this->SetFont('Arial','B',9);
		
		if($this->certificado[0]['firma_rectora'] != ''):
			$this->Cell(70, $this->h_c, strtoupper(utf8_decode($this->certificado[0]['firma_rectora'])), 'T',0, 'L');
			$this->Cell(50, $this->h_c, "", 0, 0, 'C');
		endif;
		
		if($this->certificado[0]['firma_secretaria'] != '')
			$this->Cell(50, $this->h_c, strtoupper(utf8_decode($this->certificado[0]['firma_secretaria'])), 'T', 0, 'L');
		$this->Ln(4);

		$this->SetFont('Arial','',9);
		// 

		if($this->certificado[0]['firma_rectora'] != '' && $this->certificado[0]['documento_rectora'] != ''):
			$this->Cell(70, $this->h_c, utf8_decode($this->certificado[0]['documento_rectora']." de ".$this->certificado[0]['ciudad_documento_rectora']), 0,0, 'L');
			$this->Cell(50, $this->h_c, "", 0, 0, 'C');
		endif;

		if($this->certificado[0]['firma_secretaria'] != '' && $this->certificado[0]['documento_secretaria'] != '')
			$this->Cell(50, $this->h_c, utf8_decode($this->certificado[0]['documento_secretaria']." de ".$this->certificado[0]['ciudad_documento_secretaria']), 0, 0, 'L');
		$this->Ln(4);
		// 

		if($this->certificado[0]['firma_rectora'] != ''):
			$this->Cell(70, $this->h_c, 'Rector(a)', 0,0, 'L');
			$this->Cell(50, $this->h_c, "", 0, 0, 'C');
		endif;
		
		if($this->certificado[0]['firma_secretaria'] != '')
			$this->Cell(50, $this->h_c, 'Secretario(a)', 0, 1, 'L');	
	}
	
	function footer()
	{
		// Posición: a 1,5 cm del final
	    $this->SetY(-15);
	    // Arial italic 8
	    $this->SetFont('Arial','I',8);
	    // Número de página
	    
		if($this->folio != null){
			$this->Cell(20, 4,utf8_decode('Ágora - Página ').$this->PageNo(),0,0,'L');
			$this->Cell(0, 4, "Folio No. ".$this->folio,0,0,'R');
		}
		else{
	    	$this->Cell(0, 4,utf8_decode('Ágora - Página ').$this->PageNo(),0,0,'C');
		}
	}
}