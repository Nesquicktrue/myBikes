<?php

// include
require 'config.php';

$zobrazenyTyp = $_GET['type'];

$sloupce =	$database->select(
	'components',
	['comname', 'manufacturer', 'model', 'type'],
	[
		'id'=> $zobrazenyTyp,
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

// Buttony
$response .= '<div class="d-flex justify-content-end" >';
$response .= '<a href="edit.php?id=' . $zobrazenyTyp . 
'" class="edit" title="Editovat"><i class="material-icons">&#xE254;</i></a>';
$response .= '<a id="'. $zobrazenyTyp . 
'" data-bs-toggle="collapse" href="#collapseDelete" class="delete" title="Smazat">
<i class="material-icons">&#xE872;</i></a>';
$response .= "</div>";

//collapse Delete
$response .= '<div class="collapse" id="collapseDelete">
  				<div class="card card-body">
    				<h6>Opravdu smazat?</h6> 
					<a class="btn btn-danger" href="_inc/delete-comp.php?id='.
					$zobrazenyTyp
					.'">Smazat!</a>
  				</div>
			</div>';
$response .= "</div>";

// Footer - servisní historie
$response .= '<div class="modal-footer d-flex align-items-start flex-column justify-content-start">';
$response .= '<h5>Záznamy servisu:</h5>';
$response .= "<p>...Připravujeme...</p>";
$response .= "</div>";


echo $response;



exit;
