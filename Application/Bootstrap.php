<?php
/*
 * MMVC - Makarov's MVC Framework
 * GLOBAL.PHP; 5-24-2012
 * Holds all the classes needed for including!
 */
//Our configuration
include('Configuration.php');

//Our router
include('Router.php');

//Grab some interfaces
include('Library/Interfaces/Interface.Controller.php');
include('Library/Interfaces/Interface.Model.php');
include('Library/Interfaces/Interface.DataObject.php');

//Grab some handlers
include('Library/Handlers/ViewHandler.php'); //Our templating!!

//Grab all of our models
include('Models/Model.MySQL.php');
include('Models/Model.MySQLi.php');
include('Models/Model.PDO.php');

//Set our timezone
date_default_timezone_set('America/New_York');

//Our Site Handler
include('Site.php');


$_site = new Site($_config, new Router());


//Definitions
define('WEBSITE_URL', $_site->_config['site']['url']);
define('WEBSITE_DIRECTORY', $_site->_config['site']['directory']);
define('FULL_PATH', (WEBSITE_DIRECTORY == 'root') ? WEBSITE_URL : WEBSITE_URL . '/' . WEBSITE_DIRECTORY);
define('WEBMASTER_EMAIL', $_site->_config['site']['webmaster']);
define('THEME', ucfirst($_site->_config['site']['theme']));
//Site loading is done :D
?>
