<?php
class Jornada extends AppModel
{
	//Relación con la tabla de los Partidos
	var $hasMany = array(
		'Partido' => array(
			'classname' => 'Partido',
			'foreignKey' => 'jornada_id'
			)
		);

	//Relación de pertenencia a las categorias
	var $belongsTo = array(
		'Competition' => array(
			'classname' => 'Competition',
			'foreignKey' => 'competition_id')
		);
}