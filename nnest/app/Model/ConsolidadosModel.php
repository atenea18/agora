<?php

namespace Model;
use Config\DataBase as BD;

class ConsolidadosModel extends BD{

	public $condicionAcademicas = "AND t_evaluacion.id_asignatura in (select id_asignatura from t_asignaturas where t_asignaturas.tipo_asig = 'A')";

	function __construct($bd){

		$this->database=$bd;

	}


	public function getPromediosAsiganturas($grupo, $periodo, $academica=0){
		
		$stringSql = $academica==1?$this->condicionAcademicas:"";
		
		$this->query = "
		SELECT 
		t_evaluacion.id_estudiante, t_evaluacion.primer_apellido, t_evaluacion.primer_nombre, t_evaluacion.segundo_nombre, t_evaluacion.id_area,t_evaluacion.id_asignatura, 
		(SELECT t_asignaturas.asignatura FROM t_asignaturas WHERE t_asignaturas.id_asignatura = t_evaluacion.id_asignatura) as Asignatura
		, t_evaluacion.id_grado, t_evaluacion.id_grupo, t_asignatura_x_area.peso_frente_area as Peso,
		(SELECT t_area.area FROM t_area WHERE t_area.id_area = t_evaluacion.id_area) as Area
		,t_evaluacion.eval_".$periodo."_per as Valoracion
		FROM t_evaluacion
		INNER JOIN t_asignatura_x_area ON t_asignatura_x_area.id_area  = t_evaluacion.id_area
		and t_asignatura_x_area.id_asignatura = t_evaluacion.id_asignatura AND 
		t_evaluacion.id_grado = t_asignatura_x_area.id_grado and t_evaluacion.id_grupo = '{$grupo}'
		".$stringSql."
		ORDER BY Asignatura, id_estudiante;	
		";

		

		
		$this->execute_single_query();


		if($this->resultado->num_rows > 0){
			$this->get_result_query();

			return $this->rows;

		}


		return false;	
	}

	

	public function getAsignaturasEvaludadas($grupo, $periodo,$academica=0){

		$stringSql = $academica==1?"where t_asignaturas.tipo_asig = 'A'":"";
		$this->query = "
		SELECT t_asignaturas.id_asignatura, t_asignaturas.asignatura, t_asignaturas.n_simpl FROM t_asignatura_x_area
		INNER JOIN t_asignaturas ON t_asignaturas.id_asignatura = t_asignatura_x_area.id_asignatura
		INNER JOIN t_grupos ON t_grupos.id_grado = t_asignatura_x_area.id_grado AND  t_grupos.id_grupo = '{$grupo}' 
		".$stringSql."
		ORDER BY Asignatura;	
		";

		$this->execute_single_query();

		if($this->resultado->num_rows > 0){
			$this->get_result_query();

			return $this->rows;

		}

		return false;
	}

	public function getEstudiantesPromedios($grupo, $periodo, $academica=0){
		$stringSql = $academica==1?$this->condicionAcademicas:"";
		$this->query = "SELECT 
		t_evaluacion.id_estudiante, t_evaluacion.primer_apellido, t_evaluacion.primer_nombre, ROUND((sum(t_evaluacion.eval_".$periodo."_per) / SUM(eval_".$periodo."_per > (SELECT minimo from valoracion where valoracion = 'Bajo'))),1) as pgg, SUM(eval_".$periodo."_per > (SELECT minimo from valoracion where valoracion = 'Bajo')) as TAV
		FROM t_evaluacion
		INNER JOIN t_asignatura_x_area ON t_asignatura_x_area.id_area  = t_evaluacion.id_area
		and t_asignatura_x_area.id_asignatura = t_evaluacion.id_asignatura AND
		t_evaluacion.id_grado = t_asignatura_x_area.id_grado and  t_evaluacion.id_grupo = '{$grupo}' 
		".$stringSql." 
		 GROUP BY id_estudiante ORDER BY PGG DESC;	
		";

		$this->execute_single_query();


		if($this->resultado->num_rows > 0){
			$this->get_result_query();

			return $this->rows;

			
		}
		
		return false;
	}


