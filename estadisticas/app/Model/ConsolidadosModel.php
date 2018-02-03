<?php

namespace Model;
use Config\DataBase as BD;

class ConsolidadosModel extends BD{

	public $condicionAcademicas = "AND t_evaluacion.id_asignatura in (select id_asignatura from t_asignaturas where t_asignaturas.tipo_asig = 'A')";
	public $condicionTecnica = "AND t_evaluacion.id_asignatura in (select id_asignatura from t_asignaturas where t_asignaturas.tipo_asig = 'T')";

	function __construct($bd){

		$this->database=$bd;

	}


	public function getPromediosAsiganturas($grupo, $periodo, $tecnica=0){
		
		$stringSql = $tecnica==1?$this->condicionTecnica:$this->condicionAcademicas;
		
		$this->query = "
		SELECT t_evaluacion.id_estudiante, t_evaluacion.primer_apellido, t_evaluacion.segundo_apellido, 
		t_evaluacion.primer_nombre, t_evaluacion.segundo_nombre,t_evaluacion.id_asignatura, 
		(SELECT t_asignaturas.asignatura FROM t_asignaturas WHERE t_asignaturas.id_asignatura = t_evaluacion.id_asignatura) as 
		Asignatura ,  
		(SELECT t_area.order_area FROM t_area WHERE t_area.id_area = t_evaluacion.id_area) 
		as order_area ,round(t_evaluacion.eval_".$periodo."_per,1) as Valoracion,
		round(FUNC_SUPER(t_evaluacion.id_estudiante, t_evaluacion.id_asignatura,{$grupo},{$periodo})
		,1) Superacion
		FROM t_evaluacion 
		INNER JOIN t_asignatura_x_area ON t_asignatura_x_area.id_area = t_evaluacion.id_area 
		and t_asignatura_x_area.id_asignatura = t_evaluacion.id_asignatura AND 
		t_evaluacion.id_grado = t_asignatura_x_area.id_grado and t_evaluacion.id_grupo = '{$grupo}'
		".$stringSql."
		and (t_evaluacion.novedad NOT LIKE 'Ret' OR t_evaluacion.novedad IS NULL) 
		 ORDER BY primer_apellido ASC, segundo_apellido ASC, primer_nombre ASC, 
		segundo_nombre Asc, order_area ASC; 
		";		
		

		
		
		
		$this->execute_single_query();		

		if($this->resultado->num_rows > 0){
			$this->get_result_query();

			
			return $this->rows;

		}


		return false;	
	}

	

	public function getAsignaturasEvaludadas($grupo, $periodo,$tecnica=0, $reprobadas=0){
		
		$stringSql = $tecnica==1?"and t_asignaturas.tipo_asig = 'T'":"and t_asignaturas.tipo_asig = 'A'";
		$this->query = "
		SELECT DISTINCT t_evaluacion.id_asignatura, t_asignaturas.asignatura, t_asignaturas.n_simpl,
		(SELECT t_area.order_area FROM t_area WHERE t_area.id_area = t_evaluacion.id_area) as order_area
		FROM t_evaluacion 
		INNER JOIN t_asignaturas ON t_asignaturas.id_asignatura = t_evaluacion.id_asignatura
		INNER JOIN t_grupos ON t_grupos.id_grupo = t_evaluacion.id_grupo and t_evaluacion.id_grupo =  '{$grupo}' 
		and t_grupos.id_grupo = '{$grupo}'
		INNER JOIN t_asignatura_x_area ON 		
		t_asignatura_x_area.id_asignatura = t_evaluacion.id_asignatura	and t_asignatura_x_area.id_area = t_evaluacion.id_area		
		where (t_evaluacion.novedad NOT LIKE 'Ret' OR t_evaluacion.novedad IS NULL)
		".$stringSql."
		
		ORDER BY order_area ASC
		; 
		";
		
		
		$this->execute_single_query();
		//print_r($this->query);
		if($this->resultado->num_rows > 0){
			$this->get_result_query();


			return $this->rows;

		}

		return false;
	}

