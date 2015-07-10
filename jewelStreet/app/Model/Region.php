<?php
App::uses('AppModel', 'Model');
/**
 * Region Model
 *
 * @property Supervisor $Supervisor
 * @property Seller $Seller
 */
class Region extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'region';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'region' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasOne associations
 *
 * @var array
 */
	public $hasOne = array(
		'Supervisor' => array(
			'className' => 'Supervisor',
			'foreignKey' => 'region_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Seller' => array(
			'className' => 'Seller',
			'foreignKey' => 'region_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
