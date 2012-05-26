<?php
/*
 * MMVC - Makarov's MVC Framework
 * 404CONTROLLER.PHP; 5-24-2012
 * If a 404 error occurs this file will be the first to know!
 */

class ErrorController implements Controller
{
    public function action()
    {
        $_view = new ViewHandler('404');

        $_view->set(array(
            'current_date' => date('h:m'),
            'website_name' => WEBSITE_URL,
            'webmaster' => WEBMASTER_EMAIL,
            'url' => CURRENT_PAGE));

        echo $_view->output();
    }

    public function notfound()
    {

    }
}
?>