	public function getEstudiantesPromedios($grupo, $periodo, $tecnica=0){		

		$stringSql = $tecnica==1?$this->condicionTecnica:$this->condicionAcademicas;
		$this->query = "
		SELECT t_evaluacion.id_estudiante, t_evaluacion.primer_apellido, t_evaluacion.segundo_apellido, 
		t_evaluacion.primer_nombre, t_evaluacion.segundo_nombre, 
		ROUND((sum(t_evaluacion.eval_".$periodo."_per) / SUM(eval_".$periodo."_per >= (SELECT minimo from valoracion where valoracion = 'Bajo'))),2) as pgg_sin_super,
		ROUND(sum(
		FUNC_SELECT_VAL(t_evaluacion.id_estudiante,t_evaluacion.id_asignatura,{$grupo},{$periodo},t_evaluacion.eval_".$periodo."_per)
		)
		/ SUM(eval_".$periodo."_per >= (SELECT minimo from valoracion where valoracion = 'Bajo'))
		,2) pgg,
		SUM(eval_".$periodo."_per >= (SELECT minimo from valoracion where valoracion = 'Bajo')) as TAV 
		FROM t_evaluacion INNER JOIN t_asignatura_x_area ON t_asignatura_x_area.id_area = t_evaluacion.id_area 
		and t_asignatura_x_area.id_asignatura = t_evaluacion.id_asignatura AND t_evaluacion.id_grado = t_asignatura_x_area.id_grado and
		t_evaluacion.id_grupo = '{$grupo}' 
		".$stringSql." 
		and (t_evaluacion.novedad NOT LIKE 'Ret' OR t_evaluacion.novedad IS NULL) 
		 
		GROUP BY id_estudiante 
		ORDER BY primer_apellido ASC, segundo_apellido ASC, primer_nombre ASC, segundo_nombre ASC;
		";
		
		//print_r($this->query);

		if($this->resultado->num_rows > 0){
			$this->get_result_query();

			return $this->rows;

			
		}
		
		return false;
	}


	public function getEstudiantesPromediosReprobados($grupo, $periodo, $tecnica=0){	
		$stringSql = $tecnica==1?$this->condicionTecnica:$this->condicionAcademicas;
		
		$this->query = "
		SELECT * from (SELECT t_evaluacion.id_estudiante, t_evaluacion.primer_apellido, t_evaluacion.segundo_apellido, 
		t_evaluacion.primer_nombre, t_evaluacion.segundo_nombre, 
		ROUND((sum(t_evaluacion.eval_".$periodo."_per) / SUM(eval_".$periodo."_per >= (SELECT minimo from valoracion where valoracion = 'Bajo'))),2) as pgg_sin_super,
		ROUND(sum(
		FUNC_SELECT_VAL(t_evaluacion.id_estudiante,t_evaluacion.id_asignatura,{$grupo},{$periodo},t_evaluacion.eval_".$periodo."_per))
		/ SUM(eval_".$periodo."_per >= (SELECT minimo from valoracion where valoracion = 'Bajo'))
		,2) pgg,
		SUM(eval_".$periodo."_per >= (SELECT minimo from valoracion where valoracion = 'Bajo')) as TAV 
		FROM t_evaluacion INNER JOIN t_asignatura_x_area ON t_asignatura_x_area.id_area = t_evaluacion.id_area 
		and t_asignatura_x_area.id_asignatura = t_evaluacion.id_asignatura AND t_evaluacion.id_grado = t_asignatura_x_area.id_grado 
		and	t_evaluacion.id_grupo = '{$grupo}' and (t_evaluacion.novedad NOT LIKE 'Ret' OR t_evaluacion.novedad IS NULL) 
		 GROUP BY id_estudiante 
		ORDER BY primer_apellido ASC, segundo_apellido ASC, primer_nombre ASC, segundo_nombre ASC) as Valoracion 
		WHERE id_estudiante in (SELECT DISTINCT t_evaluacion.id_estudiante FROM t_evaluacion 
		INNER JOIN t_asignatura_x_area ON t_asignatura_x_area.id_area = t_evaluacion.id_area 
		and t_asignatura_x_area.id_asignatura = t_evaluacion.id_asignatura AND t_evaluacion.id_grado = t_asignatura_x_area.id_grado 
		and t_evaluacion.id_grupo = '{$grupo}' and 
		FUNC_SELECT_VAL(t_evaluacion.id_estudiante,t_evaluacion.id_asignatura,{$grupo},{$periodo},t_evaluacion.eval_".$periodo."_per) <= (SELECT maximo from valoracion where valoracion = 'Bajo') 
		".$stringSql." 
		and (t_evaluacion.novedad NOT LIKE 'Ret' OR t_evaluacion.novedad IS NULL) 
		 ORDER BY primer_apellido ASC, segundo_apellido ASC, 
		primer_nombre ASC, segundo_nombre ASC); 
		";

		$this->execute_single_query();

		//print_r($this->query);
		if($this->resultado->num_rows > 0){
			$this->get_result_query();

			return $this->rows;			
		}
		
		return false;
	}


