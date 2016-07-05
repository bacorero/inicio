<?php
class Player extends AppModel
{

//Habilitamos los formatos de imagen de los jugadores
public $actsAs = array(
	'Upload.Upload' => array(
		'id_foto' => array(
			'fields' => array(
				'dir' => 'dir'),
			'thumbnailSizes' => array(
				'big' => '200x200',
				'small' => '120x120',
				'thumb' => '80x80'),
			'thumbnailMethod' => 'php')));


//Relación de pertenencia con la tabla de equipos
	var $belongsTo = array(
		'Team' => array(
			'classname' => 'Team',
			'foreignKey' => 'team_id')
		);
}