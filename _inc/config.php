<?php

// show all errors
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

require_once 'vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

use Medoo\Medoo;

// connect to db
$database = new Medoo([
	'database_type' => 'mysql',
	'database_name' => 'mybikes',
	'server'        => 'localhost',
	'username'      => 'root',
	'password'      => 'root',
	'charset'       => 'utf8'
]);