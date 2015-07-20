<?php
App::uses('AppModel', 'Model');
/**
 * Appointment Model
 *
 * @property User $User
 * @property Order $Order
 * @property Court $Court
 */
class Appointment extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Order' => array(
			'className' => 'Order',
			'foreignKey' => 'order_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Court' => array(
			'className' => 'Court',
			'foreignKey' => 'court_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
