<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $data['title']; ?> - Hunian Asri</title>
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
        <link rel="stylesheet" href="<?php echo $data['rootUrl']; ?>global/css/flexslider.css">
        <link rel="stylesheet" href="<?php echo $data['rootUrl']; ?>global/css/parallax-slider.css">
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

        <?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc/front/header.php"; ?>

        <?php include "{$data['content']}.php"; ?>

        <?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc/front/footer.php"; ?>
        
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo $data['rootUrl']; ?>global/js/plugins/jquery-1.9.1.js"><\/script>')</script>
        <script src="//code.jquery.com/jquery-migrate-1.2.1.js"></script>

        <script src="<?php echo $data['rootUrl']; ?>global/js/plugins/bootstrap/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo $data['rootUrl']; ?>global/js/plugins/jquery.flexslider-min.js"></script> 
        <script type="text/javascript" src="<?php echo $data['rootUrl']; ?>global/js/plugins/jquery.cslider.js"></script> 

        <script src="<?php echo $data['rootUrl']; ?>global/js/main.js"></script>
        <script src="<?php echo $data['rootUrl']; ?>global/js/app.js"></script>
        <script src="<?php echo $data['rootUrl']; ?>global/js/index.js"></script>
        <script type="text/javascript">
            jQuery.migrateMute = true;
            jQuery(document).ready(function() {
                App.init();
                App.initSliders();
                Index.initParallaxSlider();
            });
        </script>        

        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>
