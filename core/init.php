<?php 
session_start();

$GLOBALS['config'] = array(
	'mysql' => array(
		'host' => '127.0.0.1',
		'username' => 'root',
		'password' => '',
		'db' => 'test'
	),
	'remember' => array(
		'cookie_name' => 'hash',
		'cookie_expiry' => 604800
	),
	'session' => array(
		'session_name' => 'user',
		'token_name' => 'token'
	)
);

spl_autoload_register(
	function($class)
	{
		require_once 'classes/' . $class . '.php'; //load all classes
	}
);

require_once 'functions/sanitize.php';

date_default_timezone_set("Asia/Manila");