	public function getPromediosAreas($grupo, $periodo,$tecnica){

		$stringSql = $tecnica==1?$this->condicionTecnica:$this->condicionAcademicas;
		
		$this->query = "
		SELECT id_estudiante, primer_apellido, segundo_apellido, primer_nombre, segundo_nombre, id_area as 'id_asignatura',
		id_grado,id_grupo, id_as, count(id_area), SUM(PesoMay) PesoMa, SUM(PesoIgu) PesoIg, sum(Peso), Area, order_area, 
		IF(SUM(Peso)=100, round(sum(superacion * (Peso/100)),1), ROUND(sum(superacion)/count(id_area),1)) Valoracion,
		
		IF (IF(SUM(Peso)=100,round(sum(superacion * (Peso/100)),1), ROUND(sum(superacion)/count(id_area),1)) =
		IF(SUM(Peso)=100, round(sum(valoracion * (Peso/100)),1), ROUND(sum(valoracion)/count(id_area),1)), '', 
		IF(SUM(Peso)=100,round(sum(superacion * (Peso/100)),1), ROUND(sum(superacion)/count(id_area),1))
		) Superacion 

		FROM ( SELECT t_evaluacion.id_estudiante, t_evaluacion.primer_apellido, t_evaluacion.segundo_apellido, 
		t_evaluacion.primer_nombre, t_evaluacion.segundo_nombre, t_evaluacion.id_area,t_evaluacion.id_asignatura as id_as, 
		(SELECT t_asignaturas.asignatura FROM t_asignaturas WHERE t_asignaturas.id_asignatura = t_evaluacion.id_asignatura) as Asignatura

		,t_evaluacion.id_grado, t_evaluacion.id_grupo, t_asignatura_x_area.peso_frente_area>0 as PesoMay, 
		t_asignatura_x_area.peso_frente_area=0 or ISNULL(t_asignatura_x_area.peso_frente_area) as PesoIgu, 
		t_asignatura_x_area.peso_frente_area as Peso, (SELECT t_area.area FROM t_area WHERE t_area.id_area = t_evaluacion.id_area) as Area,
		(SELECT t_area.order_area FROM t_area WHERE t_area.id_area = t_evaluacion.id_area) as order_area ,
		t_evaluacion.eval_".$periodo."_per as Valoracion,
		FUNC_SELECT_VAL(t_evaluacion.id_estudiante,t_evaluacion.id_asignatura,{$grupo},{$periodo},t_evaluacion.eval_".$periodo."_per) as superacion
		FROM t_evaluacion INNER JOIN t_asignatura_x_area 
		ON t_asignatura_x_area.id_area = t_evaluacion.id_area 
		and t_asignatura_x_area.id_asignatura = t_evaluacion.id_asignatura 
		AND t_evaluacion.id_grado = t_asignatura_x_area.id_grado 
		and t_evaluacion.id_grupo = '{$grupo}' 
		and (FUNC_SELECT_VAL(t_evaluacion.id_estudiante,t_evaluacion.id_asignatura,{$grupo},{$periodo},t_evaluacion.eval_".$periodo."_per)) >= (SELECT minimo from valoracion where valoracion = 'Bajo') 
		".$stringSql."
		and (t_evaluacion.novedad NOT LIKE 'Ret' OR t_evaluacion.novedad IS NULL) 
		 
		ORDER BY primer_apellido ASC, segundo_apellido ASC, primer_nombre ASC, segundo_nombre Asc, order_area ASC) as t 
		GROUP BY id_area, id_estudiante ORDER BY id_estudiante, id_area;
		";

		$this->execute_single_query();

		//print_r($this->query);

		if($this->resultado->num_rows > 0){
			$this->get_result_query();

			return $this->rows;

		}		

		return false;
	}



