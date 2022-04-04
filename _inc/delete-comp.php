<?php

require 'config.php';

if (!isset($_SESSION)) {
	session_start();
}
// kontrola vlastnictví
$bikeID = $database->select('components','bike_id',[
	'id' => $_GET['id']
]);

$ownerID = $database->select('bikes','user_id',[
	'id' => $bikeID[0]
]);

if ($_SESSION['id'] != $ownerID[0]) {

	header("HTTP/1.0 404 Not Found");
	include_once "404.php";
	die();
}


$comp = $database->delete('components', ['id' => $_GET['id']]);

// success
if ($comp) {
	header("Location: ../vypis.php");
	die();
} else {
	header("Location: ../404.php");
	die();
}
