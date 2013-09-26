<?php
Doo::loadCore('db/DooModel');

class UserBase extends DooModel{

    /**
     * @var int Max length is 11.  unsigned.
     */
    public $user_id;

    /**
     * @var varchar Max length is 20.
     */
    public $username;

    /**
     * @var varchar Max length is 64.
     */
    public $password;

    /**
     * @var varchar Max length is 20.
     */
    public $name_title;

    /**
     * @var varchar Max length is 255.
     */
    public $name_user;

    /**
     * @var text
     */
    public $user_address;

    /**
     * @var int Max length is 11.
     */
    public $province_id;

    /**
     * @var int Max length is 11.
     */
    public $district_id;

    /**
     * @var int Max length is 11.
     */
    public $subdistrict_id;

    /**
     * @var int Max length is 11.
     */
    public $area_id;

    /**
     * @var varchar Max length is 5.
     */
    public $zip_code;

    /**
     * @var date
     */
    public $birth_date;

    /**
     * @var tinyint Max length is 1.
     */
    public $sex;

    /**
     * @var text
     */
    public $fb_token;

    /**
     * @var text
     */
    public $tw_token;

    /**
     * @var text
     */
    public $tw_secret;

    /**
     * @var text
     */
    public $gg_token;

    /**
     * @var varchar Max length is 20.
     */
    public $phone;

    /**
     * @var varchar Max length is 20.
     */
    public $mobile;

    /**
     * @var varchar Max length is 50.
     */
    public $email;

    /**
     * @var double
     */
    public $reputation;

    /**
     * @var varchar Max length is 20.
     */
    public $avatar;

    /**
     * @var text
     */
    public $profil;

    /**
     * @var varchar Max length is 20.
     */
    public $identity_id;

    /**
     * @var varchar Max length is 50.
     */
    public $identity_number;

    /**
     * @var tinyint Max length is 4.
     */
    public $status;

    /**
     * @var timestamp
     */
    public $last_login;

    /**
     * @var varchar Max length is 15.
     */
    public $last_login_ip;

    /**
     * @var timestamp
     */
    public $created_at;

    /**
     * @var timestamp
     */
    public $updated_at;

    /**
     * @var varchar Max length is 64.
     */
    public $passkey;

    /**
     * @var varchar Max length is 64.
     */
    public $confirmkey;

    public $_table = 'user';
    public $_primarykey = 'user_id';
    public $_fields = array('user_id','username','password','name_title','name_user','user_address','province_id','district_id','subdistrict_id','area_id','zip_code','birth_date','sex','fb_token','tw_token','tw_secret','gg_token','phone','mobile','email','reputation','avatar','profil','identity_id','identity_number','status','last_login','last_login_ip','created_at','updated_at','passkey','confirmkey');

    public function getVRules() {
        return array(
                'user_id' => array(
                        array( 'integer' ),
                        array( 'min', 0 ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'username' => array(
                        array( 'maxlength', 20 ),
                        array( 'notnull' ),
                ),

                'password' => array(
                        array( 'maxlength', 64 ),
                        array( 'notnull' ),
                ),

                'name_title' => array(
                        array( 'maxlength', 20 ),
                        array( 'optional' ),
                ),

                'name_user' => array(
                        array( 'maxlength', 255 ),
                        array( 'notnull' ),
                ),

                'user_address' => array(
                        array( 'optional' ),
                ),

                'province_id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'district_id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'subdistrict_id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'area_id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'zip_code' => array(
                        array( 'maxlength', 5 ),
                        array( 'optional' ),
                ),

                'birth_date' => array(
                        array( 'date' ),
                        array( 'optional' ),
                ),

                'sex' => array(
                        array( 'integer' ),
                        array( 'maxlength', 1 ),
                        array( 'optional' ),
                ),

                'fb_token' => array(
                        array( 'optional' ),
                ),

                'tw_token' => array(
                        array( 'optional' ),
                ),

                'tw_secret' => array(
                        array( 'optional' ),
                ),

                'gg_token' => array(
                        array( 'optional' ),
                ),

                'phone' => array(
                        array( 'maxlength', 20 ),
                        array( 'notnull' ),
                ),

                'mobile' => array(
                        array( 'maxlength', 20 ),
                        array( 'optional' ),
                ),

                'email' => array(
                        array( 'maxlength', 50 ),
                        array( 'notnull' ),
                ),

                'reputation' => array(
                        array( 'float' ),
                        array( 'optional' ),
                ),

                'avatar' => array(
                        array( 'maxlength', 20 ),
                        array( 'optional' ),
                ),

                'profil' => array(
                        array( 'optional' ),
                ),

                'identity_id' => array(
                        array( 'maxlength', 20 ),
                        array( 'optional' ),
                ),

                'identity_number' => array(
                        array( 'maxlength', 50 ),
                        array( 'optional' ),
                ),

                'status' => array(
                        array( 'integer' ),
                        array( 'maxlength', 4 ),
                        array( 'optional' ),
                ),

                'last_login' => array(
                        array( 'datetime' ),
                        array( 'optional' ),
                ),

                'last_login_ip' => array(
                        array( 'maxlength', 15 ),
                        array( 'optional' ),
                ),

                'created_at' => array(
                        array( 'datetime' ),
                        array( 'optional' ),
                ),

                'updated_at' => array(
                        array( 'datetime' ),
                        array( 'notnull' ),
                ),

                'passkey' => array(
                        array( 'maxlength', 64 ),
                        array( 'optional' ),
                ),

                'confirmkey' => array(
                        array( 'maxlength', 64 ),
                        array( 'optional' ),
                )
            );
    }

}