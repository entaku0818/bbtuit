<?php
App::uses('AppModel', 'Model');
/**
 * Participant Model
 *
 */
class Participant extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'participant';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

}
