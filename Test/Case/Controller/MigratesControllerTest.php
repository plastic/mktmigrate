<?php
App::uses('MktMigrateAppController', 'MktMigrate.Controller');
App::uses('MigratesController', 'MktMigrate.Controller');

class MigratesControllerTest extends ControllerTestCase {
	
	public function setUp() {
		parent::setUp();
		$this->Migrates = $this->generate('MktMigrate.Migrates', array(
			'models' => array(),
			'components' => array(
				'Session',
				'RequestHandler',
				'Auth'
			),
			'helpers' => array(
				'ScriptCombiner'
			)
		));
	
		$_SERVER['PHP_AUTH_USER'] = Configure::read('MktMigrate.login');
		$_SERVER['PHP_AUTH_PW'] = Configure::read('MktMigrate.pass');
	}
	
	public function testIndex() {
		$result = $this->testAction('/mkt_migrate/migrates/index', array('return' => 'vars'));
		$this->assertInternalType('array', $result);
		$this->assertEmpty($result);
		
		$result = $this->testAction('/mkt_migrate/migrates/index', array('return' => 'view'));
		$this->assertRegExp('(\<h2\>Criar\stabelas\<\/h2\>)', $result);
	}
	
	/*
	# coming soon
	public function testView() {
		$this->Schema = $this->getMock('CakeSchema');
		$this->Schema->expects($this->any())->method('load')->will($this->returnValue(1));
		$this->Schema->path = TMP . 'tests' . DS;
		
		$result = $this->testAction('/mkt_migrate/migrates/view', array('return' => 'view'));
		$this->assertEmpty($result);
	}
	*/
}