	public function getAreasEvaluadas($grupo, $periodo,$tecnica,$reprobadas=0){
		$stringSql = $tecnica==1?"INNER JOIN t_asignaturas ON t_asignaturas.id_asignatura= t_asignatura_x_area.id_asignatura
		and t_asignaturas.tipo_asig = 'T'":"INNER JOIN t_asignaturas ON t_asignaturas.id_asignatura= t_asignatura_x_area.id_asignatura
		and t_asignaturas.tipo_asig = 'A'";
		
		$this->query = "
		SELECT  id_area  as id_asignatura, n_simpl,
		Area, order_area
		, IF(SUM(Peso)=100, round(sum(valoracion * (Peso/100)),1), ROUND(sum(valoracion)/count(id_area),1)) Valoracion
		FROM
		(
		SELECT 
		t_evaluacion.id_area,t_evaluacion.id_asignatura as id_as, (SELECT t_asignaturas.asignatura FROM t_asignaturas
		WHERE t_asignaturas.id_asignatura = t_evaluacion.id_asignatura) as Asignatura ,
		(SELECT t_area.n_simpl FROM t_area WHERE t_area.id_area = t_evaluacion.id_area) as n_simpl, 
		t_evaluacion.id_grado,
		t_evaluacion.id_grupo, t_asignatura_x_area.peso_frente_area>0 as PesoMay,
		t_asignatura_x_area.peso_frente_area=0 or ISNULL(t_asignatura_x_area.peso_frente_area)  as PesoIgu,
		t_asignatura_x_area.peso_frente_area as Peso,
		(SELECT t_area.area FROM t_area WHERE
		t_area.id_area = t_evaluacion.id_area) as Area, (SELECT t_area.order_area FROM t_area WHERE t_area.id_area = t_evaluacion.id_area)as order_area ,
		(FUNC_SELECT_VAL(t_evaluacion.id_estudiante,t_evaluacion.id_asignatura,{$grupo},{$periodo},t_evaluacion.eval_".$periodo."_per)) as Valoracion 
		FROM t_evaluacion INNER JOIN t_asignatura_x_area ON
		t_asignatura_x_area.id_area = t_evaluacion.id_area and t_asignatura_x_area.id_asignatura = t_evaluacion.id_asignatura
		AND t_evaluacion.id_grado = t_asignatura_x_area.id_grado and t_evaluacion.id_grupo = '{$grupo}'
		".$stringSql."
		and (t_evaluacion.novedad NOT LIKE 'Ret' OR t_evaluacion.novedad IS NULL)
		
		) as t  
		GROUP BY id_area ORDER BY order_area;
		
		";
		
		$this->execute_single_query();

		if($this->resultado->num_rows > 0){
			$this->get_result_query();
			return $this->rows;
		}

		return false;
		
	}

