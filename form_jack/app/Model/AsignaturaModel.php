<?php

	namespace Model;
	use Config\DataBase as BD;

	class AsignaturaModel extends BD{

		

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

			$this->query = "SELECT id_asignatura, asignatura 
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

		

	}
?>