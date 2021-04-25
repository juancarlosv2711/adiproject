$(function () {
    $('#email').on('change', function (e) {
        e.preventDefault();
        var Correo = $('#email').val();
        $.ajax({
            type: "POST",
            url: "validacioncorreo.php",
            data: ('Correo=' + Correo),
            success: function (respuesta) {
                if (respuesta == 1) {
                    debugger;
                    console.log(respuesta);

                    $('#validar').html('Este correo ya está registrado');
                    $('#email').attr('style', 'border:1px solid #FF0000', 'color:#FF0000');

                } else {
                    $('#validar').html('');
                    $('#email').attr('style', 'border:1px solid CED4DA', 'color:#000000');
                }
            }
        })
    })
})
