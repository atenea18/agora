<?php

namespace Model;
use Config\DataBase as BD;

class ReprobadasModel extends BD{
	public $condicionAcademicas = "AND t_evaluacion.id_asignatura in (select id_asignatura from t_asignaturas where t_asignaturas.tipo_asig = 'A')";


	function __construct($bd){

		$this->database=$bd;

	}


	public function getEstudiantesAsiganturasRepro($grupo, $periodo, $academica)
	{	
		$stringSql = $academica==1?$this->condicionAcademicas:"";

		$this->query = "
		SELECT 
		t_evaluacion.id_estudiante, t_evaluacion.primer_apellido, t_evaluacion.primer_nombre, t_evaluacion.inasistencia_p1 as Inasistencia, t_evaluacion.id_asignatura, 
		(SELECT t_asignaturas.asignatura from t_asignaturas where t_asignaturas.id_asignatura= t_evaluacion.id_asignatura) as Asignatura,	
		t_evaluacion.eval_".$periodo."_per as valoracion,			
		(SELECT valoracion.val FROM valoracion WHERE 
		ROUND(((SUM(t_evaluacion.eval_".$periodo."_per)) / count(t_evaluacion.eval_".$periodo."_per)),1)
		BETWEEN   valoracion.minimo AND  valoracion.maximo) as Desempeno
		FROM t_evaluacion	INNER JOIN t_asignatura_x_area ON t_asignatura_x_area.id_area  = t_evaluacion.id_area
		and t_asignatura_x_area.id_asignatura = t_evaluacion.id_asignatura AND
		t_evaluacion.id_grado = t_asignatura_x_area.id_grado and t_evaluacion.id_grupo = '{$grupo}' and t_evaluacion.eval_".$periodo."_per>(SELECT minimo from valoracion where valoracion = 'Bajo')
		".$stringSql."
		and t_evaluacion.eval_".$periodo."_per <= (SELECT maximo from valoracion where valoracion = 'Bajo')
		GROUP BY id_estudiante, id_asignatura ORDER BY primer_apellido, id_estudiante ASC ;
		";

		$this->execute_single_query();


		if($this->resultado->num_rows > 0){
			$this->get_result_query();

			return $this->rows;

		}
		return false;
		
	}

	public function getEstudiantesAareasRepro($grupo, $periodo, $academica)
	{	
		$stringSql = $academica==1?$this->condicionAcademicas:"";	
		//Asignatura = Area
		$this->query = "
		SELECT * from (SELECT 
		t_evaluacion.id_estudiante, t_evaluacion.primer_apellido, t_evaluacion.primer_nombre, sum(t_evaluacion.inasistencia_p1>0) as Inasistencia, t_evaluacion.id_area, 
		(SELECT t_area.area FROM t_area WHERE t_area.id_area = t_evaluacion.id_area) as Asignatura,			
		IF(t_asignatura_x_area.peso_frente_area > 0,
		ROUND(SUM(t_evaluacion.eval_".$periodo."_per * (t_asignatura_x_area.peso_frente_area / 100)),1) 
		, ROUND(sum(t_evaluacion.eval_".$periodo."_per) / (SELECT count(DISTINCT t_asignatura_x_area.id_asignatura) FROM t_asignatura_x_area where t_asignatura_x_area.id_area = t_evaluacion.id_area  and t_evaluacion.id_grado = t_asignatura_x_area.id_grado),1) ) AS valoracion
		FROM t_evaluacion
		INNER JOIN t_asignatura_x_area ON t_asignatura_x_area.id_area  = t_evaluacion.id_area
		and t_asignatura_x_area.id_asignatura = t_evaluacion.id_asignatura AND
		t_evaluacion.id_grado = t_asignatura_x_area.id_grado and t_evaluacion.id_grupo = '{$grupo}' and t_evaluacion.eval_".$periodo."_per>(SELECT minimo from valoracion where valoracion = 'Bajo') 
		".$stringSql."
		GROUP BY t_evaluacion.id_estudiante, t_evaluacion.id_area
		ORDER BY t_evaluacion.primer_apellido, t_evaluacion.primer_nombre, Asignatura ASC	) as g 
		WHERE valoracion <= (SELECT maximo from valoracion where valoracion = 'Bajo');
		";

		$this->execute_single_query();


		if($this->resultado->num_rows > 0){
			$this->get_result_query();

			return $this->rows;

		}
		//var_dump($this->rows);
		return false;
		
	}


