<?php

Doo::loadController("BaseController");
Doo::loadModel("Area");
Doo::loadModel("Image");
Doo::loadModel("Listing");
Doo::loadModel("Type");

class ListingController extends BaseController {

	function index() {
		Doo::loadHelper('DooPager');
		$page = $this->params['page'];

		$listing = new Listing();
		$listing->user_id = $this->session->user->user_id;

        $opt = array();

        if (isset($_GET['field']) && isset($_GET['key']))
        {
            $opt['where'] = $_GET['field'] . " LIKE '%" . $_GET['key'] . "%'";
        }

        $total = $listing->count($opt);
		$pager = new DooPager(Doo::conf()->APP_URL.'listing', $total, 3, 10);

		$pager->prevText = 'Prev';
		$pager->nextText = 'Next';

        if ($total > 0)
        {
            if (isset($this->params['page']))
                $pager->paginate(intval($this->params['page']));
            else
                $pager->paginate(1);


            $opt['limit'] = $pager->limit;
			$this->data['listing'] = $listing->relateMany(array("Image", "Area", "Bid"), array(
                "Listing" => $opt,
                "Bid" => array("desc" => "created_at")
			));	
        }

		$this->data['pager'] = $pager->output;  
		
		$this->data['content'] = 'listing/index';
        $this->data['title'] = "Daftar Properti Anda";
        $this->render('front/template', $this->data);    		
	}

	function view_listing() {
		$id = $this->params['id'];

        $listing = new Listing();
        $listing->listing_id = $id;

        $listing = $listing->relateMany(array("Image", "Area", "User", "Bid"), 
                array("Bid" => array("desc" => "created_at"))
            );

        if(count($listing) > 0)
        {
            $this->data['listing'] = $listing[0];

            $listing[0]->view_count =  $listing[0]->view_count + 1;
            $listing[0]->update();

            if($listing[0]->user_id == $this->session->user->user_id)
                $this->data['editable'] = true;
        }

        $this->data['content'] = 'listing/view';
        $this->data['title'] = $listing[0]->title;
        $this->render('front/template', $this->data);   
	}

	function edit1() {
		echo 'You are visiting '.$_SERVER['REQUEST_URI'];
	}

    function edit2() {
        echo 'You are visiting '.$_SERVER['REQUEST_URI'];
    }    

	function add() {

		if($_POST)
		{
			Doo::loadHelper('DooValidator');

        	// buat object listing
            $listing = new Listing($_POST);
            $start_date = $_POST['start_date1'] . " " . $_POST['start_date2'];
            $end_date = $_POST['end_date1'] . " " . $_POST['end_date2'];

            $listing->start_date = $start_date;
            $listing->end_date = $end_date;

            // konfigurasi validasi
            $validator = new DooValidator();
            $validator->checkMode = DooValidator::CHECK_ALL_ONE;

            $error = $validator->validate($_POST, 'listing.step1.rules');

            //custom validation (DooPHP tidak bisa handle)
            switch($_POST['listing_type'])
            {
            	case "Jual":
            		if($_POST['price'] == "")
            			$error['price'] = "- Harga belum diisi.";
            		break;
            	case "Sewa":
            		if($_POST['price'] == "")
            			$error['price'] = "- Harga belum diisi.";
            		if($_POST['range_value'] == "" || $_POST['range_time'] == "")
            			$error['range_value'] = "- Jangka Waktu belum diisi.";
            		break;
            	case "Lelang":
            		if($_POST['start_price'] == "")
            			$error['start_price'] = "- Harga Awal belum diisi.";
            		if($_POST['min_bid'] == "")
            			$error['min_bid'] = "- Minimum Bid belum diisi.";
            		if($_POST['start_date1'] == "" || $_POST['start_date2'] == "")
            			$error['start_date1'] = "- Waktu Mulai belum diisi.";
            		if($_POST['end_date1'] == "" || $_POST['end_date2'] == "")
            			$error['end_date1'] = "- Waktu Berakhir belum diisi.";

                    $_POST['price'] = $_POST['start_price'];
            		break;
            }


            // cek validasi
            if ($error)
            {
                $this->data['error'] = $error;
                $this->data['value'] = $listing;
            }
            else
            {
            	$this->session->listing = $_POST;
            	DooUriRouter::redirect(Doo::conf()->APP_URL . "listing/tambah/step2");
            }
		}

        $type = new Type();
		$this->data['jenis'] = $type->find();        

		$this->data['content'] = 'listing/add';
		$this->data['timepicker'] = true;
        $this->data['title'] = "Tambah Listing [Step 1]";
        $this->render('front/template', $this->data); 
	}

