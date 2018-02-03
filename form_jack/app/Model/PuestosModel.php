<?php
namespace Model;
use Config\DataBase as BD;

class PuestosModel extends BD{


	function __construct($bd){
		$this->database=$bd;

	}

	public function getPuestosGrado($id_grado){
		$this->query = "
		SELECT  t_evaluacion.primer_apellido, t_evaluacion.primer_nombre,  
		sum(t_evaluacion.eval_1_per >= (SELECT minimo from valoracion WHERE valoracion = 'Superior') and t_evaluacion.eval_1_per <=(SELECT maximo from valoracion WHERE valoracion = 'Superior'))   as S ,
		sum(t_evaluacion.eval_1_per >=  (SELECT minimo from valoracion WHERE valoracion = 'Alto') and t_evaluacion.eval_1_per <= (SELECT maximo from valoracion WHERE valoracion = 'Alto')) as A ,
		sum(t_evaluacion.eval_1_per >= (SELECT minimo from valoracion WHERE valoracion = 'Basico') and t_evaluacion.eval_1_per <=(SELECT maximo from valoracion WHERE valoracion = 'Basico')) as B , 
		sum(t_evaluacion.eval_1_per <= (SELECT maximo from valoracion WHERE valoracion = 'Bajo') ) as V ,
		count(t_evaluacion.eval_1_per>0) as TAV,  
		ROUND(((SUM(t_evaluacion.eval_1_per)) / count(t_evaluacion.eval_1_per)),1) as Promedio,
		(SELECT valoracion.val FROM valoracion WHERE 
		ROUND(((SUM(t_evaluacion.eval_1_per)) / count(t_evaluacion.eval_1_per)),1)
		BETWEEN   valoracion.minimo AND  valoracion.maximo) as Desempeño
		FROM t_evaluacion
		WHERE t_evaluacion.id_estudiante IN
		(SELECT DISTINCT
		t_evaluacion.id_estudiante
		FROM t_evaluacion
		INNER JOIN t_asignatura_x_area ON t_asignatura_x_area.id_area  = t_evaluacion.id_area
		and t_asignatura_x_area.id_asignatura = t_evaluacion.id_asignatura 
		INNER JOIN t_grados ON t_evaluacion.id_grado = t_grados.id_grado and t_grados.id_grado = '{$id_grado}')
		GROUP BY t_evaluacion.id_estudiante ORDER BY Promedio DESC;	
		";
		$this->execute_single_query();

		if($this->resultado->num_rows > 0){
			$this->get_result_query();

			return array('estado' => true, 'datos' => $this->rows);
		}

		return array('estado'=>false, 'mensaje'=>'Ocurrio un error, vuelve a intertarlo');

	}

	public function getPuestosGrupo($id_grado,$grupo){
		$this->query = "
		SELECT  t_evaluacion.primer_apellido, t_evaluacion.primer_nombre,  
		sum(t_evaluacion.eval_1_per >= (SELECT minimo from valoracion WHERE valoracion = 'Superior') and t_evaluacion.eval_1_per <=(SELECT maximo from valoracion WHERE valoracion = 'Superior'))   as S ,
		sum(t_evaluacion.eval_1_per >=  (SELECT minimo from valoracion WHERE valoracion = 'Alto') and t_evaluacion.eval_1_per <= (SELECT maximo from valoracion WHERE valoracion = 'Alto')) as A ,
		sum(t_evaluacion.eval_1_per >= (SELECT minimo from valoracion WHERE valoracion = 'Basico') and t_evaluacion.eval_1_per <=(SELECT maximo from valoracion WHERE valoracion = 'Basico')) as B , 
		sum(t_evaluacion.eval_1_per <= (SELECT maximo from valoracion WHERE valoracion = 'Bajo') ) as V ,
		count(t_evaluacion.eval_1_per>0) as TAV,  
		ROUND(((SUM(t_evaluacion.eval_1_per)) / count(t_evaluacion.eval_1_per)),1) as Promedio,
		(SELECT valoracion.val FROM valoracion WHERE 
		ROUND(((SUM(t_evaluacion.eval_1_per)) / count(t_evaluacion.eval_1_per)),1)
		BETWEEN   valoracion.minimo AND  valoracion.maximo) as Desempeño
		FROM t_evaluacion
		WHERE t_evaluacion.id_estudiante IN
		(SELECT DISTINCT
		t_evaluacion.id_estudiante
		FROM t_evaluacion
		INNER JOIN t_asignatura_x_area ON t_asignatura_x_area.id_area  = t_evaluacion.id_area
		and t_asignatura_x_area.id_asignatura = t_evaluacion.id_asignatura 
		INNER JOIN t_grados ON t_evaluacion.id_grado = t_grados.id_grado and t_grados.id_grado = '{$id_grado}' and t_evaluacion.id_grupo = '{$grupo}')
		GROUP BY t_evaluacion.id_estudiante ORDER BY Promedio DESC;	
		";
		$this->execute_single_query();

		if($this->resultado->num_rows > 0){
			$this->get_result_query();

			return array('estado' => true, 'datos' => $this->rows);
		}

		return array('estado'=>false, 'mensaje'=>'Ocurrio un error, vuelve a intertarlo');

	}


}