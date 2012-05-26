<?php
/*
 * MMVC - Makarov's MVC Framework
 * ROUTER.PHP; 5-24-2012
 * Routes all reqeusts to setup views and models!
 */

class Router
{
    public function direct($_controller)
    {
        $_class = ucfirst($_controller) . 'Controller';

        if (!file_exists('controllers/' . $_class . '.php')) // If we can't find WhateverController.php
        {
            $this->direct('error');
            return;
        }

        include ('controllers/' . $_class . '.php');

        $_control = new $_class();

        $_control->action(); //Start the controller -> view -> ? (coming soon)
    }
}
?>
