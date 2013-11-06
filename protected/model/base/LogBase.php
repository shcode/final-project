<?php
Doo::loadCore('db/DooModel');

class LogBase extends DooModel{

    /**
     * @var int Max length is 10.  unsigned.
     */
    public $logs_id;

    /**
     * @var int Max length is 10.  unsigned.
     */
    public $user_id;

    /**
     * @var text
     */
    public $logs;

    /**
     * @var timestamp
     */
    public $created_at;

    /**
     * @var varchar Max length is 50.
     */
    public $log_info;

    public $_table = 'log';
    public $_primarykey = 'logs_id';
    public $_fields = array('logs_id','user_id','logs','created_at','log_info');

    public function getVRules() {
        return array(
                'logs_id' => array(
                        array( 'integer' ),
                        array( 'min', 0 ),
                        array( 'maxlength', 10 ),
                        array( 'optional' ),
                ),

                'user_id' => array(
                        array( 'integer' ),
                        array( 'min', 0 ),
                        array( 'maxlength', 10 ),
                        array( 'optional' ),
                ),

                'logs' => array(
                        array( 'optional' ),
                ),

                'created_at' => array(
                        array( 'datetime' ),
                        array( 'notnull' ),
                ),

                'log_info' => array(
                        array( 'maxlength', 50 ),
                        array( 'optional' ),
                )
            );
    }

}