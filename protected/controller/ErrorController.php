<?php
Doo::loadController("BaseController");

class ErrorController extends BaseController{

    public function index(){
		$this->data['rootUrl'] = Doo::conf()->APP_URL;

		$this->data['content'] = 'error/e404';
        $this->data['title'] = "Page Not Found";
        $this->render('front/template', $this->data, true);    	
    }

    public function error_403(){
		$this->data['rootUrl'] = Doo::conf()->APP_URL;

		$this->data['content'] = 'error/e403';
        $this->data['title'] = "Forbidden";
        $this->render('front/template', $this->data, true);  
    }    
	

}
?>