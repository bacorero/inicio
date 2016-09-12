<?php
class Competition extends AppModel
{
	var $name = 'Competition';
	//Relación de pertenencia a las categorias
	var $belongsTo = array(
		'Categoria' => array(
			'classname' => 'Categoria',
			'foreignKey' => 'categoria_id')
		);

	//Relación con la tabla Jornadas
	var $hasMany = array(
		'Jornada' => array(
			'classname' => 'Jornada',
			'foreignKey' => 'competition_id',
			'order' => 'Jornada.nombre ASC'
			));
		//Relacion hasAndBelongsToMany con modelo Team
	var $hasAndBelongsToMany = array(
		'Team' => array(
			'className' => 'Team',
			'joinTable' => 'competitions_teams',
			'foreignKey' => 'competition_id',
			'associationForeignKey' => 'team_id',
			'unique' => false
			)
		);


}
?>