<?php
namespace App\Model;

use App\Config\DataBase as DB;
use App\Model\PeriodModel as Period;
/**
* 
*/
class EvaluationPeriodModel extends DB
{
	protected $table = 't_evaluacion';
	protected $table_recovery = 'superacion';

	private $_periods = array();

	private $_period;

	private $condicionAcademicas = "AND t_evaluacion.id_asignatura in (select id_asignatura from t_asignaturas where t_asignaturas.tipo_asig = 'A')";

	function __construct($db='')
	{
		if(!$db)
			throw new \Exception("La clase ".get_class($this)." no encontro la base de datos", 1);
		else{
			parent::__construct($db);
			$this->_period = new Period($db);
		}
	}

	public function getPeriodWithOutEvaluating($id_group, $id_asignature)
	{
		$this->query = "SELECT e.*, a.asignatura, g.nombre_grupo 
						FROM {$this->table} e
						INNER JOIN t_grupos g ON g.id_grupo= '{$id_group}' AND e.id_grupo=g.id_grupo
						INNER JOIN t_asignaturas a ON a.id_asignatura= '{$id_asignature}' AND e.id_asignatura=a.id_asignatura
						WHERE e.eval_1_per IS NULL OR e.eval_2_per IS NULL OR e.eval_3_per IS NULL OR e.eval_4_per IS NULL
						ORDER BY e.primer_apellido";

		return $this->getResultsFromQuery();
	}

	//En uso
	public function getPeriodsWithOutEvaluating($column, $id_asignature, $id_group){
		$this->query = "SELECT e.$column AS periodo, s.idstudents, s.primer_apellido AS primer_ape_alu, s.segundo_apellido AS segundo_ape_alu, s.primer_nombre AS primer_nom_alu, s.segundo_nombre AS segundo_nom_alu, a.id_asignatura, a.asignatura, g.nombre_grupo, g.id_grupo 
						FROM {$this->table} e
						INNER JOIN students s ON e.id_estudiante=s.idstudents
						INNER JOIN t_grupos g ON g.id_grupo={$id_group} AND e.id_grupo=g.id_grupo 
						INNER JOIN t_asignaturas a ON a.id_asignatura={$id_asignature} AND e.id_asignatura=a.id_asignatura 
						WHERE e.$column IS NULL OR e.$column = 0 
						ORDER BY e.primer_apellido";

		return $this->getResultsFromQuery();
	}

	public function updatePeriod($period,$id_student, $id_asignature, $value){
			$this->query = "UPDATE {$this->table}
							SET {$period}={$value}
							WHERE id_estudiante={$id_student} AND id_asignatura={$id_asignature}";

			return $this->execute_single_query();
	}

	public function getPeriods($maxPeriod, $id_asignature, $id_group)
	{
		/*¡$this->query = "SELECT e.id_estudiante, e.primer_apellido AS alu_primer_ape, e.segundo_apellido AS alu_segundo_ape, e.primer_nombre AS alu_primer_nom, e.segundo_nombre AS alu_segundo_nom, d.primer_apellido AS dir_primer_ape, d.segundo_apellido AS dir_segundo_ape, d.primer_nombre AS dir_primer_nom, d.segundo_apellido AS dir_segundo_nom, g.id_grupo, g.nombre_grupo, a.id_asignatura, a.asignatura, e.novedad, e.estatus";
*/		
		$this->query = "SELECT s.idstudents AS id_estudiante, s.primer_apellido AS alu_primer_ape, s.segundo_apellido AS alu_segundo_ape, s.primer_nombre AS alu_primer_nom, s.segundo_nombre AS alu_segundo_nom, d.primer_apellido AS dir_primer_ape, d.segundo_apellido AS dir_segundo_ape, d.primer_nombre AS dir_primer_nom, d.segundo_apellido AS dir_segundo_nom, g.id_grupo, g.nombre_grupo, a.id_asignatura, a.asignatura, e.novedad, e.estatus";
		
		for ($i=1; $i <= $maxPeriod; $i++) { 
			$this->query .= ", e.eval_".($i)."_per periodo".($i)." ";
		}
		
		$this->query .= " FROM t_evaluacion e
						INNER JOIN t_grupos g ON e.id_grupo=g.id_grupo AND g.id_grupo={$id_group}
						INNER JOIN t_estudiante_grupo t_g ON t_g.idstudent = e.id_estudiante AND t_g.id_grupo=g.id_grupo
						INNER JOIN students s ON s.idstudents=t_g.idstudent
						INNER JOIN t_asignaturas a ON e.id_asignatura=a.id_asignatura AND a.id_asignatura={$id_asignature}
						INNER JOIN docentes d ON g.id_director_grupo=d.id_docente
						ORDER BY e.primer_apellido";
		
		return $this->getResultsFromQuery();
	}

