<?php
/*
 * MMVC - Makarov's MVC Framework
 * INTERFACE.DATAOBJECT.PHP; 5-25-2012
 * All model data objects need to include this
 */

interface DataObject
{
    public function __construct($_object, $_link);

    public function result();

    public function fetch_array();

    public function num_rows();
}
?>
