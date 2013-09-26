<?php

Doo::LoadController('BaseController');

class LoginController extends BaseController {

	function index() {
		Doo::loadModel("User");

        if ($_POST)
        {
        	// buat object user
            $user = new User();
            $user->username = $_POST['username'];
            $user->password = md5(Doo::conf()->SECURITY_SALT . $_POST['password']);
            $u = $user->find(array("limit" => 1));

            if($u)
            {
                $this->auth->setSecurityLevel(DooAuth::LEVEL_HIGH);

                switch ($u->status)
                {
                    case 0 : $group = 'unconfirmed';
                        break;
                    case 1 : $group = 'member';
                        break;
                    case 2 : $group = 'banned';
                        break;
                    case 3 : $group = 'admin';
                        break;
                }
                $this->auth->setData($u->username, $group, $u->user_id);
                $this->session->user = $u;
                $this->data['session'] = $this->session;

                if(isset($_POST['remember']))
                {
                    $year = time() + 31536000;
                    setcookie('huniancookie', $this->session->user->username, $year);
                    $_COOKIE['auth'] = $this->auth;
                    $_COOKIE['session'] = $this->session;
                }
                else
                {
                    if(isset($_COOKIE['huniancookie'])) {
                        $past = time() - 100;
                        setcookie('huniancookie', '', $past);
                    }                    
                }
                DooUriRouter::redirect(Doo::conf()->APP_URL);
            }
            else
            {
                $this->data['flashmsg'] = "Username atau Password salah";
            }
        }
        $this->render('front/login/login', $this->data);		
	}

	function logout() {
        //$this->auth->finalize();
        unset($_SESSION['user']);
        session_destroy();
        DooUriRouter::redirect(Doo::conf()->APP_URL);
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