<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	
	
	public $components = array(
			
			'Auth' => array(
					'authorize' => array('Actions' => array('actionPath' => 'controllers')),
					'loginRedirect' => array('controller' => 'users', 'action' => 'landing'),
					'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),
					'userModel' => 'User',
					'authError' => "you are not allowed to access that page",
					'authenticate' => array(
							'Form' => array(
									'userModel' => 'User',
									'fields' => array(
											'username' => 'email',
											'password'=>'password')
							)
					)
			),
			'Session',
			
			'RequestHandler'
	);
	
	public $helpers = array('Html', 'Form', 'Session');
	
	public function isAuthorized($user) {
		// Admin can access every action
	
		if (isset($user['group_id']) && ($user['group_id'] == 1)) {
			return true;
		}
	
		return false;
	}
	
	public function beforeFilter() {
		parent::beforeFilter();
	
		if (isset($this->request->data['User']['password']) && !empty($this->request->data['User']['password'])) {
	
			$this->request->data['User']['password'] = AuthComponent::password($this->request->data['User']['password']);
	
		}

		$currentUser = "";
		
		if ($this->Session->read('Auth.User.id')) {
		
			$currentUser = $this->Session->read('Auth.User');
		}
		//pr($currentUser);exit;
		$this->set('currentUser', $currentUser);
		
	
		return true;
	}
	
	
	public function beforeRender(){
										
		
		
		//echo "hai"; exit;
		
	}


} // ****************** end of AppController *************************************
