<?php
if (!IN_MVC)
{
    include('../application/router.php');
    $_router = new Router();
    $_router->direct('error');
    exit;
}
/*
 * MMVC - Makarov's MVC Framework
 * DATAOBJECT.MYSQL.PHP; 5-26-2012
 *
 */

class DataObjectSQL implements DataObject
{
    ################################################
    //Our query object
    private $_query, $_result;

    public function __construct($_object, $_link)
    {
        $this->_query = $_object;

        $this->_result = mysql_query($this->_query, $_link);
    }

    public function result()
    {
        return $this->_result;
    }

    public function fetch_array()
    {
        while ($_return = mysql_fetch_array($this->_result))
        {
            return $_return;
        }
    }

    public function num_rows()
    {
        if (!$this->_result)
        {
            return 0;
        }

        return (int)mysql_num_rows($this->_result);
    }
}
?>
