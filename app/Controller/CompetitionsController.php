<?php
class CompetitionsController extends AppController
{
	public $helpers = array('Html','Form','Js','Time');
	public $components = array('Session','RequestHandler');

	//Requerimos el uso de los modelos siguientes:
	var $uses = array('Categoria','Competition','Team', 'Competition_Team','Partido','Jornada');

	public function index(){
		//Creamos la lista de competiciones
		$competiciones = $this->Competition->find('all');

		//Ponemos el nombre de la categoria de la competición en cuestion
		$categorias = $this->Categoria->find('all');

		//Mandamos los resultados a la vista
		$this->set('competiciones', $competiciones);
		$this->set('categorias', $categorias);
		
	}

	//Esta función visualiza todos los partidos de una determinada jornada
	public function partidos($id = null){

		$opciones = array('conditions'=>
					array('Partido.jornada_id'=>"$id"));
		$partidos = $this->Partido->find('all', $opciones);

		$this->set('partidos',$partidos);

	}

	//Función para crear una nueva competición
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

//Funcion que permite ver las jornadas de un campeonato
	public function ver($id = null){

		//$competicion = $this->Competition->findById($id);

		$opciones = array('conditions'=>
					array('Jornada.competition_id'=>"$id"));
		$jornada = $this->Jornada->find('all', $opciones);

		$this->set('jornada', $jornada);

	}

//Funcion que permite crear las jornadas de un campeonato
	public function administrar($id = null){

		//Recogemos la competicion pedida en el formulario de nueva
		$competicion = $this->Competition->findById($id);

		//Obtenemos la categoria de la competición
		$categoria = $this->Categoria->findById($competicion['Competition']['categoria_id']);

		//Pasamos a obtener todos los equipos participantes en la categoria
		$opciones = array('conditions'=>
					array('Team.categoria_id'=>"$id"
							));
		$equipos = $this->Team->find('all', $opciones);

		foreach($equipos as $e){
			$marray[] = $e['Team']['nombre'];
			$marray_id[] = $e['Team']['id'];
		}

		//Calculamos el número de equipos que hay en la categoria
		$tope = count($marray);
		$arrai[] = null;
		$data_array[] = null;
		$cont = 0;
		$n_jornada = 1; //Contador del número de jornada


		$this->set('competicion',$competicion);
		$this->set(compact('equipo'));
		$this->set('grouplist', $marray);
		$this->set('teams_id', $marray_id);
		$this->set('tope', $tope);
		
		//Recoge los valores de la vista
		$arrai = $this->request->data;

		$this->set('arrai',$arrai);//Mándalos a la vista para comprobarlos
		$data = $arrai;

		//Recorremos el array que viene de la vista y grabamos los datos en el modelo
		if($this->request->is('post'))
	{
		//Primero guardamos los datos referentes a la jornada
		$jornada_data_array['Jornada']['nombre'] =  $arrai[0];
		$jornada_data_array['Jornada']['competition_id'] = $id;
		$jornada_data_array['Jornada']['jornada_numero'] = $n_jornada;

		$this->Jornada->create();
		$this->Jornada->save($jornada_data_array);



		//Guardamos los datos referentes a los partidos de la jornada
		$cont = 1;
		for($i = 0;$i<= 2;$i++)
		{
			$data_array['Partido']['equipo1'] = $arrai[$cont];
			$data_array['Partido']['equipo1_id'] = $this->equipo_find_id($arrai[$cont]);
			$cont++;
			$data_array['Partido']['equipo2'] = $arrai[$cont];
			$data_array['Partido']['equipo2_id'] = $this->equipo_find_id($arrai[$cont]);
			$cont++;
			$data_array['Partido']['jornada_id'] = $this->id_jornada();

			$this->Partido->create();
			$this->Partido->save($data_array);
		}

		//Ahora hacemos el sorteo del resto de jornadas y los dejamos en el modelo
		
		
		$this->redirect(array('action' =>'index'));
	}
}

//Esta función recupera el id de un equipo en función de su nombre
	public function equipo_find_id($nombre){

		$this->autoRender = false;
		//Pasamos a obtener el id del equipo
		$opciones = array('conditions'=>
					array('Team.nombre'=>"$nombre"
							));
		$equipos = $this->Team->find('all', $opciones);
		foreach($equipos as $e){
			$vuelta = $e['Team']['id'];
		}
		return $vuelta;
	}	

//Esta función nos devuelve el último id introducido de la jornada
public function id_jornada(){
		$earray[] = null;
		$eq = $this->Jornada->find('all');

		foreach($eq as $et){
			$earray[] = $et['Jornada']['id'];
		}
		$max = count($earray);
		$maximo = $earray[$max-1];
		return $maximo;
}	
	

}

?>