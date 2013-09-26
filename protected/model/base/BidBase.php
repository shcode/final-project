<?php
Doo::loadCore('db/DooModel');

class BidBase extends DooModel{

    /**
     * @var int Max length is 10.  unsigned.
     */
    public $bid_id;

    /**
     * @var double
     */
    public $value;

    /**
     * @var int Max length is 10.  unsigned.
     */
    public $user_id;

    /**
     * @var tinyint Max length is 4.
     */
    public $status;

    /**
     * @var timestamp
     */
    public $created_at;

    public $_table = 'bid';
    public $_primarykey = 'bid_id';
    public $_fields = array('bid_id','value','user_id','status','created_at');

    public function getVRules() {
        return array(
                'bid_id' => array(
                        array( 'integer' ),
                        array( 'min', 0 ),
                        array( 'maxlength', 10 ),
                        array( 'optional' ),
                ),

                'value' => array(
                        array( 'float' ),
                        array( 'notnull' ),
                ),

                'user_id' => array(
                        array( 'integer' ),
                        array( 'min', 0 ),
                        array( 'maxlength', 10 ),
                        array( 'notnull' ),
                ),

                'status' => array(
                        array( 'integer' ),
                        array( 'maxlength', 4 ),
                        array( 'notnull' ),
                ),

                'created_at' => array(
                        array( 'datetime' ),
                        array( 'notnull' ),
                )
            );
    }

}