<?php
setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
include './protected/config/common.conf.php';
include './protected/config/routes.conf.php';
include './protected/config/db.conf.php';
include './protected/config/acl.conf.php';

#Just include this for production mode
//include $config['BASE_PATH'].'deployment/deploy.php';
include $config['BASE_PATH'].'Doo.php';
include $config['BASE_PATH'].'app/DooConfig.php';

# Uncomment for auto loading the framework classes.
//spl_autoload_register('Doo::autoload');
Doo::acl()->rules = $acl;
Doo::acl()->defaultFailedRoute = '/403';
Doo::conf()->set($config);

# remove this if you wish to see the normal PHP error view.
include $config['BASE_PATH'].'diagnostic/debug.php';

# database usage
//Doo::useDbReplicate();	#for db replication master-slave usage
Doo::db()->setMap($dbmap);
Doo::db()->setDb($dbconfig, $config['APP_MODE']);
Doo::db()->sql_tracking = true;	#for debugging/profiling purpose

Doo::app()->route = $route;

# Uncomment for DB profiling
Doo::logger()->beginDbProfile('doowebsite');
Doo::app()->run();
Doo::logger()->endDbProfile('doowebsite');
Doo::logger()->rotateFile(20);
Doo::logger()->writeDbProfiles();
?>