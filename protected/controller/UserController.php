<?php

Doo::loadController("BaseController");

class UserController extends BaseController {

	function index() {
        $user = new User();

        $this->data['user'] = $user->getByUserId_first($this->session->user->user_id);


        $this->data['content'] = 'user/index';
        $this->data['title'] = "Profil Anda";
        $this->render('front/template', $this->data);       

	}

	function view_profil() {
		$user = new User();

        $user->user_id = $this->params("id");
        $user = $user->find();

        var_dump($user);
	}

	function edit_profil() {
        $user = new User();

        $user->user_id = $this->params("id");
        $user = $user->find();
		
	}

	function user_report() {
		echo 'You are visiting '.$_SERVER['REQUEST_URI'];
	}

	function register() {
		//load class
        Doo::loadModel('Area');
        Doo::loadHelper('DooValidator');
        Doo::loadHelper('DooTextHelper');
        Doo::loadHelper('DooMailer');
        Doo::loadCore('db/DooDbExpression');

        //proses controller untuk cek_user dan cek_email
        Doo::loadController('ProsesController');        

        // jika form daftar disubmit
        if ($_POST)
        {
        	// buat object user
            $user = new User($_POST);

            // konfigurasi validasi
            $validator = new DooValidator();
            $validator->checkMode = DooValidator::CHECK_ALL_ONE;

            // cek validasi
            if ($error = $validator->validate($_POST, 'register.rules'))
            {
                $this->data['error'] = $error;
                $this->data['value'] = $_POST;
            }
            else
            {
                $this->data['info'] = "Sukses";

                // cari area_id untuk dimasukkan ke table user
                $area = new Area();
                $area = $area->getByProvinceId_DistrictId_SubdistrictId_first($_POST['province_id'], $_POST['district_id'], $_POST['subdistrict_id']);

                $user->area_id = $area->area_id;

                // buat md5 password dengan salt
                $user->password = md5(Doo::conf()->SECURITY_SALT . $_POST['password']);

                // tambahkan waktu dibuat
                $now = new DooDbExpression('NOW()');
                $user->created_at = $now;

                // tambahkan kode konfirmasi untuk email
                $key = DooTextHelper::randomName(32);
                $user->confirmkey = $key;

                // insert
				$newuser = $user->insert(); 

                // send email
                // $mail = new DooMailer();

                // $mail->addTo($_POST['email'], $_POST['name_user']);
                // $mail->setSubject("Konfirmasi akun di HunianAsri.net");

                // $message = "Hi " . $_POST['username'] . "<br /><br />";
                // $message .= "Terima kasih telah melakukan pendaftaran di HunianAsri.Net.";
                // $message .= "Untuk melakukan konfirmasi akun, silakan klik link di bawah ini<br /><br />";
                // $message .= "<a href='" . Doo::conf()->APP_URL . "user/konfirmasi?username=" . $_POST['username'] . "&key=" . $key . "'>Konfirmasi</a>" . "<br />" . "<br />";

                // $message .= "<p>Jika link tidak tampil, silakan salin text di bawah ini dan letakkan di browser anda:" . "<br /><br />";
                // $message .= "<a href='" . Doo::conf()->APP_URL . "user/konfirmasi?username=" . $_POST['username'] . "&key=" . $key . "'>" . Doo::conf()->APP_URL . "/user/konfirmasi?username=" . $_POST['username'] . "&key=" . $key . "</a></p>" . "<br />" . "<br />";


                // $mail->setBodyHtml($message);
                // $mail->setFrom('donotreply@hunianasri.net', 'HunianAsri');
                // $mail->send();

                $log = new Log();
                $log->user_id = $newuser;
                $log->logs = "[user@" . $newuser . "] baru bergabung di HunianAsri.net";
                $log->log_info = "Register Baru";
                $log->created_at = $now;

                $log->insert();

            }
        }

        $area = new Area();
        $this->data['propinsi'] = $area->getByLevel(1);
        $this->data['ben'] = Doo::benchmark(false);
        $this->render('front/login/register', $this->data);
	}		

    public function konfirmasi()
    {
        $user = new User();
        if(isset($_GET['username']) && isset($_GET['key']))
        {
            $user->username = $_GET['username'];
            $user->confirmkey = $_GET['key'];

            if($user = $user->find(array("limit" => 1)))
            {
                $user->status = 1;
                $user->confirmkey = "";
                $user->update();

                $this->addMessage("success");
                $this->addMessage("Akun anda telah berhasil dikonfirmasi.");

                Doo::loadCore('db/DooDbExpression');

                $log = new Log();
                $log->user_id = $user->user_id;
                $log->logs = "[user@" . $user->user_id . "] berhasil konfirmasi akun melalui email";
                $log->log_info = "Konfirmasi akun";
                $log->created_at = new DooDbExpression('NOW()');             
            }
            else
            {
                $this->addMessage("error");
                $this->addMessage("Maaf, kode konfirmasi yang anda masukkan tidak cocok. Silakan kirim ulang verifikasi email.");
            }
        }
        else
        {
            $this->addMessage("error");
            $this->addMessage("Maaf, parameter salah.");            
        }

        DooUriRouter::redirect(Doo::conf()->APP_URL . "landingpage");
    }

}
?>