<?php

include_once "_partials/header.php";


$vybranyBike =	$database->select('bikes', ['id', 'manufacturer', 'year', 'desc', 'b_type', 'user_id'], [
	'id' => $_GET['id']
]);

// kontrola vlastnictví kola
if ($_SESSION['id'] != $vybranyBike[0]['user_id']) {

	header("HTTP/1.0 404 Not Found");
	include_once "404.php";
	die();
}

//kontrola existence
if (!$vybranyBike[0]) {
	header("HTTP/1.0 404 Not Found");
	include_once "404.php";
	die();
}


?>
<div class="container">
	<div class="page-header">
		<h1>Upravit: <?php echo $vybranyBike[0]['manufacturer'] . ' ' . $vybranyBike[0]['year'] ?></h1>
	</div>

	<div class="container formular">
		<form id="pridatKomponentuForm" action="_inc/edit-bike.php" method="POST">

			<select class="form-select my-1" aria-label="Default select example" name="b_type">
				<option>ht</option>
				<option>full</option>
				<option>gravel</option>
				<option>silnice</option>
			</select>

			<div class="row">
				<div class="col">
					<input value="<?php echo $vybranyBike[0]['manufacturer'] ?>" type="text" placeholder="Výrobce..." id="manufacturer" class="my-1 form-control" name="manufacturer">
				</div>
				<div class="col">
					<input value="<?php echo $vybranyBike[0]['year'] ?>" type="number" placeholder="rok" id="year" class="my-1 form-control" name="year">
				</div>
			</div>

			<div class="row my-1">
				<div class="col">
					<textarea type="text" class="form-control input-popis" rows="3" id="popis" name="desc" 
					placeholder="Model a další popis..."><?php echo $vybranyBike[0]['desc']
					?></textarea>
				</div>
			</div>
			<!-- schovaný input - userID -->
			<input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION['id'] ?>">
			<input type="hidden" id="id" name="id" value="<?php echo $vybranyBike[0]['id'] ?>">

			<button type="submit" class="btn btn-danger my-2">Uložit</button>
		</form>
	</div>
</div>

<?php include_once "_partials/footer.php" ?>