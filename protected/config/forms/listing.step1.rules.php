<?php

return array(
    "title" => array(
        array("required", "- Judul belum diisi.")
    ),
    "description" => array(
        array("required", "- Deskripsi belum diisi.")
    ),
    "type_id" => array(
        array("required", "- Jenis Properti harus diisi")
    ),
    "listing_type" => array(
        array("required", "- Jenis Iklan harus diisi")
    ),
    "price" => array(
        array("greaterThanOrEqual", 1, "- Input untuk Harga salah."),
        array("optional")
    ),
    "range_value" => array(
        array("greaterThanOrEqual", 1, "- Input untuk Jangka Waktu salah."),
        array("optional")
    ),
    "start_price" => array(
        array("greaterThanOrEqual", 1, "- Input untuk Harga Awal salah."),
        array("optional")
    ),
    "min_bid" => array(
        array("greaterThanOrEqual", 1, "- Input untuk Minimal Bid salah."),
        array("optional")
    ),
    "start_date" => array(
        array("datetime", "- Waktu Mulai salah."),
        array("optional")
    ),
    "end_date" => array(
        array("datetime", "- Waktu Berakhir salah."),
        array("optional")
    )
);
?>
