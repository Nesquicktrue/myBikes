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
		die("Přidáno");
	}