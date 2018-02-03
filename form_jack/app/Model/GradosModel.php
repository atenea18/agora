<?php

	namespace Model;
	use Config\DataBase as BD;

	class GradosModel extends BD{
		 		
		

		function __construct($bd){
			
			$this->database=$bd;
			
		}

		
		public function obtenerGrado($grupo)

		{				
			$this->query = "SELECT id_grado FROM t_grupos 
							WHERE id_grupo = '{$grupo}'					
							";
			$this->execute_single_query();

			if($this->resultado->num_rows > 0){
				$this->get_result_query();

				return array('estado' => true, 'datos' => $this->rows);
			}

			return array('estado'=>false, 'mensaje'=>'Ocurrio un error, vuelve a intertarlo');
		}

		public function getGrados()

		{				
			$this->query = "SELECT id_grado, grado FROM t_grados											
							";
			$this->execute_single_query();

			if($this->resultado->num_rows > 0){
				$this->get_result_query();

				return array('estado' => true, 'datos' => $this->rows);
			}

			return array('estado'=>false, 'mensaje'=>'Ocurrio un error, vuelve a intertarlo');
		}
		
		public function groupAndAsign($id_asignature, $id_group)
	{
		$this->query = "SELECT nombre_grupo, asignatura, t_grupos.id_grado FROM t_grupos, t_asignaturas 
						WHERE id_grupo = {$id_group} AND id_asignatura = {$id_asignature}";
			
		$this->execute_single_query();
			if($this->resultado->num_rows > 0){
				$this->get_result_query();

				return array('estado' => true, 'datos' => $this->rows);
			}

			return array('estado'=>false, 'mensaje'=>'Ocurrio un error, vuelve a intertarlo');
	}

	public function getGradeByGroup($id_group){
        $this->query = "SELECT id_grado
						FROM t_grupos
						WHERE id_grupo='{$id_group}'";
		
        $this->execute_single_query();
			if($this->resultado->num_rows > 0){
				$this->get_result_query();
				
				return array('estado' => true, 'datos' => $this->rows);
			}

			return array('estado'=>false, 'mensaje'=>'Ocurrio un error, vuelve a intertarlo');
    }
		
		public function getTypeAsignature($id_asignature, $id_grado)
    {
        
        $this->query = "SELECT tipo_asig FROM t_asignatura_x_area WHERE id_asignatura='{$id_asignature}' and id_grado ='{$id_grado}' ";
       
			$this->execute_single_query();
			if($this->resultado->num_rows > 0){
				$this->get_result_query();

				return array('estado' => true, 'datos' => $this->rows);
			}

			return array('estado'=>false, 'mensaje'=>'Ocurrio un error, vuelve a intertarlo');
    }


		
	}
?>