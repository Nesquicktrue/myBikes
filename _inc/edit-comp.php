<?php

	require 'config.php';

	$id = $database->update('components', [
        'model'  => $_POST['model'],
        'manufacturer'  => $_POST['manufacturer']
    ],[
        'type'  => $_POST['type'],
        'bike_id'  => $_POST['bike_id'],
    ]);

	// success
	if ( $id ) {
		header("Location: ../index.php");
		die();
	}