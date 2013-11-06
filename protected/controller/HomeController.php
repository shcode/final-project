<?php

Doo::loadController("BaseController");
Doo::loadModel("Listing");

class HomeController extends BaseController {

	function index() {
		Doo::loadModel("Type");

		$listing = new Listing();
		$opt_terbaru = array(
        		"limit" => 8,
        		"desc" => "created_at",
        		);
		$opt_populer = array(
        		"limit" => 8,
        		"desc" => "view_count"
        		);

		if (isset($_GET['tipe']) && ($_GET['tipe'] > 0) && ($_GET['tipe'] < 10))
		{
			$opt_populer['where'] = $opt_terbaru['where'] = "type_id=?";
			$opt_populer['param'] = $opt_terbaru['param'] = array($_GET['tipe']);


			$type = new Type();
			$type->type_id = $_GET['tipe'];
			$type->limit = "first";

			$this->data['type_listing'] = $type->find();
		}

		$this->data['terbaru'] = $listing->relateMany(array("Image", "Area"), array(
        	"Listing" => $opt_terbaru
		));	

		$this->data['populer'] = $listing->relateMany(array("Image", "Area"), array(
        	"Listing" => $opt_populer
		));			

		$this->data['tipe'] = Doo::db()->find("Type");

		$this->data['content'] = 'home/index';
        $this->data['title'] = "Home";
        $this->render('front/template', $this->data, true);
	}

	function faq() {
		$this->data['content'] = 'home/faq';
		$this->data['nav'] = "faq";
        $this->data['title'] = "Home";
        $this->render('front/template', $this->data);		
	}

	function about() {
		$this->data['content'] = 'home/about';
		$this->data['nav'] = "about";
        $this->data['title'] = "Home";
        $this->render('front/template', $this->data);
	}

	function testimonial() {
		$this->data['content'] = 'home/testimoni';
        $this->data['title'] = "Home";
        $this->render('front/template', $this->data);        
	}
	
	function landing()
	{
        $this->data['content'] = 'home/landing';
        $this->data['title'] = "Konfirmasi User";
        $this->render('front/template', $this->data);		
	}

}
?>