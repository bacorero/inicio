<?php
class CategoriasController extends AppController
{
	public $helpers = array('Html','Form','Js','Time');
	public $components = array('Session','RequestHandler');

	public function index(){
		
		$this->set ('categorias', $this->Categoria->find('all'));
	
		if($this->request->is('post'))
	{
		$this->Categoria->create();
		if($this->Categoria->save($this->request->data))
		{
			return $this->redirect(array('action' => 'index'));
		}

		$this->Flash->sucess('No se pudo crear la categoría');
	}
	
	}
}
?>