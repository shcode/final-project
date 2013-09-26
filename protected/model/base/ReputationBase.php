<?php
Doo::loadCore('db/DooModel');

class ReputationBase extends DooModel{

    /**
     * @var int Max length is 10.  unsigned.
     */
    public $reputation_id;

    /**
     * @var int Max length is 10.  unsigned.
     */
    public $user_id;

    /**
     * @var int Max length is 10.  unsigned.
     */
    public $from_user;

    /**
     * @var int Max length is 11.
     */
    public $value;

    /**
     * @var timestamp
     */
    public $created_at;

    public $_table = 'reputation';
    public $_primarykey = 'reputation_id';
    public $_fields = array('reputation_id','user_id','from_user','value','created_at');

    public function getVRules() {
        return array(
                'reputation_id' => array(
                        array( 'integer' ),
                        array( 'min', 0 ),
                        array( 'maxlength', 10 ),
                        array( 'optional' ),
                ),

                'user_id' => array(
                        array( 'integer' ),
                        array( 'min', 0 ),
                        array( 'maxlength', 10 ),
                        array( 'notnull' ),
                ),

                'from_user' => array(
                        array( 'integer' ),
                        array( 'min', 0 ),
                        array( 'maxlength', 10 ),
                        array( 'notnull' ),
                ),

                'value' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'notnull' ),
                ),

                'created_at' => array(
                        array( 'datetime' ),
                        array( 'notnull' ),
                )
            );
    }

}