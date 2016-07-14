<?php
class Partido extends AppModel
{
	//Relación con la tabla de las Jornadas
		var $belongsTo = array(
		'Team' => array(
			'classname' => 'Jornada',
			'foreignKey' => 'jornada_id')
		);
}