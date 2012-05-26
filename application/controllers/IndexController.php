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
        global $_site;

        if ($this->notfound())
        {
            $_test = $_site->_model->prepare('SELECT * FROM ats_sites WHERE username = ?')
                    ->bind(array('EmberHotel'))->execute();

            $_view = new ViewHandler('index');

            while($_array = $_test->fetch_array())
            {
                $_view->set(array('url' => $_array['url']));
            }

            echo $_view->output();
        }
    }

    public function notfound()
    {
        global $_site;

        if (!file_exists('../application/views/index.html'))
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
