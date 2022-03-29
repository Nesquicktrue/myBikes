<?php include "_partials/header.php" ?>


<div class="page-header">
    <h1>Výpis komponent</h1>
</div>

<?php $data = $database->select('components', ['nazev', 'vyrobce', 'model', 'type']); 

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
                
    foreach ( $data as $item ) {
        echo    '<tr>
                   <th scope="row">'. $item["nazev"] .'</th>
                   <td>'. $item["vyrobce"] .'</td>
                   <td>'. $item["model"] .'</td>
                   <td><a href="edit.php?type='. $item["type"] .'">Změnit</a></td>
                </tr>';
        };

    echo        '</tbody> </table>';

?>

<div class="d-flex justify-content-evenly">
    <button href="#" class="btn btn-outline-primary">Export do PDF</button>
    <button href="" class="btn btn-outline-primary">Export do CSV</button>
</div>
<hr>
<h2> Změnit / Přidat komponentu </h2>
<br>

<div class="container formular">
<form id="pridatKomponentuForm" action="_inc/new-comp.php" method="POST" >
        
    <select class="form-select my-1" aria-label="Default select example" name="type">
            <option>Hledej komponentu ↓</option>
            <?php foreach ($data as $item) {
                echo '<option value="'. $item['type'] .'">'.$item['nazev'].'</option>';
                };
            ?>
            </select>
        <div class="col-auto">
            <input type="text" placeholder="Výrobce..." id="vyrobce" class="my-1 form-control" name="vyrobce">
        </div>
        
    <div class="row my-1">
        <div class="col">
            <textarea type="text" class="form-control input-popis" rows="3" id="popis" name="model" placeholder="Popis..."></textarea>
        </div>
    </div>
    <button type="submit" class="btn btn-danger my-2">Uložit</button>
</form>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br>

<?php include "_partials/footer.php" ?>