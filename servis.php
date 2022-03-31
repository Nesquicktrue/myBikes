<?php include "_partials/header.php" ?>



<div class="page-header">
	<h1>Servisní úkony</h1>
</div>

<?php $data = $database->select('components', ['nazev', 'vyrobce', 'model', 'type']);
?>

<div class="container formular">
	<form id="pridatKomponentuForm" action="_inc/new-comp.php" method="POST">

		<div class="row">
			<div class="col-2">
				Datum úkonu:
			</div>
			<div class="col-3">
				<input type="date" placeholder="" id="vyrobce" class="my-1 form-control" name="vyrobce">
			</div>
		</div>
		
		<select class="form-select my-1" name="type" multiple="multiple">
			<?php foreach ($data as $item) {
				echo '<option value="' . $item['type'] . '">' . $item['nazev'] . '</option>';
			};
			?>
		</select>


		<div class="row my-1">
			<div class="col">
				<textarea type="text" class="form-control input-popis" rows="3" id="popis" name="model" placeholder="Popis..."></textarea>
			</div>
		</div>
		<button type="submit" class="btn btn-danger my-2">Uložit</button>
	</form>
</div>
</div>
<section></section>

<?php include "_partials/footer.php" ?>