	public function getEstudiantesPromediosAreas($grupo, $periodo,$tecnica){
		$stringSql = $tecnica==1?$this->condicionTecnica:$this->condicionAcademicas;


		$this->query = "

		SELECT id_estudiante, primer_apellido,segundo_apellido, primer_nombre, segundo_nombre,
		sum(Valoracion >=(SELECT minimo from valoracion where valoracion = 'Bajo')) TAV,
		round(sum(Valoracion)/ COUNT(id_estudiante),2) as pgg FROM
		(SELECT id_estudiante, primer_apellido, segundo_apellido, primer_nombre, segundo_nombre, id_area  as id_asignatura,id_grado,id_grupo, id_as, count(id_area), SUM(PesoMay) PesoMa, SUM(PesoIgu) PesoIg, sum(Peso),
		Area, order_area, SUM(Valoracion)
		, IF(SUM(Peso)=100, round(sum(valoracion * (Peso/100)),1), ROUND(sum(valoracion)/count(id_area),2)) Valoracion
		FROM
		(
		SELECT t_evaluacion.id_estudiante, t_evaluacion.primer_apellido,
		t_evaluacion.segundo_apellido, t_evaluacion.primer_nombre, t_evaluacion.segundo_nombre, 
		t_evaluacion.id_area,t_evaluacion.id_asignatura as id_as, (SELECT t_asignaturas.asignatura FROM t_asignaturas
		WHERE t_asignaturas.id_asignatura = t_evaluacion.id_asignatura) as Asignatura , t_evaluacion.id_grado,
		t_evaluacion.id_grupo, t_asignatura_x_area.peso_frente_area>0 as PesoMay,
		t_asignatura_x_area.peso_frente_area=0 or ISNULL(t_asignatura_x_area.peso_frente_area)  as PesoIgu,
		t_asignatura_x_area.peso_frente_area as Peso,
		(SELECT t_area.area FROM t_area WHERE
		t_area.id_area = t_evaluacion.id_area) as Area, (SELECT t_area.order_area FROM t_area WHERE t_area.id_area = t_evaluacion.id_area)
		as order_area ,
		(FUNC_SELECT_VAL(t_evaluacion.id_estudiante,t_evaluacion.id_asignatura,{$grupo},{$periodo},t_evaluacion.eval_".$periodo."_per)) as Valoracion 
		FROM t_evaluacion INNER JOIN t_asignatura_x_area ON
		t_asignatura_x_area.id_area = t_evaluacion.id_area and t_asignatura_x_area.id_asignatura = t_evaluacion.id_asignatura
		AND t_evaluacion.id_grado = t_asignatura_x_area.id_grado and t_evaluacion.id_grupo = '{$grupo}' 
		and 
		(FUNC_SELECT_VAL(t_evaluacion.id_estudiante,t_evaluacion.id_asignatura,{$grupo},{$periodo},t_evaluacion.eval_".$periodo."_per)) >= 
		(SELECT minimo from valoracion where valoracion = 'Bajo') 
		".$stringSql."
		and (t_evaluacion.novedad NOT LIKE 'Ret' OR t_evaluacion.novedad IS NULL)
		
		ORDER BY primer_apellido ASC, 
		segundo_apellido ASC, primer_nombre ASC, segundo_nombre Asc, order_area ASC) as t  
		GROUP BY id_area, id_estudiante ORDER BY id_estudiante, id_area) as t		
		GROUP BY id_estudiante ORDER BY primer_apellido ASC, segundo_apellido ASC, primer_nombre ASC, segundo_nombre ASC, Area ASC;
		";
		
		
		$this->execute_single_query();
		

		if($this->resultado->num_rows > 0){
			$this->get_result_query();

			return $this->rows;
			
		}
		
		return false;
	}

