<?php

	require 'config.php';

	$id = $database->insert('bikes', [
        'manufacturer'  => $_POST['manufacturer'],
        'year'  => $_POST['year'],
        'desc'  => $_POST['desc'],
        'user_id'  => $_POST['user_id'],
        'b_type'  => $_POST['b_type']

    ]);

	// success
	if ( $id ) {
		header("Location: ../bikes.php?status=addok");
		die();
	} else {
		header("Location: ../404.php");
		die();
	}