<?php

// include
require 'config.php';

$zobrazenyTyp = $_GET['type'];

$sloupce =	$database->select(
	'components',
	['comname', 'manufacturer', 'model', 'type'],
	[
		'type' => $zobrazenyTyp,
		'bike_id'=>1
	]
);

$vyrobce = $sloupce[0]['manufacturer'];
$model = $sloupce[0]['model'];
$nazev = $sloupce[0]['comname'];

$response  = '<div class="modal-header" id="titMod">';
$response .= '<h5 class="modal-title">' . $nazev . '</h5>';
$response .= '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
$response .= '</div>';

$response .= '<div class="modal-body" >';
$response .= "Výrobce: <strong>" . $vyrobce . "</strong>";
$response .= '<div class="d-flex gap-1"><div>Popis: </div><div>' . $model . '</div>';
$response .= "</div>";
$response .= "</div>";
$response .= '<div class="modal-footer">';
$response .= '<a href="edit.php?type=' . $zobrazenyTyp . '">Změnit</a>';
$response .= "</div>";


echo $response;



exit;
