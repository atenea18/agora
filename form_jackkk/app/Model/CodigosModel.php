<?php

namespace Model;
use Config\DataBase as BD;

class CodigosModel extends BD{



	function __construct($bd){

		$this->database=$bd;

	}


	public function obtenerCodigos($grupo, $asignatura, $periodo)

	{	
		$periodo = (int)substr($periodo, -1);
		$this->query = "SELECT cod_desemp, posicion FROM rel_desemp_posicion 
		WHERE id_grupo = '{$grupo}' AND id_asign = '{$asignatura}' AND periodo = '{$periodo}'					
		";
		$this->execute_single_query();

		if($this->resultado->num_rows > 0){
			$this->get_result_query();

			return array('estado' => true, 'datos' => $this->rows);
		}

		return array('estado'=>false, 'mensaje'=>'Ocurrio un error, vuelve a intertarlo');
	}

	public function obtenerCodigosPorId($id, $grupo, $asignatura, $periodo, $grado)

	{	
		$periodo = (int)substr($periodo, -1);
		$this->query = "SELECT cod_desemp FROM rel_desemp_posicion 
		WHERE id_grupo = '{$grupo}' AND id_asign = '{$asignatura}'  AND periodo = '{$periodo}' AND posicion = '{$id}' AND id_grado = '{$grado}'
		";
		$this->execute_single_query();


		if($this->resultado->num_rows > 0){
			$this->get_result_query();

			return $this->rows[0]['cod_desemp'];
		}

		return "";

	}

	public function insertDesempCodigos()

	{	

		if($_POST){
						
			$grado = $_POST['grado'];
			$grupo = $_POST['grupo'];			
			$asignatura = $_POST['asignatura'];
			$periodo = $_POST['periodo'];			
			$posicion = $_POST['posicion'];

			$cod_desemp = $_POST['cod_desemp'];
			var_dump($cod_desemp);
					

			$this->query = " INSERT INTO rel_desemp_posicion ( id_grado, id_grupo, id_asign, periodo, posicion, cod_desemp)
			VALUES ('$grado', '$grupo', '$asignatura', '$periodo', '$posicion', '$cod_desemp')												
			";

			$this->execute_single_query();
			
			
		}		

	}

}
?>