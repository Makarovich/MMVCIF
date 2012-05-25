<?php
/*
 * MMVC - Makarov's MVC Framework
 * CONTROLLER.PHP; 5-24-2012
 * Routes requests and such!
 */

include ('global.php');

$_page = null;
$_url = (WEBSITE_DIRECTORY == 'root') ? '/' : '/' . WEBSITE_DIRECTORY . '/';

if (!isset($_GET['request'])) // Someone tried to access this file directory for some reason..
{
    $_page = 'error';
}
else
{
    $_page = str_replace($_url, null, $_SERVER['REQUEST_URI']);
}

if ($_page == ' ')
{
    $_page == 'index'; //They're coming from a non-direct POV.
}

$_router = new Router();
$_router->direct($_page);
?>

