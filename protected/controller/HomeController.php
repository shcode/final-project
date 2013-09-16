<?php

class HomeController extends DooController {

	function index() {
		$this->data['content'] = 'home/index';
        $this->data['rootUrl'] = Doo::conf()->APP_URL;
        $this->data['title'] = "Home";
        $this->data['ben'] = Doo::benchmark(false);
        $this->render('front/template', $this->data);
	}

	function faq() {
		$this->data['content'] = 'home/faq';
        $this->data['rootUrl'] = Doo::conf()->APP_URL;
        $this->data['title'] = "Home";
        $this->data['ben'] = Doo::benchmark(false);
        $this->render('front/template', $this->data);		
	}

	function help() {
		$this->data['content'] = 'home/help';
        $this->data['rootUrl'] = Doo::conf()->APP_URL;
        $this->data['title'] = "Home";
        $this->data['ben'] = Doo::benchmark(false);
        $this->render('front/template', $this->data);
	}

	function testimonial() {
		$this->data['content'] = 'home/testimoni';
        $this->data['rootUrl'] = Doo::conf()->APP_URL;
        $this->data['title'] = "Home";
        $this->data['ben'] = Doo::benchmark(false);
        $this->render('front/template', $this->data);        
	}

	function auction() {
        
	}

	function rent() {
		echo 'You are visiting '.$_SERVER['REQUEST_URI'];
	}

	function sell() {
		echo 'You are visiting '.$_SERVER['REQUEST_URI'];
	}

}
?>