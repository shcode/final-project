<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Member Login | Hunian Asri</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        
        <link rel="stylesheet" href="<?php echo $data['rootUrl']; ?>global/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo $data['rootUrl']; ?>global/css/bootstrap-responsive.css">
        <link rel="stylesheet" href="<?php echo $data['rootUrl']; ?>global/css/header.css">
        <link rel="stylesheet" href="<?php echo $data['rootUrl']; ?>global/css/style.css">
        <link rel="stylesheet" href="<?php echo $data['rootUrl']; ?>global/css/style-responsive.css">
        <link rel="stylesheet" href="<?php echo $data['rootUrl']; ?>global/css/main.css">
        <link rel="stylesheet" href="<?php echo $data['rootUrl']; ?>global/css/theme/red.css">
        <link rel="stylesheet" href="<?php echo $data['rootUrl']; ?>global/css/font-awesome.css">
        <!--[if IE 7]>
            <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css">
        <![endif]-->
        <!--[if lt IE 9]>
        <link rel="stylesheet" type="text/css" href="<?php echo $data['rootUrl']; ?>global/css/jquery.ui.1.10.2.ie.css"/>
        <![endif]-->            

        <script src="<?php echo $data['rootUrl']; ?>global/js/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- This code is taken from http://twitter.github.com/bootstrap/examples/hero.html -->

        <!--=== Top ===-->    
        <div class="top">
            <div class="container">         
                <ul class="loginbar pull-right"> 
                    <li>Welcome, Guest</li>  
                    <li class="devider">&nbsp;</li>
                    <li>Follow Us on &nbsp;
                        <a class="social" href=""><i class="icon-facebook"></i></a>&nbsp;
                        <a class="social" href=""><i class="icon-twitter"></i></a>&nbsp;
                        <a class="social" href=""><i class="icon-rss"></i></a>
                    </li>  
                </ul>
            </div>      
        </div><!--/top-->
        <!--=== End Top ===-->  

        <!--=== Header ===-->
        <div class="header">               
            <div class="container"> 
                <!-- Logo -->       
                <div class="logo">                                             
                    <a href="index.html"><img id="logo-header" src="<?php echo $data['rootUrl']; ?>global/img/logo.png" alt="Logo"></a>
                </div>
                <!-- /logo -->        
                                            
                <!-- Menu -->       
                <div class="navbar">
                    <div class="navbar-inner">
                        <div class="container">
                            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </a>
                            
                            <div class="nav-collapse collapse">
                                <ul class="nav">
                                    <li class="active">
                                        <a href="#">
                                            <i class="icon-legal icon-white"></i> Auction</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-shopping-cart icon-white"></i> Sell</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-home icon-white"></i> Rent</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-book icon-white"></i> FAQ</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-info-sign icon-white"></i> About</a>
                                    </li>
                                </ul>
                                <ul class="nav pull-right">
                                    <li class="dropdown">
                                        <a class="dropdown-toggle" href="#" data-dropdown="#dropdown-signin" data-toggle="dropdown"><i class="icon-lock icon-white"></i> Sign In
                                            <strong class="caret"></strong>
                                        </a>
                                        <div class="dropdown-menu" id="dropdown-signin" style="padding: 15px; padding-bottom: 0px;">
                                            <form method="post" action="login" accept-charset="UTF-8">
                                                <div class="input-prepend">
                                                    <span class="add-on"><i class="icon-user"></i></span>
                                                    <input type="text" placeholder="Username" id="username" name="username">
                                                </div>
                                                <div class="input-prepend">
                                                    <span class="add-on"><i class="icon-lock"></i></span>
                                                    <input type="password" placeholder="Password" id="password" name="password">
                                                </div>
                                                <label class="string optional" for="user_remember_me">
                                                    <input class="pull-left" style="margin-right: 10px;" type="checkbox" name="remember-me" id="remember-me" value="1">Remember me</label>
                                                <input class="btn-u hover-effect btn-primary btn-block" type="submit" id="sign-in" value="Sign In">
                                                <label style="text-align:center;margin-top:5px">or</label>
                                                <a class="btn btn-primary btn-block" type="button" id="sign-in-facebook">
                                                    <i class="icon-facebook icon-white"></i> Sign In with Facebook</a>
                                                <a class="btn btn-primary btn-block" type="button" id="sign-in-twitter">
                                                    <i class="icon-twitter icon-white"></i> Sign In with Twitter</a>
                                                <a class="btn btn-primary btn-block" type="button" id="sign-in-google">
                                                    <i class="icon-google-plus-sign icon-white"></i> Sign In with Google</a>
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!--/.nav-collapse -->
                        </div>
                        <!--/.container-fluid -->
                    </div>
                    <!--/.navbar-inner -->
                </div>
                <!--/.navbar -->            
            </div><!-- /container -->               
        </div><!--/header -->      
        <!--=== End Header ===-->        

        <div class="container" style="margin-top:50px">     
            <div class="row-fluid">
                <form class="log-page">
                    <h3>Login to your account</h3>    
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-user"></i></span>
                        <input class="input-xlarge" type="text" placeholder="Username">
                    </div>
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-lock"></i></span>
                        <input class="input-xlarge" type="password" placeholder="Password">
                    </div>
                    <div class="controls form-inline">
                        <label class="checkbox"><input type="checkbox"> Remember me</label>
                        <button class="btn-u pull-right" type="submit">Login</button>
                    </div>
                    <hr>
                    <a class="btn btn-primary btn-block" type="button" id="sign-in-facebook">
                        <i class="icon-facebook icon-white"></i> Login dengan Facebook</a>
                    <a class="btn btn-primary btn-block" type="button" id="sign-in-twitter">
                        <i class="icon-twitter icon-white"></i> Login dengan Twitter</a>
                    <a class="btn btn-primary btn-block" type="button" id="sign-in-google">
                        <i class="icon-google-plus-sign icon-white"></i> Login dengan Google</a>
                    <hr>
                    <h4>Belum punya akun? Daftar <a class="color-green" href="<?php echo $data['rootUrl']; ?>register">di sini</a>.</h4>    
                    <p>Lupa password ? jangan khawatir, klik <a class="color-green" href="#">di sini</a> untuk mereset password.</p>
                </form>
            </div><!--/row-fluid-->
        </div>


        
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo $data['rootUrl']; ?>global/js/plugins/jquery-1.9.1.js"><\/script>')</script>
        <script src="//code.jquery.com/jquery-migrate-1.2.1.js"></script>

        <script src="<?php echo $data['rootUrl']; ?>global/js/plugins/bootstrap/bootstrap.min.js"></script>
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>