	public function getValoration()
	{
		$this->query = "SELECT *
						FROM valoracion";

		return $this->getResultsFromQuery();
	}


	private function esta($data=array(), $info)
	{
		if(empty($data))
		{
			return false;
		}
		foreach ($data as $key => $value) 
		{
			
			if($value == $info)
			{
				return true;
			}
		}
		return false;
	}

	/**
	*
	*
	*
	*/
	public function getAverageAreas(
		$id_student='', 
		$group='', 
		$period='', 
		$academica=false
	){

		
		$stringSql = ($academica)? $this->condicionAcademicas : "";

		/*$this->query = "
		SELECT id_estudiante, primer_apellido, segundo_apellido, primer_nombre, segundo_nombre, id_area as 'id_area',id_grado,id_grupo, id_as, count(id_area), SUM(PesoMay) PesoMa, SUM(PesoIgu) PesoIg, sum(Peso), Area, order_area, SUM(Valoracion) , IF(SUM(Peso)=100, round(sum(valoracion * (Peso/100)),1), ROUND(sum(valoracion)/count(id_area),1)) Valoracion 
		FROM ( SELECT t_evaluacion.id_estudiante, t_evaluacion.primer_apellido, t_evaluacion.segundo_apellido, t_evaluacion.primer_nombre, t_evaluacion.segundo_nombre, t_evaluacion.id_area,t_evaluacion.id_asignatura as id_as, (SELECT t_asignaturas.asignatura FROM t_asignaturas WHERE t_asignaturas.id_asignatura = t_evaluacion.id_asignatura) as Asignatura , t_evaluacion.id_grado, t_evaluacion.id_grupo, t_asignatura_x_area.peso_frente_area>0 as PesoMay, t_asignatura_x_area.peso_frente_area=0 or ISNULL(t_asignatura_x_area.peso_frente_area) as PesoIgu, t_asignatura_x_area.peso_frente_area as Peso, (SELECT t_area.area FROM t_area WHERE t_area.id_area = t_evaluacion.id_area) as Area, (SELECT t_area.order_area FROM t_area WHERE t_area.id_area = t_evaluacion.id_area) as order_area ,t_evaluacion.eval_{$period}_per as Valoracion FROM t_evaluacion INNER JOIN t_asignatura_x_area ON t_asignatura_x_area.id_area = t_evaluacion.id_area and t_asignatura_x_area.id_asignatura = t_evaluacion.id_asignatura AND t_evaluacion.id_grado = t_asignatura_x_area.id_grado and t_evaluacion.id_grupo = {$group} and t_evaluacion.id_estudiante={$id_student} and t_evaluacion.eval_{$period}_per >= (SELECT minimo from valoracion
			WHERE valoracion = 'Bajo')
			and (t_evaluacion.novedad NOT LIKE 'Ret' OR t_evaluacion.novedad IS NULL) and t_evaluacion.id_subgrupo is NULL 
			ORDER BY primer_apellido ASC, segundo_apellido ASC, primer_nombre ASC, segundo_nombre Asc, order_area ASC) as t
			GROUP BY id_area, id_estudiante 
			ORDER BY id_estudiante, order_area;";*/
		$this->query = "
			SELECT id_estudiante, primer_apellido, segundo_apellido, primer_nombre, segundo_nombre, id_area as 'id_area',
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
		t_evaluacion.eval_".$period."_per as Valoracion,
		FUNC_SELECT_VAL(t_evaluacion.id_estudiante,t_evaluacion.id_asignatura,{$group},{$period},t_evaluacion.eval_".$period."_per) as superacion
		FROM t_evaluacion INNER JOIN t_asignatura_x_area 
		ON t_asignatura_x_area.id_area = t_evaluacion.id_area 
		and t_asignatura_x_area.id_asignatura = t_evaluacion.id_asignatura 
		AND t_evaluacion.id_grado = t_asignatura_x_area.id_grado 
		and t_evaluacion.id_grupo = '{$group}' 
		and (FUNC_SELECT_VAL(t_evaluacion.id_estudiante,t_evaluacion.id_asignatura,{$group},{$period},t_evaluacion.eval_".$period."_per)) >= (SELECT minimo from valoracion where valoracion = 'Bajo') 
		".$stringSql."
		and (t_evaluacion.novedad NOT LIKE 'Ret' OR t_evaluacion.novedad IS NULL) 
		and t_evaluacion.id_estudiante={$id_student}
		ORDER BY primer_apellido ASC, segundo_apellido ASC, primer_nombre ASC, segundo_nombre Asc, order_area ASC) as t 
		GROUP BY id_area, id_estudiante ORDER BY id_estudiante, order_area;";

