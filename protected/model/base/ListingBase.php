<?php
Doo::loadCore('db/DooModel');

class ListingBase extends DooModel{

    /**
     * @var int Max length is 20.
     */
    public $listing_id;

    /**
     * @var varchar Max length is 255.
     */
    public $title;

    /**
     * @var text
     */
    public $description;

    /**
     * @var text
     */
    public $address;

    /**
     * @var int Max length is 11.
     */
    public $district_id;

    /**
     * @var int Max length is 11.
     */
    public $province_id;

    /**
     * @var int Max length is 11.
     */
    public $subdistrict_id;

    /**
     * @var int Max length is 11.
     */
    public $area_id;

    /**
     * @var varchar Max length is 255.
     */
    public $street;

    /**
     * @var varchar Max length is 20.
     */
    public $house_number;

    /**
     * @var varchar Max length is 5.
     */
    public $zip_code;

    /**
     * @var double
     */
    public $land;

    /**
     * @var double
     */
    public $building;

    /**
     * @var tinyint Max length is 4.
     */
    public $floor;

    /**
     * @var tinyint Max length is 4.
     */
    public $bed;

    /**
     * @var tinyint Max length is 4.
     */
    public $bath;

    /**
     * @var tinyint Max length is 4.
     */
    public $maid_bed;

    /**
     * @var tinyint Max length is 4.
     */
    public $mad_bath;

    /**
     * @var tinyint Max length is 1.
     */
    public $furnished;

    /**
     * @var varchar Max length is 20.
     */
    public $electricity;

    /**
     * @var varchar Max length is 20.
     */
    public $water_source;

    /**
     * @var int Max length is 11.
     */
    public $garage;

    /**
     * @var int Max length is 11.
     */
    public $telp_line;

    /**
     * @var enum 'Hak Milik','Hak Guna Bangunan','Strata','Girik','Lainnya').
     */
    public $certificate;

    /**
     * @var enum 'Utara','Timur Laut','Timur','Tenggara','Selatan','Barat Daya','Barat','Barat Laut').
     */
    public $orientate;

    /**
     * @var tinyint Max length is 4.
     */
    public $status;

    /**
     * @var varchar Max length is 20.
     */
    public $longitude;

    /**
     * @var varchar Max length is 20.
     */
    public $latitude;

    /**
     * @var int Max length is 10.  unsigned.
     */
    public $view_count;

    /**
     * @var int Max length is 10.  unsigned.
     */
    public $type_id;

    /**
     * @var int Max length is 10.  unsigned.
     */
    public $user_id;

    /**
     * @var double unsigned
     */
    public $price;

    /**
     * @var enum '"Hari"','"Minggu"','"Bulan"','"Tahun"').
     */
    public $range_time;

    /**
     * @var int Max length is 10.  unsigned.
     */
    public $range_value;

    /**
     * @var double unsigned
     */
    public $start_price;

    /**
     * @var double unsigned
     */
    public $buy_now;

    /**
     * @var double unsigned
     */
    public $min_bid;

    /**
     * @var datetime
     */
    public $start_date;

    /**
     * @var datetime
     */
    public $end_date;

    /**
     * @var tinyint Max length is 1.
     */
    public $open_bid;

    /**
     * @var enum 'Jual','Sewa','Lelang').
     */
    public $listing_type;

    /**
     * @var timestamp
     */
    public $created_at;

    /**
     * @var timestamp
     */
    public $updated_at;

    public $_table = 'listing';
    public $_primarykey = 'listing_id';
    public $_fields = array('listing_id','title','description','address','district_id','province_id','subdistrict_id','area_id','street','house_number','zip_code','land','building','floor','bed','bath','maid_bed','mad_bath','furnished','electricity','water_source','garage','telp_line','certificate','orientate','status','longitude','latitude','view_count','type_id','user_id','price','range_time','range_value','start_price','buy_now','min_bid','start_date','end_date','open_bid','listing_type','created_at','updated_at');

