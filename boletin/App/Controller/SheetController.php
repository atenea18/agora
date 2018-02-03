<?php
namespace App\Controller;

use App\Model\SheetModel as Sheet;
use App\Model\PeriodModel as Period;
use App\Model\TeacherModel as Teacher;
use App\Model\ValorationModel as Valoration;
use App\Model\PerformanceModel as Performance;
use App\Model\InstitutionModel as Institution;
use App\Model\EvaluationPeriodModel as Evaluation;
/**
* 
*/
class SheetController
{
	private $_sheet;
	private $_teacher;
	private $_evaluation;
	private $_institution;
	private $_performance;
	
	/**
	*
	*
	*/
	function __construct()
	{
		
	}

	/**
	* @author
	* @param
	* @return
	*/
	public function attendanceAction($db)
	{
		// Preguntamos si el array POST NO esta vacio
		if(!empty($_POST) && isset($_POST['teacher'])):

			$teacher = new Teacher($db);	
			$sheet = new Sheet($db);
			
			$path = './'.time().$db.'-planilla-asistencia/';

			$sheet->setPath($path);


			if(!file_exists($path))
				mkdir($path);

			foreach($_POST['teacher'] as $key => $id_teacher):

				$groups = $teacher->getAsignaturesAndGroups($id_teacher)['data'];	

				foreach($groups as $key => $group):

						$sheet->studentAttendanceSheet($group['id_asignatura'], $group['id_grupo'], 'studentAttendance');
				endforeach;
		
			endforeach;

			$sheet->merge('l');
		else:

			echo "Vacio";
		endif;
	}

	/**
	*
	*
	
	public function evaluationAction($db)
	{
		if(!empty($_POST) && isset($_POST['teacher'])):

			$sheet = new Sheet($db);
			$period = new Period($db);
			$teacher = new Teacher($db);	
			$performance = new Performance($db);

			// Creamos el directorio
			$path = './'.time().$db.'-planilla-evaluacion/';

			if(!file_exists($path))
			{	
				mkdir($path);
			}

			// Obtenemos la cantidad de periodos
			$periods = count($period->all()['data']);
			$current_period = $_POST['period'];

			// OBtenemos los parametros de evaluacion
			$Resp_eP = $performance->getEvaluationParameters()['data'];
			// 
			$evaluation_parameters = array();
			
			// Recorremos cada parametro de evaluacion y creamos un nuevo array
			foreach ($Resp_eP as $key => $value) 
			{
				array_push($evaluation_parameters, 
					array(
						'id_parametro' => $value['id_parametro_evaluacion'],
						'parametro' => $value['parametro'],
						'indicadores' => $performance->getPerformanceIndicators($value['id_parametro_evaluacion'])['data']
					)
				);
			}

			// Cargamos las opciones para el pdf
			$options = array(
				// 'infoIns'			=> $this->_institution->getInfo()['data'][0],
				'e_parameters'		=>	$evaluation_parameters,
				'orientation'		=>	$_POST['orientation'],
				'papper'			=>	$_POST['papper']
			);

			// Asignamos el directorio
			$sheet->setPath($path);
			// Asignamos las opciones
			$sheet->setOptions($options);
			// 
			$sheet->current_period = $current_period;

			// 
			foreach($_POST['teacher'] as $key => $id_teacher):

				// 
				$groups = $teacher->getAsignaturesAndGroups($id_teacher)['data'];

				// Recorremos los grupos y las asignaturas recibidos por POST
				foreach ($groups as $key => $group):

					$sheet->evaluactionSheet($periods, $group['id_asignatura'], $group['id_grupo']);
				endforeach;

			endforeach;

			// 
			$sheet->merge($_POST['orientation']);
		else:

		endif;
	}*/
	
	/**
	*
	*
	*/
	public function evaluationAction($db)
	{
		if(!empty($_POST) && isset($_POST['teacher'])):

			$sheet = new Sheet($db);
			$period = new Period($db);
			$teacher = new Teacher($db);	
			$performance = new Performance($db);
			$institution = new Institution($db);
			$valoration = new Valoration($db);

			// Creamos el directorio
			$path = 'pdf/'.time().$db.'-planillaEvaluacion/';

			if(!file_exists($path))
			{	
				mkdir($path);
			}

			// Obtenemos la cantidad de periodos
			$periods = $period->all()['data'];
			$current_period = $_POST['period'];

			//  Obtenemos las valoraciones
			$low_valoration = $valoration->find('Bajo')['data'][0];
			$min_basic = $valoration->find('Basico')['data'][0];
			$max_valoration = $valoration->find('Superior')['data'][0];

			// OBtenemos los parametros de evaluacion
			$Resp_eP = $performance->getEvaluationParameters()['data'];
			// 
			$evaluation_parameters = array();
			
			// Recorremos cada parametro de evaluacion y creamos un nuevo array
			foreach ($Resp_eP as $key => $value) 
			{
				array_push($evaluation_parameters, 
					array(
						'id_parametro' => $value['id_parametro_evaluacion'],
						'parametro' => $value['parametro'],
						'indicadores' => $performance->getPerformanceIndicators($value['id_parametro_evaluacion'])['data']
					)
				);
			}

			// Cargamos las opciones para el pdf
			$options = array(
				'infoIns'			=>  $institution->getInfo()['data'][0],
				'e_parameters'		=>	$evaluation_parameters,
				'low_valoration'	=>	$low_valoration,
				'min_basic'			=>	$min_basic,
				'max_valoration'	=>	$max_valoration,
				'orientation'		=>	$_POST['orientation'],
				'papper'			=>	$_POST['papper']
			);

			// Asignamos el directorio
			$sheet->setPath($path);
			// Asignamos las opciones
			$sheet->setOptions($options);
			// 
			$sheet->current_period = $current_period;
			// 
			foreach($_POST['teacher'] as $key => $id_teacher):

				// 
				$groups = $teacher->getAsignaturesAndGroups($id_teacher)['data'];

				// Recorremos los grupos y las asignaturas recibidos por POST
				foreach ($groups as $key => $group):

					$sheet->evaluactionSheet($periods, $group['id_asignatura'], $group['id_grupo']);
				endforeach;

			endforeach;

			// 
			$sheet->merge($_POST['orientation']);
		else:

		endif;
	}
}
?>