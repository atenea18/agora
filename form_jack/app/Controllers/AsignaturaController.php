<?php


namespace Controllers;
	
	use Config\View 	as View;
	use Model\AsignaturaModel	as Asignatura;
	use Model\EvaluacionModel as Evaluacion;

	class AsignaturaController{

		public function indexAction(){

			$asignatura = new Asignatura();

			$resultado = $asignatura->getAsignaturasSinEvaluarPeriodo(19);
			header("Access-Control-Allow-Origin: *");
			$view = new View('asignatura', 'index', ['datos'=>$resultado['datos']]);
			$view->execute();
		}
		

		
	}

