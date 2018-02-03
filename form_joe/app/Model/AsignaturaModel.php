<?php

	namespace Model;
	use Config\DataBase as BD;

	class AsignaturaModel extends BD{

		private $id 			= 0;
		private $nombre 		= '';
		private $abreviacion 	= '';
		private $tipoAsig		= '';

		function __construct($db){
			$this->database = $db;
		}

		public function set($atributo, $valor){
			$this->$atributo = $valor;
		}

		public function get($atributo){
			return $this->$atributo;
		}

		public function getAsignaturas(){

			$this->query = "SELECT * 
							FROM t_asignaturas";
			$this->execute_single_query();

			if($this->resultado->num_rows > 0){
				$this->get_result_query();

				return array('estado' => true, 'datos' => $this->rows);
			}

			return array('estado'=>false, 'mensaje'=>'Ocurrio un error, vuelve a intertarlo');
		}
		
		public function getAsignaturaById($id){

			$this->query = "SELECT * 
							FROM t_asignaturas
							WHERE id_asignatura='$id'";
			$this->execute_single_query();

			if($this->resultado->num_rows > 0){
				$this->get_result_query();

				return array('estado' => true, 'datos' => $this->rows);
			}

			return array('estado'=>false, 'mensaje'=>'Ocurrio un error, vuelve a intertarlo');
		}

		public function getAsignaturasSinEvaluarPeriodo($id_grupo){

			$this->query = "SELECT DISTINCT a.*, g.id_grupo, e.eval_2_per 
							FROM t_asignaturas a
							INNER JOIN t_evaluacion e ON a.id_asignatura=e.id_asignatura
							INNER JOIN t_grupos g ON e.id_grupo=g.id_grupo AND g.id_grupo=$id_grupo
							WHERE e.eval_1_per IS NULL OR e.eval_2_per IS NULL OR e.eval_3_per IS NULL OR e.eval_4_per IS NULL
							ORDER BY a.asignatura";

			$this->execute_single_query();

			if($this->resultado->num_rows > 0){
				$this->get_result_query();

				return array('estado' => true, 'datos' => $this->rows);
			}

			return array('estado'=>false, 'mensaje'=>'Ocurrio un error, vuelve a intertarlo');	
		}

	}
?>