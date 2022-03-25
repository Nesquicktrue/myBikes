<?php

	// include
	require 'config.php';

	// add new stuff
	$id = $database->update('components', [
        'model'  => $_POST['model'],
        'vyrobce'  => $_POST['vyrobce']
    ],[
        'type'  => $_POST['type'],
    ]);

	// success
	if ( $id ) {
		header("Location: ../index.php");
		die();
	}