<?php

namespace Model;
use Config\DataBase as BD;

class IndicadoresModel extends BD{



	function __construct($bd){

		$this->database=$bd;

	}


	public function obtenerIndicadores($grado, $asignatura, $periodo)
	{
			//$periodo = (int)substr($periodo, -1);

		$this->query = "SELECT superior, codigo,  periodos FROM desempeno
		WHERE id_grado = '{$grado}' AND id_asignatura = '{$asignatura}'	and periodos = '{$periodo}'												
		";
		$this->execute_single_query();


		if($this->resultado->num_rows > 0){
			$this->get_result_query();

			return array('estado' => true, 'datos' => $this->rows);
		}

		return array('estado'=>false, 'mensaje'=>'Ocurrio un error, vuelve a intertarlo');
	}

	public function obtenerIndicadoresJson($grado, $asignatura, $categoria, $periodo)
	{
		
		$g=$grado==-1?'<>':'=';
		$a=$asignatura==-1?'<>':'=';
		$c=$categoria==-1?'<>':'=';
		$p=$periodo==-1?'<>':'=';

		$this->query = "SELECT superior, codigo,  periodos FROM desempeno
		WHERE id_grado $g '{$grado}' AND id_asignatura $a '{$asignatura}'	and periodos $p '{$periodo}'	AND id_clas_chs $c '{$categoria}'												
		";
		$this->execute_single_query();


		if($this->resultado->num_rows > 0){
			$this->get_result_query();

			return array('estado' => true, 'datos' => $this->rows);
		}

		return array('estado'=>false, 'mensaje'=>'<center> No existen indicadores relacionado.</center>');
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

    public function delteCodigoDesemp($posDelet,$desemp,$grup,$asign,$per){

        echo $posDelet.' '.$desemp.' '.$grup.' '.$asign.' '.$per;
        $this->query = "DELETE FROM rel_desemp_posicion WHERE posicion='$posDelet'  and cod_desemp ='$desemp' and periodo = '$per' and id_grupo = '$grup' and id_asign='$asign' ;";
        $b = $this->execute_single_query();
        var_dump($b);


    }
	
	 public function obtenerExpresiones(){

    	$this->query = "SELECT alto, basico, bajo FROM desem_expres														
		";
		$this->execute_single_query();


		if($this->resultado->num_rows > 0){
			$this->get_result_query();

			return  $this->rows[0];
		}

		return false;

    }




}
?>