<?php include "_partials/header.php" ?>
<?php include "_partials/check-login.php" ?>


<div class="page-header">
    <h1>Výpis komponent</h1>
</div>

<?php

$user_bikes = $database->select('bikes', 'id', ['user_id' => $_SESSION["id"]]);

$data = $database->select(
    'components',
    ['comname', 'manufacturer', 'model', 'type', 'id', 'bike_id'],
    ['bike_id' => $user_bikes]
);

echo '<script>
        let compArray = '.
        json_encode($data)
        .'</script>';
    
// vyber kolo





// tabulka komponent
echo    '
        <div class="container-xl">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-8">Tabulka komponent</h2></div>
                            <div class="col-sm-4">
                                <div class="search-box">
                                    <i class="material-icons">&#xE8B6;</i>
                                    <input type="text" class="form-control" placeholder="Hledej...">
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Typ <i class="fa fa-sort"></i></th>
                                <th>Výrobce</th>
                                <th>Popis <i class="fa fa-sort"></i></th>
                                <th>Akce</th>
                            </tr>
                        </thead>
                        <tbody>
';

foreach ($data as $item) {
    echo    '<tr>
                   <td>' . $item["comname"] . '</td>
                   <td>' . $item["manufacturer"] . '</td>
                   <td>' . $item["model"] . '</td>
                   <td>
                   <a href="#" class="view" title="Info" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                   <a href="edit.php?id=' . $item["id"] . '" class="edit" title="Uprav" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                   <a href="#" class="delete" title="Smaz" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                   </td>
            </tr>';
};

echo        '</tbody> </table>';

?>

<!-- Exporty -->

<div class="d-flex justify-content-evenly">
    <button href="#" class="btn btn-outline-primary">Export do PDF</button>
    <button href="#" class="btn btn-outline-primary">Export do CSV</button>
</div>
<hr>

<!-- Formulář pro nové komponenty -->

<h2> Změnit / Přidat komponentu </h2>
<br>

<div class="container formular">
    <form id="pridatKomponentuForm" action="_inc/new-comp.php" method="POST">

        <select class="form-select my-1 comp_select" aria-label="Default select example" name="type">
            <option>Hledej komponentu ↓</option>
            <?php
            include "_partials/components.php"
            ?>
        </select>
        <div class="col-auto">
            <input type="text" placeholder="Výrobce..." id="manufacturer" class="my-1 form-control" name="manufacturer">
        </div>

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

<script src="assets/js/components.js"></script>
<?php include "_partials/footer.php" ?>