<?php
error_reporting(1);
include "DatabaseSoap.php";

$uri = 'http://192.168.56.2/';

$options = array('uri' => $uri);

// Create a new server
$server = new SoapServer(NULL, $options);
$server -> setClass('DatabaseSoap');
$server -> handle();
?>