	public function getEstudiantesAreasReprobadas($grupo, $periodo,$tecnica){
		$stringSql = $tecnica==1?$this->condicionTecnica:$this->condicionAcademicas;

		$this->query = "		
		SELECT id_estudiante, primer_apellido,segundo_apellido, primer_nombre, segundo_nombre,
		sum(Valoracion >=(SELECT minimo from valoracion where valoracion = 'Bajo')) TAV,
		round(sum(Valoracion) / COUNT(id_estudiante),2) as pgg FROM
		(SELECT id_estudiante, primer_apellido, segundo_apellido, primer_nombre, segundo_nombre, id_area  as id_asignatura,id_grado,id_grupo, id_as, count(id_area), SUM(PesoMay) PesoMa, SUM(PesoIgu) PesoIg, sum(Peso),
		Area, order_area, SUM(Valoracion)
		, IF(SUM(Peso)=100, round(sum(valoracion * (Peso/100)),2), ROUND(sum(valoracion)/count(id_area),2)) Valoracion
		FROM
		(
		SELECT t_evaluacion.id_estudiante, t_evaluacion.primer_apellido,
		t_evaluacion.segundo_apellido, t_evaluacion.primer_nombre, t_evaluacion.segundo_nombre, 
		t_evaluacion.id_area,t_evaluacion.id_asignatura as id_as, (SELECT t_asignaturas.asignatura FROM t_asignaturas
		WHERE t_asignaturas.id_asignatura = t_evaluacion.id_asignatura) as Asignatura , t_evaluacion.id_grado,
		t_evaluacion.id_grupo, t_asignatura_x_area.peso_frente_area>0 as PesoMay,
		t_asignatura_x_area.peso_frente_area=0 or ISNULL(t_asignatura_x_area.peso_frente_area)  as PesoIgu,
		t_asignatura_x_area.peso_frente_area as Peso,
		(SELECT t_area.area FROM t_area WHERE
		t_area.id_area = t_evaluacion.id_area) as Area, (SELECT t_area.order_area FROM t_area WHERE t_area.id_area = t_evaluacion.id_area)
		as order_area ,

		(FUNC_SELECT_VAL(t_evaluacion.id_estudiante,t_evaluacion.id_asignatura,{$grupo},{$periodo},t_evaluacion.eval_".$periodo."_per)) as Valoracion FROM t_evaluacion INNER JOIN t_asignatura_x_area ON
		t_asignatura_x_area.id_area = t_evaluacion.id_area and t_asignatura_x_area.id_asignatura = t_evaluacion.id_asignatura
		AND t_evaluacion.id_grado = t_asignatura_x_area.id_grado and t_evaluacion.id_grupo = '${grupo}' and 
		(FUNC_SELECT_VAL(t_evaluacion.id_estudiante,t_evaluacion.id_asignatura,{$grupo},{$periodo},t_evaluacion.eval_".$periodo."_per)) >= 
		(SELECT minimo from valoracion where valoracion = 'Bajo')
		".$stringSql."
		and (t_evaluacion.novedad NOT LIKE 'Ret' OR t_evaluacion.novedad IS NULL)
		
		ORDER BY primer_apellido ASC, 
		segundo_apellido ASC, primer_nombre ASC, segundo_nombre Asc, order_area ASC) as t  
		GROUP BY id_area, id_estudiante ORDER BY id_estudiante, id_area) as t
		where  id_estudiante in

		(SELECT id_estudiante FROM
		(SELECT id_estudiante, primer_apellido, segundo_apellido, primer_nombre, segundo_nombre, id_area  as id_asignatura,id_grado,id_grupo, id_as, count(id_area), SUM(PesoMay) PesoMa, SUM(PesoIgu) PesoIg, sum(Peso),
		Area, order_area, SUM(Valoracion)
		, IF(SUM(Peso)=100, round(sum(valoracion * (Peso/100)),2), ROUND(sum(valoracion)/count(id_area),1)) Valoracion
		FROM
		(
		SELECT t_evaluacion.id_estudiante, t_evaluacion.primer_apellido,
		t_evaluacion.segundo_apellido, t_evaluacion.primer_nombre, t_evaluacion.segundo_nombre, 
		t_evaluacion.id_area,t_evaluacion.id_asignatura as id_as, (SELECT t_asignaturas.asignatura FROM t_asignaturas
		WHERE t_asignaturas.id_asignatura = t_evaluacion.id_asignatura) as Asignatura , t_evaluacion.id_grado,
		t_evaluacion.id_grupo, t_asignatura_x_area.peso_frente_area>0 as PesoMay,
		t_asignatura_x_area.peso_frente_area=0 or ISNULL(t_asignatura_x_area.peso_frente_area)  as PesoIgu,
		t_asignatura_x_area.peso_frente_area as Peso,
		(SELECT t_area.area FROM t_area WHERE
		t_area.id_area = t_evaluacion.id_area) as Area, (SELECT t_area.order_area FROM t_area WHERE t_area.id_area = t_evaluacion.id_area)
		as order_area ,
		(FUNC_SELECT_VAL(t_evaluacion.id_estudiante,t_evaluacion.id_asignatura,{$grupo},{$periodo},t_evaluacion.eval_".$periodo."_per)) as Valoracion FROM t_evaluacion INNER JOIN t_asignatura_x_area ON
		t_asignatura_x_area.id_area = t_evaluacion.id_area and t_asignatura_x_area.id_asignatura = t_evaluacion.id_asignatura
		AND t_evaluacion.id_grado = t_asignatura_x_area.id_grado and t_evaluacion.id_grupo = '${grupo}' and 
		(FUNC_SELECT_VAL(t_evaluacion.id_estudiante,t_evaluacion.id_asignatura,{$grupo},{$periodo},t_evaluacion.eval_".$periodo."_per)) >= 
		(SELECT minimo from valoracion where valoracion = 'Bajo') 
		and
		(FUNC_SELECT_VAL(t_evaluacion.id_estudiante,t_evaluacion.id_asignatura,{$grupo},{$periodo},t_evaluacion.eval_".$periodo."_per)) <= 
		(SELECT maximo from valoracion where valoracion = 'Bajo') 
		".$stringSql."
		and (t_evaluacion.novedad NOT LIKE 'Ret' OR t_evaluacion.novedad IS NULL)
		
		ORDER BY primer_apellido ASC, 
		segundo_apellido ASC, primer_nombre ASC, segundo_nombre Asc, order_area ASC) as t  
		GROUP BY id_area, id_estudiante ORDER BY id_estudiante, id_area) as t		
		GROUP BY id_estudiante ORDER BY primer_apellido ASC, segundo_apellido ASC, primer_nombre ASC, segundo_nombre ASC, Area ASC)
		GROUP BY id_estudiante ORDER BY primer_apellido ASC, segundo_apellido ASC, primer_nombre ASC, segundo_nombre ASC, Area ASC;
		";

		$this->execute_single_query();		
		
		if($this->resultado->num_rows > 0){
			$this->get_result_query();

			return $this->rows;

		}

		return false;
	}

