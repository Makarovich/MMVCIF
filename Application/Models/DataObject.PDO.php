<?php
/*
 * MMVC - Makarov's MVC Framework
 * DATAOBJECT.PDO.PHP; 5-26-2012
 *
 */

class DataObjectPDO implements DataObject
{
    ################################################
    //The PDO connection variable
    private $_STMT;

    public function __construct($_query, $_link)
    {
        $this->_STMT = $_link;
    }

    public function result()
    {
        return $this->_STMT->fetchColumn();
    }

    public function fetch_array()
    {
        return $this->_STMT->fetch(PDO::FETCH_ASSOC);
    }

    public function num_rows()
    {
        return $this->_STMT->rowCount();
    }
}
?>
