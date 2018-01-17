
$(document).ready(function() {

    function mostrarFormulario() {

    }

    $('body').on('click', '#tablero_crear', function() {

        $(this).parent().next().toggle();
    });


    $('#crear').on('click', function() {
        let nombre = $('input:text')[0].value;
        $('#formulario').fadeOut();

        let tablero = $(`<div>${nombre}</div>`);
        tablero.addClass('tablero');
        $('#tablero_crear').prev(tablero);

    });

})