	public function getEstudiantesPromediosReprobados($grupo, $periodo, $academica=0){	
		$stringSql = $academica==1?$this->condicionAcademicas:"";	
		/*
		$this->query = " SELECT * from (SELECT 
		t_evaluacion.id_estudiante, t_evaluacion.primer_apellido, t_evaluacion.primer_nombre, ROUND((sum(t_evaluacion.eval_".$periodo."_per) / SUM(eval_".$periodo."_per > 0)),1) as pgg, SUM(eval_".$periodo."_per > 0) as TAV
		FROM t_evaluacion
		INNER JOIN t_asignatura_x_area ON t_asignatura_x_area.id_area  = t_evaluacion.id_area
		and t_asignatura_x_area.id_asignatura = t_evaluacion.id_asignatura AND
		t_evaluacion.id_grado = t_asignatura_x_area.id_grado and t_evaluacion.id_grupo = '{$grupo}'  GROUP BY id_estudiante ORDER BY pgg DESC) as promedio  WHERE pgg <= (SELECT maximo from valoracion where valoracion = 'Bajo');
		";
		*/
		$this->query = "
		SELECT * from (SELECT 
		t_evaluacion.id_estudiante, t_evaluacion.primer_apellido, t_evaluacion.primer_nombre, ROUND((sum(t_evaluacion.eval_".$periodo."_per) / SUM(eval_".$periodo."_per > 0)),1) as pgg, SUM(eval_".$periodo."_per > 0) as TAV
		FROM t_evaluacion
		INNER JOIN t_asignatura_x_area ON t_asignatura_x_area.id_area  = t_evaluacion.id_area
		and t_asignatura_x_area.id_asignatura = t_evaluacion.id_asignatura AND
		t_evaluacion.id_grado = t_asignatura_x_area.id_grado and t_evaluacion.id_grupo = '{$grupo}'   GROUP BY id_estudiante ORDER BY pgg DESC) as Valoracion  
		WHERE id_estudiante in (SELECT 
		DISTINCT t_evaluacion.id_estudiante
		FROM t_evaluacion
		INNER JOIN t_asignatura_x_area ON t_asignatura_x_area.id_area  = t_evaluacion.id_area
		and t_asignatura_x_area.id_asignatura = t_evaluacion.id_asignatura AND 
		t_evaluacion.id_grado = t_asignatura_x_area.id_grado and t_evaluacion.id_grupo = '{$grupo}' and t_evaluacion.eval_".$periodo."_per <= (SELECT maximo from valoracion where valoracion = 'Bajo')
		".$stringSql." 
		ORDER BY  id_estudiante);
		";

		$this->execute_single_query();


		if($this->resultado->num_rows > 0){
			$this->get_result_query();

			return $this->rows;			
		}
		
		return false;
	}


	public function getPromediosAreas($grado, $periodo,$academica){

		$stringSql = $academica==1?$this->condicionAcademicas:"";	

		$this->query = "
		SELECT 
		t_evaluacion.id_estudiante, t_evaluacion.primer_apellido, t_evaluacion.primer_nombre, t_evaluacion.segundo_nombre, t_evaluacion.id_area, t_evaluacion.id_asignatura
		, t_evaluacion.id_grado, t_evaluacion.id_grupo,
		(SELECT t_area.n_simpl FROM t_area WHERE t_area.id_area = t_evaluacion.id_area) as Area,			
		IF(t_asignatura_x_area.peso_frente_area > 0,
		ROUND(SUM(t_evaluacion.eval_".$periodo."_per * (t_asignatura_x_area.peso_frente_area / 100)),1) 
		, ROUND(sum(t_evaluacion.eval_".$periodo."_per) / (SELECT count(DISTINCT t_asignatura_x_area.id_asignatura) FROM t_asignatura_x_area where t_asignatura_x_area.id_area = t_evaluacion.id_area  and t_evaluacion.id_grado = t_asignatura_x_area.id_grado),1) ) AS Valoracion
		FROM t_evaluacion
		INNER JOIN t_asignatura_x_area ON t_asignatura_x_area.id_area  = t_evaluacion.id_area
		and t_asignatura_x_area.id_asignatura = t_evaluacion.id_asignatura AND
		t_evaluacion.id_grado = t_asignatura_x_area.id_grado and t_evaluacion.id_grupo = '{$grado}'
		".$stringSql." 
		GROUP BY t_evaluacion.id_estudiante, t_evaluacion.id_area
		ORDER BY t_evaluacion.primer_apellido, t_evaluacion.primer_nombre, Area ASC;
		";

		$this->execute_single_query();


		if($this->resultado->num_rows > 0){
			$this->get_result_query();

			return $this->rows;

		}
		

		return false;
	}



