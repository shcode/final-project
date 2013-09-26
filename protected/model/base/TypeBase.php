<?php
Doo::loadCore('db/DooModel');

class TypeBase extends DooModel{

    /**
     * @var int Max length is 10.  unsigned.
     */
    public $type_id;

    /**
     * @var varchar Max length is 20.
     */
    public $type_name;

    /**
     * @var tinyint Max length is 1.
     */
    public $enable_rent;

    /**
     * @var tinyint Max length is 1.
     */
    public $enable_sell;

    /**
     * @var tinyint Max length is 1.
     */
    public $enable_auction;

    public $_table = 'type';
    public $_primarykey = 'type_id';
    public $_fields = array('type_id','type_name','enable_rent','enable_sell','enable_auction');

    public function getVRules() {
        return array(
                'type_id' => array(
                        array( 'integer' ),
                        array( 'min', 0 ),
                        array( 'maxlength', 10 ),
                        array( 'optional' ),
                ),

                'type_name' => array(
                        array( 'maxlength', 20 ),
                        array( 'notnull' ),
                ),

                'enable_rent' => array(
                        array( 'integer' ),
                        array( 'maxlength', 1 ),
                        array( 'optional' ),
                ),

                'enable_sell' => array(
                        array( 'integer' ),
                        array( 'maxlength', 1 ),
                        array( 'optional' ),
                ),

                'enable_auction' => array(
                        array( 'integer' ),
                        array( 'maxlength', 1 ),
                        array( 'optional' ),
                )
            );
    }

}