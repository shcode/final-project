<?php
Doo::loadCore('db/DooModel');

class ImageBase extends DooModel{

    /**
     * @var int Max length is 10.  unsigned.
     */
    public $id_image;

    /**
     * @var varchar Max length is 20.
     */
    public $name;

    /**
     * @var text
     */
    public $note;

    /**
     * @var tinyint Max length is 6.
     */
    public $index;

    /**
     * @var tinyint Max length is 6.
     */
    public $status;

    /**
     * @var int Max length is 11.
     */
    public $listing_id;

    /**
     * @var timestamp
     */
    public $created_at;

    public $_table = 'image';
    public $_primarykey = 'id_image';
    public $_fields = array('id_image','name','note','index','status','listing_id','created_at');

    public function getVRules() {
        return array(
                'id_image' => array(
                        array( 'integer' ),
                        array( 'min', 0 ),
                        array( 'maxlength', 10 ),
                        array( 'optional' ),
                ),

                'name' => array(
                        array( 'maxlength', 20 ),
                        array( 'notnull' ),
                ),

                'note' => array(
                        array( 'optional' ),
                ),

                'index' => array(
                        array( 'integer' ),
                        array( 'maxlength', 6 ),
                        array( 'optional' ),
                ),

                'status' => array(
                        array( 'integer' ),
                        array( 'maxlength', 6 ),
                        array( 'optional' ),
                ),

                'listing_id' => array(
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