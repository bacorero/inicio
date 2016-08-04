<?php
class JornadasController extends AppController
{
	public $helpers = array('Html','Form','Js','Time');
	public $components = array('Session','RequestHandler');

	public function index(){

	}

	public function prime_jornada(){

		$this->set('jarray',$jarray);
		//return $this->redirect(array('action' =>'index'));
	}

}

?>