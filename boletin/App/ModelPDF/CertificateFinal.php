<?php
namespace App\ModelPDF;
use Lib\merge\FPDF as FPDF;
/**
* 
*/
class CertificateFinal extends FPDF
{
	public $institution = array();
	public $group = array();
	public $areas = array();
	public $asignatures = array();
	public $certificado = array();
	public $novelties = array();
	public $grados = array(
		1  => 'MATERNO',
		2  => 'PRE-JARDIN',
		3  => 'JARDIN',
		4  => 'TRANSICIÓN',
		5  => 'PRIMERO (1°)',
		6  => 'SEGUNDO (2°)',
		7  => 'TERCERO (3°)',
		8  => 'CUARTO (4°)',
		9  => 'QUINTO (5°)',
		10 => 'SEXTO (6°)',
		11 => 'SÉPTIMO (7°)',
		12 => 'OCTAVO (8°)',
		13 => 'NOVENO (9°)',
		14 => 'DÉCIMO (10°)',
		15 => 'UNDÉCIMO (11°)',
	);

	public $student_id;
	public $areasEnabled = false;
	public $asignatureEnabled = false;

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
		    $this->Image($pic, 12, 14, 20, 20, 'png');
		}

		//Marco
	    // $this->Cell(0, 24, '', 1,0);
	    $this->Ln(0);

	    // NOMBRE DE LA INSTITUCIÓN
	    $this->SetFont('Arial','B',13);
	    $this->Cell(0, 6, ($this->institution['nombre_inst']), 0, 0, 'C');
	    $this->Ln(8);

	    $this->SetFont('Arial','B',11);
	    // NOMBRE DE LA SEDE
	    /*if($this->group['sede'] != NULL):
		    $this->Cell(0,4, 'SEDE: '.strtoupper(($this->group['sede'])), 0, 0, 'C');
		    
	    endif;

	    $this->Ln(4);*/

	    /* TITULO DEL PDF */
	    $this->Cell(0, 4, strtoupper("CERTIFICADO DE ESTUDIO"), 0, 0, 'C');

	    /*NOMBRE DEL GRUPO
	    $this->SetFont('Arial','',8);
	    $this->Cell(20, 4, '', 0,0);
	    $this->Cell(50, 4, "", 0, 0, 'L');
		*/
	    // DIRECTOR DE GRUPO
	     //$this->Cell(90,4, "", 0, 0, 'L');
	     // $this->Cell(90,4, 'DIR. DE GRUPO: '.
	    	// $this->group['doc_primer_nomb']." ".
	    	// $this->group['doc_segundo_nomb']." ".
	    	// $this->group['doc_primer_ape']." ".
	    	// $this->group['doc_segundo_ape'], 0, 0, 'L');

	    // 
	    // $this->Cell(0, 4, 'FECHA: '."fecha", 0,0, 'L');
	    $this->Ln(8);

	}

	public function body($name, $td, $nd, $year)
	{
		$this->addPage();

		$this->showHeader();

		$this->showBody($name, $td, $nd, $year);

		$this->showTable();

		$this->showDate();

		$this->showFirms();
	}

	private function showHeader()
	{
		$this->SetFont('Arial','B',10);

		if(isset($this->certificado[0]['encabezado'])):
			$this->MultiCell(0, 4, utf8_decode($this->certificado[0]['encabezado']), 0, 'C');
			// $this->Cell(0, 6, $this->certificado[0]['encabezado'], 0, 1, 'C');
		endif;

		// $this->Ln(5);

		// $this->Cell(0, 6, $name, 0, 1, 'C');

		$this->Ln(2);
	}

	private function showBody($student, $td, $nd, $year)
	{
		$grade = explode(" ", $this->group['nombre_grupo']);
		$grado = $this->group['id_grado'];
		$group = utf8_decode($this->grados[$grado]);
		$level = $this->group['nivel'];
		$jornada = $this->group['jornada'];
		$tipo_doc = ($td == 'CC') ? 'Cedula de ciudadania' : 'Tarjeta de identidad' ;
		$novedad = $this->getNoveltyMessage($student);

		$bodyText = utf8_decode("Que #student con #tipoDoc #numeroDoc, #novedad en este plantel el grado #curso en la jornada de la #jornada en la #nivel, durante el año lectivo ".$year." de acuerdo a la ley de Educación, Ley 115 de Febrero 8 de 1994, y su decreto Reglamentario 1860 de Agosto 3 de 1994, Evidenciando los siguientes procesos:");

		$bodyText = str_replace("#novedad", $novedad, $bodyText);
		$bodyText = str_replace("#curso", $group, $bodyText);
		$bodyText = str_replace("#nivel", $level, $bodyText);
		$bodyText = str_replace("#student", $student, $bodyText);
		$bodyText = str_replace("#tipoDoc", $tipo_doc, $bodyText);
		$bodyText = str_replace("#numeroDoc", $nd, $bodyText);
		$bodyText = str_replace("#jornada", $jornada, $bodyText);

		$this->SetFont('Arial','',9);
		$this->MultiCell(0, 4, ($bodyText), 0, 'L');
		$this->Ln();
	}
	
	private function getNoveltyMessage()
	{
		$msg = "Curso Y ";
		$next = false;
		foreach($this->novelties as $novelty):
			if($novelty['idstudents'] == $this->student_id):
				if($novelty['id_novedad']==44)
					$msg .= "REPROBO ";
				elseif($novelty['id_novedad']==47)
					$msg .= "SE RETIRO ";
				elseif($novelty['id_novedad']==9)
					$msg .= "DESERTO ";

				$next = true;
			endif;
		endforeach;

		if(!$next)
			$msg .= "APROBO ";

		return $msg;
	}
	
	private function showTable()
	{

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

	public function showDate()
	{
		$this->Ln(8);

		$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

		$this->SetFont('Arial','',9);
		$ciudad = $this->certificado[0]['ciudad_expedicion'];

		$msg = "Dado en ".utf8_decode($ciudad)." a los ".date('d')." dias del mes de ".$meses[date('n')-1]." de ".date('Y');

		$this->Cell(70, $this->h_c, $msg, 0,0, 'L');
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
	    $this->Cell(0, 4,utf8_decode('Ágora - Página ').$this->PageNo(),0,0,'C');
	}
}