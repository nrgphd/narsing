<?php
/**
 * SellerCalculationFixture
 *
 */
class SellerCalculationFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'sellerCalculations';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'seller_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'date' => array('type' => 'date', 'null' => false, 'default' => null),
		'inTime' => array('type' => 'time', 'null' => false, 'default' => null),
		'outTime' => array('type' => 'time', 'null' => false, 'default' => null),
		'goldSold' => array('type' => 'float', 'null' => false, 'default' => null, 'unsigned' => false),
		'rateOfGramGold' => array('type' => 'float', 'null' => false, 'default' => null, 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'seller_id' => 1,
			'date' => '2015-07-03',
			'inTime' => '19:57:16',
			'outTime' => '19:57:16',
			'goldSold' => 1,
			'rateOfGramGold' => 1
		),
	);

}
