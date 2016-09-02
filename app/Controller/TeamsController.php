<?php
class TeamsController extends AppController {
	public $helpers = array('Html','Form','Js','Time');
	public $components = array('Session','RequestHandler');
	//Requerimos la tabla de las categorias y la de los equipos
	
	public $paginate = array(
		'limit' => 5,
		'order' => array(
		'Player.apellido' => 'asc'));

	var $uses = array('Categoria','Team');

	//Vemos los equipos en forma global
	public function index(){
	//Generamos la lista de categorias
	$resultados = $this->Categoria->find('all');	
		$this->set('grouplist', $resultados);
	}



//Accion de crear nuevo equipo

public function nuevo(){

	$datos[] = null;
	$data_array[] = null;

	//Generamos la lista para elegir la categorias
	$resultados = $this->Categoria->find('all');	
		$this->set('grouplist', $resultados);

	if($this->request->is('post'))
	{
		$datos = $this->request->data;

		if($this->request->is(array('post')))
		{
			//$this->Team->id = $id;
			$data_array['Team']['nombre'] = $datos[1];
			$data_array['Team']['contacto'] = $datos[2];
			$data_array['Team']['direccion'] = $datos[3];
			$data_array['Team']['poblacion'] = $datos[4];
			$data_array['Team']['telefono'] = $datos[5];
			$data_array['Team']['categoria_id'] = $datos[6];
			$data_array['Team']['id_foto'] = $datos[7];
			$data_array['Team']['dir'] = $datos[8];
			$this->Team->create();
			$this->Team->save($data_array);
			//$this->Flash->sucess('Equipo creado con exito');
			return $this->redirect(array('action' =>'index'));

		//$this->Session->setFlash('No se pudo crear el jugador');
		$this->Flash->sucess('No se pudo crear el jugador');
		}
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

		$datos[] = null;
		$data_array[] = null;

		//Generamos la lista para elegir la categorias
		$resultados = $this->Categoria->find('all');	
		$this->set('grouplist', $resultados);

		if(!$id)
		{
			throw new NotFoundException("ERROR! Equipo no encontrado!!");
		}

		$team = $this->Team->findById($id);
		$this->set ('team', $team);
		if(!$team)
		{
			throw new NotFoundException("ERROR!! Equipo no encontrado!!");
		}

		$datos = $this->request->data;

		if($this->request->is(array('post','put')))
		{
			$this->Team->id = $id;
			$data_array['Team']['nombre'] = $datos[1];
			$data_array['Team']['contacto'] = $datos[2];
			$data_array['Team']['direccion'] = $datos[3];
			$data_array['Team']['poblacion'] = $datos[4];
			$data_array['Team']['telefono'] = $datos[5];
			$data_array['Team']['categoria_id'] = $datos[6];
			$data_array['Team']['id_foto'] = $datos[7];
			$data_array['Team']['dir'] = $datos[8];

			$this->Team->save($data_array);
			return $this->redirect(array('action' =>'index'));
		}

		if(!$this->request->data)
		{
			$this->request->data = $team;
		}

	}

//Esta función devuelve los equipos de la categoria elegida en el index
	public function obtener($id = null){
		$teams = $this->Team->query("SELECT * FROM teams WHERE categoria_id= $id ");
		$this->set('teams', $teams);
	}

	//Acción de eliminar un equipo
public function eliminar($id)
{
	if($this->request->is('post'))
	{
		throw new MethodNotAllowedException('Método de eliminación incorrecto');
	}
	if($this->Team->delete($id))
	{
		$this->Session->setFlash('Equipo eliminado',$element = 'default', $params = array('class'=> 'sucess'));
		return $this->redirect(array('action' => 'index'));
	}
}
}
?>