	public function getAreasEvaluadas($grupo, $periodo,$academica){
		$stringSql = $academica==1?"INNER JOIN t_asignaturas ON t_asignaturas.id_asignatura= t_asignatura_x_area.id_asignatura
			and t_asignaturas.tipo_asig = 'A'":"";

		$this->query = "
		SELECT DISTINCT t_area.id_area, t_area.area, t_area.n_simpl FROM t_asignatura_x_area
		INNER JOIN t_area ON t_area.id_area = t_asignatura_x_area.id_area
		INNER JOIN t_grupos ON t_grupos.id_grado = t_asignatura_x_area.id_grado AND t_grupos.id_grupo ='{$grupo}'
		".$stringSql."
		ORDER BY n_simpl;	
		";

		$this->execute_single_query();

		if($this->resultado->num_rows > 0){
			$this->get_result_query();

			return $this->rows;

		}
		return false;
	}



	public function getEstudiantesPromediosAreas($grupo, $periodo,$academica){
		$stringSql = $academica==1?$this->condicionAcademicas:"";


		$this->query = " SELECT id_estudiante, primer_apellido, primer_nombre, round(sum(Valoracion)/ COUNT(id_estudiante),1) as pgg FROM
		(
		SELECT 
		t_evaluacion.id_estudiante, t_evaluacion.primer_apellido, t_evaluacion.primer_nombre, t_evaluacion.segundo_nombre, t_evaluacion.id_area, t_evaluacion.id_asignatura
		, t_evaluacion.id_grado, t_evaluacion.id_grupo,
		(SELECT t_area.n_simpl FROM t_area WHERE t_area.id_area = t_evaluacion.id_area) as Area,			
		IF(t_asignatura_x_area.peso_frente_area > 0,
		ROUND(SUM(t_evaluacion.eval_".$periodo."_per * (t_asignatura_x_area.peso_frente_area / 100)),1) 
		, ROUND(sum(t_evaluacion.eval_".$periodo."_per) / (SELECT count(DISTINCT t_asignatura_x_area.id_asignatura) FROM t_asignatura_x_area where t_asignatura_x_area.id_area = t_evaluacion.id_area  and t_evaluacion.id_grado = t_asignatura_x_area.id_grado),1) ) AS Valoracion
		FROM t_evaluacion 
		INNER JOIN t_asignatura_x_area ON t_asignatura_x_area.id_area  = t_evaluacion.id_area
		and t_asignatura_x_area.id_asignatura = t_evaluacion.id_asignatura AND
		t_evaluacion.id_grado = t_asignatura_x_area.id_grado and t_evaluacion.id_grupo = '{$grupo}' and t_evaluacion.eval_".$periodo."_per>(SELECT minimo from valoracion where valoracion = 'Bajo') 
		".$stringSql."
		GROUP BY t_evaluacion.id_estudiante, t_evaluacion.id_area
		ORDER BY t_evaluacion.primer_apellido, t_evaluacion.primer_nombre, Area ASC
		) as t GROUP BY id_estudiante ORDER BY pgg DESC;
		";

		$this->execute_single_query();

		if($this->resultado->num_rows > 0){
			$this->get_result_query();

			return $this->rows;
			
		}
		
		return false;
	}

