<?php
/*
 * MMVC - Makarov's MVC Framework
 * INTERFACE.MODEL.PHP; 5-25-2012
 * All models need to include this
 */

interface Model
{
    public function __construct($_database);

    public function connect();
    
    public function disconnect();

    public function secure($_variable);

    public function prepare($_query);

    public function bind($_params);

    public function execute();
}
?>
