<?php
class UsersController extends AppController {

	public function beforeFilter()
	{
		parent::beforeFilter();
	}

//Accion que muestra todos los usuarios
	public function index(){
		$usuarios = $this->User->find('all');
		$this->set('usuarios', $usuarios);
	}
//Accion para dar de alta a un nuevo usuario
	public function add(){
		if($this->request->is('post'))
		{
			$this->User->create();
			$this->request->data['User']['role'] = 'user';
			if($this->User->save($this->request->data))
			{
				$this->Session->setFlash('Usuario creado');
				return $this-redirect(array('action' =>'index'));
			}
			else
			{
				$this->Session->setFlash('Usuario no creado');
			}
		}

	}
//Accion de entrada a usuario
	public function login(){
		if($this->request->is('post'))
		{
			/*if($this->Auth->login())
			{
				if($current_user['role'] == 'admin')
				{
					return $this->redirect(array('controller' => 'teams','action' => 'index'));
				}
			} */
			if($this->Auth->login())
			{
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Session->setFlash('Usuario incorrecto');
		}
	}

//Accion de salida de la aplicacion
	public function logout(){
		return $this->redirect($this->Auth->logout());
	}

//Accion de editar a un usuario
	public function edit($id=null)
	{
		if(!$this->User->exists($id)){
			throw new NotFoundException(__('Usuario no valido'));
		}
		if($this->request->is(array('post','put'))){
			if($this->User->save($this->request->data)){
				$this->Session->setFlash('Usuario grabado');
				return $this->redirect(array('acction'=>'index'));
			}else{
				$this->Session->setFlash('Usuario no grabado');
			}
		}else{
			$options = array('conditions' => array('User.'. $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first',$options);
		}

	}
}
?>