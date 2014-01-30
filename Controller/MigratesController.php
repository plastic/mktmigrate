<?php
App::uses('CakeSchema', 'Model');
App::uses('ConnectionManager', 'Model');
App::uses('MktMigrateAppController', 'MktMigrate.Controller');

class MigratesController extends MktMigrateAppController {
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index', 'view', 'execute', 'compare');
		
		// http basic authenticate
		$this->_authenticate();
	}
	
	public function index() {
		// silence is the secret
	}
	
	public function view() {
		$this->Schema = new CakeSchema();
		$db = ConnectionManager::getDataSource($this->Schema->connection);
		$dumpSchema = $this->Schema->load();
		$this->set('schema', $db->createSchema($dumpSchema));
	}
	
	public function execute() {
		$this->autoRender = false;
		try {
			$this->_executeQuery();
			$this->setFlashMessage('Comando executado com sucesso!', 'success', array('controller' => 'migrates', 'action' => 'index'));
		} catch (Exception $e) {
			$this->setFlashMessage('Já existem as tabelas!', 'error', array('controller' => 'migrates', 'action' => 'index'));
		}
	}
	
	public function _executeQuery() {
		$this->Schema = new CakeSchema();
		$db = ConnectionManager::getDataSource($this->Schema->connection);
		$dumpSchema = $this->Schema->load();
		foreach ($dumpSchema->tables as $table => $fields) {
			$drop[$table] = $db->dropSchema($dumpSchema, $table);
			$create[$table] = $db->createSchema($dumpSchema, $table);
		}
		foreach ($drop as $table => $sql) {
			$db->execute($sql);
		}
		foreach ($create as $table => $sql) {
			$db->execute($sql);
		}
	}
	
	public function _authenticate() {
		if (isset($_SERVER['HTTP_AUTHORIZATION'])) {
			$authorization = $_SERVER['HTTP_AUTHORIZATION'];
		} else {
			if (function_exists('apache_request_headers')) {
				$headers = apache_request_headers();
				$authorization = $headers['HTTP_AUTHORIZATION'];
			}
		}
		
		if (!empty($authorization)) {
			list($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']) = explode(':', base64_decode(substr($authorization, 6)));
		}
		
		if (!isset($_SERVER['PHP_AUTH_USER']) || !($_SERVER['PHP_AUTH_USER'] == Configure::read('MktMigrate.login') && $_SERVER['PHP_AUTH_PW'] == Configure::read('MktMigrate.pass'))) {
			header('WWW-Authenticate: Basic realm="DBV interface"');
			header('HTTP/1.0 401 Unauthorized');
			echo _('Access denied');
			exit();
		}
	}
}