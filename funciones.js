function SelectCantones(Id) {

    var parametros = {
        "NId": Id
    };

    $.ajax({
        data: parametros,
        url: 'cargarcantones.php',
        type: 'post',
        beforeSend: function () {
            $("#IdCantones").html("Procesando, espere por favor");
        },
        success: function (response) {
            $("#IdCantones").html(response);
        }
    });
}

function SelectDistrito(Id) {

    var parametros = {
        "NId": Id
    };

    $.ajax({
        data: parametros,
        url: 'CargarDistritos.php',
        type: 'post',
        beforeSend: function () {
            $("#IdDistrito").html("Procesando, espere por favor");
        },
        success: function (response) {
          //   console.log(response);
            $("#IdDistrito").html(response);
        }
    });
}


function Esconder() {
    var x = document.getElementById("ContenedorIndex");
    var y = document.getElementById("ContenedorInformacionPersonal");


    if (x.style.display == "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
        y.style.display = "block";
    }


}

function RegresarC1() {
    var x = document.getElementById("ContenedorIndex");
    var y = document.getElementById("ContenedorInformacionPersonal");

    if (x.style.display == "none") {
        x.style.display = "block";
        y.style.display = "none";
        return false;
    }
}

function ValidacionPW() {
    var x = document.getElementById("Pw1").value;
    var y = document.getElementById("Pw2").value;


    if (x.length == 0 || y.length == 0) {
        alert("Por favor no dejar espacios en blanco");
    } else {

        if (x == y) {
            Esconder();

        } else {
            alert("Las contraseñas no son iguales");
            document.getElementById("Pw1").value = "";
            document.getElementById("Pw2").value = "";
        }
    }


}

function AvanzarInformacionTipoUsuario() {
    var x = document.getElementById("TipoUsuario").value;
    var y;
    var z = document.getElementById("ContenedorInformacionPersonal");




    switch (x) {
        case 'Estudiante':
            y = document.getElementById("ContenedorEstudiante");
            if (y.style.display == "none") {
                y.style.display = "block";
            }
            RequiredEstudianteTrue();

            break;
        case 'Idea':
            y = document.getElementById("ContenedorIdea");
            if (y.style.display == "none") {
                y.style.display = "block";
            }
            RequiredIdeaTrue();
            break;

        case 'Emprendedor':
            y = document.getElementById("ContenedorEmprendedor");
            if (y.style.display == "none") {
                y.style.display = "block";
            }
            RequiredEmprendedorTrue();
            break;
        case 'Empresario':
            y = document.getElementById("ContenedorEmpresario");
            if (y.style.display == "none") {
                y.style.display = "block";
            }
            RequiredEmprensarioTrue();
            break;
        case 'Comerciante':
            y = document.getElementById("ContenedorComercio");
            if (y.style.display == "none") {
                y.style.display = "block";
                document.getElementById("ContenedorInformacionPersonal").style.display = "none";
            }
            RequiredComercianteTrue();
            break;

        case "Particular":
            document.Guardar.submit();
            break;

    }

    if (z.style.display == "block") {
        z.style.display = "none";
    }


}

function ValidacionTiempoReal() {
    var Pw1 = document.getElementById("Pw1").value;
    var Pw2 = document.getElementById("Pw2").value;
    if (Pw1 === Pw2) {
        document.getElementById("Pw2").style.border = "2px solid green";
        document.getElementById("BtnProseguir").removeAttribute("disabled")
    } else {
        document.getElementById("Pw2").style.border = "2px solid red";
    }



    return false;
}