	public function getInformeFinalSuperacion($grupo, $periodo,$tecnica){
		$this->condicionAcademicas = "AND ifs.id_asignatura in (select id_asignatura from t_asignaturas where t_asignaturas.tipo_asig = 'A')";
	    $this->condicionTecnica = "AND ifs.id_asignatura in (select id_asignatura from t_asignaturas where t_asignaturas.tipo_asig = 'T')";
		$stringSql = $tecnica==1?$this->condicionTecnica:$this->condicionAcademicas;

		$this->query = "	
		SELECT ifg.id_estudiante, sts.primer_apellido, sts.segundo_apellido, sts.primer_nombre, sts.segundo_nombre,
		ifg.id_grupo, ifg.promedio,  ifg.puesto, ifg.ano_lectivo, ifs.id_asignatura, ifs.valoracion as nota, 
		(SELECT superacion_informe_final.nota from superacion_informe_final 
		WHERE superacion_informe_final.id_estudiante = ifg.id_estudiante 
		and superacion_informe_final.id_asignatura = ifs.id_asignatura
		and superacion_informe_final.id_grupo = ifg.id_grupo
		) as nota_superacion
		,t_as.asignatura
		from informe_final_general as ifg 
		INNER JOIN informe_final_asignaturas as ifs ON ifs.id_informe = ifg.id_informe
		INNER JOIN students as sts ON sts.idstudents = ifg.id_estudiante
		INNER JOIN t_asignaturas as t_as ON t_as.id_asignatura = ifs.id_asignatura
		where ifg.id_grupo = {$grupo} and ifg.ano_lectivo = '2017'		
		".$stringSql."
		ORDER BY sts.primer_apellido, sts.segundo_apellido, sts.primer_nombre, sts.segundo_nombre
		";

		$this->execute_single_query();		
		//print_r($this->query);
		if($this->resultado->num_rows > 0){
			$this->get_result_query();
			
			
			return $this->rows;
			

		}
		

		return false;
	}

