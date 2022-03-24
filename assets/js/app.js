(function($) {
    // AJAX pro pridani 
    const pridatKomponentuForm = $('#pridatKomponentuForm');
    pridatKomponentuForm.on('submit', (event) => {
        event.preventDefault();
        let req = $.ajax({
            url: pridatKomponentuForm.attr('action'),
            type: 'POST',
            data: pridatKomponentuForm.serialize(),
        });

        req.done((data) => {
            console.log(data);
        });
    });

    // Zvyraznovac mapy obrazku
    $(function() {
        $('.map').maphilight();
    });
	
    // Predani dat z mapy do modalu
    $(document).ready( () => {
        $(".part").click((e) => {
        let comp = e.currentTarget.id;
        console.log(comp);

        let req = $.ajax({
            url: '_inc/show-modal.php',
            type: 'GET',
            data: 'type=' + comp,
            success: (res) => {
                $("#titMod").html(res);
                $("#CompModal").modal('show');
            }
        });

        req.done((data) => {
            console.log(data);
        });
    });

        /* $('#CompModal').modal('show').attr('data-js',comp); */
    });
    
}(jQuery));