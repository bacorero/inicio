<?php
class PlayersController extends AppController {
	public $helpers = array('Html','Form','Js','Time');
	public $components = array('Session','RequestHandler');

	public $paginate = array(
		'limit' => 5,
		'order' => array(
			'Player.apellido' => 'asc'));

//Vemos los jugadores en forma global
	public function index(){
	$this->Player->recursive = 0;
	//Configuramos la paginación	
	$this->paginate['Player']['limit'] = 5; //Muestra 5 registros por página
	$this->paginate['Player']['order'] = array('Player.apellido' =>'asc');	//Ordenados por apellido
	//Recuperamos los jugadores de la BD y lo pasamos a la vista
	//$this->set ('players', $this->Player->find('all'));
	$this->set ('players', $this->paginate());
	}

//Editamos los jugadores
	public function editar($id = null){
		if(!$id)
		{
			throw new NotFoundException("ERROR! Jugador no encontrado!!");
		}

		$player = $this->Player->findById($id);
		if(!player)
		{
			throw new NotFoundException("ERROR!! Jugador no encontrado!!");
		}

		if($this->request->is(array('post','put')))
		{
			$this->Player->id = $id;
			if($this->Player->save($this->request->data))
			{
				$this->Session->setFlash('Jugador correctamente modificado', $element ='default',
				$params = array('class' => 'sucess'));
				return $this->redirect(array('action' =>'index'));
			}
			$this->Session->setFlash('El jugador no pudo des modificado');
		}

		if(!$this->request->data)
		{
			$this->request->data = $player;
		}
	}


//Accion de crear nuevo jugador

public function nuevo(){

	if($this->request->is('post'))
	{
		if($this->Player->save($this->request->data))
		{
			//$this->Session->setFlash('El jugador ha sido creado');
			$this->Flash->sucess('Jugador creado con éxito');
			return $this->redirect(array('action' => 'index'));
		}

		//$this->Session->setFlash('No se pudo crear el jugador');
		$this->Flash->sucess('No se pudo crear el jugador');
	}
}

//Acción de ver con detalle a un jugador determinado

public function ver($id=null)
{
	if(!$id)	//Comprobamos la existencia del jugador
		{
			throw new NotFoundException("ERROR! Datos erróneos!!");
		}
		//Recupera los datos del jugador
		$player = $this->Player->findById($id);

		//Excepción en caso de no recuperar los datos del jugador de la BD
		if(!player)
		{
			throw new NotFoundException("ERROR!! Jugador no encontrado!!");
		}

		//Pasamos los datos del jugador a la vista
		$this->set('player',$player);
		$equipos = $this->Player->Team->getVirtualField('nombre_equipo');

		$this->set('equipos',$equipos);

}


	//Acción de eliminar un jugador
public function eliminar($id)
{
	if($this->request->is('get'))
	{
		throw new MethodNotAllowedException('Método de eliminación incorrecto');
	}
	if($this->Player->delete($id))
	{
		$this->Session->setFlash('Jugador eliminado',$element = 'default', $params = array('class'=> 'sucess'));
		return $this->redirect(array('action' => 'index'));
	}
}
}
?>