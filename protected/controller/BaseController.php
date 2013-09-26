<?php

Doo::loadCore("auth/DooAuth");
Doo::loadHelper("DooFlashMessenger");
Doo::loadModel("User");

class BaseController extends DooController {

    /**
     * Auth session object of the application
     * @var DooAuth
     */
    public $auth;
    /**
     * Session object of the application
     * @var DooSession
     */
    public $session;
    public $data;
    public $flash;

    public function __construct()
    {
        $this->auth = new DooAuth('hunianasri'); //constructor with namespace (can also be obtained from external source, example common.conf.php :-) )
        $this->auth->setSalt(Doo::conf()->SECURITY_SALT); //Intialize salt
        $this->auth->setSecurityLevel(DooAuth::LEVEL_HIGH);
        // $this->auth->setFormSessionExpire(1);
        // $this->auth->setSessionExpire(1);        
        $this->auth->start();
        $this->session = Doo::session('hunianasri');
        $this->data['rootUrl'] = Doo::conf()->APP_URL;

        $this->flash = new DooFlashMessenger();
        DooController::view()->flashMessenger = $this->flash->getMessages();

    }

    public function beforeRun($resource, $action)
    {
        $group = 'anonymous';
        //if not login, redirect to login page!
        if ($this->auth->isValid() === false)
        {
            $this->auth->setSecurityLevel(DooAuth::LEVEL_HIGH); // Safety first!
            $this->auth->setData('unknown', 'anonymous'); // Just a visitor!
            $this->data['login'] = 0;
        }
        else if ($this->auth->group == 'anonymous')
        {
            $this->data['login'] = 0;
        }
        else
        {
            $group = $this->auth->_group;
            $this->data['login'] = 1;
        }

        $this->data['session'] = $this->session;

        //check against the ACL rules
//        if ($rs = $this->acl()->process($group, $resource, $action))
//        {
//            //echo $role .' is not allowed for '. $resource . ' '. $action;
//            return $rs;
//        }
    }

    public function addMessage($str)
    {
        $this->flash->addMessage($str);
        DooController::view()->flashMessenger = $this->flash->getMessages();
    }

}

?>