<?php
/*
 * MMVC - Makarov's MVC Framework
 * VIEWHANDLER.PHP; 5-25-2012
 * Handles all view requests
 */

class ViewHandler
{
    private $_template;

    public $_parameters = array();

    public function __construct($_view)
    {
        if (!file_exists('../application/views/' . $_view . '.html'))
        {
            return; //blah
        }

        $this->_template = file_get_contents('../application/views/'.$_view.'.html');
    }

    public function add($_file)
    {
        if (!file_exists('../application/views/' . $_file . '.html'))
        {
            return; //blah
        }

        $this->_template = $this->_template . file_get_contents('../application/views/'.$_file.'.html');
    }

    public function set($_array)
    {
        foreach($_array as $_key => $_value)
        {
            $this->_parameters['${'.$_key.'}'] = $_value;
        }
    }

    private function parse()
    {
        return str_replace(
                array_keys($this->_parameters),
                array_values($this->_parameters),
                $this->_template);
    }

    public function output()
    {
        return $this->parse($this->_template);
    }

    public function clear()
    {
        $this->_template = null;
    }
}
?>
