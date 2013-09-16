<?php
//Home
$route['*']['/'] = array('HomeController', 'index');
$route['*']['/faq'] = array('HomeController', 'faq');
$route['*']['/help'] = array('HomeController', 'help');
$route['*']['/testimonial'] = array('HomeController', 'testimonial');
$route['*']['/auction'] = array('HomeController', 'auction');
$route['*']['/auction/:page'] = array('HomeController', 'auction');
$route['*']['/rent'] = array('HomeController', 'rent');
$route['*']['/rent/:page'] = array('HomeController', 'rent');
$route['*']['/sell'] = array('HomeController', 'sell');
$route['*']['/sell/:page'] = array('HomeController', 'sell');

//Login
$route['*']['/login'] = array('LoginController', 'index');
$route['*']['/logout'] = array('LoginController', 'logout');
$route['*']['/fbcallback'] = array('LoginController', 'fbcallback');
$route['*']['/twcallback'] = array('LoginController', 'twcallback');
$route['*']['/ggcallback'] = array('LoginController', 'ggcallback');

//User
$route['*']['/user'] = array('UserController', 'index');
$route['*']['/user/profil/:id'] = array('UserController', 'view_profil');
$route['*']['/user/edit'] = array('UserController', 'edit_profil');
$route['*']['/user/report'] = array('UserController', 'user_report');

//Listing
$route['*']['/listing'] = array('PropertiController', 'index');
$route['*']['/listing/:page'] = array('PropertiController', 'index');
$route['*']['/listing/view/:id'] = array('PropertiController', 'view_properti');
$route['*']['/listing/edit/:id'] = array('PropertiController', 'edit_properti');
$route['*']['/listing/cancel/:id'] = array('PropertiController', 'cancel_bid');
$route['*']['/listing/bid/:id'] = array('PropertiController', 'view_bid');
$route['*']['/listing/add/plan'] = array('PropertiController', 'plan');
$route['*']['/listing/add/fillform/:id'] = array('PropertiController', 'form');
$route['*']['/listing/upload/:id'] = 
$route['*']['/listing/add/upload/:id'] = array('PropertiController', 'upload_img');
$route['*']['/listing/add/up_proses'] = array('PropertiController', 'upload_action');
$route['*']['/listing/add/confirm'] = array('PropertiController', 'confirmation');
$route['*']['/listing/add/success'] = array('PropertiController', 'success');

//Search
$route['*']['/search'] = array('SearchController', 'index');
$route['*']['/search/result'] = array('SearchController', 'result');
$route['*']['/search/result/:page'] = array('SearchController', 'result');

//Search
$route['*']['/history'] = array('HistoriController', 'index');
$route['*']['/history/:page'] = array('HistoriController', 'index');

//Register
$route['*']['/register'] = array('RegisterController', 'index');
$route['post']['/register/konfirmasi'] = array('RegisterController', 'confirm');
$route['*']['/register/up_proses'] = array('RegisterController', 'upload_action');
$route['post']['/register/up_sukses'] = array('RegisterController', 'upload_success');
$route['*']['/register/upload'] = array('RegisterController', 'upload_id');

//Proses
$route['post']['/register/check_user'] = array('ProsesController', 'cek_user');
$route['post']['/register/check_email'] = array('ProsesController', 'cek_email');
$route['get']['/process/getpropinsi'] = array('ProsesController', 'get_propinsi');
$route['get']['/process/getkota'] = array('ProsesController', 'get_kota');
$route['*']['/process/getimage/:id'] = array('ProsesController', 'get_image');
$route['*']['/process/delimage/:nama'] = array('ProsesController', 'del_image');

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