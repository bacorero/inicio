<?php
class ArbitrosController extends AppController {

	public $helpers = array('Html','Form','Js','Time');
	public $components = array('Session','RequestHandler');

//Ver todos los arbitros
	public function index(){

		$resultado = $this->Arbitro->find('all');
		$this->set('resultado', $resultado);
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
}
?>