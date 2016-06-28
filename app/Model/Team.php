<?php
class Team extends AppModel
{
	public $virtualFields = array(
		'nombre_equipo' => 'CONCAT(Team.nombre)');
		

	//Relación con la tabla de jugadores
	var $hasMany = array(
		'Player' => array(
			'classname' => 'Player',
			'foreignKey' => 'team_id',
			'order' => 'Player.apellido ASC'
			)
		);
}

?>