function EsconderFormularios() {
    document.getElementById("ContenedorEstudiante").style.display = "none";
    document.getElementById("ContenedorEmprendedor").style.display = "none";
    document.getElementById("ContenedorIdea").style.display = "none";
    document.getElementById("ContenedorEmpresario").style.display = "none";
    document.getElementById("ContenedorComercio").style.display = "none";
    document.getElementById("ContenedorInformacionPersonal").style.display = "block";

    RequiredEstudianteFalse();
    RequiredEmprendedorFalse();
    RequiredIdeaFalse();
    RequiredEmprensarioFalse();
    RequiredComercianteFalse();
}
//validacion de Solo letras
function alphaOnly(event) {
    var key = event.keyCode;

    return ((key >= 65 && key <= 90) || key == 8 || key == 32 || key == 192 || key == 9);
};
//validacion de solo numeros
function OnlyNumbers(event) {
    var key = event.keyCode;
    return ((key >= 48 && key <= 57) || (key >= 96 && key <= 105) || key == 8 || key == 9);
};
//Incompleto solo realiza el cambio placeholder permite el addevent pero el maxlenght
function CambiarPlaceHolder() {
    var T_ID = document.getElementById("TipoIdentificacion").value;
    var Input = document.getElementById("Cedula");

    switch (T_ID) {
        case "Nacional":
            Input.placeholder = "Ej: 20XXX0XXX";
            Input.type = "number";
            Input.value = null;

            break;

        case "DIMEX":
            Input.placeholder = "Ej: 000000000000";
            Input.setAttribute('maxlength', 12);
            Input.value = null;
            Input.type = "text";

            break;

        case "Pasaporte":
            Input.placeholder = "Ej: 000000000000";
            Input.setAttribute('maxlength', 12);
            Input.value = null;
            Input.type = "text";
            break;

    }


}

function GetNombreProvincia() {
    var d = document.getElementById("IdProvincia");
    var Texto = d.options[d.selectedIndex].text;
    document.getElementById("Provincias").value = Texto;
}

function GetNombreCanton() {
    var d = document.getElementById("IdCantones");
    var Texto = d.options[d.selectedIndex].text;
    document.getElementById("Cantones").value = Texto;
}

function MarcarEspacioVacio(Id) {
    document.getElementById(Id).style.border = "2px solid red";
}

function RemoverMarcaEspacioVacio(Id) {
    document.getElementById(Id).style.border = "1px solid #CED4DA";
}

