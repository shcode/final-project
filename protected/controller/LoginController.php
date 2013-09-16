<?php

//Doo::loadModel('User');

class LoginController extends DooController {

	public $data;

	function index() {
        $this->data['rootUrl'] = Doo::conf()->APP_URL;
        $this->data['ben'] = Doo::benchmark(false);
        $this->render('front/login/login', $this->data);		
	}

	function logout() {
		echo 'You are visiting '.$_SERVER['REQUEST_URI'];
	}

	function fbcallback() {
		echo 'You are visiting '.$_SERVER['REQUEST_URI'];
	}

	function twcallback() {
		echo 'You are visiting '.$_SERVER['REQUEST_URI'];
	}

	function ggcallback() {
		echo 'You are visiting '.$_SERVER['REQUEST_URI'];
	}

}
?>