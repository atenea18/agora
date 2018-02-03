<?php 
	
	namespace Controllers;
	use Config\View 	as View;
	use Model\DocenteModel as Docente;
	use Model\AsignaturaModel	as Asignatura;
	use Model\EvaluacionModel as Evaluacion;	

	class DocenteController{

		public function indexAction(){
			
			$docente_obj = new Docente();
			//Obtengo el id del profesor
			$docente = $docente_obj->obtenerDocente(4)['datos'][0];
			$asignaturas = $docente_obj->obtenetAsignaturas($docente['id_docente'])['datos'];
			$view = new View('docente', 'index', ['asignaturas'=>$asignaturas, 'docente'=> $docente]);
			$view->execute();
		}

		public function evaluarPeriodoAction($id_grupo, $id_asignatura, $database){
			
			$docente_obj = new Docente($database);
			$evaluacion = new Evaluacion($database);

			$docente = $docente_obj->obtenerDocente(4)['datos'][0];
			
			$resultado = $evaluacion->obtenetPeriodosSinEvaluar($id_grupo, $id_asignatura)['datos'][0];
			$info = $resultado[0];

			$view = new View('docente', 'evaluarPeriodo', ['datos'=>$resultado, 'docente'=>$docente, 'database'=>$database]);
			$view->execute();
		}

		public function getPeriodoAction($tabla, $id_asignatura, $id_grupo, $database){
			
			header('Access-Control-Allow-Origin: *');
			
			$docente_obj = new Docente($database);
			$evaluacion = new Evaluacion($database);
	
			$resultado = $evaluacion->obtenerPeriodoSinEvaluar($tabla, $id_grupo, $id_asignatura);
			
			$view = new View('docente', 'evaluarPeriodosRender', ['datos'=> $resultado['datos'], 'periodo'=>$tabla, 'database'=>$database]);
			$view->execute();
		}

		public function actualizarPeriodoAction($periodo, $id_estudiante, $id_asignatura, $valor, $database){
			$evaluacion = new Evaluacion($database);
			print_r($evaluacion->actualizarPeriodo($periodo, $id_estudiante, $id_asignatura, $valor)['mensaje']);
		}
	}
?>