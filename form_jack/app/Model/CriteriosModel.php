<?php
/**
 * Created by PhpStorm.
 * User: Jackson
 * Date: 29/06/2017
 * Time: 5:08 AM
 */

namespace Model;
use Config\DataBase as BD;

class CriteriosModel extends BD
{
	function __construct($bd){

		$this->database=$bd;

	}

	public function actualizarCriterio($posicion, $value){



        foreach ($value as $key => $valor){

            $this->query = "UPDATE criterios_evaluacion	SET  $key = '$valor' WHERE posicion = '$posicion';";
            $this->execute_single_query();


        }


	}

}