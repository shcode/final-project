<?php
//Home
$route['*']['/'] = array('HomeController', 'index');
$route['*']['/faq'] = array('HomeController', 'faq');
$route['*']['/help'] = array('HomeController', 'help');
$route['*']['/testimonial'] = array('HomeController', 'testimonial');
$route['*']['/lelang'] = array('HomeController', 'auction');
$route['*']['/lelang/:page'] = array('HomeController', 'auction');
$route['*']['/sewa'] = array('HomeController', 'rent');
$route['*']['/sewa/:page'] = array('HomeController', 'rent');
$route['*']['/jual'] = array('HomeController', 'sell');
$route['*']['/jual/:page'] = array('HomeController', 'sell');
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
$route['*']['/listing/view/:id'] = array('ListingController', 'view_properti');
$route['*']['/listing/edit/:id'] = array('ListingController', 'edit_properti');
$route['*']['/listing/cancel/:id'] = array('ListingController', 'cancel_bid');
$route['*']['/listing/bid/:id'] = array('ListingController', 'view_bid');
$route['*']['/listing/tambah'] = array('ListingController', 'add');
$route['*']['/listing/tambah/step2'] = array('ListingController', 'add_step2');
$route['*']['/listing/add/up_proses'] = array('ListingController', 'upload_action');
$route['*']['/listing/add/confirm'] = array('ListingController', 'confirmation');
$route['*']['/listing/add/success'] = array('ListingController', 'success');

//Search
$route['*']['/search'] = array('SearchController', 'index');
$route['*']['/search/result'] = array('SearchController', 'result');
$route['*']['/search/result/:page'] = array('SearchController', 'result');

//Search
$route['*']['/history'] = array('HistoriController', 'index');
$route['*']['/history/:page'] = array('HistoriController', 'index');

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