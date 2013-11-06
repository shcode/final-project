<?php

$acl['unconfirmed']['allow'] = array(
    'LoginController' => '*',
    'HomeController' => '*',
    'SearchController' => '*',
    'ProsesController' => '*',
    'ErrorController' => '*',
    'ListingController' => array("view_listing", "auction", "pop_auction", 
        "new_auction", "sell", "pop_sell", "new_sell", "rent", "pop_rent", "new_rent"),
    'UserController' => array("index", "view_profil")
);

$acl['anonymous']['allow'] = array(
    'LoginController' => '*',
    'HomeController' => '*',
    'SearchController' => '*',
    'ProsesController' => '*',
    'ErrorController' => '*',
    'UserController' => array("register","index", "view_profil") ,
    'ListingController' => array("view_listing", "auction", "pop_auction", 
        "new_auction", "sell", "pop_sell", "new_sell", "rent", "pop_rent", "new_rent")
);


$acl['banned']['allow'] = array(
	'HomeController' => '*',
	);
 
$acl['member']['allow'] = array(
    'LoginController' => array('logout'),
    'HomeController' => '*',
    'ListingController' => '*',
    'ProsesController' => '*',
    'HistoriController' => '*',
    'SearchController' => '*',
    'UserController' => '*',
    'BidController' => '*',
    'HistoriController' => '*'
);

$acl['member']['deny'] = array(
    'UserController' => array("register")
    );

$acl['unconfirmed']['failRoute'] = array(
);

?>