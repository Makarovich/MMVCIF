<?php
/*
 * MMVC - Makarov's MVC Framework
 * 404CONTROLLER.PHP; 5-24-2012
 * If a 404 error occurs this file will be the first to know!
 */

class IndexController implements Controller
{
    public function action()
    {
        $_view = new ViewHandler('index');

        echo $_view->output();
    }

    public function notfound()
    {
        //
    }
}
?>
