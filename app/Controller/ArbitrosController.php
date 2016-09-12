<?php
class ArbitrosController extends AppController {

	public $helpers = array('Html','Form','Js','Time');
	public $components = array('Session','RequestHandler');

	//Requerimos el uso de los modelos siguientes:
	var $uses = array('User','Arbitro');

//Ver todos los arbitros
	public function index(){

		if($current_user['role'] == 'admin')
		{
			$resultado = $this->Arbitro->find('all');
		}
		if($current_user['role'] == 'user')
		{
			$opciones = array('conditions' => array(
						'Arbitro.user_id' => 'User.id'));
			$resultado = $this->Arbitro->find('all',$opciones);
		}
		$this->set('resultado', $resultado);
		//$this->set('current_user',$current_user);
	}

//Funcion para añadir un nuevo árbitro
	public function nuevo(){

	if($this->request->is('post'))
	{
		$this->Arbitro->create();
		if($this->Arbitro->save($this->request->data))
		{
			return $this->redirect(array('action' => 'index'));
		}

		$this->Flash->sucess('No se pudo crear el arbitro');
	}
}

public function ver($id=null)
{

	if(!$id)	//Comprobamos la existencia del árbitro
		{
			throw new NotFoundException("ERROR! Datos erróneos!!");
		}
		//Recupera los datos del equipo
		$arbitro = $this->Arbitro->findById($id);

		//Excepción en caso de no recuperar los datos del equipo de la BD
		if(!arbitro)
		{
			throw new NotFoundException("ERROR!! Equipo no encontrado!!");
		}

		//Salvamos los datos del jugador en una variable para mostrarlos
		$this->set('arbitro',$arbitro);
	}

public function editar($id = null){
		if(!$id)
		{
			throw new NotFoundException("ERROR! Arbitro no encontrado!!");
		}

		$arbitro = $this->Arbitro->findById($id);
		$this->set ('arbitro', $arbitro);

		if(!$arbitro)
		{
			throw new NotFoundException("ERROR!! Arbitro no encontrado!!");
		}

		if($this->request->is(array('post','put')))
		{
			$this->Arbitro->id = $id;
			if($this->Arbitro->save($this->request->data))
			{
				$this->Session->setFlash('Arbitro correctamente modificado', $element ='default',
				$params = array('class' => 'sucess'));
				return $this->redirect(array('action' =>'index'));
			}
			$this->Session->setFlash('El arbitro no pudo ser modificado');
		}

		if(!$this->request->data)
		{
			$this->request->data = $arbitro;
		}
	}

public function eliminar($id)
{
	if($this->request->is('get'))
	{
		throw new MethodNotAllowedException('Método de eliminación incorrecto');
	}
	if($this->Arbitro->delete($id))
	{
		$this->Session->setFlash('Arbitro eliminado',$element = 'default', $params = array('class'=> 'sucess'));
		return $this->redirect(array('action' => 'index'));
	}
}
}
?>