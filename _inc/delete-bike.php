<?php

require 'config.php';

if (!isset($_SESSION)) {
	session_start();
}
// kontrola vlastnictví
$ownerID = $database->select('bikes','user_id',[
	'id' => $_GET['id']
]);

if ($_SESSION['id'] != $ownerID[0]) {

	header("HTTP/1.0 404 Not Found");
	include_once "404.php";
	die();
}


$comp = $database->delete('components', ['bike_id' => $_GET['id']]);

$bikeid = $database->delete('bikes', ['id' => $_GET['id']]);

// success
if ($bikeid && $comp) {
	header("Location: ../bikes.php?status=delok");
	die();
}
