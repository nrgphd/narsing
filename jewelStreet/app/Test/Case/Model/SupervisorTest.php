<?php
App::uses('Supervisor', 'Model');

/**
 * Supervisor Test Case
 *
 */
class SupervisorTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.supervisor',
		'app.user',
		'app.group',
		'app.seller',
		'app.region',
		'app.seller_calculation'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Supervisor = ClassRegistry::init('Supervisor');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Supervisor);

		parent::tearDown();
	}

}
