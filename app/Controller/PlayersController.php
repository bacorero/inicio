<?php
class PlayersController extends AppController {
	public $helpers = array('Html','Form','Js','Time');
	public $components = array('Session','RequestHandler');

	public $paginate = array(
		'limit' => 5,
		'order' => array(
			'Player.apellido' => 'asc'));
	//Requerimos la tabla de los jugadores y la de los equipos
	var $uses = array('Player','Team');

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

		$datos[] = null;
		$data_array[] = null;

		$player = $this->Player->findById($id);
		$this->set ('player', $player);

		if(!$player)
		{
			throw new NotFoundException("ERROR!! Jugador no encontrado!!");
		}

		$datos = $this->request->data;

		if($this->request->is(array('post','put')))
		{
			$this->Player->id = $id;
			$data_array['Player']['nombre'] = $datos[1];
			$data_array['Player']['apellido'] = $datos[2];
			$data_array['Player']['direccion'] = $datos[3];
			$data_array['Player']['dni'] = $datos[4];
			$data_array['Player']['telefono'] = $datos[5];
			$data_array['Player']['nacionalidad'] = $datos[6];
			$data_array['Player']['f_nacimiento'] = $datos[7];
			$data_array['Player']['observaciones'] = $datos[8];
			$data_array['Player']['g_recibidos'] = $datos[9];
			$data_array['Player']['t_amarillas'] = $datos[10];
			$data_array['Player']['t_rojas'] = $datos[11];
			$data_array['Player']['t_acumuladas'] = $datos[12];
			$data_array['Player']['goles'] = $datos[13];
			$data_array['Player']['p_jugados'] = $datos[14];
			$data_array['Player']['p_sancionados'] = $datos[15];
			$data_array['Player']['dorsal'] = $datos[16];
			$data_array['Player']['id_foto'] =$datos[17];
			$data_array['Player']['dir'] =$datos[18];

			$this->Player->save($data_array);
			return $this->redirect(array('action' =>'index'));
		}

		if(!$this->request->data)
		{
			$this->request->data = $player;
		}
	}

//Accion de fichar a un jugador
public function fichar($id = null){

	//$resultados = $this->Team->find('all');
	$player = $this->Player->findById($id);
	//Comprobamos que existe jugador a fichar
	if(!$id)
		{
			throw new NotFoundException("ERROR! Jugador no encontrado!!");
		}
		
		if(!player)
		{
			throw new NotFoundException("ERROR!! Jugador no encontrado!!");
		}

		if($this->request->is(array('post','put')))
		{
			$this->Player->id = $id;
			if($this->Player->save($this->request->data))
			{
				return $this->redirect(array('action' =>'index'));
			}
			$this->Session->setFlash('El jugador no ha podido fichar por el equipo');
		}

		if(!$this->request->data)
		{
			$this->request->data = $player;
		}
		
		//Generamos la lista de equipos
	$resultados = $this->Team->find('all');	
		foreach($resultados as $value){
			$equipos[$value['Team']['id']] = $value['Team']['nombre'];
			}
		$this->set('grouplist', $equipos);


}

//Accion de crear nuevo jugador

public function nuevo(){

	$datos[] = null;
	$data_array[] = null;

	if($this->request->is('post'))
	{
		$datos = $this->request->data;


		$data_array['Player']['nombre'] = $datos[1];
		$data_array['Player']['apellido'] = $datos[2];
		$data_array['Player']['direccion'] = $datos[3];
		$data_array['Player']['dni'] = $datos[4];
		$data_array['Player']['telefono'] = $datos[5];
		$data_array['Player']['nacionalidad'] = $datos[6];
		$data_array['Player']['f_nacimiento'] = $datos[7];
		$data_array['Player']['observaciones'] = $datos[8];
		$data_array['Player']['g_recibidos'] = $datos[9];
		$data_array['Player']['t_amarillas'] = $datos[10];
		$data_array['Player']['t_rojas'] = $datos[11];
		$data_array['Player']['t_acumuladas'] = $datos[12];
		$data_array['Player']['goles'] = $datos[13];
		$data_array['Player']['p_jugados'] = $datos[14];
		$data_array['Player']['p_sancionados'] = $datos[15];
		$data_array['Player']['dorsal'] = $datos[16];
		$data_array['Player']['id_foto'] =$datos['id_foto'];
		$data_array['Player']['dir'] =$datos['dir'];

		$this->Player->create();
		$this->Player->save($data_array);
		//$this->Flash->sucess('Equipo creado con exito');
		return $this->redirect(array('action' =>'index'));
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
		//Recogemos el nombre del equipo en funcion de la clave foranea
		$equipos = $this->Team->findById($player['Player']['team_id']);

		//En caso de no estar jugando para ningun equipo lanzamos mensaje
		if(!$equipos)
		{
			$equipos = "No juega en ningún equipo";
		}
		//Si no, lanzamos el equipo en el que juega
		else
		{
			$equipos = $equipos['Team']['nombre'];	
		}

		//Enviamos el equipo a la vista
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