	function add_step2()
	{
		if($_POST)
		{
			Doo::loadHelper('DooValidator');

        	// buat object listing

            // konfigurasi validasi
            $validator = new DooValidator();
            $validator->checkMode = DooValidator::CHECK_ALL_ONE;

            $error = $validator->validate($_POST, 'listing.step2.rules');

            // cek validasi
            if ($error)
            {
                $this->data['error'] = $error;
                $this->data['value'] = $_POST;
            }
            else
            {
                Doo::loadCore('db/DooDbExpression');
            	$step1 = $this->session->listing;
	            $start_date = $step1['start_date1'] . " " . trim($step1['start_date2']) . ":00";
	            $end_date = $step1['end_date1'] . " " . trim($step1['end_date2']) . ":00";            	
            	$data = array_merge($step1, $_POST);

            	$listing = new Listing($data);
            	$listing->user_id = $this->session->user->user_id;
                $listing->start_date = $start_date;
                $listing->end_date = $end_date;
                $area = new Area();
                $area = $area->getByProvinceId_DistrictId_SubdistrictId_first($_POST['province_id'], $_POST['district_id'], $_POST['subdistrict_id']);

                $listing->area_id = $area->area_id;
                $now = new DooDbExpression('NOW()');
                $listing->created_at = $now;

                $this->printr($listing);

            	$listing = $listing->insert();

            	if(isset($_POST['image']))
            	{
            		foreach($_POST['image'] as $img)
            		{
            			$image = new Image();
            			$image->name = $img;
            			$image->listing_id = $listing;

            			$image->insert();
            		}
            	}

                $this->addMessage("success");
                // $this->addMessage("Listing berhasil dimasukkan dengan ID = " . $listing);

                // $log = new Log();
                // $log->user_id = $this->session->user->user_id;
                // $log->logs = "[user@" . $this->session->user->user_id . "] telah membuat Listing Baru dengan ID [listing@" . $listing . "]";
                // $log->log_info = "Buat Listing Baru";
                // $log->created_at = $now;

                // $log->insert();

                //unset($this->session->listing);         	

            	//DooUriRouter::redirect(Doo::conf()->APP_URL . "landingpage");	
            }
		}

        if(!isset($this->session->listing))
        {
            DooUriRouter::redirect(Doo::conf()->APP_URL . "listing/tambah");
        }


        $area = new Area();
        $this->data['propinsi'] = $area->getByLevel(1);

        $this->data['fineupload'] = true;
        $this->data['fancybox'] = true;
		$this->data['content'] = 'listing/step2';
        $this->data['title'] = "Tambah Listing [Step 2]";
        $this->render('front/template', $this->data);
	}

    function auction() {
        Doo::loadModel("Type");

        $listing = new Listing();

        $opt_terbaru = array(
                "limit" => 8,
                "desc" => "created_at",
                "where" => "listing_type=?",
                "param" => array("Lelang")
                );
        $opt_populer = array(
                "limit" => 8,
                "desc" => "view_count",
                "where" => "listing_type=?",
                "param" => array("Lelang")              
                );


        if (isset($_GET['tipe']) && ($_GET['tipe'] > 0) && ($_GET['tipe'] < 10))
        {
            $opt_populer['where'] = $opt_terbaru['where'] = "type_id=? AND listing_type=?";
            $opt_populer['param'] = $opt_terbaru['param'] = array($_GET['tipe'], "Lelang");


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
        $this->data['nav'] = "lelang";

        $this->data['content'] = 'home/index';
        $this->data['title'] = "Home";
        $this->render('front/template', $this->data, true);        
    }

    function pop_auction()
    {
        Doo::loadModel("Type");

        $listing = new Listing();

        $opt = array(
                "desc" => "view_count",
                "where" => "listing_type=?",
                "param" => array("Lelang")              
                );


        if (isset($_GET['tipe']) && ($_GET['tipe'] > 0) && ($_GET['tipe'] < 10))
        {
            $opt['where'] = "type_id=? AND listing_type=?";
            $opt['param'] = array($_GET['tipe'], "Lelang");


            $type = new Type();
            $type->type_id = $_GET['tipe'];
            $type->limit = "first";

            $this->data['type_listing'] = $type->find();
        }

        $this->data['listing'] = $listing->relateMany(array("Image", "Area"), array(
            "Listing" => $opt
        ));     

        $this->data['tipe'] = Doo::db()->find("Type");
        $this->data['nav'] = "lelang";

        $this->data['content'] = 'home/index';
        $this->data['title'] = "Home";
        $this->render('front/template', $this->data, true);        
    }

    function rent() {
        Doo::loadModel("Type");

        $listing = new Listing();

        $opt_terbaru = array(
                "limit" => 8,
                "desc" => "created_at",
                "where" => "listing_type=?",
                "param" => array("Sewa")
                );
        $opt_populer = array(
                "limit" => 8,
                "desc" => "view_count",
                "where" => "listing_type=?",
                "param" => array("Sewa")                
                );


        if (isset($_GET['tipe']) && ($_GET['tipe'] > 0) && ($_GET['tipe'] < 10))
        {
            $opt_populer['where'] = $opt_terbaru['where'] = "type_id=? AND listing_type=?";
            $opt_populer['param'] = $opt_terbaru['param'] = array($_GET['tipe'], "Sewa");


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
        $this->data['nav'] = "sewa";

        $this->data['content'] = 'home/index';
        $this->data['title'] = "Home";
        $this->render('front/template', $this->data, true);             
    }

    function sell() {
        Doo::loadModel("Type");

        $listing = new Listing();

        $opt_terbaru = array(
                "limit" => 8,
                "desc" => "created_at",
                "where" => "listing_type=?",
                "param" => array("Jual")
                );
        $opt_populer = array(
                "limit" => 8,
                "desc" => "view_count",
                "where" => "listing_type=?",
                "param" => array("Jual")                
                );


        if (isset($_GET['tipe']) && ($_GET['tipe'] > 0) && ($_GET['tipe'] < 10))
        {
            $opt_populer['where'] = $opt_terbaru['where'] = "type_id=? AND listing_type=?";
            $opt_populer['param'] = $opt_terbaru['param'] = array($_GET['tipe'], "Jual");


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
        $this->data['nav'] = "jual";

        $this->data['content'] = 'home/index';
        $this->data['title'] = "Home";
        $this->render('front/template', $this->data, true);             
    }


}
?>