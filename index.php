<?php include "_partials/header.php" ?>


<div class="page-header">
    <h1>Moje kola</h1>
</div>
<?php $data = $database->select('components', ['type', 'vyrobce', 'model']); ?>

    <img src="assets/img/ht.jpeg" class="map" usemap="#bikemap" data-maphilight='{"strokeColor":"D4D2D1","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'>
    <map name="bikemap">
        <?php include "_partials/maps.php" ?>
    </map>
    
    <br><br>
    
    <!-- Modal -->
    <div class="modal fade" id="CompModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
          
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="titMod">
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
    </div>


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