		return $this->getResultsFromQuery();
	}

	/**
	*
	*
	*/
	public function getByStudent($id_student, $id_grade, $period, $id_area)
	{
		/*$this->query = "SELECT DISTINCT asi.id_asignatura, asi.asignatura, asi.tipo_asig, ar.id_area, ar.area, aa.int_horaria AS ihs, ev.*
						FROM students e 
						INNER JOIN t_evaluacion ev ON e.idstudents=ev.id_estudiante 
						INNER JOIN t_asignaturas asi ON asi.id_asignatura=ev.id_asignatura 
						INNER JOIN t_area ar ON ar.id_area=ev.id_area AND ar.id_area={$id_area}
						INNER JOIN t_asignatura_x_area aa ON aa.id_asignatura=asi.id_asignatura AND aa.id_area=ar.id_area
						INNER JOIN periodos p ON p.periodos={$period}
						WHERE e.idstudents={$id_student} AND ev.id_grupo = {$id_group}
						ORDER BY ar.order_area";		*/
		$this->query = "
		SELECT DISTINCT asi.id_asignatura, asi.asignatura, ar.id_area, ar.area, aa.int_horaria, aa.id_grado, ev.*
		FROM students e 
		INNER JOIN t_evaluacion ev ON e.idstudents=ev.id_estudiante 
		INNER JOIN t_asignaturas asi ON asi.id_asignatura=ev.id_asignatura 
		INNER JOIN t_area ar ON ar.id_area=ev.id_area 
		INNER JOIN t_asignatura_x_area aa ON aa.id_asignatura=asi.id_asignatura AND aa.id_area=ar.id_area
		INNER JOIN periodos p ON p.periodos={$period}
		WHERE e.idstudents={$id_student} AND ar.id_area={$id_area} AND aa.id_grado = {$id_grade}
		ORDER BY ar.order_area";

		return $this->getResultsFromQuery();
	}



	/**
	*
	*
	*/
	public function decideGradeBook($gradeBook, $period)
	{	
		$asginatureTotal = count($gradeBook['data']);
		$cont = 0;
		foreach ($gradeBook['data'] as $keyG => $valueG) 
		{
			if($valueG['eval_'.$period.'_per'] == NULL)
			{
				$cont ++;
			}
		}

		if($cont == $asginatureTotal)
			return false;

		return true;
	}

	/**
	*
	*
	*/
	public function getBetterAverages($period='', $id_group='')
	{
		// $stringSql = $academica==1?$this->condicionAcademicas:"";

		$this->query = "
		SELECT id_estudiante, 
		primer_apellido, segundo_apellido, segundo_nombre, primer_nombre, 
		sum(eval_".$period."_per >= (SELECT minimo from valoracion WHERE valoracion = 'Superior') and eval_".$period."_per
		<=(SELECT maximo from valoracion WHERE valoracion = 'Superior')) as S , sum(eval_".$period."_per >=
		(SELECT minimo from valoracion WHERE valoracion = 'Alto') and eval_".$period."_per <= 
		(SELECT maximo from valoracion WHERE valoracion = 'Alto')) as A , sum(eval_".$period."_per >= 
		(SELECT minimo from valoracion WHERE valoracion = 'Basico') and eval_".$period."_per <=
		(SELECT maximo from valoracion WHERE valoracion = 'Basico')) as B , sum(eval_".$period."_per <= 
		(SELECT maximo from valoracion WHERE valoracion = 'Bajo') ) as V , sum(eval_".$period."_per >= 
		(SELECT minimo from valoracion where valoracion = 'Bajo')) as TAV, ROUND(((SUM(eval_".$period."_per)) /
		sum(eval_".$period."_per >= (SELECT minimo from valoracion where valoracion = 'Bajo'))),1) as Promedio, 
		ROUND((sum(eval_".$period."_per) / SUM(eval_".$period."_per >= (SELECT minimo from valoracion where valoracion = 'Bajo'))),1) 
		as pgg, (SELECT valoracion.val FROM valoracion WHERE ROUND(((SUM(eval_".$period."_per)) / sum(eval_".$period."_per >= 
		(SELECT minimo from valoracion where valoracion = 'Bajo') )),1) BETWEEN valoracion.minimo AND valoracion.maximo)
		as Desempeno FROM 
		(SELECT t_evaluacion.id_estudiante, t_evaluacion.primer_apellido, t_evaluacion.segundo_apellido, t_evaluacion.segundo_nombre, 
		t_evaluacion.primer_nombre, t_evaluacion.eval_".$period."_per
		FROM t_evaluacion INNER JOIN t_asignatura_x_area ON t_asignatura_x_area.id_area = t_evaluacion.id_area and 
		t_asignatura_x_area.id_asignatura = t_evaluacion.id_asignatura AND t_evaluacion.id_grado = t_asignatura_x_area.id_grado 
		and t_evaluacion.id_grupo = '{$id_group}'  and t_evaluacion.eval_".$period."_per >= (SELECT minimo from valoracion where valoracion = 'Bajo')
		) 
		as t GROUP BY id_estudiante ORDER BY Tav DESC , Promedio DESC ; 		
		";

		return $this->getResultsFromQuery();
	}

	/**
	*
	*
	*/
	public function getPositionGradeBook($period='', $id_group=''){

		$resp = $this->getBetterAverages($period, $id_group);

		$puestos = array();

		if($resp['state']):
			$position = 1;
			$pggAux = 0;

			$infoStudent = array('id_student'=>'', 'period'=>'','position'=>'','pgg'=>'');

			foreach($resp['data'] as $student){

				if($student['pgg'] == $pggAux){
					$infoStudent['id_student'] = $student['id_estudiante'];
					$infoStudent['period'] = $period;
					$infoStudent['position'] = $position-1;
					$infoStudent['pgg'] = $student['pgg'];

				}else{
					$pggAux = $student['pgg'];
					
					$infoStudent['id_student'] = $student['id_estudiante'];
					$infoStudent['period'] = $period;
					$infoStudent['position'] = $position;
					$infoStudent['pgg'] = $student['pgg'];
					
					$position++;

				}

				array_push($puestos, $infoStudent);
			}
		endif;

		return $puestos;
	}

	/**
	*
	*
	*/
	public function getGradeBookBySudent($id_student, $id_grade, $period)
	{
		$this->query = "SELECT DISTINCT asi.id_asignatura, asi.asignatura, doc.primer_apellido AS doc_primer_ape, doc.segundo_apellido AS doc_segundo_ape, doc.primer_nombre AS doc_primer_nomb, doc.segundo_nombre AS doc_segundo_nomb, ar.area, aa.int_horaria AS ihs, ev.* ";

		$this->query .= "FROM students e 
						INNER JOIN t_evaluacion ev ON e.idstudents=ev.id_estudiante 
						INNER JOIN t_asignaturas asi ON asi.id_asignatura=ev.id_asignatura 
						INNER JOIN t_area ar ON ar.id_area=ev.id_area
						INNER JOIN t_asignatura_x_area aa ON aa.id_asignatura=asi.id_asignatura AND aa.id_area=ar.id_area
						INNER JOIN grupo_x_asig_x_doce gd ON ev.id_grupo=gd.id_grupo AND ev.id_asignatura=gd.id_asignatura 
						INNER JOIN docentes doc ON gd.id_docente=doc.id_docente";

		for ($i=0;$i<$period;$i++) { 
		
		$this->query .= "
			INNER JOIN periodos p".($i+1)." ON p".($i+1).".periodos=".($i+1)." ";
		}

		$this->query .= "WHERE e.idstudents={$id_student} AND aa.id_grado = {$id_grade}
						ORDER BY ar.order_area";
		

		// return $this->query;
		$data = $this->getResultsFromQuery()['data'];

		$calculoAreas = $this->filterBestResultsByGrade($id_student, $id_grade)['data'];
		
		$areas =  $this->resolveAreas($data);

		return array_merge(
			array(
				'data' => $data,
				'areas'	=> $areas,
				'calAreas'	=>	$calculoAreas
			)
		);
	}

	/**
	*
	*
	*/
	public function filterBestResultsByGrade($id_student, $id_grade)
	{
		$this->query = "SELECT t_evaluacion.id_estudiante, t_evaluacion.primer_apellido, t_evaluacion.primer_nombre, t_evaluacion.segundo_nombre, t_evaluacion.id_area,t_evaluacion.id_asignatura
, t_evaluacion.id_grado, t_evaluacion.id_grupo, t_asignatura_x_area.peso_frente_area as Peso,
 (SELECT t_area.area FROM t_area WHERE t_area.id_area = t_evaluacion.id_area) as Area
,IF((t_asignatura_x_area.peso_frente_area > 0)
, ROUND(SUM(t_evaluacion.eval_1_per * (t_asignatura_x_area.peso_frente_area / 100)),1), 
ROUND((sum(t_evaluacion.eval_1_per /(SELECT count(DISTINCT t_asignatura_x_area.id_asignatura) FROM t_asignatura_x_area where t_asignatura_x_area.id_area = t_evaluacion.id_area  and t_evaluacion.id_grado = t_asignatura_x_area.id_grado) )),2)) as Valoracion
		FROM t_evaluacion
		INNER JOIN t_asignatura_x_area ON t_asignatura_x_area.id_area  = t_evaluacion.id_area
		and t_asignatura_x_area.id_asignatura = t_evaluacion.id_asignatura AND
		t_evaluacion.id_grado = t_asignatura_x_area.id_grado and t_evaluacion.id_grado = {$id_grade} and t_evaluacion.id_estudiante={$id_student} GROUP BY t_evaluacion.id_estudiante, t_evaluacion.id_area ORDER BY t_evaluacion.primer_apellido, t_evaluacion.primer_nombre DESC;
				";

				return $this->getResultsFromQuery();
			}

	/**
	*
	*
	*/
	private function resolveAreas($data=array())
	{	
		$areas = array();
		foreach($data as $key => $value)
		{
			if(!$this->esta($areas, utf8_encode($value['area'])))
			{
				array_push($areas, utf8_encode($value['area']));
			}
		}
		
		return $areas;
	}

	/**
	*
	*
	*/
	public function getRecovery(
		$id_student, 
		$id_group, 
		$id_asignature, 
		$period
	)
	{	

		$this->query = "SELECT * 
						FROM {$this->table_recovery} 
						WHERE id_estudiante={$id_student}  AND id_asignatura={$id_asignature} AND id_grupo={$id_group} AND periodo={$period}";

		return $this->getResultsFromQuery();
	}

	/**
	*
	*
	*/
	public function getRecovery2(
		$id_student, 
		$id_group, 
		$id_asignature, 
		$period
	)
	{
		$this->query = "SELECT nota_supe_p{$period} AS nota, nota_perdio_p{$period} AS nota_evaluacion
						FROM {$this->table}
						WHERE id_estudiante={$id_student}  AND id_asignatura={$id_asignature} AND id_grupo={$id_group}";

		return $this->getResultsFromQuery();
	}
	
	/**
	*
	*
	*/
	public function getTotalAttendanceByPeriod($id_student, $id_group, $period)
	{
		$this->query = "SELECT SUM(inasistencia_p{$period}) AS inasistencia 
						FROM {$this->table}
						WHERE id_estudiante={$id_student} AND id_grupo={$id_group}";

		return $this->getResultsFromQuery();
	}
	
	/*
	 * INFORME FINAL
	*/
	public function getAverageAreasFinalReport($id_group, $year)
	{
		/*$this->query = "SELECT informe.id_estudiante, informe.primer_apellido, informe.segundo_apellido, informe.primer_nombre, informe.segundo_nombre, 
IF(SUM(informe.peso)=100, ROUND(SUM(informe.definitiva * (informe.peso/100)),1),
ROUND((SUM(informe.definitiva) / COUNT(informe.id_area)),1)) as definitiva,
informe.id_grupo, informe.nombre_grupo, informe.ano_lectivo,informe.id_area, informe.nombre_area, informe.tipo,
informe.order_area, SUM(informe.num_asig) as sum_asignaturas, SUM(informe.peso_m_cero) as peso_m_cero, 
SUM(informe.peso_i_cero) as peso_i_cero, SUM(informe.peso) as peso

		FROM (SELECT ifg.id_estudiante, sts.primer_apellido, sts.segundo_apellido, sts.primer_nombre, sts.segundo_nombre,
		ifg.id_grupo, t_gru.nombre_grupo, ifg.promedio, ifg.ano_lectivo, ifs.valoracion AS definitiva, ifs.id_asignatura, 
		t_as.n_simpl as nombre_asignatura, t_areax.id_area as id_area, t_area.area AS nombre_area, t_area.tipo AS tipo, t_area.order_area, 
		count(ifs.id_asignatura)num_asig, t_areax.peso_frente_area>0 as peso_m_cero, 
		t_areax.peso_frente_area=0 or ISNULL(t_areax.peso_frente_area) as peso_i_cero,
		t_areax.peso_frente_area as peso
		from informe_final_general as ifg
		INNER JOIN informe_final_asignaturas as ifs ON ifs.id_informe = ifg.id_informe
		INNER JOIN t_grupos AS t_gru ON t_gru.id_grupo = ifg.id_grupo
		INNER JOIN students as sts ON sts.idstudents = ifg.id_estudiante
		INNER JOIN t_grados as t_gra on t_gra.id_grado = t_gru.id_grado
		INNER JOIN t_asignaturas as t_as ON t_as.id_asignatura = ifs.id_asignatura
		INNER JOIN t_asignatura_x_area as t_areax ON t_areax.id_asignatura = ifs.id_asignatura and t_areax.id_grado = t_gra.id_grado
		INNER JOIN t_area ON t_area.id_area = t_areax.id_area
		where ifg.id_grupo = {$id_group} and ifg.ano_lectivo = '{$year}' 
		GROUP BY ifg.id_estudiante, ifs.id_asignatura
		ORDER BY sts.primer_apellido, sts.segundo_apellido, sts.primer_nombre, sts.segundo_nombre) 
		as informe

		GROUP BY informe.id_estudiante, informe.id_area";*/
		
		$this->query = "SELECT informe.id_estudiante, informe.primer_apellido, informe.segundo_apellido, informe.primer_nombre, informe.segundo_nombre, 
IF(SUM(informe.peso)=100, ROUND(SUM(informe.definitiva * (informe.peso/100)),1),
ROUND((SUM(informe.definitiva) / COUNT(informe.id_area)),1)) as definitiva,
informe.id_grupo, informe.nombre_grupo, informe.ano_lectivo,informe.id_area, informe.nombre_area, informe.tipo,
informe.order_area, SUM(informe.num_asig) as sum_asignaturas, SUM(informe.peso_m_cero) as peso_m_cero, 
SUM(informe.peso_i_cero) as peso_i_cero, SUM(informe.peso) as peso

					FROM (SELECT ifg.id_estudiante, sts.primer_apellido, sts.segundo_apellido, sts.primer_nombre, sts.segundo_nombre,
					ifg.id_grupo, t_gru.nombre_grupo, ifg.promedio, ifg.ano_lectivo, 
					FUNC_SELECT_FINAL(ifg.id_estudiante, ifs.id_asignatura, ifg.id_grupo, ifs.valoracion)  AS definitiva, ifs.id_asignatura, 
					t_as.n_simpl as nombre_asignatura, t_areax.id_area as id_area, t_area.area AS nombre_area, t_area.order_area, t_area.tipo AS tipo, 
					count(ifs.id_asignatura)num_asig, t_areax.peso_frente_area>0 as peso_m_cero, 
					t_areax.peso_frente_area=0 or ISNULL(t_areax.peso_frente_area) as peso_i_cero,
					t_areax.peso_frente_area as peso
					from informe_final_general as ifg
					INNER JOIN informe_final_asignaturas as ifs ON ifs.id_informe = ifg.id_informe
					INNER JOIN t_grupos AS t_gru ON t_gru.id_grupo = ifg.id_grupo
					INNER JOIN students as sts ON sts.idstudents = ifg.id_estudiante
					INNER JOIN t_grados as t_gra on t_gra.id_grado = t_gru.id_grado
					INNER JOIN t_asignaturas as t_as ON t_as.id_asignatura = ifs.id_asignatura
					INNER JOIN t_asignatura_x_area as t_areax ON t_areax.id_asignatura = ifs.id_asignatura and t_areax.id_grado = t_gra.id_grado 
					and t_areax.id_asignatura = t_as.id_asignatura
					INNER JOIN t_area ON t_area.id_area = t_areax.id_area
					where ifg.id_grupo = $id_group and ifg.ano_lectivo = '{$year}' AND FUNC_SELECT_FINAL(ifg.id_estudiante, ifs.id_asignatura, ifg.id_grupo, ifs.valoracion) >= (SELECT minimo from valoracion where valoracion = 'Bajo')
					GROUP BY ifg.id_estudiante, ifs.id_asignatura
					ORDER BY sts.primer_apellido, sts.segundo_apellido, sts.primer_nombre, sts.segundo_nombre) 
					as informe

					GROUP BY informe.id_estudiante, informe.id_area";
		
		return $this->getResultsFromQuery();
	}
	
	public function getFinalReportList($id_group, $year)
	{
		$this->query = "SELECT DISTINCT ifg.id_estudiante, sts.primer_apellido, sts.segundo_apellido, sts.primer_nombre, sts.segundo_nombre,
ifg.id_grupo, ifg.promedio, ifg.ano_lectivo, ifs.id_asignatura, ifs.valoracion as definitiva, t_as.asignatura, t_as.tipo_asig, ifg.puesto, t_area.id_area, t_asignatura_x_area.int_horaria
						from informe_final_general as ifg
						INNER JOIN informe_final_asignaturas as ifs ON ifs.id_informe = ifg.id_informe
						INNER JOIN students as sts ON sts.idstudents = ifg.id_estudiante
						INNER JOIN t_asignaturas as t_as ON t_as.id_asignatura = ifs.id_asignatura
						INNER JOIN t_asignatura_x_area ON t_asignatura_x_area.id_asignatura=t_as.id_asignatura
						INNER JOIN t_area ON t_area.id_area=t_asignatura_x_area.id_area
						where ifg.id_grupo = {$id_group} and ifg.ano_lectivo = '{$year}' 
						GROUP BY t_as.id_asignatura
						ORDER BY sts.primer_apellido, sts.segundo_apellido, sts.primer_nombre, sts.segundo_nombre";
		return $this->getResultsFromQuery();
	}
	
	public function getFinalReportListByStudents($student_id, $id_group, $id_grade, $year)
	{
		$this->query = "SELECT DISTINCT ifg.id_estudiante, sts.primer_apellido, sts.segundo_apellido, sts.primer_nombre, sts.segundo_nombre, ifg.id_grupo, ifg.promedio, ifg.ano_lectivo, ifs.id_asignatura, ifs.valoracion as definitiva, t_as.asignatura, t_as.tipo_asig, ifg.puesto, t_area.id_area, t_asignatura_x_area.int_horaria
						from informe_final_general as ifg
						INNER JOIN informe_final_asignaturas as ifs ON ifs.id_informe = ifg.id_informe
						INNER JOIN students as sts ON sts.idstudents = ifg.id_estudiante
						INNER JOIN t_asignaturas as t_as ON t_as.id_asignatura = ifs.id_asignatura
						INNER JOIN t_asignatura_x_area ON t_asignatura_x_area.id_asignatura=t_as.id_asignatura
						INNER JOIN t_area ON t_area.id_area=t_asignatura_x_area.id_area
						where ifg.id_grupo = {$id_group} and ifg.ano_lectivo = '{$year}'  AND sts.idstudents = {$student_id} AND t_asignatura_x_area.id_grado= {$id_grade}
						GROUP BY t_as.id_asignatura
						ORDER BY sts.primer_apellido, sts.segundo_apellido, sts.primer_nombre, sts.segundo_nombre";
		return $this->getResultsFromQuery();
	}
	
	// Recovery Report final
	public function getRecoveryFinalReport($student_id, $group_id, $asignature_id)
	{
		$this->query  = "SELECT *
						FROM superacion_informe_final
						WHERE id_estudiante={$student_id} AND id_grupo={$group_id} AND id_asignatura={$asignature_id}";

		return $this->getResultsFromQuery();
	}
	
	// Final Report Messages
	public function getFinalReportMessages()
	{
		$this->query = "SELECT * FROM informe_final_mensajes";

		return $this->getResultsFromQuery();
	}

	public function saveFinalReportMessages($data = array())
	{
		$this->query = "INSERT INTO informe_final_mensajes(";

		foreach($data as $key => $value):
			$this->query .= "{$key},";
		endforeach;

		$this->query = substr($this->query, 0, strlen($this->query) -1).")VALUES(";

		foreach($data as $key => $value):
			$this->query .= "'{$value}',";
		endforeach;

		$this->query = substr($this->query, 0, strlen($this->query) -1).")";

		return $this->executeQuerySingle();
	}

	public function updateFinalReportMessages($data = array())
	{
		$this->query = "UPDATE informe_final_mensajes SET ";

		foreach($data as $key => $value):
			$this->query .= "{$key} = '{$value}',";
		endforeach;

		$this->query = substr($this->query, 0, strlen($this->query) -1);

		return $this->executeQuerySingle();
	}
	
	//
	public function getCertificado()
	{
		$this->query = "SELECT * FROM certificado";

		return $this->getResultsFromQuery();
	} 

	public function updateFirmas($data = array())
	{
		$this->query = "UPDATE certificado SET ";

		foreach($data as $key => $value):
			$this->query .= "{$key} = '{$value}',";
		endforeach;

		$this->query = substr($this->query, 0, strlen($this->query) -1);

		return $this->executeQuerySingle();
	}

	public function saveFirmas($data = array())
	{
		$this->query = "INSERT INTO certificado(";

		foreach($data as $key => $value):
			$this->query .= "{$key},";
		endforeach;

		$this->query = substr($this->query, 0, strlen($this->query) -1).")VALUES(";

		foreach($data as $key => $value):
			$this->query .= "'{$value}',";
		endforeach;

		$this->query = substr($this->query, 0, strlen($this->query) -1).")";

		return $this->executeQuerySingle();
	}
}
?>