<?php

	require 'config.php';

	$id = $database->update('components', [
        'model'  => $_POST['model'],
        'vyrobce'  => $_POST['vyrobce']
    ],[
        'type'  => $_POST['type'],
    ]);

	// success
	if ( $id ) {
		header("Location: ../vypis.php");
		die();
	}