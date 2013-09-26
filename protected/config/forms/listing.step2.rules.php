<?php
return array(
    "address" => array(
    	array("required", "- Alamat belum diisi")
    ),
    "province_id"  => array(
    	array("required", "- Propinsi belum diisi")
    ),
    "district_id"  => array(
    	array("required", "- Kota/Kab belum diisi")
    ),
    "subdistrict_id" => array(
    	array("required", "- Kecamatan belum diisi")
    ),
    "zip_code" => array(
    	array("required", "- Kode Pos belum diisi"),
		array("greaterThan", "0", "- Kode Pos salah")
    ),
    "longitude" => array(
    	array("required", "- Longitude belum diisi")
    ),
    "latitude" => array(
    	array("required", "- Latitude belum diisi")
    )
);

?>