function EsconderInfoPersonal() {
    var ContadorNull = 0;
    var TID = document.getElementById("TipoIdentificacion");
    var ID = document.getElementById("Cedula");
    var Name = document.getElementById("Nombre");
    var Ap1 = document.getElementById("Apellido1");
    var Ap2 = document.getElementById("Apellido2");
    var Tel = document.getElementById("Telefono");
    var Nacimiento = document.getElementById("FechaNacimiento");
    var Genero = document.getElementById("Genero");
    var Escolaridad = document.getElementById("Escolaridad");
    var Provincia = document.getElementById("Provincias");
    var Canton = document.getElementById("Cantones");
    var Distrito = document.getElementById("IdDistrito");
    var Direccion = document.getElementById("Direccion");
    var TipoUsuario = document.getElementById("TipoUsuario");



    if (TID.value.length == 0) {
        MarcarEspacioVacio("TipoIdentificacion");
        ContadorNull += 1;
    } else {
        RemoverMarcaEspacioVacio("TipoIdentificacion");
    }
    if (ID.value.length == 0) {
        MarcarEspacioVacio("Cedula");
        ContadorNull += 1;
    } else {
        RemoverMarcaEspacioVacio("Cedula");
    }
    if (Name.value.length == 0) {
        MarcarEspacioVacio("Nombre");
        ContadorNull += 1;
    } else {
        RemoverMarcaEspacioVacio("Nombre");
    }
    if (Ap1.value.length == 0) {
        MarcarEspacioVacio("Apellido1");
        ContadorNull += 1;
    } else {
        RemoverMarcaEspacioVacio("Apellido1");
    }
    if (Ap2.value.length == 0) {
        MarcarEspacioVacio("Apellido2");
        ContadorNull += 1;
    } else {
        RemoverMarcaEspacioVacio("Apellido2");
    }
    if (Tel.value.length == 0) {
        MarcarEspacioVacio("Telefono");

        ContadorNull += 1;
    } else {
        RemoverMarcaEspacioVacio("Telefono");
    }
    if (Nacimiento.value.length == 0) {
        MarcarEspacioVacio("FechaNacimiento");
        ContadorNull += 1;
    } else {
        RemoverMarcaEspacioVacio("FechaNacimiento");
    }
    if (Genero.value.length == 0) {
        MarcarEspacioVacio("Genero");
        ContadorNull += 1;
    } else {
        RemoverMarcaEspacioVacio("Genero");
    }
    if (Escolaridad.value.length == 0) {
        MarcarEspacioVacio("Escolaridad");
        ContadorNull += 1;
    } else {
        RemoverMarcaEspacioVacio("Escolaridad");
    }
    if (Provincia.value.length == 0) {
        MarcarEspacioVacio("IdProvincia");
        ContadorNull += 1;
    } else {
        RemoverMarcaEspacioVacio("IdProvincia");
    }
    if (Canton.value.length == 0) {
        MarcarEspacioVacio("IdCantones");
        ContadorNull += 1;
    } else {
        RemoverMarcaEspacioVacio("IdCantones");
    }
    if (Distrito.value.length == 0) {
        MarcarEspacioVacio("IdDistrito");
        ContadorNull += 1;
    } else {
        RemoverMarcaEspacioVacio("IdDistrito");
    }
    if (Direccion.value.length == 0) {
        MarcarEspacioVacio("Direccion");
        ContadorNull += 1;
    } else {
        RemoverMarcaEspacioVacio("Direccion");
    }
    if (TipoUsuario.value.length == 0) {
        MarcarEspacioVacio("TipoUsuario");
        ContadorNull += 1;
    } else {
        RemoverMarcaEspacioVacio("TipoUsuario");
    }




    if (ContadorNull == 0) {
        AvanzarInformacionTipoUsuario();
    } else {
        alert("Por favor completar todos los campos");
    }
}


function RequiredEstudianteTrue() {
    document.getElementById("CentroEdu").required = true;
}

function RequiredEstudianteFalse() {
    document.getElementById("CentroEdu").removeAttribute("required");
}

function RequiredEmprendedorTrue() {
    document.getElementById("NombreEmprendedor").required = true;
    document.getElementById("TelefonoEmprendedor").required = true;
    document.getElementById("DireccionEmprendedor").required = true;
    document.getElementById("URLEmprendedor").required = true;
    document.getElementById("TipoIdentificacionEmprendedor").required = true;
    document.getElementById("identificacionEmprendedor").required = true;
    document.getElementById("TipoSociedadEmprendedor").required = true;
    document.getElementById("TiempoEmprendedor").required = true;
    document.getElementById("EmpleadosEmprendedor").required = true;
    document.getElementById("SectorProEmprendedor").required = true;
    document.getElementById("DesActividadEconomicaEmprendedor").required = true;
}

function RequiredEmprendedorFalse() {

    document.getElementById("NombreEmprendedor").removeAttribute("required");
    document.getElementById("TelefonoEmprendedor").removeAttribute("required");
    document.getElementById("DireccionEmprendedor").removeAttribute("required");
    document.getElementById("URLEmprendedor").removeAttribute("required");
    document.getElementById("TipoIdentificacionEmprendedor").removeAttribute("required");
    document.getElementById("identificacionEmprendedor").removeAttribute("required");
    document.getElementById("TipoSociedadEmprendedor").removeAttribute("required");
    document.getElementById("TiempoEmprendedor").removeAttribute("required");
    document.getElementById("EmpleadosEmprendedor").removeAttribute("required");
    document.getElementById("SectorProEmprendedor").removeAttribute("required");
    document.getElementById("DesActividadEconomicaEmprendedor").removeAttribute("required");


}

