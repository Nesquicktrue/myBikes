<?php include "_partials/header.php" ?>
<?php include "_partials/check-login.php" ?>


<div class="page-header">
    <h1>Výpis komponent</h1>
</div>

<?php 
        echo 'Session: <br>';
        print_r($_SESSION);
        
        echo '<br>user_bikes: <br>';
        $user_bikes = $database->select('bikes','id',['user_id'=>$_SESSION["id"]]);
        print_r($user_bikes);

        $data = $database->select('components',
                                ['comname', 'manufacturer', 'model', 'type'],
                                ['bike_id'=>$user_bikes]
                            );

echo    '<table class="table table-striped">
                <thead>
                <tr>
                <th scope="col">Typ</th>
                <th scope="col">Výrobce</th>
                <th scope="col">Popis</th>
                <th scope="col">Akce</th>
                </tr>
                </thead>
                <tbody>';

foreach ($data as $item) {
    echo    '<tr>
                   <th scope="row">' . $item["comname"] . '</th>
                   <td>' . $item["manufacturer"] . '</td>
                   <td>' . $item["model"] . '</td>
                   <td><a href="edit.php?type=' . $item["type"] . '">Změnit</a></td>
            </tr>';
};

echo        '</tbody> </table>';

?>

<div class="d-flex justify-content-evenly">
    <button href="#" class="btn btn-outline-primary">Export do PDF</button>
    <button href="#" class="btn btn-outline-primary">Export do CSV</button>
</div>
<hr>
<h2> Změnit / Přidat komponentu </h2>
<br>

<div class="container formular">
    <form id="pridatKomponentuForm" action="_inc/new-comp.php" method="POST">

        <select class="form-select my-1" aria-label="Default select example" name="type">
            <option>Hledej komponentu ↓</option>
            <?php foreach ($data as $item) {
                echo '<option value="' . $item['type'] . '">' . $item['comname'] . '</option>';
            };
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

<?php include "_partials/footer.php" ?>