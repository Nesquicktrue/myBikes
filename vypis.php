<?php include "_partials/header.php" ?>


<div class="page-header">
    <h1>Výpis komponent</h1>
</div>
<?php $data = $database->select('components', ['nazev', 'vyrobce', 'model']); ?>

<ul class="list-group">
    <?php
        foreach ( $data as $item ) {
            echo '<ul class="list-group col-sm-6">';
                foreach ( $item as $i) {
                    echo '<li class="list-group-item">' . $i . '</li>';
                }
            echo '</ul><br>';
        }
    ?>
</ul>

<form id="pridatKomponentuForm" class="" action="_inc/add-new.php" method="post">
    <p class="form-group">
        <label for="typ">Komponenta:</label>
        <textarea class="form-control" name="typ" id="typ" rows="1" placeholder="Typ" disabled></textarea><br>
        <textarea class="form-control" name="vyrobce" id="text" rows="3" placeholder="Výrobce"></textarea>
    </p>
    <p class="form-group">
        <input class="btn-sm btn-danger" type="submit" value="Přidej">
    </p>
</form>


<?php include "_partials/footer.php" ?>