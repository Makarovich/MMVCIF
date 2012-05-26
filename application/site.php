<?php
/*
 * MMVC - Makarov's MVC Framework
 * SITE.PHP; 5-26-2012
 *
 */

class Site
{
    public $_config = array(), $_router, $_model;

    public function __construct($_config, $_router)
    {
        $this->_config = $_config;
        $this->_router = $_router;

        $this->create_model();
    }

    private function create_model()
    {
        switch($this->_config['database']['type'])
        {
            case 'MySQL':
                $this->_model = new MySQL($this->_config['database']);
                break;

            case 'MySQLi':
                $this->_model = new mMySQLi($this->_config['database']);
                break;

            case 'PDO':
                $this->_model = new mPDO($this->_config['database']);
                break;

            default:
                trigger_error('Your config database type is invalid!');
                break;
        }
    }
}
?>
