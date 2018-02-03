<?php

namespace Model;
use Config\DataBase as BD;

class PromedioGrupoModel extends BD{
	public $condicionAcademicas = "AND t_evaluacion.id_asignatura in (select id_asignatura from t_asignaturas where t_asignaturas.tipo_asig = 'A')";


	function __construct($bd){

		$this->database=$bd;

	}


	public function getPromedioPuestos($grupo, $periodo, $academica)
	{	
		$stringSql = $academica==1?$this->condicionAcademicas:"";

		$this->query = "
		SELECT  t_evaluacion.id_estudiante, t_evaluacion.primer_apellido, t_evaluacion.primer_nombre,  
		sum(t_evaluacion.eval_".$periodo."_per >= (SELECT minimo from valoracion WHERE valoracion = 'Superior') and t_evaluacion.eval_".$periodo."_per <=(SELECT maximo from valoracion WHERE valoracion = 'Superior'))   as S ,
		sum(t_evaluacion.eval_".$periodo."_per >=  (SELECT minimo from valoracion WHERE valoracion = 'Alto') and t_evaluacion.eval_".$periodo."_per <= (SELECT maximo from valoracion WHERE valoracion = 'Alto')) as A ,
		sum(t_evaluacion.eval_".$periodo."_per >= (SELECT minimo from valoracion WHERE valoracion = 'Basico') and t_evaluacion.eval_".$periodo."_per <=(SELECT maximo from valoracion WHERE valoracion = 'Basico')) as B , 
		sum(t_evaluacion.eval_".$periodo."_per <= (SELECT maximo from valoracion WHERE valoracion = 'Bajo') ) as V ,
		sum(t_evaluacion.eval_".$periodo."_per>(SELECT minimo from valoracion where valoracion = 'Bajo')) as TAV,  
		ROUND(((SUM(t_evaluacion.eval_".$periodo."_per)) / count(t_evaluacion.eval_".$periodo."_per)),1) as Promedio,
		ROUND((sum(t_evaluacion.eval_".$periodo."_per) / SUM(eval_".$periodo."_per > (SELECT minimo from valoracion where valoracion = 'Bajo'))),1) as pgg,
		(SELECT valoracion.val FROM valoracion WHERE 
		ROUND(((SUM(t_evaluacion.eval_".$periodo."_per)) / count(t_evaluacion.eval_".$periodo."_per)),1)
		BETWEEN   valoracion.minimo AND  valoracion.maximo) as Desempeno
		FROM t_evaluacion
		WHERE t_evaluacion.id_estudiante IN
		(SELECT DISTINCT
		t_evaluacion.id_estudiante
		FROM t_evaluacion
		INNER JOIN t_asignatura_x_area ON t_asignatura_x_area.id_area  = t_evaluacion.id_area
		and t_asignatura_x_area.id_asignatura = t_evaluacion.id_asignatura  
		INNER JOIN t_grados ON t_evaluacion.id_grado = t_grados.id_grado and t_evaluacion.id_grupo = '{$grupo}' and t_evaluacion.eval_".$periodo."_per >= (SELECT minimo from valoracion where valoracion = 'Bajo') ) 
		".$stringSql." 
		GROUP BY t_evaluacion.id_estudiante ORDER BY  Tav DESC , Promedio DESC ;
		";

		$this->execute_single_query();


		if($this->resultado->num_rows > 0){
			$this->get_result_query();

			return $this->rows;

		}
		return false;
		
	}