function RequiredIdeaTrue() {
    document.getElementById("ProyeccionIdea").required = true;
    document.getElementById("SectorProIdea").required = true;
}

function RequiredIdeaFalse() {
    document.getElementById("ProyeccionIdea").removeAttribute("required");
    document.getElementById("SectorProIdea").removeAttribute("required");
}

function RequiredEmprensarioTrue() {
    document.getElementById("NombreEmpresa").required = true;
    document.getElementById("TelefonoEmpresa").required = true;
    document.getElementById("DireccionEmpresa").required = true;
    document.getElementById("URLEmpresa").required = true;
    document.getElementById("Empresario").required = true;
    document.getElementById("IdEmpresa").required = true;
    document.getElementById("TipoSociedadEmpresa").required = true;
    document.getElementById("TiempoEmpresa").required = true;
    document.getElementById("EmpleadosEmpresa").required = true;
    document.getElementById("ActivadadEconomica").required = true;
    document.getElementById("DescripcionActEconomicaEmpresa").required = true;
}

function RequiredEmprensarioFalse() {
    document.getElementById("NombreEmpresa").removeAttribute("required");
    document.getElementById("TelefonoEmpresa").removeAttribute("required");
    document.getElementById("DireccionEmpresa").removeAttribute("required");
    document.getElementById("URLEmpresa").removeAttribute("required");
    document.getElementById("Empresario").removeAttribute("required");
    document.getElementById("IdEmpresa").removeAttribute("required");
    document.getElementById("TipoSociedadEmpresa").removeAttribute("required");
    document.getElementById("TiempoEmpresa").removeAttribute("required");
    document.getElementById("EmpleadosEmpresa").removeAttribute("required");;
    document.getElementById("ActivadadEconomica").removeAttribute("required");
    document.getElementById("DescripcionActEconomicaEmpresa").removeAttribute("required");
}

function RequiredComercianteTrue() {
    document.getElementById("NombreComercio").required = true;
    document.getElementById("TelefonoComercio").required = true;
    document.getElementById("DireccionComercio").required = true;
    document.getElementById("URLComercio").required = true;
    document.getElementById("Comercio").required = true;
    document.getElementById("NumeroIDComercio").required = true;
    document.getElementById("TipoSociedad").required = true;
    document.getElementById("TiempoComercio").required = true;
    document.getElementById("Empleados").required = true;
    document.getElementById("SectorProComercio").required = true;
    document.getElementById("DescEconomicaComercio").required = true;
}

function RequiredComercianteFalse() {
    document.getElementById("NombreEmpresa").removeAttribute("required");

    document.getElementById("NombreComercio").removeAttribute("required");
    document.getElementById("TelefonoComercio").removeAttribute("required");
    document.getElementById("DireccionComercio").removeAttribute("required");
    document.getElementById("URLComercio").removeAttribute("required");
    document.getElementById("Comercio").removeAttribute("required");
    document.getElementById("NumeroIDComercio").removeAttribute("required");
    document.getElementById("TipoSociedad").removeAttribute("required");
    document.getElementById("TiempoComercio").removeAttribute("required");
    document.getElementById("Empleados").removeAttribute("required");
    document.getElementById("SectorProComercio").removeAttribute("required");
    document.getElementById("DescEconomicaComercio").removeAttribute("required");
}


function MostrarSumit() {
    var x = document.getElementById("TipoUsuario").value;
    var y = document.getElementById("ContendorSubmit");
    var z = document.getElementById("ContendorSiguiente");

    if (x == "Particular") {
        y.style.display = "block";
        z.style.display = "none";
    } else {
        y.style.display = "none";
        z.style.display = "block";
    }
}


function LimitePwRegistro() {
    var Pw1 = document.getElementById("Pw1").value;
    if (Pw1.length < 8) {
        document.getElementById("Pw1").style.border = "2px solid red";
        document.getElementById("BtnProseguir").disable = true;
    } else {
        document.getElementById("Pw1").style.border = "2px solid green";

    }
}
