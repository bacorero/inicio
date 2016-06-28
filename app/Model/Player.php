<?php
class Player extends AppModel
{



//Relación de pertenencia con la tabla de equipos
	var $belongsTo = array(
		'Team' => array(
			'classname' => 'Team',
			'foreignKey' => 'team_id')
		);
}