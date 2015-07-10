<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');
	
	public function beforeFilter(){
		parent::beforeFilter();
		
		$this->Auth->allow('landing','add', 'login', 'logout');
		
	}
	
	public function landing(){
	
	}
		

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
		
	public function login(){
	
		if($this->request->is('post')){
					
			if ($this->Auth->login()) {
								
				switch ($this->Session->read('Auth.User.group_id')) {
					
					case 1:
						$this->redirect(array('controller' => 'supervisors', 'action' => 'listSupervisors'));
					break;
					
					case 2:
						$this->redirect(array('controller' => 'sellers', 'action' => 'listSellers'));
						break;
					
					case 3:
							$this->redirect(array('controller' => 'sellerCalculations', 'action' => 'dailyCalculations'));
						break;					
						
					default:
						;
					break;
				}
					
			}else{
				$this->Session->setFlash('Invalid username or password, try again');
			}
	
		}
	
	
	} //***************** login() ****************************************************
	
	
	public function logout(){
			
		if ($this->Session->read('Auth.User.id')) {
			$this->Session->destroy();
			$this->redirect($this->Auth->logout());
		}else {
			return $this->redirect($this->Auth->loginRedirect);
		}
	
	} // ****************** end of logout() **************************************
	
	
	
	
} //********** end of UsersController *********************************
