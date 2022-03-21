<?php include "_partials/header.php" ?>


    <div class="page-header">
        <h1>Moje kola</h1>
    </div>

    <img src="assets/img/ht.jpeg" class="map" usemap="#bikemap" data-maphilight='{"strokeColor":"D4D2D1","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'>

    <map name="bikemap">
        <area target="_blank" alt="predstavec" title="predstavec"
         coords="176,24,202,35,199,39,217,45,225,29,209,23,183,13" 
         shape="poly" 
         data-bs-toggle="modal" 
         data-bs-target="#exampleModal"
        >
        <area target="_blank" alt="vidlice" title="vidlice" href="vidlice" coords="211,20,222,24,186,117,191,119,142,237,116,227,131,204,168,112,175,112" shape="poly">
        <area target="_blank" alt="p_osa" title="p_osa" href="predni_osa" coords="117,227,20" shape="circle">
    </map>

    <br><br>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            ...
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
    </div>

    <?php $data = $database->select('components', ['vyrobce', 'typ']); ?>

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
            <textarea class="form-control" name="typ" id="typ" rows="1" placeholder="Typ"></textarea><br>
            <textarea class="form-control" name="vyrobce" id="text" rows="3" placeholder="Výrobce"></textarea>
        </p>
        <p class="form-group">
            <input class="btn-sm btn-danger" type="submit" value="Přidej">
        </p>
    </form>

<?php include "_partials/footer.php" ?>