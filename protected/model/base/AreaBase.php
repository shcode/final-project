<?php
Doo::loadCore('db/DooModel');

class AreaBase extends DooModel{

    /**
     * @var int Max length is 10.  unsigned.
     */
    public $area_id;

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
     * @var varchar Max length is 255.
     */
    public $name;

    /**
     * @var int Max length is 11.
     */
    public $level;

    public $_table = 'area';
    public $_primarykey = 'area_id';
    public $_fields = array('area_id','province_id','district_id','subdistrict_id','name','level');

    public function getVRules() {
        return array(
                'area_id' => array(
                        array( 'integer' ),
                        array( 'min', 0 ),
                        array( 'maxlength', 10 ),
                        array( 'optional' ),
                ),

                'province_id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'notnull' ),
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

                'name' => array(
                        array( 'maxlength', 255 ),
                        array( 'notnull' ),
                ),

                'level' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                )
            );
    }

}