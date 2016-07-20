<?php
class Categoria extends AppModel
{
	//Relación con la tabla de Competition
	var $hasMany = array(
		'Competition' => array(
			'classname' => 'Competition',
			'foreignKey' => 'categoria_id',
			'order' => 'Competition.temporada ASC'
			),
		//Relacion con la tabla Teams
		'Team' => array(
			'classname' => 'Team',
			'foreignKey' => 'categoria_id'
			)

	
		);
}