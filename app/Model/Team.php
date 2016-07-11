<?php
class Team extends AppModel
{

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
			)
		);
}

