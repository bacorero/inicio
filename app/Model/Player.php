<?php
class Player extends AppModel
{
	//Validación del campo dni, que solo sea numérico
	/*public $validate = array(
		'dni' => array (
			'notEmpty' => array(
				'rule' => 'notEmpty'),
			'numeric' => array(
				'rule' => 'numeric')
			),
		'nombre' => array(
			'rule' => 'notEmpty')
		);*/

//Relación de pertenencia con la tabla de equipos
	var $belongsTo = array(
		'Team' => array(
			'classname' => 'Team',
			'foreignKey' => 'team_id')
		);
}