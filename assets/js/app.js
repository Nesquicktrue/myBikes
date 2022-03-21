(function($) {

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


}(jQuery));