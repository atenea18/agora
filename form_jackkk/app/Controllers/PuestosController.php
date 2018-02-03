<?php 

namespace Controllers;

use Config\View 	as View;
use Model\PuestosModel	as Puestos;

class PuestosController{

	public function getPuestosAction($grado,$db, $grupo=''){

		$puestos_obj = new Puestos($db);

		if($grupo!=''){
			$datos = $puestos_obj->getPuestosGrupo($grado,$grupo)['datos'];
			

			
		}
		else{
			$datos = $puestos_obj->getPuestosGrado($grado)['datos'];

		}
		echo json_encode($datos,JSON_UNESCAPED_UNICODE);		
		
	}



}
?>