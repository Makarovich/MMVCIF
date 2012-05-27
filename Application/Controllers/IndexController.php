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
        if ($this->notfound())
        {
            $_view = new ViewHandler('index');

            $_view->css('sheet-index');

            echo $_view->output();
        }
    }

    public function notfound()
    {
        global $_site;

        if (!file_exists('../Application/Views/index.html'))
        {
            $_site->_router->direct('error');
            return false;
        }
        else
        {
            return true;
        }
    }
}
?>
