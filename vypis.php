<?php include "_partials/header.php" ?>
<?php include "_partials/check-login.php" ?>


<div class="page-header">
    <h1>Výpis komponent</h1>
</div>

<?php

$user_bikes = $database->select('bikes', ['id','manufacturer','year'], ['user_id' => $_SESSION["id"]]);

// připravuji array pro SQL dotaz na komponenty
$bikesID = array();
foreach ($user_bikes as $item) {
    array_push($bikesID, $item['id']);
};

// načítám všechny komponenty
$data = $database->select(
    'components',
    ['comname', 'manufacturer', 'model', 'type', 'id', 'bike_id'],
    ['bike_id' => $bikesID ]
);

/* Predání array do JS components.js */
echo '<script>
        let bikeArray = ' . json_encode($user_bikes) . '
        let compArray = ' . json_encode($data) . '</script>';

?>

<!-- vyber kolo - doplnuje JS components.js -->
<div class="d-flex justify-content-center align-items-center vyber-kolo gap-2">
    Vybrané kolo:
    <select id="selectBikes" style="width: 10rem;"></select>
</div>


<!-- tabulka komponent -->
<input id="filtr" type="text" class="form-control mb-1 mt-4" placeholder="Hledej v seznamu komponent...">
<table class="table table-hover m-0 mb-2">
    <thead>
        <th scope="col" style="width: 10%" class="vybrano" data-colname="nazev" data-order="desc">Typ </th>
        <th scope="col" style="width: 15%" class="" data-colname="autor" data-order="desc">Výrobce </th>
        <th scope="col" style="width: 60%" class="" data-colname="rating" data-order="desc">Popis </th>
        <th scope="col" style="width: 15%" class="" data-colname="akce" data-order="desc">Akce </th>
    </thead>
    <tbody id="compTabBody">

    </tbody>
</table>


<!-- Exporty -->

<div class="d-flex justify-content-end gap-2">
    <button href="#" class="btn btn-outline-warning">Export do PDF</button>
    <button href="#" class="btn btn-outline-warning">Export do CSV</button>
</div>
<hr>

<!-- Formulář pro nové komponenty -->

<h2> Přidat novou komponentu </h2>
<br>

<div class="container formular">
    <form id="pridatKomponentuForm" action="_inc/new-comp.php" method="POST">

        <select class="form-select my-1" name="bike_id" id="selectBikeForComp">
            <?php
            foreach ($user_bikes as $bike) {
                echo '<option value="' . $bike['id'] . '" >' . $bike['manufacturer'] . ' ' . $bike['year'] . '</option>';
            };
            ?>
        </select>

       <!--  schovaný input kvůli názvu COMNAME komponenty, kterou potřebuji z <option> -->
        <input id="make_text" type = "hidden" name = "comname" value = "" >

        <select class="form-select my-1 comp_select" aria-label="Default select example" name="type" onchange="setTextField(this)">
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


<?php include "_partials/footer-vypis.php" ?>