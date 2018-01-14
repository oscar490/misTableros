
$(document).ready(function() {
    
    function mostrarFormulario() {
        $('#formulario').fadeIn();
    }

    $('input').on('click', function() {
        mostrarFormulario();
    });

    $('#crear').on('click', function() {
        let nombre = $('input:text')[0].value;
        $('#formulario').fadeOut();

        let tablero = $(`<div>${nombre}</div>`);
        tablero.addClass('tablero');
        tablero.appendTo($(`.contenedor`));

    });

})
