<?php


	namespace Model;
	use  Config\DataBase as BD;


	class EvaluacionModel extends BD{

		private $id_estudiante = 0;
		private $primer_nombre='';
		private $segundo_nombre ='';
		private $primer_apellido='';
		private $segundo_apellido='';
		private $id_grupo=0;
		private $id_area=0;
		private $id_asignatura=0;
		private $eval_1_per = 0;
		private $eval_2_per = 0;
		private $eval_3_per = 0;
		private $eval_4_per = 0;

		public function __construct($db){
			$this->database = $db;
		}
		public function obtenetPeriodosSinEvaluar($id_grupo, $id_asignatura){
			$this->query = "SELECT e.*, a.asignatura, g.nombre_grupo 
							FROM t_evaluacion e
							INNER JOIN t_grupos g ON g.id_grupo= $id_grupo AND e.id_grupo=g.id_grupo
							INNER JOIN t_asignaturas a ON a.id_asignatura=$id_asignatura AND e.id_asignatura=a.id_asignatura	
							ORDER BY e.primer_apellido";
			//and e.eval_1_per is NULL;

			$this->execute_single_query();

			if($this->resultado->num_rows > 0){
				$this->get_result_query();

				return array('estado' => true, 'datos' => $this->rows);
			}

			return array('estado'=>false, 'mensaje'=>'Ocurrio un error, vuelve a intertarlo');

		}

		public function obtenerPeriodoSinEvaluar($columnaT, $id_grupo, $id_asignatura){
			$this->query = "SELECT e.$columnaT AS periodo, e.id_estudiante, e.primer_apellido, e.segundo_apellido, e.primer_nombre, e.segundo_nombre, a.id_asignatura, a.asignatura, g.nombre_grupo, g.id_grupo FROM t_evaluacion e INNER JOIN t_grupos g ON g.id_grupo=$id_grupo AND e.id_grupo=g.id_grupo INNER JOIN t_asignaturas a ON a.id_asignatura=$id_asignatura AND e.id_asignatura=a.id_asignatura  ORDER BY e.primer_apellido";
//and e.$columnaT is NULL;
			$this->execute_single_query();

			if($this->resultado->num_rows > 0){
				$this->get_result_query();

				return array('estado' => true, 'datos' => $this->rows);
			}

			return array('estado'=>false, 'datos'=> array());
		}

		public function actualizarPeriodo($periodo,$id_estudiante, $id_asignatura, $valor){
			
			$this->query = "UPDATE t_evaluacion
							SET $periodo = $valor
							WHERE id_estudiante=$id_estudiante AND id_asignatura=$id_asignatura";
			
			$this->execute_single_query();

				if($this->resultado)
					return array('estado'=>true,'mensaje'=>'Ok');
				else
					return array('estado'=>false, 'mensaje'=>'Ya tiene una presentacion con este nombre intenta con otro');
		}
	}

?>