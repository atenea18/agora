<?php

	namespace Model;
	use Config\DataBase as BD;

	class PorcentajesModel extends BD{
		 		
		
		

		function __construct($bd){
			$this->database=$bd;
			
		}

		public function obtenerPorcentajes(){
			$this->query = "SELECT  porcentaje_efp, etiqueta_grupo_1, etiqueta_grupo_2, etiqueta_grupo_3, porcentaje_grupo1, porcentaje_grupo2,  porcentaje_grupo3, porcentaje_autoevaluacion FROM parametros_evaluacion";
			$this->execute_single_query();

			if($this->resultado->num_rows > 0){
				$this->get_result_query();

				return array('estado' => true, 'datos' => $this->rows);
			}

			return array('estado'=>false, 'mensaje'=>'Ocurrio un error, vuelve a intertarlo');

		}
		
		public function obtenerCriterios(){
			$this->query = "SELECT  * FROM criterios_evaluacion";
			$this->execute_single_query();

			if($this->resultado->num_rows > 0){
				$this->get_result_query();

				return array('estado' => true, 'datos' => $this->rows);
			}

			return array('estado'=>false, 'mensaje'=>'Ocurrio un error, vuelve a intertarlo');

		}


		
	}
?>