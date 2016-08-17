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

}
?>