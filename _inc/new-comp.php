<?php

	require 'config.php';

	$id = $database->insert('components', [
        'type'  => $_POST['type'],
        'manufacturer'  => $_POST['manufacturer'],
        'model'  => $_POST['model'],
        'comname'  => $_POST['comname'],
        'bike_id'  => $_POST['bike_id']
    ]);

	// success
	if ( $id ) {
		header("Location: ../vypis.php");
		die();
	} else {
		header("Location: ../404.php");
		die();
	}