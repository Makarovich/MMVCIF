<?php
/*
 * MMVC - Makarov's MVC Framework
 * MODEL.PDO.PHP; 5-26-2012
 *
 */

class mPDO implements Model
{
    public $_query, $_count = 0;

    private $_link, $_host, $_name, $_user, $_password, $_connected, $_STMT, $_params;

    public function __construct($_database)
    {
        include('DataObject.PDO.php');

        $this->_host = $_database['host'];
        $this->_name = $_database['name'];
        $this->_user = $_database['user'];
        $this->_password = $_database['password'];

        $this->connect();
    }

    public function connect()
    {
        if ($this->_connected)
        {
            return;
        }

        try
        {
            $this->_link = new PDO(
                    'mysql:dbname='.$this->_name.
                    ';host='.$this->_host,
                    $this->_user,
                    $this->_password);
        }
        catch(PDOException $e)
        {
            trigger_error($e->getMessage());
        }

        $this->_connected = true;
    }

    public function disconnect()
    {
        $this->_link = null;

        $this->_connected = false;
    }

    public function secure($_variable)
    {
        return stripslashes(htmlentities($_variable));
    }

    public function prepare($_query)
    {
        $this->_query = $_query;

        if (!$this->_STMT = $this->_link->prepare($_query))
        {
            die($this->_STMT->error);
        }

        return $this;
    }

    public function bind($_params)
    {
        if (!is_array($_params))
        {
            // -.-
        }

        $this->_params = $_params;

        return $this;
    }

    public function execute()
    {
        if(!$this->_STMT->execute($this->_params))
        {
            return $this->_STMT->error;
        }

        $this->_count++;

        return new DataObjectPDO(null, $this->_STMT);
    }
}
?>
