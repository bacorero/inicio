<?php
class CompetitionsController extends AppController
{
	public $helpers = array('Html','Form','Js','Time');
	public $components = array('Session','RequestHandler');

	//Requerimos el uso de los modelos siguientes:
	var $uses = array('Categoria','Competition','Team', 'Competicion_Team');

	public function index(){
		//Creamos la lista de competiciones
		$competiciones = $this->Competition->find('all');

		//Ponemos el nombre de la categoria de la competición en cuestion
		$categorias = $this->Categoria->find('all');

		//Mandamos los resultados a la vista
		$this->set('competiciones', $competiciones);
		$this->set('categorias', $categorias);
		
	}

	public function nueva() {
		if($this->request->is('post'))
	{
		$this->Competition->create();
		if($this->Competition->save($this->request->data))
		{
			return $this->redirect(array('action' => 'index'));
		}

		$this->Flash->sucess('No se pudo crear la categoría');
	}
		$categorias = $this->Categoria->find('all');	
		foreach($categorias as $value){
			$categoria[$value['Categoria']['id']] = $value['Categoria']['nombre'];
			}
		$this->set('grouplist', $categoria);

	}

	public function administrar($id = null){

		//var $equipos = array();
		//Recogemos la competicion pedida en el formulario de nueva
		$competicion = $this->Competition->findById($id);
		$equipo = $this->Team->findById('all');
		$categoria = $this->Categoria->findById($competicion['categoria_id']);
		foreach($categoria as $c){

		}

		$this->set('competicion',$competicion);
		$this->set('equipos',$equipo);
		


	}

}

?>