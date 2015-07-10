<?php
App::uses('AppController', 'Controller');
/**
 * SellerCalculations Controller
 *
 * @property SellerCalculation $SellerCalculation
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
*/
class SellerCalculationsController extends AppController {

	/**
	 * Components
	 *
	 * @var array
	 */
	public $components = array('Paginator', 'Session');

	public function beforeFilter(){
		parent::beforeFilter();

		$this->Auth->allow('dailyCalculations', 'inTime', 'outTime', 'goldSold', 'add', 'ajaxUpdateGoldGrams');

	}


	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this->SellerCalculation->recursive = 0;
		$this->set('sellerCalculations', $this->Paginator->paginate());
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		if (!$this->SellerCalculation->exists($id)) {
			throw new NotFoundException(__('Invalid seller calculation'));
		}
		$options = array('conditions' => array('SellerCalculation.' . $this->SellerCalculation->primaryKey => $id));
		$this->set('sellerCalculation', $this->SellerCalculation->find('first', $options));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SellerCalculation->create();
			if ($this->SellerCalculation->save($this->request->data)) {
				$this->Session->setFlash(__('The seller calculation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The seller calculation could not be saved. Please, try again.'));
			}
		}
		$sellers = $this->SellerCalculation->Seller->find('list');
		$this->set(compact('sellers'));
	}

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		if (!$this->SellerCalculation->exists($id)) {
			throw new NotFoundException(__('Invalid seller calculation'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->SellerCalculation->save($this->request->data)) {
				$this->Session->setFlash(__('The seller calculation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The seller calculation could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SellerCalculation.' . $this->SellerCalculation->primaryKey => $id));
			$this->request->data = $this->SellerCalculation->find('first', $options);
		}
		$sellers = $this->SellerCalculation->Seller->find('list');
		$this->set(compact('sellers'));
	}

	/**
	 * delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function delete($id = null) {
		$this->SellerCalculation->id = $id;
		if (!$this->SellerCalculation->exists()) {
			throw new NotFoundException(__('Invalid seller calculation'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->SellerCalculation->delete()) {
			$this->Session->setFlash(__('The seller calculation has been deleted.'));
		} else {
			$this->Session->setFlash(__('The seller calculation could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function dailyCalculations(){

		/* $dateOfPresent = '2015-07-04';
		 echo date("Y",strtotime($dateOfPresent));exit; */
		$sellerId = $this->SellerCalculation->Seller->field('id', array('Seller.user_id' => $this->Session->read('Auth.User.id')));

		$dailyCalculations = $this->SellerCalculation->find('all', array('conditions' => array(
				'seller_id' => $sellerId,
				date("m",strtotime('dateOfPresent')) => date('m'),
				date("Y",strtotime('dateOfPresent')) => date('Y')

		), 'recursive' => -1));

		$toalGoldGrams = 0;
		foreach ($dailyCalculations as $calculation) {
			$toalGoldGrams += $calculation['SellerCalculation']['goldGramsSold'];
		}

		/* echo "<pre>";
		 print_r($dailyCalculations);exit; */

		$this->set('sellerId', $sellerId);
		$this->set('totalGoldGrams', $toalGoldGrams);

	}



	public function inTime() {
			
		if ($this->request->is('post')) {

			/* echo "<pre>";
			 print_r($this->request->data);exit; */

			$this->loadModel('Seller');
			$sellerId = $this->Seller->field('id', array('Seller.user_id' => $this->Session->read('Auth.User.id')));
			$this->request->data['SellerCalculation']['seller_id'] = $sellerId;
				
			$this->request->data['SellerCalculation']['inTime'] = join(':', $this->request->data['SellerCalculation']['inTime']);
				
			$this->request->data['SellerCalculation']['inTime'] = strtotime($this->request->data['SellerCalculation']['inTime']);
			$this->request->data['SellerCalculation']['inTime'] = date('H:i:s', $this->request->data['SellerCalculation']['inTime']);
				
				
			$date = join('-', $this->request->data['SellerCalculation']['dateOfPresent']);
				
			$previousEntry = $this->SellerCalculation->field('id', array('dateOfPresent' => date('Y-m-d', strtotime($date)),
					'seller_id' => $sellerId));

			if ($previousEntry) {
				$this->SellerCalculation->id = $previousEntry;
			}else {
				$this->SellerCalculation->create();
			}
				
			/* echo "<pre>";
				print_r($this->request->data);
			print_r($this->SellerCalculation->create());
			exit; */

			if ($this->SellerCalculation->save($this->request->data)) {
					
				$this->Session->setFlash(__('Thank you for providing Your In Timings.'));
				return $this->redirect($this->referer());
			} else {
				$this->Session->setFlash(__('Sorry Your In Timing could not be saved. Please, try again.'));
			}

		}
	}


	public function outTime() {
			
		if ($this->request->is('post')) {

			/* echo "<pre>";
			 print_r($this->request->data);exit; */

			$this->loadModel('Seller');
			$sellerId = $this->Seller->field('id', array('Seller.user_id' => $this->Session->read('Auth.User.id')));
			$this->request->data['SellerCalculation']['seller_id'] = $sellerId;

			$this->request->data['SellerCalculation']['outTime'] = join(':', $this->request->data['SellerCalculation']['outTime']);

			$this->request->data['SellerCalculation']['outTime'] = strtotime($this->request->data['SellerCalculation']['outTime']);
			$this->request->data['SellerCalculation']['outTime'] = date('H:i:s', $this->request->data['SellerCalculation']['outTime']);

			$date = join('-', $this->request->data['SellerCalculation']['dateOfPresent']);
				
			$previousEntry = $this->SellerCalculation->field('id', array('dateOfPresent' => date('Y-m-d', strtotime($date)),
					'seller_id' => $sellerId));

			if ($previousEntry) {
				$this->SellerCalculation->id = $previousEntry;
			}else {
				$this->SellerCalculation->create();
			}

			/* echo "<pre>";
			 print_r($this->request->data);
			print_r($this->SellerCalculation->create());
			exit; */

			if ($this->SellerCalculation->save($this->request->data)) {
					
				$this->Session->setFlash(__('Thank you for providing Your Out Timings.'));
				return $this->redirect($this->referer());
			} else {
				$this->Session->setFlash(__('Sorry Your Out Timing could not be saved. Please, try again.'));
			}

		}
	}


	public function goldSold() {
			
		if ($this->request->is('post')) {

			/* echo "<pre>";
			 print_r($this->request->data);exit; */

			$this->loadModel('Seller');
			$sellerId = $this->Seller->field('id', array('Seller.user_id' => $this->Session->read('Auth.User.id')));
			$this->request->data['SellerCalculation']['seller_id'] = $sellerId;
			
			// ========= API Calling Using REST ======================================================
			
			$url = curl_init("http://globalmetals.xignite.com/xGlobalMetals.json/GetBaseMetalPrice?MetalType=EngelhardGold&_Token=AD3884821408405598B955083DBC898F");
			
			curl_setopt( $url, CURLOPT_RETURNTRANSFER, 1);
			
			$json = curl_exec($url);
			$json1 = json_decode($json);
			
			// ========= End of API Calling Using REST ======================================================
			
			$this->request->data['SellerCalculation']['rateOfGramGold'] = $json1->Price;		
			
			$this->request->data['SellerCalculation']['earningsOfTheDay'] = $this->request->data['SellerCalculation']['goldGramsSold'] * $this->request->data['SellerCalculation']['rateOfGramGold'];

			$date = join('-', $this->request->data['SellerCalculation']['dateOfPresent']);
				
			/* $date = DateTime::createFromFormat('d-m-Y', $this->request->data['SellerCalculation']['dateOfPresent']);
			 echo $date->format('Y-m-d'); */
				
				
			$previousEntry = $this->SellerCalculation->field('id', array('dateOfPresent' => date('Y-m-d', strtotime($date)),
					'seller_id' => $sellerId));

			if ($previousEntry) {
				$this->SellerCalculation->id = $previousEntry;
			}else {
				$this->SellerCalculation->create();
			}

			/* echo "<pre>";
			 print_r($this->request->data);
			print_r($this->SellerCalculation->create());
			exit; */

			if ($this->SellerCalculation->save($this->request->data)) {
					
				$this->Session->setFlash(__('Thank you for providing Your sales Details.'));
				return $this->redirect($this->referer());
			} else {
				$this->Session->setFlash(__('Sorry Your Sales Details could not be saved. Please, try again.'));
			}

		}
	}


	public function ajaxUpdateGoldGrams( $previousGoldGrams, $sellerId=null){

		if ($this->RequestHandler->isAjax()) {
				
			echo $this->data['SellerCalculation']['goldGramsSold'] + $previousGoldGrams." Grams of Gold In Total";
			exit;
		}
	}

	
} // *********************** end of SellerCalculationsController *************