	public function getEstudiantesRepro($grupo, $periodo, $academica, $operador, $num)
	{	
		$stringSql = $academica==1?$this->condicionAcademicas:"";
		$op = $operador=="1"?">":($operador=="0"?"=":"<=");
		
		$this->query = "
		SELECT * FROM		(SELECT 
		t_evaluacion.id_estudiante, t_evaluacion.primer_apellido, t_evaluacion.primer_nombre, 
		count(t_evaluacion.id_asignatura) as numeroAsignaturas		
		FROM t_evaluacion	INNER JOIN t_asignatura_x_area ON t_asignatura_x_area.id_area  = t_evaluacion.id_area
		and t_asignatura_x_area.id_asignatura = t_evaluacion.id_asignatura AND
		t_evaluacion.id_grado = t_asignatura_x_area.id_grado and t_evaluacion.id_grupo = '{$grupo}' and t_evaluacion.eval_".$periodo."_per>(SELECT minimo from valoracion where valoracion = 'Bajo')
		".$stringSql."		
		and t_evaluacion.eval_".$periodo."_per <= (SELECT maximo from valoracion where valoracion = 'Bajo')
		GROUP BY id_estudiante ORDER BY primer_apellido, id_estudiante ASC ) as d WHERE numeroAsignaturas $op '{$num}';
		";

		$this->execute_single_query();


		if($this->resultado->num_rows > 0){
			$this->get_result_query();

			return $this->rows;

		}
		return false;
		
	}	

	public function getEstudiantesReproA($grupo, $periodo, $academica, $operador, $num)
	{	
		$stringSql = $academica==1?$this->condicionAcademicas:"";
		$op = $operador=="1"?">":($operador=="0"?"=":"<=");
		
		$this->query = "
		SELECT * from (select DISTINCT id_estudiante, primer_apellido, primer_nombre, sum(numeroAsignaturas) numAreas from (SELECT 
		t_evaluacion.id_estudiante, t_evaluacion.primer_apellido, t_evaluacion.primer_nombre,  t_evaluacion.id_area,
		COUNT(DISTINCT t_evaluacion.id_area) as numeroAsignaturas,
		IF(t_asignatura_x_area.peso_frente_area > 0,
		ROUND(SUM(t_evaluacion.eval_".$periodo."_per * (t_asignatura_x_area.peso_frente_area / 100)),1) 
		, ROUND(sum(t_evaluacion.eval_".$periodo."_per) / (SELECT count(DISTINCT t_asignatura_x_area.id_asignatura) FROM t_asignatura_x_area where t_asignatura_x_area.id_area = t_evaluacion.id_area  and t_evaluacion.id_grado = t_asignatura_x_area.id_grado),1) ) AS Valoracion
		FROM t_evaluacion
		INNER JOIN t_asignatura_x_area ON t_asignatura_x_area.id_area  = t_evaluacion.id_area
		and t_asignatura_x_area.id_asignatura = t_evaluacion.id_asignatura AND
		t_evaluacion.id_grado = t_asignatura_x_area.id_grado and t_evaluacion.id_grupo = '{$grupo}' and t_evaluacion.eval_".$periodo."_per>(SELECT minimo from valoracion where valoracion = 'Bajo')
		".$stringSql."			
		GROUP BY t_evaluacion.id_estudiante, t_evaluacion.id_area
		ORDER BY t_evaluacion.primer_apellido, t_evaluacion.primer_nombre) as g 
		WHERE valoracion <= (SELECT maximo from valoracion where valoracion = 'Bajo') GROUP BY id_estudiante) as t WHERE numAreas $op '{$num}' 
		";

		$this->execute_single_query();

		if($this->resultado->num_rows > 0){
			$this->get_result_query();

			return $this->rows;

		}
		//var_dump($this->rows);
		return false;
		
	}
	



	


}
?>