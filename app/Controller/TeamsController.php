<?php
class TeamsController extends AppController {
	public $helpers = array('Html','Form');
	public $components = array('Session');

	//Vemos los equipos en forma global
	public function index(){
		$this->Team->recursive = 0;
		//Configuramos la paginación	
		$this->paginate['Team']['limit'] = 5; //Muestra 5 registros por página
		$this->paginate['Team']['order'] = array('Team.nombre' =>'asc');	//Ordenados los equipos alfabeticamente
		//Recuperamos los equipos de la BD
		$this->set ('teams', $this->paginate());
	}

//Accion de crear nuevo equipo

public function nuevo(){

	if($this->request->is('post'))
	{
		if($this->Team->save($this->request->data))
		{
			//$this->Session->setFlash('El jugador ha sido creado');
			$this->Flash->sucess('Equipo creado con éxito');
			return $this->redirect(array('action' => 'index'));
		}

		//$this->Session->setFlash('No se pudo crear el jugador');
		$this->Flash->sucess('No se pudo crear el jugador');
	}
}

//Acción de ver con detalle a un jugador determinado

public function ver($id=null)
{

	if(!$id)	//Comprobamos la existencia del equipo
		{
			throw new NotFoundException("ERROR! Datos erróneos!!");
		}
		//Recupera los datos del equipo
		$team = $this->Team->findById($id);

		//Excepción en caso de no recuperar los datos del equipo de la BD
		if(!team)
		{
			throw new NotFoundException("ERROR!! Equipo no encontrado!!");
		}

		//Salvamos los datos del jugador en una variable para mostrarlos
		$this->set('team',$team);

}

//Editamos los equipos
	public function editar($id = null){
		if(!$id)
		{
			throw new NotFoundException("ERROR! Equipo no encontrado!!");
		}

		$team = $this->Team->findById($id);
		if(!$team)
		{
			throw new NotFoundException("ERROR!! Equipo no encontrado!!");
		}

		if($this->request->is(array('post','put')))
		{
			$this->Team->id = $id;
			if($this->Team->save($this->request->data))
			{
				$this->Session->setFlash('Equipo correctamente modificado');
				return $this->redirect(array('action' =>'index'));
			}
			$this->Session->setFlash('El equipo no pudo ser modificado');
		}

		if(!$this->request->data)
		{
			$this->request->data = $team;
		}
	}


}
?>