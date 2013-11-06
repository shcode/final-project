<?php
//Home
$route['*']['/'] = array('HomeController', 'index');
$route['*']['/faq'] = array('HomeController', 'faq');
$route['*']['/about'] = array('HomeController', 'about');
$route['*']['/testimonial'] = array('HomeController', 'testimonial');

$route['*']['/lelang'] = array('ListingController', 'auction');
$route['*']['/lelang/populer/'] = 
$route['*']['/lelang/populer/:page'] = array('ListingController', 'pop_auction');
$route['*']['/lelang/terbaru/'] = 
$route['*']['/lelang/terbaru/:page'] = array('ListingController', 'new_auction');

$route['*']['/sewa'] = array('ListingController', 'rent');
$route['*']['/sewa/populer/'] = 
$route['*']['/sewa/populer/:page'] = array('ListingController', 'pop_rent');
$route['*']['/sewa/terbaru/'] = 
$route['*']['/sewa/terbaru/:page'] = array('ListingController', 'new_rent');

$route['*']['/jual'] = array('ListingController', 'sell');
$route['*']['/jual/populer/'] = 
$route['*']['/jual/populer/:page'] = array('HomeController', 'pop_sell');
$route['*']['/jual/terbaru/'] = 
$route['*']['/jual/terbaru/:page'] = array('HomeController', 'new_sell');

$route['*']['/landingpage'] = array('HomeController', 'landing');


//Login
$route['*']['/login'] = array('LoginController', 'index');
$route['*']['/logout'] = array('LoginController', 'logout');
$route['*']['/fbcallback'] = array('LoginController', 'fbcallback');
$route['*']['/twcallback'] = array('LoginController', 'twcallback');
$route['*']['/ggcallback'] = array('LoginController', 'ggcallback');

//User
$route['*']['/user'] = array('UserController', 'index');
$route['*']['/user/profil'] = array('UserController', 'index');
$route['*']['/user/profil/:username'] = array('UserController', 'view_profil');
$route['*']['/user/edit'] = array('UserController', 'edit_profil');
$route['*']['/user/konfirmasi'] = array('UserController', 'konfirmasi');

//Listing
$route['*']['/listing'] = array('ListingController', 'index');
$route['*']['/listing/:page'] = array('ListingController', 'index');
$route['*']['/listing/view/:id'] = array('ListingController', 'view_listing');
$route['*']['/listing/edit/:id'] = array('ListingController', 'edit_listing');
$route['*']['/listing/tambah'] = array('ListingController', 'add');
$route['*']['/listing/tambah/step2'] = array('ListingController', 'add_step2');

//Bid

$route['*']['/bid'] = 
$route['*']['/bid/add'] = array('BidController', 'add_bid');
$route['*']['/bid/view/:id'] = array('BidController', 'view_bid');
$route['*']['/bid/cancel/:id'] = array('BidController', 'cancel_bid');

//Search
$route['*']['/cari'] = array('SearchController', 'index');
$route['*']['/cari/result'] = array('SearchController', 'result');
$route['*']['/cari/result/:page'] = array('SearchController', 'result');

//Search
$route['*']['/histori'] = array('HistoriController', 'index');
$route['*']['/histori/:page'] = array('HistoriController', 'index');

//Register
$route['*']['/register'] = array('UserController', 'register');
$route['*']['/register/cekuser'] = array('ProsesController', 'cek_user', 'extension' => array('.json'));
$route['*']['/register/cekemail'] = array('ProsesController', 'cek_email', 'extension' => array('.json'));

//Proses
$route['get']['/proses/getpropinsi'] = array('ProsesController', 'get_propinsi');
$route['get']['/proses/getkota'] = array('ProsesController', 'get_kota');
$route['get']['/proses/getkecamatan'] = array('ProsesController', 'get_kecamatan');
$route['*']['/proses/getimage/:id'] = array('ProsesController', 'get_image');
$route['*']['/proses/delimage/:nama'] = array('ProsesController', 'del_image');
$route['*']['/proses/upload'] = array('ProsesController', 'upload_image');
$route['*']['/proses/delete/:id'] = array('ProsesController', 'delete_image');

//Reputation
$route['get']['/reputation'] = 
$route['get']['/reputation/view'] = array('ReputationController', 'index');
$route['post']['/reputation/give/:id'] = array('ReputationController', 'give');

//Error
$route['*']['/error'] = array('ErrorController', 'index');
$route['*']['/403'] = array('ErrorController', 'error_403');

//$route['*']['/'] = array('MainController', 'index');
//
////---------- Delete if not needed ------------
$admin = array('admin'=>'1234');
//
////view the logs and profiles XML, filename = db.profile, log, trace.log, profile
$route['*']['/debug/:filename'] = array('MainController', 'debug');

////show all urls in app
//$route['*']['/allurl'] = array('MainController', 'allurl', 'authName'=>'DooPHP Admin', 'auth'=>$admin, 'authFail'=>'Unauthorized!');

////generate routes file. This replace the current routes.conf.php. Use with the sitemap tool.
//$route['post']['/gen_sitemap'] = array('MainController', 'gen_sitemap', 'authName'=>'DooPHP Admin', 'auth'=>$admin, 'authFail'=>'Unauthorized!');

////generate routes & controllers. Use with the sitemap tool.
//$route['post']['/gen_sitemap_controller'] = array('MainController', 'gen_sitemap_controller', 'authName'=>'DooPHP Admin', 'auth'=>$admin, 'authFail'=>'Unauthorized!');

////generate Controllers automatically
$route['*']['/gen_site'] = array('MainController', 'gen_site', 'authName'=>'DooPHP Admin', 'auth'=>$admin, 'authFail'=>'Unauthorized!');

////generate Models automatically
$route['*']['/gen_model'] = array('MainController', 'gen_model');

?>