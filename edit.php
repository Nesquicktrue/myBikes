<?php

require_once '_inc/config.php';

$sloupce =	$database->select('components','*',[
            'id' => $_GET['id']
        ]);

        if ( ! $sloupce )
        {
            header("HTTP/1.0 404 Not Found");
            include_once "404.php";
            die();
        }
$vyrobce = $sloupce[0]['manufacturer'];
$model = $sloupce[0]['model'];
$nazev = $sloupce[0]['comname'];


include_once "_partials/header.php";

?>
<div class="container">
    <div class="page-header">
        <h1>Upravit: <?php echo $nazev ?></h1>
    </div>

	<div class="row">
	    <form id="edit-form" class="col-sm-6" action="_inc/edit-comp.php" method="post">
	        <p class="form-group">
	            <textarea class="form-control" name="manufacturer" id="text" rows="1"><?php echo $vyrobce ?></textarea><br>
	            <textarea class="form-control" name="model" id="text" rows="3"><?php echo $model ?></textarea>
	        </p>
	        <p class="form-group">
		        <input name="id" type="hidden" value="<?php echo $_GET['id'] ?>">
		        <input name="comname" type="hidden" value="<?php echo $nazev ?>">
	            <input class="btn btn-danger" type="submit" value="Uložit změnu">
		        <span class="controls">
			        <a href="vypis.php" class="back-link text-muted">Zpět</a>
		        </span>
	        </p>
	    </form>
	</div>
</div>

<?php include_once "_partials/footer.php" ?>