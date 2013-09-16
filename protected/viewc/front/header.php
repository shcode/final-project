        <!--=== Top ===-->    
        <div class="top">
            <div class="container">         
                <ul class="loginbar pull-right"> 
                    <li>Welcome, Guest</li>  
                    <li class="devider">&nbsp;</li>
                    <li>Follow Us on &nbsp;
                        <a class="social" href="#"><i class="icon-facebook"></i></a>&nbsp;
                        <a class="social" href="#"><i class="icon-twitter"></i></a>&nbsp;
                        <a class="social" href="#"><i class="icon-rss"></i></a>
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
                                    <li>
                                        <a href="#">
                                            <i class="icon-legal icon-white"></i> Auction</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-shopping-cart icon-white"></i> Buy</a>
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