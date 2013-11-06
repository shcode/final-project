<?php

Doo::loadController("BaseController");
Doo::loadModel("Log");

class HistoriController extends DooController {

    var $data;

	function index() {
		$log = new Log();
		$log->user_id = $this->session->user->user_id;

		$this->data['log'] = $log->find();


	}

}
?>