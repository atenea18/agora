<?php

	namespace Model;
	use Config\DataBase as BD;

	class EvaluacionModel extends BD{
		 		
		

		function __construct($bd){
			
			$this->database=$bd;
			
		}

		public function obtenerEvaluacion($grupo, $asignatura){
			$this->query = "SELECT * FROM t_evaluacion 
							WHERE id_grupo = '{$grupo}' AND id_asignatura = '{$asignatura}'
							ORDER BY primer_apellido
							";
			$this->execute_single_query();

			if($this->resultado->num_rows > 0){
				$this->get_result_query();

				return array('estado' => true, 'datos' => $this->rows);
			}

			return array('estado'=>false, 'mensaje'=>'Ocurrio un error, vuelve a intertarlo');

		}



		public function actualizarPeriodo($id_estudiante, $id_grupo, $id_asignatura, $string){

			$cont=0;
				foreach ($string as $key => $value) {
					

					$this->query = "UPDATE t_evaluacion
							SET  $key = '$value'
							WHERE id_estudiante= $id_estudiante AND id_asignatura = $id_asignatura AND id_grupo = $id_grupo";

										
					$this->execute_single_query();

					
					
				}
			
		}

		public function obtenerDatos($grupo, $asignatura){
			$this->query = "SELECT nombre_grupo, asignatura FROM t_grupos, t_asignaturas 
							WHERE id_grupo = '{$grupo}' AND id_asignatura = '{$asignatura}'							
							";
			$this->execute_single_query();

			if($this->resultado->num_rows > 0){
				$this->get_result_query();

				return array('estado' => true, 'datos' => $this->rows);
			}

			return array('estado'=>false, 'mensaje'=>'Ocurrio un error, vuelve a intertarlo');

		}


		
		
	}
?>