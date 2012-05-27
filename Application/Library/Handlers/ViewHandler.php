<?php
/*
 * MMVC - Makarov's MVC Framework
 * VIEWHANDLER.PHP; 5-25-2012
 * Handles all view requests
 * WARNING: This class contains a lot of lazy function naming!
 */

class ViewHandler
{
    private $_template, $_css, $_javascript, $_body;

    public $_parameters = array();

    public function __construct($_view)
    {
        $this->_template = file_get_contents('../Application/Views/page-background.html');

        if (!file_exists('../application/views/' . $_view . '.html'))
        {
            return; //blah
        }

        $this->_body = $this->_body . file_get_contents('../Application/Views/'.$_view.'.html');
    }

    public function add($_file)
    {
        if (!file_exists('../Application/Views/' . $_file . '.html'))
        {
            trigger_error('../Application/Views/' . $_file . '.html does not exist on this web server!');
        }

        $this->_body = $this->_body. file_get_contents('../Application/Views/'.$_file.'.html');
    }

    public function javascript($_file)
    {
        if (!file_exists('../Public/Themes/' . THEME . '/Javascript/' . $_file . '.js'))
        {
            return; //blah
        }

        $this->_javascript = $this->_javascript . "\r\n" . '        <script type="text/javascript" src="../Public/Themes/' . THEME . '/Javascript/' . $_file . '.js"></script>';
    }

    public function css($_file)
    {
        if (!file_exists('../Public/Themes/' . THEME . '/Cascading/' . $_file . '.css'))
        {
            return; //blah
        }

        $this->_css = $this->_css . "\r\n" . '        <link rel="stylesheet" type="text/css" href="./Public/Themes/' . THEME . '/Cascading/' . $_file . '.css" />';
    }

    public function set($_array)
    {
        foreach($_array as $_key => $_value)
        {
            $this->_parameters['${'.$_key.'}'] = $_value;
        }
    }

    private function parse($_page)
    {
        return str_replace(
                array_keys($this->_parameters),
                array_values($this->_parameters),
                $_page);
    }

    public function output()
    {
        $this->set(array(
            'page-css' => $this->_css,
            'page-js' => $this->_javascript,
            'page-body' => $this->parse($this->_body)));

        return $this->parse($this->_template);
    }

    public function clear()
    {
        $this->_template = null;
    }
}
?>
