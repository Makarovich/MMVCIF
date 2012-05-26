<?php
/*
 * MMVC - Makarov's MVC Framework
 * GLOBAL.PHP; 5-24-2012
 * Holds all the classes needed for including!
 */
//Our configuration
include('configuration.php');

//Our router
include('router.php');

//Grab some interfaces
include('interfaces/Interface.Controller.php');
include('interfaces/Interface.Model.php');
include('interfaces/Interface.DataObject.php');

//Grab some handlers
include('handlers/ViewHandler.php'); //Our templating!!

//Grab all of our models
include('models/Model.MySQL.php');
include('models/Model.MySQLi.php');
include('models/Model.PDO.php');

//Set our timezone
date_default_timezone_set('America/New_York');

//Our Site Handler
include('site.php');
$_site = new Site($_config, new Router());

//Definitions
define('WEBSITE_URL', $_site->_config['site']['url']);
define('WEBSITE_DIRECTORY', $_site->_config['site']['directory']);
define('FULL_PATH', (WEBSITE_DIRECTORY == 'root') ? WEBSITE_URL : WEBSITE_URL . '/' . WEBSITE_DIRECTORY);
define('WEBMASTER_EMAIL', $_site->_config['site']['webmaster']);

//Site loading is done :D
?>