	public function getEstudiantesAreasReprobadas($grupo, $periodo,$academica){
		$stringSql = $academica==1?$this->condicionAcademicas:"";
		/*
		$this->query = "SELECT * FROM
		(SELECT id_estudiante, primer_apellido, primer_nombre, round(sum(Valoracion)/ COUNT(id_estudiante),1) as pgg FROM
		(SELECT 
		t_evaluacion.id_estudiante, t_evaluacion.primer_apellido, t_evaluacion.primer_nombre, t_evaluacion.segundo_nombre, t_evaluacion.id_area, t_evaluacion.id_asignatura
		, t_evaluacion.id_grado, t_evaluacion.id_grupo,
		(SELECT t_area.n_simpl FROM t_area WHERE t_area.id_area = t_evaluacion.id_area) as Area,			
		IF(t_asignatura_x_area.peso_frente_area > 0,
		ROUND(SUM(t_evaluacion.eval_".$periodo."_per * (t_asignatura_x_area.peso_frente_area / 100)),1) 
		, ROUND(sum(t_evaluacion.eval_".$periodo."_per) / (SELECT count(DISTINCT t_asignatura_x_area.id_asignatura) FROM t_asignatura_x_area where t_asignatura_x_area.id_area = t_evaluacion.id_area  and t_evaluacion.id_grado = t_asignatura_x_area.id_grado),1) ) AS Valoracion
		FROM t_evaluacion te
		INNER JOIN t_asignatura_x_area ON t_asignatura_x_area.id_area  = t_evaluacion.id_area
		and t_asignatura_x_area.id_asignatura = t_evaluacion.id_asignatura AND
		t_evaluacion.id_grado = t_asignatura_x_area.id_grado and t_evaluacion.id_grupo = '{$grupo}' and t_evaluacion.eval_".$periodo."_per>(SELECT minimo from valoracion where valoracion = 'Bajo') GROUP BY t_evaluacion.id_estudiante, t_evaluacion.id_area
		ORDER BY t_evaluacion.primer_apellido, t_evaluacion.primer_nombre, Area ASC	) as t GROUP BY id_estudiante ORDER BY pgg DESC) 
		as s where pgg <= (SELECT maximo from valoracion where valoracion = 'Bajo')  GROUP BY id_estudiante  ORDER BY pgg DESC;
		";
		*/

		$this->query = "SELECT * FROM
		(SELECT id_estudiante, primer_apellido, primer_nombre, round(sum(Valoracion)/ COUNT(id_estudiante),1) as pgg FROM
		(SELECT 
		t_evaluacion.id_estudiante, t_evaluacion.primer_apellido, t_evaluacion.primer_nombre, t_evaluacion.segundo_nombre, t_evaluacion.id_area, t_evaluacion.id_asignatura
		, t_evaluacion.id_grado, t_evaluacion.id_grupo,
		(SELECT t_area.n_simpl FROM t_area WHERE t_area.id_area = t_evaluacion.id_area) as Area,			
		IF(t_asignatura_x_area.peso_frente_area > 0,
		ROUND(SUM(t_evaluacion.eval_".$periodo."_per * (t_asignatura_x_area.peso_frente_area / 100)),1) 
		, ROUND(sum(t_evaluacion.eval_".$periodo."_per) / (SELECT count(DISTINCT t_asignatura_x_area.id_asignatura) FROM t_asignatura_x_area where t_asignatura_x_area.id_area = t_evaluacion.id_area  and t_evaluacion.id_grado = t_asignatura_x_area.id_grado),1) ) AS Valoracion
		FROM t_evaluacion 
		INNER JOIN t_asignatura_x_area ON t_asignatura_x_area.id_area  = t_evaluacion.id_area
		and t_asignatura_x_area.id_asignatura = t_evaluacion.id_asignatura AND
		t_evaluacion.id_grado = t_asignatura_x_area.id_grado and t_evaluacion.id_grupo = '${grupo}' and t_evaluacion.eval_".$periodo."_per>(SELECT minimo from valoracion where valoracion = 'Bajo') GROUP BY t_evaluacion.id_estudiante, t_evaluacion.id_area
		ORDER BY t_evaluacion.primer_apellido, t_evaluacion.primer_nombre, Area ASC	) as t  GROUP BY id_estudiante ORDER BY pgg DESC) 
		as s where id_estudiante in
		 (select DISTINCT id_estudiante from (SELECT 
		t_evaluacion.id_estudiante, t_evaluacion.primer_apellido, t_evaluacion.primer_nombre, t_evaluacion.segundo_nombre, t_evaluacion.id_area, t_evaluacion.id_asignatura
		, t_evaluacion.id_grado, t_evaluacion.id_grupo,
		(SELECT t_area.n_simpl FROM t_area WHERE t_area.id_area = t_evaluacion.id_area) as Area,			
		IF(t_asignatura_x_area.peso_frente_area > 0,
		ROUND(SUM(t_evaluacion.eval_".$periodo."_per * (t_asignatura_x_area.peso_frente_area / 100)),1) 
		, ROUND(sum(t_evaluacion.eval_".$periodo."_per) / (SELECT count(DISTINCT t_asignatura_x_area.id_asignatura) FROM t_asignatura_x_area where t_asignatura_x_area.id_area = t_evaluacion.id_area  and t_evaluacion.id_grado = t_asignatura_x_area.id_grado),1) ) AS Valoracion
		FROM t_evaluacion 
		INNER JOIN t_asignatura_x_area ON t_asignatura_x_area.id_area  = t_evaluacion.id_area
		and t_asignatura_x_area.id_asignatura = t_evaluacion.id_asignatura AND
		t_evaluacion.id_grado = t_asignatura_x_area.id_grado and t_evaluacion.id_grupo = '${grupo}' and t_evaluacion.eval_".$periodo."_per>(SELECT minimo from valoracion where valoracion = 'Bajo') 
		".$stringSql."
		GROUP BY t_evaluacion.id_estudiante, t_evaluacion.id_area
		ORDER BY t_evaluacion.primer_apellido, t_evaluacion.primer_nombre, Area ASC	) as g WHERE valoracion <= (SELECT maximo from valoracion where valoracion = 'Bajo'))  GROUP BY id_estudiante  ORDER BY pgg DESC;
		";

		$this->execute_single_query();


		if($this->resultado->num_rows > 0){
			$this->get_result_query();

			return $this->rows;

		}

		return false;
	}





}
?>