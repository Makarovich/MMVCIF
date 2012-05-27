<?php
/*
 * MMVC - Makarov's MVC Framework
 * CONTROLLER.PHP; 5-24-2012
 * Routes requests and such!
 */

include ('Bootstrap.php');

$_url = (WEBSITE_DIRECTORY == 'root') ? '/' : '/' . WEBSITE_DIRECTORY . '/';
$_page = str_replace($_url, null, $_SERVER['REQUEST_URI']);

if ($_page == '') // No request so therefore they're trying to go to the index
{
    $_page = 'index';
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') //We have some valid $_POST requests so let's call the post controller.
{
    $_page = 'post';
}

define('CURRENT_PAGE', $_page);

$_site->_router->direct($_page);
?>

