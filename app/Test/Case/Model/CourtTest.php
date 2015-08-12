<?php
App::uses('Court', 'Model');

/**
 * Court Test Case
 *
 */
class CourtTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.court'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Court = ClassRegistry::init('Court');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Court);

		parent::tearDown();
	}

}
