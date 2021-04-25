function PresentarVideos() {

    $.ajax({
        url: 'presentvideo.php',
        beforeSend: function () {
            $("#Datos").html("Procesando, espere por favor");
        },
        success: function (response) {
            $("#Datos").html(response);
        }
    });
}

function Guardararchivo() {

    $.ajax({
        url: 'vistaarchivo.php',
        beforeSend: function () {
            $("#Datos").html("Procesando, espere por favor");
        },
        success: function (response) {
            $("#Datos").html(response);
        }
    });
}

function GuardarVideo() {

    $.ajax({
        url: 'vistavideo.php',
        beforeSend: function () {
            $("#Datos").html("Procesando, espere por favor");
        },
        success: function (response) {
            $("#Datos").html(response);
        }
    });
}

function Guardarenlace() {

    $.ajax({
        url: 'vistaenlaces.php',
        beforeSend: function () {
            $("#Datos").html("Procesando, espere por favor");
        },
        success: function (response) {
            $("#Datos").html(response);
        }
    });
}

function Confirmar() {
    var Resp = confirm("Seguro que Desea Eliminar el Video")
    if (Resp == true) {
        return true;
    } else {
        return false;
    }
}

function ConfirmarGuarda() {
    var Resp = confirm("Seguro Que Desa Guardar")
    if (Resp == true) {
        return true;
    } else {
        return false;
    }
}
