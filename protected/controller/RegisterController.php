<?php

class RegisterController extends DooController {

	function index() {
        $this->data['rootUrl'] = Doo::conf()->APP_URL;
        $this->data['ben'] = Doo::benchmark(false);
        $this->render('front/login/register', $this->data);
	}

	function upload_action() {
		echo 'You are visiting '.$_SERVER['REQUEST_URI'];
	}

	function upload_id() {
		echo 'You are visiting '.$_SERVER['REQUEST_URI'];
	}

	function confirm() {
		echo 'You are visiting '.$_SERVER['REQUEST_URI'];
	}

	function upload_success() {
		echo 'You are visiting '.$_SERVER['REQUEST_URI'];
	}

}
?>