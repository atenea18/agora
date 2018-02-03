<?php
namespace App\Model;

use App\Config\DataBase as DB;
/**
* 
*/
class NoveltyModel extends DB
{
	
	private $_table = 'novedades';

	function __construct($db='')
	{	
		if(!$db)
			throw new \Exception("La clase ".get_class($this)." no encontro la base de datos", 1);
		else
			parent::__construct($db);
	}

	/**
	 *
	 *
	 *
	*/
	public function getByYear($year)
	{
		$this->query = "SELECT n.*, ne.idstudents, ne.fecha
						FROM novedades_x_estudiante_fecha ne
						INNER JOIN {$this->_table} n ON ne.id_novedad=n.id_novedad
						WHERE YEAR(ne.fecha) = {$year}";
		return $this->getResultsFromQuery();
	}

	/*
	*
	*/
	public function getByGroup($group_id)
	{
		$this->query = "SELECT s.idstudents, n.novedad, n.id_novedad
						FROM students s
						INNER JOIN t_estudiante_grupo eg ON eg.idstudent=s.idstudents
						INNER JOIN novedades_x_estudiante_fecha nef ON nef.idstudents=s.idstudents
						INNER JOIN novedades n ON n.id_novedad=nef.id_novedad
						WHERE eg.id_grupo={$group_id} AND YEAR(nef.fecha) = '2017' ";

		return $this->getResultsFromQuery();
	}
}
?>