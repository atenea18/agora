<?php

namespace Model;
use Config\DataBase as BD;

class ReprobadasModel extends BD{
	public $condicionAcademicas = "AND t_evaluacion.id_asignatura in (select id_asignatura from t_asignaturas where t_asignaturas.tipo_asig = 'A')";
	public $condicionTecnica = "AND t_evaluacion.id_asignatura in (select id_asignatura from t_asignaturas where t_asignaturas.tipo_asig = 'T')";

	function __construct($bd){

		$this->database=$bd;

	}


	public function getEstudiantesAsiganturasRepro($grupo, $periodo, $tecnica)
	{	
		$stringSql = $tecnica==1?$this->condicionTecnica:$this->condicionAcademicas;

		$this->query = "
		SELECT t_evaluacion.id_estudiante, t_evaluacion.primer_apellido, t_evaluacion.segundo_apellido, 
		t_evaluacion.primer_nombre, t_evaluacion.segundo_nombre,t_evaluacion.inasistencia_p".$periodo." as Inasistencia,
		t_evaluacion.id_asignatura, 
		(SELECT t_asignaturas.asignatura FROM t_asignaturas WHERE t_asignaturas.id_asignatura = t_evaluacion.id_asignatura) as Asignatura , 		
		(SELECT t_area.order_area FROM t_area WHERE t_area.id_area = t_evaluacion.id_area)as order_area ,
		round(t_evaluacion.eval_".$periodo."_per,1) as valoracion FROM t_evaluacion INNER JOIN t_asignatura_x_area ON 
		t_asignatura_x_area.id_area = t_evaluacion.id_area and t_asignatura_x_area.id_asignatura = t_evaluacion.id_asignatura AND
		t_evaluacion.id_grado = t_asignatura_x_area.id_grado and t_evaluacion.id_grupo = '{$grupo}' and t_evaluacion.eval_".$periodo."_per <= 
		(SELECT maximo from valoracion where valoracion = 'Bajo')
		".$stringSql."
		and (t_evaluacion.novedad NOT LIKE 'Ret' OR t_evaluacion.novedad IS NULL)
		and t_evaluacion.id_subgrupo is NULL
		and t_evaluacion.eval_".$periodo."_per >= 
		(SELECT minimo from valoracion where valoracion = 'Bajo')
		ORDER BY primer_apellido ASC, segundo_apellido ASC, primer_nombre ASC, segundo_nombre Asc, order_area ASC; 
		";

		$this->execute_single_query();	


		if($this->resultado->num_rows > 0){
			$this->get_result_query();

			return $this->rows;

		}
		return false;
		
	}

