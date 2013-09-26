<?php

Doo::loadController("BaseController");

class HomeController extends BaseController {

	function index() {
		$this->data['content'] = 'home/index';
        $this->data['title'] = "Home";
        $this->render('front/template', $this->data, true);
	}

	function faq() {
		$this->data['content'] = 'home/faq';
        $this->data['title'] = "Home";
        $this->render('front/template', $this->data);		
	}

	function help() {
		$this->data['content'] = 'home/help';
        $this->data['title'] = "Home";
        $this->render('front/template', $this->data);
	}

	function testimonial() {
		$this->data['content'] = 'home/testimoni';
        $this->data['title'] = "Home";
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

	function landing()
	{
        $this->data['content'] = 'home/landing';
        $this->data['title'] = "Konfirmasi User";
        $this->render('front/template', $this->data);		
	}

}
?>