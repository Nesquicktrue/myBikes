<?php

	require 'config.php';

	$id = $database->update('components', [
        'model'  => $_POST['model'],
        'manufacturer'  => $_POST['manufacturer']
    ],[
        'id'  => $_POST['id'],
    ]);

	// success
	if ( $id ) {
		header("Location: ../vypis.php");
		die();
	} else {
		header("Location: ../404.php");
		die();
	}