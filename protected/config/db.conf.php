<?php

//Properti
$dbmap['Listing']['has_many']['Image'] = array('foreign_key'=>'listing_id');
$dbmap['Listing']['has_many']['Bid'] = array('foreign_key'=>'listing_id');
$dbmap['Listing']['has_many']['Favorite'] = array('foreign_key'=>'listing_id');
$dbmap['Listing']['belongs_to']['Type'] = array('foreign_key'=>'type_id');
$dbmap['Listing']['belongs_to']['User'] = array('foreign_key'=>'user_id');
$dbmap['Listing']['belongs_to']['Area'] = array('foreign_key'=>'area_id');

//TipeProperti
$dbmap['Type']['has_many']['Listing'] = array('foreign_key'=>'type_id');

//ListingDetail
$dbmap['ListingDetail']['belongs_to']['Listing'] = array('foreign_key'=>'listing_id');

//User
$dbmap['User']['has_many']['Listing'] = array('foreign_key'=>'user_id');
$dbmap['User']['has_many']['Reputation'] = array('foreign_key'=>'user_id');
$dbmap['User']['has_many']['Favorite'] = array('foreign_key'=>'user_id');
$dbmap['User']['has_many']['Log'] = array('foreign_key'=>'user_id');
$dbmap['User']['has_many']['Bid'] = array('foreign_key'=>'user_id');
$dbmap['User']['belongs_to']['Area'] = array('foreign_key'=>'area_id');

//Image
$dbmap['Image']['belongs_to']['Listing'] = array('foreign_key' => 'listing_id');

//Reputation
$dbmap['Reputation']['belongs_to']['User'] = array('foreign_key' => 'user_id');

//Favorite
$dbmap['Favorite']['belongs_to']['User'] = array('foreign_key' => 'user_id');
$dbmap['Favorite']['belongs_to']['Listing'] = array('foreign_key' => 'listing_id');

//Bid
$dbmap['Bid']['belongs_to']['User'] = array('foreign_key' => 'user_id');
$dbmap['Bid']['belongs_to']['Listing'] = array('foreign_key' => 'listing_id');

//Log
$dbmap['Log']['belongs_to']['User'] = array('foreign_key' => 'user_id');

//Area
$dbmap['Area']['has_many']['User'] = array('foreign_key' => 'area_id');
$dbmap['Area']['has_many']['Listing'] = array('foreign_key' => 'area_id');

//Message


//Feedback



//$dbconfig[ Environment or connection name] = array(Host, Database, User, Password, DB Driver, Make Persistent Connection?);
/**
 * Database settings are case sensitive.
 * To set collation and charset of the db connection, use the key 'collate' and 'charset'
 * array('localhost', 'database', 'root', '1234', 'mysql', true, 'collate'=>'utf8_unicode_ci', 'charset'=>'utf8'); 
 */
$dbconfig['dev'] = array('localhost', 'ta_doo', 'root', '', 'mysql', true);
$dbconfig['prod'] = array('localhost', 'ta_doo_prod', 'root', '', 'mysql', true);
?>