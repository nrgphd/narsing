<?php
App::uses('AppController', 'Controller');
/**
 * Sellers Controller
 *
 * @property Seller $Seller
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
*/
class SellersController extends AppController {

	/**
	 * Components
	 *
	 * @var array
	 */
	public $components = array('Paginator', 'Session');

	public function beforeFilter(){
		parent::beforeFilter();

		$this->Auth->allow('listSellers', 'add');

	}



	/* public function view($id = null) {
		if (!$this->Seller->exists($id)) {
	throw new NotFoundException(__('Invalid seller'));
	}
	$options = array('conditions' => array('Seller.' . $this->Seller->primaryKey => $id));
	$this->set('seller', $this->Seller->find('first', $options));
	} */


	public function add() {
		/* echo "<pre>";
		 print_r($this->Session->read('Auth'));exit; */
		if ($this->request->is('post')) {

			$this->request->data['User']['group_id'] = 3;
			$this->Seller->User->create();
			if ($this->Seller->User->save($this->request->data)) {
					
				$this->request->data['Seller']['user_id'] = $this->Seller->User->getLastInsertID();
				$this->loadModel('Supervisor');
				$this->request->data['Seller']['region_id'] = $this->Supervisor->field('region_id', array('Supervisor.user_id' => $this->Session->read('Auth.User.id')));

				$this->Seller->create();
				if ($this->Seller->save($this->request->data)) {
					$this->Session->setFlash(__('The seller has been saved.'));
					return $this->redirect($this->referer());
				} else {
					$this->Session->setFlash(__('The seller could not be saved. Please, try again.'));
				}
			}else {
				$this->Session->setFlash(__('The seller could not be saved. Please, try again.'));
			}

		}
	}



	/* 	public function edit($id = null) {
	 if (!$this->Seller->exists($id)) {
	throw new NotFoundException(__('Invalid seller'));
	}
	if ($this->request->is(array('post', 'put'))) {
	if ($this->Seller->save($this->request->data)) {
	$this->Session->setFlash(__('The seller has been saved.'));
	return $this->redirect(array('action' => 'index'));
	} else {
	$this->Session->setFlash(__('The seller could not be saved. Please, try again.'));
	}
	} else {
	$options = array('conditions' => array('Seller.' . $this->Seller->primaryKey => $id));
	$this->request->data = $this->Seller->find('first', $options);
	}
	$users = $this->Seller->User->find('list');
	$regions = $this->Seller->Region->find('list');
	$this->set(compact('users', 'regions'));
	} */

	/*
	 public function delete($id = null) {
	$this->Seller->id = $id;
	if (!$this->Seller->exists()) {
	throw new NotFoundException(__('Invalid seller'));
	}
	$this->request->allowMethod('post', 'delete');
	if ($this->Seller->delete()) {
	$this->Session->setFlash(__('The seller has been deleted.'));
	} else {
	$this->Session->setFlash(__('The seller could not be deleted. Please, try again.'));
	}
	return $this->redirect(array('action' => 'index'));
	} */


	public function listSellers() {

		$data = $this->params->query;

		$pageLimit = Configure::read('pageLimit');

		$this->loadModel('Supervisor');
		$regionId = $this->Supervisor->field('region_id', array('Supervisor.user_id' => $this->Session->read('Auth.User.id')));

		if ($data) {
			$month = $data['monthFilter']['month'];
			$year = $data['yearFilter']['year'];
		}else {
			$month = date('n');
			$year = date('Y');
		}

		$this->set('month', $month);
		$this->set('year', $year);
			
		$paginate = array('limit' => $pageLimit, 'conditions' => array(
				'Seller.region_id' => $regionId,
				//date("m",'SellerCalc.dateOfPresent') => '03',
				//date("Y",'SellerCalc.dateOfPresent') => '2014'
				'MONTH(SellerCalc.dateOfPresent)' => $month,
				'YEAR(SellerCalc.dateOfPresent)' => $year
		),
				'joins' => array(
						array(
								'table' => 'sellerCalculations',
								'alias' => 'SellerCalc',
								'type' => 'LEFT',
								'conditions' => array(
										'SellerCalc.seller_id = Seller.id'
								)
						)
				), 'group' => 'Seller.id',
		);

		$this->Paginator->settings = $paginate;
		$sellers = $this->Paginator->paginate();

			
		for ($i=0; $i<count($sellers); $i++){
			$totalEarnings[$i] = $totalGold[$i] = $totalHours[$i] = 0;

			foreach ($sellers[$i]['SellerCalculation'] as $calculation){
				$totalGold[$i] +=  $calculation['goldGramsSold'];
				$totalEarnings[$i] += $calculation['earningsOfTheDay'];


				$time1 = strtotime($calculation['inTime']);
				$time2 = strtotime($calculation['outTime']);
				$totalHours[$i] += $time2 - $time1;

				$hours = floor($totalHours[$i] / 3600);
				$remainder = $totalHours[$i] - $hours * 3600;
					
			}

				
			if($totalHours[$i]){
				$totalHours[$i] = sprintf('%02d', $hours) . gmdate(':i:s', $remainder);
			}
		}
			
		//echo "<pre>"; print_r($sellers); exit;
		
		$this->set('sellers', $sellers);

		if ($sellers) {
			$this->set('totalGold', $totalGold);
			$this->set('totalEarnings', $totalEarnings);
			$this->set('totalHours', $totalHours);
		}


	}


} // ************** end of SellerController *****************************
