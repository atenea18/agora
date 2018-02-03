<?php

	namespace Model;
	use Config\DataBase as BD;

	class DocenteModel extends BD{
		 		
		private $id = 0;
		private $documento = '';
		private $primer_apellido = '';
		private $segundo_apellido = '';
		private $primer_nombre = '';
		private $segundo_nombre = '';
		private $id_departamneto = 0;
		private $id_municipio = 0;
		private $direccion = '';
		private $tel_fijo = '';
		private $cel = '';
		private $email = '';
		private $id_area = 0;
		private $login = 0;

		function __construct($bd){
			$this->database=$bd;
			
		}

		public function obtenerDocente($id_docente){
			$this->query = "SELECT *
							FROM docentes
							";
			$this->execute_single_query();

			if($this->resultado->num_rows > 0){
				$this->get_result_query();

				return array('estado' => true, 'datos' => $this->rows);
			}

			return array('estado'=>false, 'mensaje'=>'Ocurrio un error, vuelve a intertarlo');

		}

		public function obtenetAsignaturas($id_docente){
			$this->query = "SELECT da.*, a.asignatura, g.nombre_grupo
							FROM grupo_x_asig_x_doce da
							INNER JOIN t_grupos g ON g.id_grupo=da.id_grupo
							INNER JOIN docentes d ON d.id_docente='{$id_docente}' AND da.id_docente=d.id_docente
							INNER JOIN t_asignaturas a ON da.id_asignatura=a.id_asignatura
							ORDER BY a.asignatura";
			$this->execute_single_query();

			if($this->resultado->num_rows > 0){
				$this->get_result_query();

				return array('estado' => true, 'datos' => $this->rows);
			}

			return array('estado'=>false, 'mensaje'=>'Ocurrio un error, vuelve a intertarlo');
		}
	}
?>