    public function getVRules() {
        return array(
                'listing_id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 20 ),
                        array( 'optional' ),
                ),

                'title' => array(
                        array( 'maxlength', 255 ),
                        array( 'notnull' ),
                ),

                'description' => array(
                        array( 'notnull' ),
                ),

                'address' => array(
                        array( 'optional' ),
                ),

                'district_id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'notnull' ),
                ),

                'province_id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'notnull' ),
                ),

                'subdistrict_id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'notnull' ),
                ),

                'area_id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'street' => array(
                        array( 'maxlength', 255 ),
                        array( 'optional' ),
                ),

                'house_number' => array(
                        array( 'maxlength', 20 ),
                        array( 'optional' ),
                ),

                'zip_code' => array(
                        array( 'maxlength', 5 ),
                        array( 'optional' ),
                ),

                'land' => array(
                        array( 'float' ),
                        array( 'optional' ),
                ),

                'building' => array(
                        array( 'float' ),
                        array( 'optional' ),
                ),

                'floor' => array(
                        array( 'integer' ),
                        array( 'maxlength', 4 ),
                        array( 'optional' ),
                ),

                'bed' => array(
                        array( 'integer' ),
                        array( 'maxlength', 4 ),
                        array( 'optional' ),
                ),

                'bath' => array(
                        array( 'integer' ),
                        array( 'maxlength', 4 ),
                        array( 'optional' ),
                ),

                'maid_bed' => array(
                        array( 'integer' ),
                        array( 'maxlength', 4 ),
                        array( 'optional' ),
                ),

                'mad_bath' => array(
                        array( 'integer' ),
                        array( 'maxlength', 4 ),
                        array( 'optional' ),
                ),

                'furnished' => array(
                        array( 'integer' ),
                        array( 'maxlength', 1 ),
                        array( 'optional' ),
                ),

                'electricity' => array(
                        array( 'maxlength', 20 ),
                        array( 'optional' ),
                ),

                'water_source' => array(
                        array( 'maxlength', 20 ),
                        array( 'optional' ),
                ),

                'garage' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'telp_line' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'certificate' => array(
                        array( 'optional' ),
                ),

                'orientate' => array(
                        array( 'optional' ),
                ),

                'status' => array(
                        array( 'integer' ),
                        array( 'maxlength', 4 ),
                        array( 'optional' ),
                ),

                'longitude' => array(
                        array( 'maxlength', 20 ),
                        array( 'optional' ),
                ),

                'latitude' => array(
                        array( 'maxlength', 20 ),
                        array( 'optional' ),
                ),

                'view_count' => array(
                        array( 'integer' ),
                        array( 'min', 0 ),
                        array( 'maxlength', 10 ),
                        array( 'optional' ),
                ),

                'type_id' => array(
                        array( 'integer' ),
                        array( 'min', 0 ),
                        array( 'maxlength', 10 ),
                        array( 'notnull' ),
                ),

                'user_id' => array(
                        array( 'integer' ),
                        array( 'min', 0 ),
                        array( 'maxlength', 10 ),
                        array( 'notnull' ),
                ),

                'price' => array(
                        array( 'optional' ),
                ),

                'range_time' => array(
                        array( 'optional' ),
                ),

                'range_value' => array(
                        array( 'integer' ),
                        array( 'min', 0 ),
                        array( 'maxlength', 10 ),
                        array( 'optional' ),
                ),

                'start_price' => array(
                        array( 'optional' ),
                ),

                'buy_now' => array(
                        array( 'optional' ),
                ),

                'min_bid' => array(
                        array( 'optional' ),
                ),

                'start_date' => array(
                        array( 'datetime' ),
                        array( 'optional' ),
                ),

                'end_date' => array(
                        array( 'datetime' ),
                        array( 'optional' ),
                ),

                'open_bid' => array(
                        array( 'integer' ),
                        array( 'maxlength', 1 ),
                        array( 'optional' ),
                ),

                'listing_type' => array(
                        array( 'notnull' ),
                ),

                'created_at' => array(
                        array( 'datetime' ),
                        array( 'optional' ),
                ),

                'updated_at' => array(
                        array( 'datetime' ),
                        array( 'notnull' ),
                )
            );
    }

}