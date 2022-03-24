<?php

	// include
	require 'config.php';

		$zobrazenyTyp = $_GET['type'];

		$response =	$database->select('components','*',[
						'type' => $zobrazenyTyp
					]);
		
		echo '<pre>'; print_r($response); echo '</pre>';
                


	exit;