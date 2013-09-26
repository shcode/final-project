<?php

$acl['unconfirmed']['allow'] =
$acl['anonymous']['allow'] = array(
    'LoginController' => '*',
    'HomeController' => '*',
    'SearchController' => '*'
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
    'UserController' => '*'
);

?>