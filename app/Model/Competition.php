<?php
class Competition extends AppModel
{
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
			)
		);
}