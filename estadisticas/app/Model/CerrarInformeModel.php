<?php
namespace Model;
use Config\DataBase as BD;

class CerrarInformeModel extends BD{

	private $array_promedios_estudiantes;
	private $array_promedios_asignaturas;
	private $id_grupo;
	private $ano_lectivo;

	function __construct($params){	
		extract($params);

		$this->database=$db;				
		$this->ano_lectivo = 2017;
		
		$this->array_promedios_estudiantes = $array_puesto_promedio_acumulado;
		$this->array_promedios_asignaturas = $array_estudiantes_acumulados_asignaturas;
		$this->id_grupo = $id_grupo;
		
		$this->insertarPromediosEstudiantes();
		$this->insertarPromediosEstudiantesAsignaturas();
	}

	public function insertarPromediosEstudiantes()

	{		
		foreach ($this->array_promedios_estudiantes as $key_id_estudiante => $estudiante_) {
			$id_informe = $this->getIdInforme($key_id_estudiante, $this->id_grupo)[0];
			if(!$id_informe){
				$this->query = "INSERT INTO informe_final_general(id_estudiante, id_grupo, promedio, puesto, ano_lectivo, promovido)VALUES ($key_id_estudiante, $this->id_grupo, $estudiante_[pgg], $estudiante_[puesto], '$this->ano_lectivo','')";
				$this->execute_single_query();
			}else{
				$this->query = "UPDATE informe_final_general  SET promedio = '$estudiante_[pgg]', puesto = '$estudiante_[puesto]'WHERE id_informe = '$id_informe[id_informe]'";
				$this->execute_single_query();
			}
			
			
		}
	}

	public function getIdInforme($id_estudiante, $id_grupo)
	{	
		$ano_lectivo = 2017;
		$this->query = "SELECT id_informe FROM informe_final_general
		WHERE id_estudiante = '{$id_estudiante}' AND id_grupo = '{$id_grupo}'	AND ano_lectivo = '{$ano_lectivo}'				
		";
		$this->execute_single_query();		
		if($this->resultado->num_rows > 0){
			$this->get_result_query();
			return $this->rows;
		}
		return false;		
	}

	public function exitsRegister($id_informe, $id_asignatura){
		$this->query = "SELECT id_informe FROM informe_final_asignaturas
		WHERE id_informe = '{$id_informe}' AND id_asignatura = '{$id_asignatura}'			
		";
		
		$this->execute_single_query();		
		if($this->resultado->num_rows > 0){
			$this->get_result_query();
			return $this->rows;
		}
		return false;	
	}

	public function updateRegister($id_informe, $id_asignatura, $valoracion){

	}

	public function insertarPromediosEstudiantesAsignaturas()
	{	

		
		foreach ($this->array_promedios_asignaturas as $key_id_estudiante => $asignaturas_estudiante) {
			
			foreach ($asignaturas_estudiante as $key_id_asignatura => $asignaturas_) {

				
				$id_informe = $this->getIdInforme($key_id_estudiante, $this->id_grupo)[0];
				
				$existAsig= $this->exitsRegister($id_informe['id_informe'], $key_id_asignatura);				

				
				if (!$existAsig) {
					$this->query = " INSERT INTO informe_final_asignaturas ( id_informe, id_asignatura, valoracion)
					VALUES ('$id_informe[id_informe]', '$key_id_asignatura','$asignaturas_[valoracion]')
					";
					$this->execute_single_query();					
				}else{
					$this->query = " UPDATE informe_final_asignaturas SET valoracion = '$asignaturas_[valoracion]'
					WHERE id_informe = '$id_informe[id_informe]' AND id_asignatura = '$key_id_asignatura'
					";
					$this->execute_single_query();
					
				}
				
				
			}
			
		}	
	}


	public function insertarPromediosEstudiantesF($estudiante)

	{			
		foreach ($estudiante as $estudiante_) {
			$this->query = " INSERT INTO informe_final_general(id_estudiante, id_grupo, promedio, puesto, ano_lectivo, promovido) VALUES ('$estudiante_[id_estudiante]', '$estudiante_[id_grupo]', '0', '0', '2017','')";
			$this->execute_single_query();
			
		}
	}

	public function insertarPromediosEstudiantesAsignaturasF($estudiante, $asignaturas)
	{		
		foreach ($estudiante as  $estudiante_) {
			foreach ($asignaturas as $asignaturas_) {
				if ($estudiante_['id_estudiante']== $asignaturas_['id_estudiante']) {
					$id_informe = $this->getIdInforme($estudiante_['id_estudiante'], $estudiante_['id_grupo'])[0];
					if(!$id_informe)
						$this->insertarPromediosEstudiantesF($estudiante);
					
					
					$this->query = " INSERT INTO informe_final_asignaturas ( id_informe, id_asignatura, valoracion)
					VALUES ('$id_informe[id_informe]', '$asignaturas_[id_asignatura]','$asignaturas_[eval_10_per]')					
					";

					$this->execute_single_query();

				}			
				
			}
			
		}	

	}

	

}
?>