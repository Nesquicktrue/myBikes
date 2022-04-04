<?php include "_partials/header.php" ?>
<?php include "_partials/check-login.php" ?>



<div class="page-header">
	<h1>Servisní úkony - TATO FUNKCE JE PROZATÍM NEDOSTUPNÁ</h1>
</div>

<?php

$user_bikes = $database->select('bikes',['id','manufacturer','year'],
			['user_id' => $_SESSION['id']]
);
// $data = $database->select('components', ['comname', 'manufacturer', 'model', 'type'],

//);
?>
<div class="d-flex justify-content-center align-items-center vyber-kolo gap-2">
    Vybrané kolo:
    <select id="selectBikes" style="width: 10rem;"></select>
</div>

<div class="container formular">
	<form id="pridatKomponentuForm" action="_inc/new-service.php" method="POST">

		<div class="d-flex justify-content-start align-items-center">
			<div class="col-2">
				Datum úkonu:
			</div>
			<div class="col-3">
				<input type="date" placeholder="" id="date" class="my-1 form-control" name="date" required>
			</div>
		</div>
		
		<select class="form-select my-1 comp_select" name="type" multiple="multiple">
			<?php 
				include "_partials/components.php"
			?>
		</select>


		<div class="row my-1">
			<div class="col">
				<textarea type="text" class="form-control input-popis" rows="3" id="popis" name="desc" placeholder="Popis..." required></textarea>
			</div>
		</div>
		<input type="number form-control m-1" name="price" placeholder="Přibližná cena..."> 
		<button type="submit" class="btn btn-danger my-2" disabled>Založit</button>
	</form>
</div>
</div>
<section></section>

<?php include "_partials/footer.php" ?>