	public function getEstudiantesAareasRepro($grupo, $periodo, $tecnica)
	{	
		$stringSql = $tecnica==1?$this->condicionTecnica:$this->condicionAcademicas;
		//Asignatura = Area
		$this->query = "

		SELECT id_estudiante, primer_apellido, segundo_apellido, primer_nombre, Asignatura,
		segundo_nombre, SUM(Inasistencia) as Inasistencia,  id_area as 'id_asignatura',id_as, count(id_area), SUM(PesoMay) PesoMa, 
		SUM(PesoIgu) PesoIg, sum(Peso), Area, order_area , IF(SUM(Peso)=100, round(sum(valoracion * (Peso/100)),1),
		ROUND(sum(valoracion)/count(id_area),1)) valoracion FROM ( SELECT t_evaluacion.id_estudiante, t_evaluacion.primer_apellido, 
		t_evaluacion.segundo_apellido, t_evaluacion.primer_nombre, t_evaluacion.inasistencia_p".$periodo." as Inasistencia, t_evaluacion.segundo_nombre, t_evaluacion.id_area,t_evaluacion.id_asignatura 
		as id_as, 
		(SELECT t_area.area FROM t_area WHERE t_area.id_area = t_evaluacion.id_area) as Asignatura
		, t_evaluacion.id_grado, t_evaluacion.id_grupo, t_asignatura_x_area.peso_frente_area>0 as 
		PesoMay, t_asignatura_x_area.peso_frente_area=0 or ISNULL(t_asignatura_x_area.peso_frente_area) as 
		PesoIgu, t_asignatura_x_area.peso_frente_area as Peso, (SELECT t_area.area FROM t_area WHERE 
			t_area.id_area = t_evaluacion.id_area) as Area, (SELECT t_area.order_area FROM t_area WHERE t_area.id_area = t_evaluacion.id_area) as 
			order_area ,t_evaluacion.eval_".$periodo."_per as Valoracion FROM t_evaluacion INNER JOIN t_asignatura_x_area ON 
			t_asignatura_x_area.id_area = t_evaluacion.id_area and t_asignatura_x_area.id_asignatura = t_evaluacion.id_asignatura AND 
			t_evaluacion.id_grado = t_asignatura_x_area.id_grado and t_evaluacion.id_grupo = '{$grupo}'
			and t_evaluacion.eval_".$periodo."_per >= (SELECT minimo from valoracion where valoracion = 'Bajo')
			".$stringSql."
			and (t_evaluacion.novedad NOT LIKE 'Ret' OR t_evaluacion.novedad IS NULL)
			and t_evaluacion.id_subgrupo is NULL
			ORDER BY primer_apellido ASC, segundo_apellido ASC, primer_nombre ASC, segundo_nombre Asc, order_area ASC) as 
			t where Valoracion <= (SELECT maximo from valoracion where valoracion = 'Bajo')
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


		public function getEstudiantesRepro($grupo, $periodo, $tecnica, $operador, $num)
		{	
			$stringSql = $tecnica==1?$this->condicionTecnica:$this->condicionAcademicas;
			$op = $operador=="1"?">=":($operador=="0"?"=":"<=");

			$this->query = "
			SELECT * FROM (SELECT 
			t_evaluacion.id_estudiante, t_evaluacion.primer_apellido, t_evaluacion.segundo_apellido, t_evaluacion.primer_nombre, 
			t_evaluacion.segundo_nombre,
			count(t_evaluacion.id_asignatura) as numeroAsignaturas		
			FROM t_evaluacion	INNER JOIN t_asignatura_x_area ON t_asignatura_x_area.id_area  = t_evaluacion.id_area
			and t_asignatura_x_area.id_asignatura = t_evaluacion.id_asignatura AND
			t_evaluacion.id_grado = t_asignatura_x_area.id_grado and t_evaluacion.id_grupo = '{$grupo}' and t_evaluacion.eval_".$periodo."_per>=(SELECT minimo from valoracion where valoracion = 'Bajo')
			".$stringSql."		
			and (t_evaluacion.novedad NOT LIKE 'Ret' OR t_evaluacion.novedad IS NULL)
			and t_evaluacion.id_subgrupo is NULL
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

		public function getEstudiantesReproA($grupo, $periodo, $tecnica, $operador, $num)
		{	
			$stringSql = $tecnica==1?$this->condicionTecnica:$this->condicionAcademicas;
			$op = $operador=="1"?">=":($operador=="0"?"=":"<=");

			$this->query = "
			SELECT * from (select id_estudiante, primer_apellido, segundo_apellido, primer_nombre, segundo_nombre, Inasistencia,id_asignatura, COUNT(id_estudiante) numAreas FROM 
			(SELECT id_estudiante, primer_apellido, segundo_apellido, primer_nombre, Asignatura, segundo_nombre, 
			SUM(Inasistencia) as Inasistencia, id_area as 'id_asignatura',  Area, order_area , IF(SUM(Peso)=100, round(sum(valoracion * (Peso/100)),1), 
			ROUND(sum(valoracion)/count(id_area),1)) valoracion FROM ( SELECT t_evaluacion.id_estudiante, 
			t_evaluacion.primer_apellido, t_evaluacion.segundo_apellido, t_evaluacion.primer_nombre, t_evaluacion.inasistencia_p1 as
			Inasistencia, t_evaluacion.segundo_nombre, t_evaluacion.id_area,t_evaluacion.id_asignatura as id_as, 
			(SELECT t_area.area FROM t_area WHERE t_area.id_area = t_evaluacion.id_area) as Asignatura , t_evaluacion.id_grado, 
			t_evaluacion.id_grupo, t_asignatura_x_area.peso_frente_area>0 as PesoMay, t_asignatura_x_area.peso_frente_area=0 or 
			ISNULL(t_asignatura_x_area.peso_frente_area) as PesoIgu, t_asignatura_x_area.peso_frente_area as Peso, 
			(SELECT t_area.area FROM t_area WHERE t_area.id_area = t_evaluacion.id_area) as Area, (SELECT t_area.order_area 
			FROM t_area WHERE t_area.id_area = t_evaluacion.id_area) as order_area ,t_evaluacion.eval_".$periodo."_per as Valoracion FROM 
			t_evaluacion INNER JOIN t_asignatura_x_area ON t_asignatura_x_area.id_area = t_evaluacion.id_area and 
			t_asignatura_x_area.id_asignatura = t_evaluacion.id_asignatura AND t_evaluacion.id_grado = t_asignatura_x_area.id_grado
			and t_evaluacion.id_grupo = '{$grupo}' and t_evaluacion.eval_".$periodo."_per >= (SELECT minimo from valoracion where valoracion = 'Bajo') 
			".$stringSql."	
			and (t_evaluacion.novedad NOT LIKE 'Ret' OR t_evaluacion.novedad IS NULL)
			and t_evaluacion.id_subgrupo is NULL
			ORDER BY primer_apellido ASC, segundo_apellido ASC, primer_nombre ASC, segundo_nombre Asc, order_area ASC) as t 
			where Valoracion <= (SELECT maximo from valoracion where valoracion = 'Bajo') GROUP BY id_area, id_estudiante 
			ORDER BY id_estudiante, id_area) as t GROUP BY id_estudiante)as t where numAreas $op '{$num}'		

			";

			$this->execute_single_query();
			
			if($this->resultado->num_rows > 0){
				$this->get_result_query();

				return $this->rows;

			}
		//var_dump($this->rows);
			return false;		
		}

		public function getAsignaturasFinal($grupo, $periodo, $tecnica, $ano_lectivo=null){
			
			$stringSql = $tecnica==1?"and t_as.tipo_asig = 'T'":"and t_as.tipo_asig = 'A'";			
			$ano_lectivo = '2017';

			$this->query = "
			SELECT ifg.id_estudiante, sts.primer_apellido, sts.segundo_apellido, sts.primer_nombre, sts.segundo_nombre,
			ifg.id_grupo, ifg.promedio, ifg.ano_lectivo, ifs.id_asignatura, ifs.valoracion as valoracion, t_as.asignatura as Asignatura
			from informe_final_general as ifg
			INNER JOIN informe_final_asignaturas as ifs ON ifs.id_informe = ifg.id_informe
			INNER JOIN t_grupos AS t_gru ON t_gru.id_grupo = '{$grupo}' 
			INNER JOIN students as sts ON sts.idstudents = ifg.id_estudiante
			INNER JOIN t_asignaturas as t_as ON t_as.id_asignatura = ifs.id_asignatura
			INNER JOIN t_grados as t_gra on t_gra.id_grado = t_gru.id_grado
			INNER JOIN t_asignatura_x_area as t_areax ON t_areax.id_asignatura = ifs.id_asignatura and t_areax.id_grado = t_gra.id_grado and t_areax.id_asignatura = t_as.id_asignatura and t_areax.tipo_asig != 'C'
			where ifg.id_grupo = '{$grupo}' and ifg.ano_lectivo = {$ano_lectivo} 
			and ifs.valoracion < (SELECT valoracion.minimo from valoracion WHERE valoracion.valoracion = 'Basico')
			".$stringSql."
			ORDER BY sts.primer_apellido, sts.segundo_apellido, sts.primer_nombre, sts.segundo_nombre;
			";

			$this->execute_single_query();
		//print_r($this->query);
			if($this->resultado->num_rows > 0){
				$this->get_result_query();

				return $this->rows;

			}
		//var_dump($this->rows);
			return false;		

		}

		public function getEstudianteAsignaturasFiltro($grupo, $periodo, $tecnica, $operador, $num, $ano_lectivo=null){			
			$stringSql = $tecnica==1?"and t_as.tipo_asig = 'T'":"and t_as.tipo_asig = 'A'";	
			$op = $operador=="1"?">=":($operador=="0"?"=":"<=");		
			$ano_lectivo = '2017';

			$this->query = "
			SELECT ifsa.id_estudiante, ifsa.primer_apellido, ifsa.segundo_apellido, ifsa.primer_nombre, ifsa.segundo_nombre, 
			num_asignatura  
			from
			(SELECT ifg.id_estudiante, sts.primer_apellido, sts.segundo_apellido, sts.primer_nombre, sts.segundo_nombre,
			ifg.id_grupo, ifg.promedio, ifg.ano_lectivo, COUNT(t_areax.id_asignatura) as num_asignatura, 
			ifs.valoracion as definitiva, t_as.asignatura 
			from informe_final_general as ifg
			INNER JOIN informe_final_asignaturas as ifs ON ifs.id_informe = ifg.id_informe
			INNER JOIN t_grupos AS t_gru ON t_gru.id_grupo = '{$grupo}' 
			INNER JOIN students as sts ON sts.idstudents = ifg.id_estudiante
			INNER JOIN t_asignaturas as t_as ON t_as.id_asignatura = ifs.id_asignatura 
			INNER JOIN t_grados as t_gra on t_gra.id_grado = t_gru.id_grado
			INNER JOIN t_asignatura_x_area as t_areax ON t_areax.id_asignatura = ifs.id_asignatura and t_areax.id_grado = t_gra.id_grado and t_areax.id_asignatura = t_as.id_asignatura  and t_areax.tipo_asig != 'C'
			where ifg.id_grupo = '{$grupo}' and ifg.ano_lectivo = {$ano_lectivo} and t_areax.tipo_asig != 'C'
			and ifs.valoracion < (SELECT valoracion.minimo from valoracion WHERE valoracion.valoracion = 'Basico')
			".$stringSql."
			GROUP BY ifg.id_estudiante
			ORDER BY sts.primer_apellido, sts.segundo_apellido, sts.primer_nombre, sts.segundo_nombre) 
			as ifsa
			WHERE ifsa.num_asignatura $op '{$num}' 
			GROUP BY ifsa.id_estudiante
			ORDER BY ifsa.primer_apellido, ifsa.segundo_apellido, ifsa.primer_nombre, ifsa.segundo_nombre;
			";

			$this->execute_single_query();
		
			if($this->resultado->num_rows > 0){
				$this->get_result_query();

				return $this->rows;

			}
		//var_dump($this->rows);
			return false;		

		}





		public function getAreasFinal($grupo, $periodo, $tecnica, $ano_lectivo=null){
			
			$stringSql = $tecnica==1?"and t_as.tipo_asig = 'T'":"and t_as.tipo_asig = 'A'";			
			$ano_lectivo = '2017';

			$this->query = "
			SELECT informe.id_estudiante, informe.primer_apellido, informe.segundo_apellido, informe.primer_nombre, informe.segundo_nombre, 
			IF(SUM(informe.peso)=100, ROUND(SUM(informe.definitiva * (informe.peso/100)),1),
			ROUND((SUM(informe.definitiva) / COUNT(informe.id_area)),1)) as valoracion,
			informe.id_grupo, informe.nombre_grupo, informe.ano_lectivo,informe.id_area as id_asignatura, informe.nombre_area as Asignatura,
			informe.order_area, SUM(informe.num_asig) as sum_asignaturas, SUM(informe.peso_m_cero) as peso_m_cero, 
			SUM(informe.peso_i_cero) as peso_i_cero, SUM(informe.peso) as peso

			FROM (SELECT ifg.id_estudiante, sts.primer_apellido, sts.segundo_apellido, sts.primer_nombre, sts.segundo_nombre,
			ifg.id_grupo, t_gru.nombre_grupo, ifg.promedio, ifg.ano_lectivo, sum(ifs.valoracion) AS definitiva, ifs.id_asignatura, 
			t_as.n_simpl as nombre_asignatura, t_areax.id_area as id_area, t_area.area AS nombre_area, t_area.order_area, 
			count(ifs.id_asignatura)num_asig, t_areax.peso_frente_area>0 as peso_m_cero, 
			t_areax.peso_frente_area=0 or ISNULL(t_areax.peso_frente_area) as peso_i_cero,
			t_areax.peso_frente_area as peso
			from informe_final_general as ifg
			INNER JOIN informe_final_asignaturas as ifs ON ifs.id_informe = ifg.id_informe
			INNER JOIN t_grupos AS t_gru ON t_gru.id_grupo = ifg.id_grupo
			INNER JOIN students as sts ON sts.idstudents = ifg.id_estudiante
			INNER JOIN t_grados as t_gra on t_gra.id_grado = t_gru.id_grado
			INNER JOIN t_asignaturas as t_as ON t_as.id_asignatura = ifs.id_asignatura
			INNER JOIN t_asignatura_x_area as t_areax ON t_areax.id_asignatura = ifs.id_asignatura and t_areax.id_grado = t_gra.id_grado and t_areax.tipo_asig != 'C'
			INNER JOIN t_area ON t_area.id_area = t_areax.id_area
			where ifg.id_grupo = '{$grupo}' and ifg.ano_lectivo = {$ano_lectivo}
			".$stringSql."
			GROUP BY ifg.id_estudiante, ifs.id_asignatura
			ORDER BY sts.primer_apellido, sts.segundo_apellido, sts.primer_nombre, sts.segundo_nombre) 
			as informe WHERE informe.definitiva < (SELECT valoracion.minimo from valoracion WHERE valoracion.valoracion = 'Basico')
			GROUP BY informe.id_estudiante, informe.id_area
			";

			$this->execute_single_query();
		//print_r($this->query);
			if($this->resultado->num_rows > 0){
				$this->get_result_query();

				return $this->rows;

			}
		//var_dump($this->rows);
			return false;		

		}

		public function getEstudianteAreasFiltro($grupo, $periodo, $tecnica, $operador, $num, $ano_lectivo=null){
			
			$stringSql = $tecnica==1?"and t_as.tipo_asig = 'T'":"and t_as.tipo_asig = 'A'";	
			$op = $operador=="1"?">=":($operador=="0"?"=":"<=");		
			$ano_lectivo = '2017';

			$this->query = "

			SELECT  infa.id_estudiante, infa.primer_apellido, infa.segundo_apellido, infa.primer_nombre, 
			infa.segundo_nombre, infa.num_areas
			FROM
			(SELECT informe.id_estudiante, informe.primer_apellido, informe.segundo_apellido, 
			informe.primer_nombre, informe.segundo_nombre,
			IF(SUM(informe.peso)=100, ROUND(SUM(informe.definitiva * (informe.peso/100)),1),
			ROUND((SUM(informe.definitiva) / COUNT(informe.id_area)),1)) as definitiva,
			informe.id_grupo, informe.nombre_grupo, informe.ano_lectivo,informe.id_area, COUNT(informe.nombre_area) as num_areas,
			informe.order_area, SUM(informe.num_asig) as sum_asignaturas, SUM(informe.peso_m_cero) as peso_m_cero, 
			SUM(informe.peso_i_cero) as peso_i_cero, SUM(informe.peso) as peso

			FROM (SELECT ifg.id_estudiante, sts.primer_apellido, sts.segundo_apellido, sts.primer_nombre, sts.segundo_nombre,
			ifg.id_grupo, t_gru.nombre_grupo, ifg.promedio, ifg.ano_lectivo, sum(ifs.valoracion) AS definitiva, ifs.id_asignatura, 
			t_as.n_simpl as nombre_asignatura, t_areax.id_area as id_area, t_area.n_simpl AS nombre_area, t_area.order_area, 
			count(ifs.id_asignatura)num_asig, t_areax.peso_frente_area>0 as peso_m_cero, 
			t_areax.peso_frente_area=0 or ISNULL(t_areax.peso_frente_area) as peso_i_cero,
			t_areax.peso_frente_area as peso
			from informe_final_general as ifg
			INNER JOIN informe_final_asignaturas as ifs ON ifs.id_informe = ifg.id_informe
			INNER JOIN t_grupos AS t_gru ON t_gru.id_grupo = ifg.id_grupo
			INNER JOIN students as sts ON sts.idstudents = ifg.id_estudiante
			INNER JOIN t_grados as t_gra on t_gra.id_grado = t_gru.id_grado
			INNER JOIN t_asignaturas as t_as ON t_as.id_asignatura = ifs.id_asignatura 
			INNER JOIN t_asignatura_x_area as t_areax ON t_areax.id_asignatura = ifs.id_asignatura and t_areax.id_grado = t_gra.id_grado and t_areax.tipo_asig != 'C'
			INNER JOIN t_area ON t_area.id_area = t_areax.id_area
			where ifg.id_grupo = '{$grupo}' and ifg.ano_lectivo = {$ano_lectivo}
			".$stringSql."
			GROUP BY ifg.id_estudiante, ifs.id_asignatura
			ORDER BY sts.primer_apellido, sts.segundo_apellido, sts.primer_nombre, sts.segundo_nombre) 
			as informe WHERE informe.definitiva < (SELECT valoracion.minimo from valoracion WHERE valoracion.valoracion = 'Basico')
			GROUP BY informe.id_estudiante) as infa
			where infa.num_areas $op '{$num}'
			GROUP BY infa.id_estudiante, infa.primer_apellido, infa.segundo_apellido, infa.primer_nombre, infa.segundo_nombre;
			";

			$this->execute_single_query();
		//print_r($this->query);
			if($this->resultado->num_rows > 0){
				$this->get_result_query();

				return $this->rows;

			}
		//var_dump($this->rows);
			return false;		

		}


		public function crearInformeReprobado($array_estudiantes,$ano_lectivo='2017'){
			date_default_timezone_set('UTC');
			$ano_lectivo = '2017-10-20'; 
			foreach ($array_estudiantes as $estudiante_) {
				$this->query = "INSERT INTO novedades_x_estudiante_fecha(idstudents, id_novedad, fecha)
				VALUES ($estudiante_[id_estudiante], '44',$ano_lectivo)";
				//print_r($this->query);
				//echo "<br>";
				$this->execute_single_query();
			}
		}



	}




	?>