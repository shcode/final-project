<?php

Doo::loadController("BaseController");

class UserController extends BaseController {

	function index() {
		echo 'You are visiting '.$_SERVER['REQUEST_URI'];
	}

	function view_profil() {
		echo 'You are visiting '.$_SERVER['REQUEST_URI'];
	}

	function edit_profil() {
		echo 'You are visiting '.$_SERVER['REQUEST_URI'];
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
                $user->created_at = new DooDbExpression('NOW()');

                // tambahkan kode konfirmasi untuk email
                $key = DooTextHelper::randomName(32);
                $user->confirmkey = $key;

                // insert
				$user->insert(); 

                // send email
                $mail = new DooMailer();

                $mail->addTo($_POST['email'], $_POST['name_user']);
                $mail->setSubject("Konfirmasi akun di HunianAsri.net");

                $message = "Hi " . $_POST['username'] . "<br /><br />";
                $message .= "Terima kasih telah melakukan pendaftaran di HunianAsri.Net.";
                $message .= "Untuk melakukan konfirmasi akun, silakan klik link di bawah ini<br /><br />";
                $message .= "<a href='" . Doo::conf()->APP_URL . "user/konfirmasi?username=" . $_POST['username'] . "&key=" . $key . "'>Konfirmasi</a>" . "<br />" . "<br />";

                $message .= "<p>Jika link tidak tampil, silakan salin text di bawah ini dan letakkan di browser anda:" . "<br /><br />";
                $message .= "<a href='" . Doo::conf()->APP_URL . "user/konfirmasi?username=" . $_POST['username'] . "&key=" . $key . "'>" . Doo::conf()->APP_URL . "/user/konfirmasi?username=" . $_POST['username'] . "&key=" . $key . "</a></p>" . "<br />" . "<br />";


                $mail->setBodyHtml($message);
                $mail->setFrom('donotreply@hunianasri.net', 'HunianAsri');
                $mail->send();
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