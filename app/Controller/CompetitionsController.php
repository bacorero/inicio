<?php
class CompetitionsController extends AppController
{
	public $helpers = array('Html','Form','Js','Time');
	public $components = array('Session','RequestHandler');

	//Requerimos el uso de los modelos siguientes:
	var $uses = array('Categoria','Competition','Team', 'Competition_Team','Partido','Jornada','Arbitro');

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

		$escudos1[] = null;
		$escudos2[] = null;
		$cont = 0;

		$opciones = array('conditions'=>
					array('Partido.jornada_id'=>"$id"));
		$partidos = $this->Partido->find('all', $opciones);

		$jornada = $this->Jornada->findById($id);

		foreach ($partidos as $key) {
			$escudos1[$key['Partido']['equipo1_id']] = $this->Team->findById($key['Partido']['equipo1_id']);
			$escudos2[$key['Partido']['equipo2_id']] = $this->Team->findById($key['Partido']['equipo2_id']);
		}

		$this->set('partidos',$partidos);
		$this->set('escudos1', $escudos1);
		$this->set('escudos2', $escudos2);
		$this->set('jornada', $jornada);

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
		$arrai[] = null;		//Vector que tiene los equipos desde la vista
		$data_array[] = null;	//Vector para guardar los partidos en el modelo
		$locales[] = null;		//Vector para el sorteo de equipos locales
		$visitantes[]= null;	//Vector para el sorteo de equipos visitante
		$cont = 0;				//Indice para recorrer vector desde la vista
		$n_jornada = 0; 		//Contador del número de jornada
		$tem = null;			//Variable swap


		$this->set('competicion',$competicion);
		$this->set(compact('equipo'));
		$this->set('grouplist', $marray);
		$this->set('teams_id', $marray_id);
		$this->set('tope', $tope);
		
		//Recoge los valores de la vista
		$arrai = $this->request->data;

		$this->set('arrai',$arrai);//Mándalos a la vista para comprobarlos
		$data = $arrai;

		//Grabamos los datos provenientes de la vista en el modelo
		if($this->request->is('post'))
	{


//Preparamos los datos para el sorteo
	//Calculamos la longitud del vector de jugadores
		$tam_l = (count($arrai)/2) - 1; //Valor de la mitad del vector
		$tam_h = count($arrai) - 1;		//Valor del resto del vector
	//Copiamos los equipos en un array para sortear el resto de la jornada
		$cont = 1;
		for($i = 0;$i <= $tam_l; $i++){
			$locales[$i] = $arrai[$cont];
			$cont++;
			$visitantes[$i] = $arrai[$cont];
			$cont++;
		}


	//Realizamos el sorteo
	for($j = 2;$j <= $tam_h;$j++){

		$tem = $locales[$tam_l]; //Guardo el ultimo valor del vector locales

		//Desplazamos $locales un lugar hacia la derecha
		for($i = $tam_l;$i >= 2; $i--){
			$locales[$i] = $locales[$i-1];
		}
		//Insertamos el primer valor de $visitantes en $locales[1]
		$locales[1] = $visitantes[0];

		//Desplazamos $visitantes hacia la izquierda
		for($i = 1;$i <= $tam_l; $i++){
			$visitantes[$i-1] = $visitantes[$i];
		}

		//Copiamos el ultimo valor de visitantes con el final de $locales
		$visitantes[$tam_l] = $tem;

		//Grabamos los datos refernetes a la jornada
		$n_jornada++;
		////////////////////////////////
		$fecha = $arrai[0];
		$nfecha = date('Y-m-d',strtotime("$fecha) + 7 day"));
		///////////////////////////////
		$this->guarda_jornada($fecha,$n_jornada,$id);

		//Grabamos en el modelo los resultados
		for($s = 0;$s <= $tam_l;$s++){
			$data_array['Partido']['equipo1'] = $locales[$s];
			$data_array['Partido']['equipo1_id'] = $this->equipo_find_id($locales[$s]);
			$data_array['Partido']['equipo2'] = $visitantes[$s];
			$data_array['Partido']['equipo2_id'] = $this->equipo_find_id($visitantes[$s]);
			$data_array['Partido']['jornada_id'] = $this->id_jornada();

			$data_array['Partido']['estado'] = "Sin comenzar";

			$this->Partido->create();
			$this->Partido->save($data_array);
		}
	}

	//Volvemos al indice
		
		$this->redirect(array('action' =>'index'));
	}
}

//Esta accion hece crear un acta de partido
	public function actas_crear($id){

		$data_array[] = null;
		$datos[] = null;
		//Buscamos la informacion del partido
		$partido = $this->Partido->findById($id);
		$this->set('partido',$partido);

		$jornada = $this->Jornada->findById($partido['Partido']['jornada_id']);
		$this->set('jornada', $jornada);

		//Buscamos los árbitros disponibles
		$arbitros = $this->Arbitro->find('all');
		$this->set('arbitros', $arbitros);

		//Buscamos la informacion de los equipos
		$equipo_l = $this->Team->findById($partido['Partido']['equipo1_id']);
		$equipo_v = $this->Team->findById($partido['Partido']['equipo2_id']);
		$this->set('equipo_l', $equipo_l);
		$this->set('equipo_v', $equipo_v);

		//Recoge los valores de la vista
		$datos = $this->request->data;

		//Grabamos los datos provenientes de la vista en el modelo
		if($this->request->is(array('post','put')))
		{
			$this->Partido->id = $id;
			$data_array['Partido']['equipo1_gol'] = $datos[1];
			$data_array['Partido']['equipo2_gol'] = $datos[2];
			$data_array['Partido']['equipo1_gol_contra'] = $datos[2];
			$data_array['Partido']['equipo2_gol_contra'] = $datos[1];
			$data_array['Partido']['estado'] = $datos[3];

	//Miramos que el árbitro no esté arbitrando otro partido en esta misma jornada
			$id_del_partido = $partido['Partido']['jornada_id'];
			$id_del_arbitro = $datos[4];

			if($this->comprueba_arbitro($id_del_partido,$id_del_arbitro))
			{
				$data_array['Partido']['arbitro_id'] = $datos[4];
				$this->Partido->save($data_array);
			}
			else{
				//Mensaje de error
			}

			//Volvemos al indice
		
			$this->redirect(array('action' =>'partidos', $partido['Partido']['jornada_id']));
			
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

//Esta función mira si existe un arbitro arbitrando en una misma jornada
public function comprueba_arbitro($id=null,$arbitro_id=null){
	$flag = true;
	$partidos = $this->Partido->query("SELECT * FROM partidos WHERE jornada_id = $id");
	foreach($partidos as $var){
		if($var['partidos']['arbitro_id'] == $arbitro_id)
		{
			$flag = false;
		}
	return $flag;
	}


}

public function guarda_jornada($arrai,$n_jornada,$id){
	//Guardamos los datos referentes a la jornada
		$jornada_data_array['Jornada']['nombre'] =  $arrai[0];
		$jornada_data_array['Jornada']['competition_id'] = $id;
		$jornada_data_array['Jornada']['jornada_numero'] = $n_jornada;

		$this->Jornada->create();
		$this->Jornada->save($jornada_data_array);
}
	

}

?>