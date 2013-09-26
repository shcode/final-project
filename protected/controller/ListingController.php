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

		$total = $listing->count();
		$pager = new DooPager(Doo::conf()->APP_URL.'listing', $total, 2, 5);

		$pager->prevText = 'Prev';
		$pager->nextText = 'Next';		

        if ($total > 0)
        {
            if (isset($this->params['page']))
                $pager->paginate(intval($this->params['page']));
            else
                $pager->paginate(1);

			$this->data['listing'] = $listing->relateMany(array("Image", "Area"), array(
				"Image" => array('limit' => $pager->limit),
			));	
        }
        // echo "<pre>";
        // print_r($this->data['listing']);
        // echo "</pre>";

		$this->data['pager'] = $pager->output;  

		
		$this->data['content'] = 'listing/index';
        $this->data['title'] = "Daftar Properti Anda";
        $this->render('front/template', $this->data);    		
	}

	function view_properti() {
		$id = $this->params['id'];
	}

	function edit_properti() {
		echo 'You are visiting '.$_SERVER['REQUEST_URI'];
	}

	function view_bid() {
		echo 'You are visiting '.$_SERVER['REQUEST_URI'];
	}

	function cancel_bid() {
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
            	$step1 = $this->session->listing;
	            $start_date = $step1['start_date1'] . " " . $step1['start_date2'];
	            $end_date = $step1['end_date1'] . " " . $step1['end_date2'];            	
            	$data = array_merge($step1, $_POST);

            	$listing = new Listing($data);
            	$listing->user_id = $this->session->user->user_id;
                $area = new Area();
                $area = $area->getByProvinceId_DistrictId_SubdistrictId_first($_POST['province_id'], $_POST['district_id'], $_POST['subdistrict_id']);

                $listing->area_id = $area->area_id;

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
                $this->addMessage("ID Listing = " . $listing);

                var_dump($listing);
                unset($this->session->listing);         	

            	DooUriRouter::redirect(Doo::conf()->APP_URL . "landingpage");	
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

		var_dump($this->session->listing);
	}

}
?>