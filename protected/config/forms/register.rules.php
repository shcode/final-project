<?php

return array(
    "username" => array(
        array("required", "- Username belum diisi."),
        array("dbExists", "- Username sudah pernah dipakai.")
    ),
    "email" => array(
        array("required", "- Email belum diisi."),
        array("email", "- Format email salah."),
        array("dbExist", "- Email sudah pernah dipakai.")
    ),
    "user_address" => array("required", "- Alamat belum diisi."),
    "province_id" => array("required", "- Propinsi belum diisi."),
    "district_id" => array("required", "- Kota belum diisi."),
    "subdistrict_id" => array("required", "- Kecamatan belum diisi."),
    "zip_code" => array("required", "- Kode Pos belum diisi."),
    "phone" => array("required", "- No. Telepon belum diisi."),
    "password" => array("required", "- Password belum diisi."),
    "password_confirm" => array(
        array("required", "- Konfirmasi Password belum diisi."),
        array("equalAs", "post", "password","- Konfirmasi Password tidak Sama.")
    ),
    "name_user" => array("required", "- Nama Lengkap belum diisi."),
    "agree" => array("required", "- Anda belum menyetujui syarat dan ketentuan.")
);
?>
