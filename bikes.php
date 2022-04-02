<?php include "_partials/header.php" ?>
<?php include "_partials/check-login.php" ?>


<div class="page-header">
    <h1>Moje kola</h1>
</div>

<?php
$user_bikes = $database->select('bikes', ['id', 'manufacturer', 'year', 'desc', 'b_type'], ['user_id' => $_SESSION["id"]]);

// Přicházím ze změny, či přidání bajku? Doplň hlášku
if (isset($_GET['status'])) {
    switch ($_GET['status']) {
        case 'zmenaok':
            echo '<div class="registration_message">
                    Změna se v pořádku uložila
                    </div>';
            break;
        case 'addok':
            echo '<div class="registration_message">
                    Kolo bylo úspěšně přidáno
                    </div>';
            break;
        case 'delok':
            echo '<div class="registration_message">
                    Kolo bylo úspěšně odstraněno
                    </div>';
            break;
                    // prostor pro další statusy
        default:
            break;
    }
}


foreach ($user_bikes as $bike) {
    echo '
    <div class="card m-2">
    <div class="card-body">
    <h5 class="card-title">' . $bike['manufacturer'] . '</h5>
    <h6 class="card-subtitle mb-2 text-muted">' . $bike['year'] . '</h6>
    <p class="card-text">' . $bike['desc'] . '</p>
    <a href="edit-bike.php?id='
    . $bike['id'] .
    '" class="card-link">Upravit</a>
    <a href="#" id="'
    . $bike['id'] .
    '" data-bs-toggle="modal" data-bs-target="#deleteModal" class="card-link smazat-link">Smazat</a>
    </div>
    </div>';
};

?>
<!-- Modal Delete -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Potvrdit smazání</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="deleteModalBody">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zpět</button>
        <button type="button" class="btn btn-danger" id="delBtn" href="#">SMAZAT
        </button>
      </div>
    </div>
  </div>
</div>

<hr>
<h2> Přidat kolo </h2>
<br>

<div class="container formular">
    <form id="pridatKomponentuForm" action="_inc/new-bike.php" method="POST">

        <select class="form-select my-1" aria-label="bike select" name="b_type">
            <option value="ht">Hardtail (pouze přední odpružení)</option>
            <option value="full">Celoodpružené</option>
            <option value="gravel">Gravel</option>
            <option value="silnice">Silniční kolo</option>
        </select>

        <div class="row">
            <div class="col">
                <input type="text" placeholder="Výrobce..." id="manufacturer" class="my-1 form-control" name="manufacturer">
            </div>
            <div class="col">
                <input type="number" placeholder="rok" id="year" class="my-1 form-control" name="year">
            </div>
        </div>

        <div class="row my-1">
            <div class="col">
                <textarea type="text" class="form-control input-popis" rows="3" id="popis" name="desc" placeholder="Model a další popis..."></textarea>
            </div>
        </div>
        <!-- schovaný input - userID -->
        <input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION['id'] ?>">

        <button type="submit" class="btn btn-danger my-2">Uložit</button>
    </form>
</div>
</div>
<section></section>

<?php include "_partials/footer.php" ?>