	public function getPromedioPuestosReprobados($grupo, $periodo, $academica){
		$stringSql = $academica==1?$this->condicionAcademicas:"";

		$this->query = "
		SELECT * from (SELECT 
		t_evaluacion.id_estudiante, t_evaluacion.primer_apellido, t_evaluacion.primer_nombre,
		sum(t_evaluacion.eval_".$periodo."_per >= (SELECT minimo from valoracion WHERE valoracion = 'Superior') and t_evaluacion.eval_".$periodo."_per <=(SELECT maximo from valoracion WHERE valoracion = 'Superior'))   as S ,
		sum(t_evaluacion.eval_".$periodo."_per >=  (SELECT minimo from valoracion WHERE valoracion = 'Alto') and t_evaluacion.eval_".$periodo."_per <= (SELECT maximo from valoracion WHERE valoracion = 'Alto')) as A ,
		sum(t_evaluacion.eval_".$periodo."_per >= (SELECT minimo from valoracion WHERE valoracion = 'Basico') and t_evaluacion.eval_".$periodo."_per <=(SELECT maximo from valoracion WHERE valoracion = 'Basico')) as B , 
		sum(t_evaluacion.eval_".$periodo."_per <= (SELECT maximo from valoracion WHERE valoracion = 'Bajo') ) as V , 
		SUM(eval_".$periodo."_per > (SELECT minimo from valoracion where valoracion = 'Bajo')) as TAV,
		ROUND((sum(t_evaluacion.eval_".$periodo."_per) / SUM(eval_".$periodo."_per >= (SELECT minimo from valoracion where valoracion = 'Bajo'))),1) as Promedio,
		
		(SELECT valoracion.val FROM valoracion WHERE 
		ROUND(((SUM(t_evaluacion.eval_".$periodo."_per)) / count(t_evaluacion.eval_".$periodo."_per)),1)
		BETWEEN   valoracion.minimo AND  valoracion.maximo) as Desempeno
		FROM t_evaluacion
		INNER JOIN t_asignatura_x_area ON t_asignatura_x_area.id_area  = t_evaluacion.id_area
		and t_asignatura_x_area.id_asignatura = t_evaluacion.id_asignatura AND
		t_evaluacion.id_grado = t_asignatura_x_area.id_grado and t_evaluacion.id_grupo = '{$grupo}' and t_evaluacion.eval_".$periodo."_per >= (SELECT minimo from valoracion where valoracion = 'Bajo')
		".$stringSql." 
		GROUP BY id_estudiante ORDER BY Tav DESC , Promedio DESC ) as p 
		WHERE Promedio <= (SELECT maximo from valoracion where valoracion = 'Bajo');
		";

		$this->execute_single_query();


		if($this->resultado->num_rows > 0){
			$this->get_result_query();

			return $this->rows;

		}
		return false;
	}

