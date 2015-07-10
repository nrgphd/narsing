<?php
App::uses('AppController', 'Controller');
/**
 * Supervisors Controller
 *
 * @property Supervisor $Supervisor
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
*/
class SupervisorsController extends AppController {

	/**
	 * Components
	 *
	 * @var array
	 */
	public $components = array('Paginator', 'Session');

	public function beforeFilter(){
		parent::beforeFilter();

		$this->Auth->allow('listSupervisors', 'add');

	}

	public function beforeRender(){

		$regions = $this->Supervisor->Region->find('list');
		$this->set(compact('regions'));
	}

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this->Supervisor->recursive = 0;
		$this->set('supervisors', $this->Paginator->paginate());
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		if (!$this->Supervisor->exists($id)) {
			throw new NotFoundException(__('Invalid supervisor'));
		}
		$options = array('conditions' => array('Supervisor.' . $this->Supervisor->primaryKey => $id));
		$this->set('supervisor', $this->Supervisor->find('first', $options));
	}


	public function listSupervisors() {

		$pageLimit = Configure::read('pageLimit');

		/* $paginate = array('User' => array('limit' => $pageLimit, array('User.group_id' => 2), 'recursive' => 0));
		$this->set('supervisors', $this->Paginator->paginate('User')); */
		
		$paginate = array('limit' => $pageLimit, 'recursive' => 0);
		$this->set('supervisors', $this->Paginator->paginate());
		
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {

		if ($this->request->is('post')) {
				
			/* echo "<pre>";
			 print_r($this->request->data);
			exit; */
				
			$this->request->data['User']['group_id'] = 2;
			$this->Supervisor->User->create();
			if ($this->Supervisor->User->save($this->request->data)) {
					
				$this->request->data['Supervisor']['user_id'] = $this->Supervisor->User->getLastInsertID();
					
				$this->Supervisor->create();
				if ($this->Supervisor->save($this->request->data)) {
					$this->Session->setFlash(__('The supervisor has been saved.'));
					return $this->redirect($this->referer());
				} else {
					$this->Session->setFlash(__('The supervisor could not be saved. Please, try again.'));
				}
			}else {
				$this->Session->setFlash(__('The supervisor could not be saved. Please, try again.'));
			}
		}


	}

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		if (!$this->Supervisor->exists($id)) {
			throw new NotFoundException(__('Invalid supervisor'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Supervisor->save($this->request->data)) {
				$this->Session->setFlash(__('The supervisor has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The supervisor could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Supervisor.' . $this->Supervisor->primaryKey => $id));
			$this->request->data = $this->Supervisor->find('first', $options);
		}
		$users = $this->Supervisor->User->find('list');
		$regions = $this->Supervisor->Region->find('list');
		$this->set(compact('users', 'regions'));
	}

	/**
	 * delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function delete($id = null) {
		$this->Supervisor->id = $id;
		if (!$this->Supervisor->exists()) {
			throw new NotFoundException(__('Invalid supervisor'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Supervisor->delete()) {
			$this->Session->setFlash(__('The supervisor has been deleted.'));
		} else {
			$this->Session->setFlash(__('The supervisor could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
