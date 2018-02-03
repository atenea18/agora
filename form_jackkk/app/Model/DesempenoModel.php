<?php

namespace Model;
use Config\DataBase as BD;

class DesempenoModel extends BD{

	function __construct($bd){

		$this->database=$bd;

	}


	

	public function existePosicion($grado, $grupo , $asignatura, $cod_desemp, $periodo, $posicion)
	{	
		$this->query = "SELECT posicion FROM rel_desemp_posicion
		WHERE id_grado = '{$grado}' AND id_asign = '{$asignatura}'	and periodo = '{$periodo}'	AND cod_desemp = '{$cod_desemp}' AND id_grupo = '{$grupo}' AND posicion = '{$posicion}'												
		";
		$this->execute_single_query();


		if($this->resultado->num_rows > 0){
			$this->get_result_query();

			return array('estado' => true, 'datos' => $this->rows);
		}

		return array('estado'=>false, 'mensaje'=>'<center> No existen indicadores relacionado.</center>');
		
	}


	public function insertarDesempeno()
	{	

		if($_POST){

			

			$area = $_POST['area'];
			$grado = $_POST['grado'];
			$asignatura = $_POST['asignatura'];
			$periodo = $_POST['periodo'];
			$categoria = $_POST['categoria'];
			$superior = $_POST['superior'];
			$alto = $_POST['alto'];
			$basico = $_POST['basico'];
			$refuerzo = $_POST['refuerzo'];
			$bajo = $_POST['bajo'];
			$recomendacion = $_POST['recomendacion'];			

			$this->query = " INSERT INTO desempeno ( id_grado, id_area, id_asignatura, id_clas_chs, periodos, superior, alto, basico, refuerzo_academino, bajo, recomendacion)
											VALUES ('$grado', '$area', '$asignatura', '$categoria', '$periodo', '$superior', '$alto', '$basico', '$refuerzo', '$bajo', '$recomendacion')												
			";

			$this->execute_single_query();
			

			
		}
		
		


		
		
	}



	public function obtenerCategorias()
	{
		
		$this->query = "SELECT * FROM saber_chs														
		";
		$this->execute_single_query();


		if($this->resultado->num_rows > 0){
			$this->get_result_query();

			return array('estado' => true, 'datos' => $this->rows);
		}

		return array('estado'=>false, 'mensaje'=>'<center> No existen indicadores relacionado.</center>');
	}



}
?>