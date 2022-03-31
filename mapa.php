<?php include "_partials/header.php" ?>


<div class="page-header">
    <h1>Mapa</h1>
</div>

<div class="d-flex justify-content-center">
    <img src="assets/img/ht.jpeg" class="map img-fluid" usemap="#bikemap" 
        data-maphilight='{"strokeColor":"D4D2D1","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'>
    <map name="bikemap">
        <?php include "_partials/maps.php" ?>
    </map>
</div>
    
    <br><br>
    
    <!-- Modal -->
    <div class="modal fade" id="CompModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="titMod">
                <!-- show-modal.php -->
            </div>
        </div>
    </div>

<?php include "_partials/footer.php" ?>