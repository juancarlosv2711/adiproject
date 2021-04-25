function CargarDocumentos(Id) {
    var parametros = {
        "NId": Id
    };

    $.ajax({
        data: parametros,
        url: 'document.php',
        type: 'post',
        beforeSend: function () {
            $("#Datos").html("Procesando, espere por favor");
        },
        success: function (response) {
            $("#Datos").html(response);
        }
    });
}

function CargarUrl(Id) {
    var parametros = {
        "NId": Id
    };

    $.ajax({
        data: parametros,
        url: 'listaurl.php',
        type: 'post',
        beforeSend: function () {
            $("#Datos").html("Procesando, espere por favor");
        },
        success: function (response) {
            $("#Datos").html(response);
        }
    });
}
