<?php
	public $belongsTo = array(
		'Competition' => array(
			'className' => 'Competition',
			'foreignKey' => 'team_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''),

		'Team' => array(
			'className' => 'Team',
			'foreignKey' => 'competition_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
			)
		);

