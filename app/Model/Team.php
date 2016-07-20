<?php
class Team extends AppModel
{
	var $name = 'Team';
	//Habilitamos los formatos de imagen de los equipos
public $actsAs = array(
	'Upload.Upload' => array(
		'id_foto' => array(
			'fields' => array(
				'dir' => 'dir'),
			'thumbnailSizes' => array(
				'big' => '200x200',
				'small' => '120x120',
				'thumb' => '80x80'),
			'thumbnailMethod' => 'php'),
			'deleteOnUpdate' => true,
			'deletefolderOnDelete' => true
		));


	public $virtualFields = array(
		'nombre_equipo' => 'CONCAT(Team.nombre)');
		

	//Relación con la tabla de jugadores
	var $hasMany = array(
		'Player' => array(
			'classname' => 'Player',
			'foreignKey' => 'team_id',
			'order' => 'Player.apellido ASC'
			));

	//Relacion con la tabla de categorias
	var $belongsTo = array(
		'Categoria' => array(
			'classname' => 'Categoria',
			'foreignKey' => 'categoria_id')
		);

	var $hasAndBelongsToMany = array(
		//Relacion hasAndBelongsToMany con modelo Competition
		'Competition' => array(
			'className' => 'Competition',
			'joinTable' => 'competitions_teams',
			'foreignKey' => 'team_id',
			'associationForeignKey' => 'competition_id',
			'unique' => false
			)
		);

	
	
}

?>