	public function getAsignaturasSuperacion($grupo, $periodo,$tecnica=0, $reprobadas=0){
		
		$stringSql = $tecnica==1?"and t_asignaturas.tipo_asig = 'T'":"and t_asignaturas.tipo_asig = 'A'";
		$this->query = "
		SELECT DISTINCT t_evaluacion.id_asignatura, t_asignaturas.asignatura, t_asignaturas.n_simpl,
		(SELECT t_area.order_area FROM t_area WHERE t_area.id_area = t_evaluacion.id_area) as order_area
		FROM t_evaluacion 
		INNER JOIN t_asignaturas ON t_asignaturas.id_asignatura = t_evaluacion.id_asignatura
		INNER JOIN t_grupos ON t_grupos.id_grupo = t_evaluacion.id_grupo and t_evaluacion.id_grupo =  '{$grupo}' 
		INNER JOIN t_asignatura_x_area ON 		
		t_asignatura_x_area.id_asignatura = t_evaluacion.id_asignatura	and t_asignatura_x_area.id_area = t_evaluacion.id_area		
		where (t_evaluacion.novedad NOT LIKE 'Ret' OR t_evaluacion.novedad IS NULL)
		".$stringSql."		
		ORDER BY order_area ASC
		; 
		";
		
		$this->execute_single_query();
		
		if($this->resultado->num_rows > 0){
			$this->get_result_query();
			return $this->rows;

		}

		return false;
	}

	public function superacionesPdf($id_grupo){
		$this->query = "
		SELECT spf.id_estudiante, spf.id_asignatura, spf.nota from superacion_informe_final spf
		WHERE spf.id_grupo = '{$id_grupo}'; 
		";		
		$this->execute_single_query();
		
		if($this->resultado->num_rows > 0){
			$this->get_result_query();
			return $this->rows;

		}
		return false;
		

	}

	public function getAsis(){

		$this->query = "
		SELECT t_evaluacion.id_estudiante, t_evaluacion.id_asignatura, t_evaluacion.id_grupo, t_evaluacion.eval_10_per
		FROM t_evaluacion where t_evaluacion.eval_10_per !='NULL'; 
		";		
		$this->execute_single_query();
		
		if($this->resultado->num_rows > 0){
			$this->get_result_query();
			return $this->rows;

		}

		return false;
		
	}

	public function getAsisE(){

		$this->query = "
		SELECT t_evaluacion.id_estudiante, t_evaluacion.id_grupo, '2017'
		FROM t_evaluacion where t_evaluacion.eval_10_per !='NULL'
		GROUP BY t_evaluacion.id_estudiante
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