<?php
class Jornada extends AppModel
{
	//Relación con la tabla de los Partidos
	var $hasMany = array(
		'Competition' => array(
			'classname' => 'Partido',
			'foreignKey' => 'jornada_id'
			)
		);
}