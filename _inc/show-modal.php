<?php

	// include
	require 'config.php';

	$zobrazenyTyp = $_GET['type'];

	$sloupce =	$database->select('components','*',[
				'type' => $zobrazenyTyp
			]);
	
	$vyrobce = $sloupce[0]['vyrobce'];
	$model = $sloupce[0]['model'];
	$nazev = $sloupce[0]['nazev'];

	$response  = '<div class="modal-header" id="titMod">';
	$response .= '<h5 class="modal-title">' . $nazev . '</h5>';
    $response .= '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
    $response .= '</div>';
    
	$response .= '<div class="modal-body" >';
	$response .= "<ul>";
	$response .= "<li>Výrobce: <strong>" . $vyrobce . "</strong></li>"; 
	$response .= "<li>Typ: <br>" . $model . "</li>";
	$response .= "</ul>";
	$response .= "</div>";
	

	echo $response;
                


	exit;