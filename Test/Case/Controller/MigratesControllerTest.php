<?php
App::uses('MktMigrateAppController', 'MktMigrate.Controller');
App::uses('MigratesController', 'MktMigrate.Controller');

class MigratesControllerTest extends ControllerTestCase {
	
	public function setUp() {
		parent::setUp();
		/*
		$this->Migrates = $this->generate('Migrates', array(
			'models' => array(),
		    'components' => array(
				'Session',
				'RequestHandler',
				'Auth'
			)
		));*/
	}
	
	public function testIndex() {
		$_SERVER['PHP_AUTH_USER'] = Configure::read('MktMigrate.login');
		$_SERVER['PHP_AUTH_PW'] = Configure::read('MktMigrate.pass');
		
		$this->testAction('/mkt_migrate/migrates/index');
	}
}