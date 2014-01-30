<?php

App::uses('AppController', 'Controller');

class MktMigrateAppController extends AppController {
	public function setFlashMessage($message = null, $class = null, $redirect = false) {
		$this->Session->setFlash($message, '', array('class' => 'alert alert-' . $class), $class);
		if ($redirect) {
			$this->redirect($redirect);
		}
	}
}
