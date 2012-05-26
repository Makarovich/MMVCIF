<?php
/*
 * MMVC - Makarov's MVC Framework
 * CONTROLLER.PHP; 5-24-2012
 * Routes requests and such!
 */

include ('global.php');

$_url = (WEBSITE_DIRECTORY == 'root') ? '/' : '/' . WEBSITE_DIRECTORY . '/';
$_page = str_replace($_url, null, $_SERVER['REQUEST_URI']);

if ($_page == '') // No request so therefore they're trying to go to the index
{
    $_page = 'index';
}

define('CURRENT_PAGE', $_page);

$_site->_router->direct($_page);
?>

