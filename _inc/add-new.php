<?php

	// include
	require 'config.php';

	// pridej do DB
	$id = $database->insert('components', [
		'typ' => $_POST['typ'],
		'vyrobce' => $_POST['vyrobce']
	]);

	// success
	if ( $id ) {
		header("Location: ../bikes.php?status=addok");
		die("Přidáno");
	}