<?php
require 'environment.php';

define('BASE', 'http://127.0.0.1/social_network/');


global $config;
$config = array();
if(ENVIRONMENT == 'development') {
	$config['dbname'] = 'social_network';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
} else {
	$config['dbname'] = 'social_network';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
}
?>