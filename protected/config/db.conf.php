<?php

//Properti
$dbmap['Listing']['has_one']['ListingDetail'] = array('foreign_key'=>'id_properti');
$dbmap['Listing']['has_many']['Image'] = array('foreign_key'=>'id_properti');
$dbmap['Properti']['belongs_to']['TipeProperti'] = array('foreign_key'=>'id_ptipe');
$dbmap['Properti']['belongs_to']['User'] = array('foreign_key'=>'id_user');

//TipeProperti
$dbmap['TipeProperti']['has_many']['Properti'] = array('foreign_key'=>'id_ptipe');

//Transaksi
$dbmap['Transaksi']['has_many']['DetilTransaksi'] = array('foreign_key'=>'id_transaksi');
$dbmap['Transaksi']['has_many']['Report'] = array('foreign_key'=>'id_transaksi');
$dbmap['Transaksi']['belongs_to']['Properti'] = array('foreign_key'=>'id_properti');
$dbmap['Transaksi']['belongs_to']['TipeTransaksi'] = array('foreign_key'=>'id_ttipe');

//TipeTransaksi
$dbmap['TipeTransaksi']['has_many']['Transaksi'] = array('foreign_key'=>'id_ttipe');

//User
$dbmap['User']['has_many']['DetilTransaksi'] = array('foreign_key'=>'id_user');
$dbmap['User']['has_many']['Properti'] = array('foreign_key'=>'id_user');
$dbmap['User']['has_many']['Report'] = array('foreign_key'=>'id_user');
$dbmap['User']['has_many']['Rating'] = array('foreign_key'=>'id_user', 'through'=>'user_rating' );

//DetilTransaksi
$dbmap['DetilTransaksi']['belongs_to']['Transaksi'] = array('foreign_key' => 'id_transaksi');
$dbmap['DetilTransaksi']['belongs_to']['User'] = array('foreign_key' => 'id_user');

//Image
$dbmap['Image']['belongs_to']['Properti'] = array('foreign_key' => 'id_properti');

//Report
$dbmap['Report']['belongs_to']['Transaksi'] = array('foreign_key' => 'id_transaksi');
$dbmap['Report']['belongs_to']['User'] = array('foreign_key' => 'id_user');

//Rating
$dbmap['Rating']['has_one']['User'] = array('foreign_key' => 'id_urate', 'through'=>'user_rating');

//$dbconfig[ Environment or connection name] = array(Host, Database, User, Password, DB Driver, Make Persistent Connection?);
/**
 * Database settings are case sensitive.
 * To set collation and charset of the db connection, use the key 'collate' and 'charset'
 * array('localhost', 'database', 'root', '1234', 'mysql', true, 'collate'=>'utf8_unicode_ci', 'charset'=>'utf8'); 
 */
$dbconfig['dev'] = array('localhost', 'ta_doo', 'root', '', 'mysql', true);
$dbconfig['prod'] = array('localhost', 'ta_doo', 'root', '', 'mysql', true);
?>