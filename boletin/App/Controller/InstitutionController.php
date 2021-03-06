<?php
namespace App\Controller;

use App\Config\View as View;
use App\Model\EvaluationPeriodModel as Evaluation;
use App\Model\InstitutionModel as Institution;
use App\Model\PeriodModel as Period;

class InstitutionController
{
	
	function __construct()
	{
		
	}

	function indexAction()
	{

	}

	public function showFormgradeBookAction($db)
	{
		$institution = new Institution($db);

		$sedes = $institution->getSedes()['data'];
		

		$view = new View(
			'gradeBook',
			'index', //formGradeBook
			[
				'sedes'	=>	$sedes,
				'periods'	=>	$institution->getPeriods()['data'],
				'db' => $db
			]
		);

		$view->execute();
	}


	public function showFormEvaluationSheetAction($db)
	{	
		
		$institution = new Institution($db);
		$period = new Period($db);
		
		$sedes = $institution->getSedes()['data'];
		
		$view = new View(
			'institucion',
			'formEvaluationSheet',
			[
				'db' 	=>	$db,
				'sedes'	=>	$sedes,
				'periods'	=>	$period->all()['data']
			]
		);
		
		//$view->execute();
		var_dump($view->execute());
	}
}

?>