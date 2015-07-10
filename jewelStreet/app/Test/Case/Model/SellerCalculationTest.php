<?php
App::uses('SellerCalculation', 'Model');

/**
 * SellerCalculation Test Case
 *
 */
class SellerCalculationTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.seller_calculation',
		'app.seller',
		'app.user',
		'app.group',
		'app.supervisor',
		'app.region'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SellerCalculation = ClassRegistry::init('SellerCalculation');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SellerCalculation);

		parent::tearDown();
	}

}
