<?php
require('EnlaceBD.php');
require('GuardarDatos.php');

if (isset($_POST["Enviar"])) {
    //    Informacion ContenedorIndex
    $CorreoElectronico = $_POST['Correo'];
    $Contraseña = password_hash($_POST['Password'], PASSWORD_DEFAULT);

    //    Datos ContenedorInformacionPersonal

    $T_ID = $_POST['TipoIdentificacion'];
    $Num_ID = $_POST['NumeroIdentificacion'];
    $Nombre = $_POST['Nombre'];
    $PrimerApellido = $_POST['Apellido1'];
    $SegundoApellido = $_POST['Apellido2'];
    $Telefono = $_POST['Telefono'];
    $Nacimiento = $_POST['FechaNacimiento'];
    $Genero = $_POST['Genero'];
    $Escolaridad = $_POST['Escolaridad'];
    $Provincia = $_POST['NombreProvincia'];
    $Canton = $_POST['NombreCanton'];
    $Distrito = $_POST['Distrito'];
    $Direccion = $_POST['Direccion'];
    $T_Usuario = $_POST['TipoUsuario'];
}
//-----------------------------------------------Abre conexion con la BD
$Conn = new ConexionBD();
$Apertura = $Conn->AperturaConexion();


$GuardarInformacion = new InsertDatos();

$Continuar = $GuardarInformacion->ValidarCorreo($CorreoElectronico);
if ($Continuar == TRUE) {
    echo '<script language="javascript">';
    echo 'alert("EL Correo ingresado ya existe")';
    echo '</script>';
    echo ("<script>location.href='Registro.html'</script>");
} else {
    $Validacion = $GuardarInformacion->GuardarDatosCuenta($CorreoElectronico, $Contraseña);

    if ($Validacion) {
        $IdUsuario = $GuardarInformacion->BuscarIdUsuario($CorreoElectronico, $Contraseña);
        if ($GuardarInformacion->GuardarDatospersonales($IdUsuario, $T_ID, $Num_ID, $Nombre, $PrimerApellido, $SegundoApellido, $Telefono, $Nacimiento, $Genero, $Escolaridad, $Provincia, $Canton, $Distrito, $Direccion, $T_Usuario)) {
            switch ($T_Usuario) {
                case 'Estudiante':
                    $NombreIntitucion = $_POST['CentroEducativo'];
                    // Se crea la consulta con el metodo correspondiente
                    $Consulta = "CALL InsertEstudiante('$IdUsuario','$NombreIntitucion')";

                    $Resultado = mysqli_query($Apertura, $Consulta);
                    break;

                case 'Idea':
                    $Proyeccion = $_POST['ProyeccionIdea'];
                    $SectorIdea = $_POST['SectorProIdea'];
                    $Consulta = "CALL InsertIdea('$IdUsuario','$Proyeccion','$SectorIdea')";

                    $Resultado = mysqli_query($Apertura, $Consulta);

                    break;

                case 'Emprendedor':
                    $NombreEmprendedor = $_POST['NombreEmprendedor'];
                    $TelefonoEmprendedor = $_POST['TelefonoEmprendedor'];
                    $DireccionEmprendedor = $_POST['DireccionEmprendedor'];
                    $URLEmprendedor = $_POST['URLEmprendedor'];
                    $TipoIDEmprendedor = $_POST['TipoIdentificacionEmprendedor'];
                    $IDEmprendedor = $_POST['identificacionEmprendedor'];
                    $SociedadEmprendedor = $_POST['TipoSociedadEmprendedor'];
                    $TiempoEmprendedor = $_POST['TiempoEmprendedor'];
                    $EmpleadosEmprendedor = $_POST['EmpleadosEmprendedor'];
                    $SectorProEmprendedor = $_POST['SectorProEmprendedor'];
                    $DesActEmprendedor = $_POST['DesActividadEconomicaEmprendedor'];

                    $Consulta = "CALL InsertEmprendedor('$IdUsuario','$NombreEmprendedor','$DireccionEmprendedor','$TelefonoEmprendedor','$URLEmprendedor','$TipoIDEmprendedor','$IDEmprendedor','$SociedadEmprendedor','$TiempoEmprendedor','$EmpleadosEmprendedor','$SectorProEmprendedor','$DesActEmprendedor')";

                    $Resultado = mysqli_query($Apertura, $Consulta);
                    break;
                    //        
                case 'Empresario':
                    $NombreEmpresa = $_POST['NombreEmpresa'];
                    $TelefonoEmpresa = $_POST['TelefonoEmpresa'];
                    $DireccionEmpresa = $_POST['DireccionEmpresa'];
                    $URLEmpresario = $_POST['URLEmpresa'];
                    $TipoIDEmpresa = $_POST['TipoIDEmpresa'];
                    $IdEmpresa = $_POST['IdEmpresa'];
                    $SociedadEmpresa = $_POST['TipoSociedadEmpresa'];
                    $TiempoEmpresa = $_POST['TiempoEmpresa'];
                    $EmpleadosEmpresa = $_POST['CantdEmpleadosEmpresa'];
                    $ActEconomicaEmpresa = $_POST['ActEconomicaEmpresa'];
                    $DesActEmpresa = $_POST['DescripcionActEconomicaEmpresa'];

                    $Consulta = "CALL InsertEmpresario('$IdUsuario','$NombreEmpresa','$DireccionEmpresa','$TelefonoEmpresa','$URLEmpresario','$TipoIDEmpresa','$IdEmpresa','$SociedadEmpresa','$TiempoEmpresa','$EmpleadosEmpresa','$ActEconomicaEmpresa','$DesActEmpresa')";

                    $Resultado = mysqli_query($Apertura, $Consulta);

                    break;
                    //        
                case 'Comerciante':
                    $NombreComercio = $_POST['NombreComercio'];
                    $TelefonoComercio = $_POST['TelefonoComercio'];
                    $DireccionComercio = $_POST['DireccionComercio'];
                    $URLComercio = $_POST['URLComercio'];
                    $TipoIdComercio = $_POST['TipoIdComercio'];
                    $NumeroIDComercio = $_POST['NumeroIDComercio'];
                    $SociedadComercio = $_POST['TipoSociedadComercio'];
                    $TiempoComercio = $_POST['TiempoComercio'];
                    $EmpleadosComercio = $_POST['EmpleadosComercio'];
                    $SectorProComercio = $_POST['SectorProComercio'];
                    $DesActComercio = $_POST['DescEconomicaComercio'];

                    $Consulta = "CALL InsertComerciante('$IdUsuario','$NombreComercio','$DireccionComercio','$TelefonoComercio','$URLComercio','$TipoIdComercio','$NumeroIDComercio','$SociedadComercio','$TiempoComercio','$EmpleadosComercio','$SectorProComercio','$DesActComercio')";

                    $Resultado = mysqli_query($Apertura, $Consulta);

                    break;

                case 'Particular':


                    break;
            }
            //--------------------------------------------------------------------------------------------------


            $Conn->CierreConexion();

            echo '<script language="javascript">';
            echo 'alert("Registro Completado Exitosamente")';
            echo '</script>';
            echo ("<script>location.href='index.html'</script>");
        } else {
            echo '<script language="javascript">';
            echo 'alert("Se produjo un error. Inténtalo de nuevo más tarde.")';
            echo '</script>';
            echo ("<script>location.href='Registro.html'</script>");
        }
    } else {

        $Conn->CierreConexion();

        echo '<script language="javascript">';
        echo 'alert("Registro Fallo")';
        echo '</script>';
        echo ("<script>location.href='index.html'</script>");
    }
}
