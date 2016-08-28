<?php
class Arbitro extends AppModel
{
	var $name = 'Arbitro';

	//Relación con la tabla de partidos
	var $hasMany = array(
		'Partido' => array(
			'classname' => 'Partido',
			'foreignKey' => 'arbitro_id'
			));

	var $belongsTo = array(
		'User' => array(
			'classname' => 'User',
			'foreignKey' => 'user_id')
		);

}
?>