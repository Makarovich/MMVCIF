<?php
/*
 * MMVC - Makarov's MVC Framework
 * GLOBAL.PHP; 5-24-2012
 * Holds all the classes needed for including!
 */

/*
 * SIMPLE CONFIGURATION
 */
define('WEBSITE_URL', 'localhost');
define('WEBSITE_DIRECTORY', 'mvc');
define('FULL_PATH', (WEBSITE_DIRECTORY == 'root') ? WEBSITE_URL : WEBSITE_URL . '/' . WEBSITE_DIRECTORY);
define('WEBMASTER_EMAIL', 'makarov@ragezone.com');
/*
 * END SIMPLE CONFIGURATION
 */
define('IN_MVC', true);

//Our router
include('router.php');

//Grab some interfaces
include('interfaces/Interface.Controller.php');

//Grab some handlers
include('handlers/ViewHandler.php'); //Our templating!!

?>
