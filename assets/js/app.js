(function ($) {
    
    // Select2 s filtrem a multiple options
    $(".comp_select").select2({
        theme: "bootstrap-5", placeholder: "Vyber komponentu...",
        // allowClear: true
    });
    
    // Smazat kolo modal potvrzení
    $('.smazat-link').click((el)=>{
        console.log(el)
        let mazaneKolo = el.currentTarget.parentElement.children[0].innerText;
        $('#deleteModalBody').text("Opravdu smazat kolo " + mazaneKolo + "?");
        $('#delBtn').click(()=>{
            window.location = '_inc/delete-bike.php?id=' + el.currentTarget.attributes[1].value;
        })
        
    })
    
    // Tooltip tabulky komponent
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
    


    // AJAX pro pridani
    /*     const pridatKomponentuForm = $('#pridatKomponentuForm');
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
    }); */

    // Zvyraznovac mapy obrazku
    $(function () {
        $('.map').imageMapResize().maphilight();
    });

    // Predani dat z mapy do modalu
    $(document).ready(() => {
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