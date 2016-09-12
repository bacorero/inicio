<?php

App::uses('BlowfishPasswordHasher','Controller/Component/Auth');
App::uses('AppModel','Model');

class User extends AppModel
{

	var $hasOne = array(
		'Arbitro' => array(
			'classname' => 'Arbitro',
			'foreignKey' => 'user_id')
		);

	public function beforeSave($options = array())
	{
		if(isset($this->data[$this->alias]['password']))
		{
			$passwordHasher = new BlowfishPasswordHasher();
			$this->data[$this->alias]['password'] = 
			$passwordHasher->hash($this->data[$this->alias]['password']);
		}
		return true;
	}

}
?>