	public function getPromedioPuestosAreas($grupo, $periodo, $academica){
		$stringSql = $academica==1?$this->condicionAcademicas:"";

		$this->query = "
		SELECT id_estudiante, id_estudiante, primer_apellido, primer_nombre,
		sum(valoracion >= (SELECT minimo from valoracion WHERE valoracion = 'Superior') 
		and valoracion <=(SELECT maximo from valoracion WHERE valoracion = 'Superior'))   as S ,

		sum(valoracion >=  (SELECT minimo from valoracion WHERE valoracion = 'Alto') 
		and valoracion <= (SELECT maximo from valoracion WHERE valoracion = 'Alto')) as A ,

		sum(valoracion >= (SELECT minimo from valoracion WHERE valoracion = 'Basico') 
		and valoracion <=(SELECT maximo from valoracion WHERE valoracion = 'Basico')) as B , 

		sum(valoracion <= (SELECT maximo from valoracion WHERE valoracion = 'Bajo') ) as V ,
		count(valoracion>=(SELECT minimo from valoracion where valoracion = 'Bajo')) as TAV,  

		(SELECT v.val FROM valoracion v WHERE 
		ROUND(((SUM(p.valoracion)) / count(p.valoracion)),1)
		BETWEEN   v.minimo AND  v.maximo) as Desempeno,
		round((SUM(Valoracion)/ COUNT(id_estudiante)),1) as Promedio,
		round((SUM(Valoracion)/ COUNT(id_estudiante)),1)  as pgg from (SELECT 
		t_evaluacion.id_estudiante, t_evaluacion.primer_apellido, t_evaluacion.primer_nombre, t_evaluacion.segundo_nombre, t_evaluacion.id_area, t_evaluacion.id_asignatura
		, t_evaluacion.id_grado, t_evaluacion.id_grupo,
		(SELECT t_area.n_simpl FROM t_area WHERE t_area.id_area = t_evaluacion.id_area) as Area,			
		IF(t_asignatura_x_area.peso_frente_area > 0,
		ROUND(SUM(t_evaluacion.eval_".$periodo."_per * (t_asignatura_x_area.peso_frente_area / 100)),1) 
		, ROUND(sum(t_evaluacion.eval_".$periodo."_per) / (SELECT count(DISTINCT t_asignatura_x_area.id_asignatura) FROM t_asignatura_x_area where t_asignatura_x_area.id_area = t_evaluacion.id_area  and t_evaluacion.id_grado = t_asignatura_x_area.id_grado),1) ) AS Valoracion
		FROM t_evaluacion
		INNER JOIN t_asignatura_x_area ON t_asignatura_x_area.id_area  = t_evaluacion.id_area
		and t_asignatura_x_area.id_asignatura = t_evaluacion.id_asignatura AND
		t_evaluacion.id_grado = t_asignatura_x_area.id_grado and t_evaluacion.id_grupo = '{$grupo}'  and t_evaluacion.eval_".$periodo."_per >= (SELECT minimo from valoracion where valoracion = 'Bajo')	".$stringSql." 
		GROUP BY t_evaluacion.id_estudiante, t_evaluacion.id_area
		ORDER BY t_evaluacion.primer_apellido, t_evaluacion.primer_nombre, Area ASC) as p GROUP BY id_estudiante ORDER BY Tav DESC , Promedio DESC 
		";

		$this->execute_single_query();


		if($this->resultado->num_rows > 0){
			$this->get_result_query();

			return $this->rows;

		}
		var_dump($this->rows);
		return false;
	}


	public function getPromedioPuestosAreasReprobados($grupo, $periodo, $academica){
		$stringSql = $academica==1?$this->condicionAcademicas:"";

		$this->query = "
		SELECT * FROM
		(SELECT 		
		id_estudiante, primer_apellido, primer_nombre, 
		sum(valoracion >= (SELECT minimo from valoracion WHERE valoracion = 'Superior') 
		and valoracion <=(SELECT maximo from valoracion WHERE valoracion = 'Superior'))   as S ,
		sum(valoracion >=  (SELECT minimo from valoracion WHERE valoracion = 'Alto') 
		and valoracion <= (SELECT maximo from valoracion WHERE valoracion = 'Alto')) as A ,

		sum(valoracion >= (SELECT minimo from valoracion WHERE valoracion = 'Basico') 
		and valoracion <=(SELECT maximo from valoracion WHERE valoracion = 'Basico')) as B , 

		sum(valoracion <= (SELECT maximo from valoracion WHERE valoracion = 'Bajo') ) as V ,
		count(valoracion>=(SELECT minimo from valoracion where valoracion = 'Bajo')) as TAV,  
		(SELECT v.val FROM valoracion v WHERE 
		ROUND(((SUM(p.valoracion)) / count(p.valoracion)),1)
		BETWEEN   v.minimo AND  v.maximo) as Desempeno,
		round(sum(Valoracion)/ COUNT(id_estudiante),1) as Promedio FROM
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
		t_evaluacion.id_grado = t_asignatura_x_area.id_grado and t_evaluacion.id_grupo = '{$grupo}' and t_evaluacion.eval_".$periodo."_per >= (SELECT minimo from valoracion where valoracion = 'Bajo') 
		".$stringSql." 
		GROUP BY t_evaluacion.id_estudiante, t_evaluacion.id_area
		ORDER BY t_evaluacion.primer_apellido, t_evaluacion.primer_nombre, Area ASC	) as p GROUP BY id_estudiante ORDER BY Promedio DESC) 
		as s where Promedio <= (SELECT maximo from valoracion where valoracion = 'Bajo')  GROUP BY id_estudiante  ORDER BY Tav DESC , Promedio DESC;
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