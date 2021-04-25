<?php
require('EnlaceBD.php');
require('GuardarDatos.php');


$Conn = new ConexionBD();
$Apertura = $Conn->AperturaConexion();

$Usuario = $_POST["correo"];
$Contraseña = $_POST["contra"];

$Consulta = "CALL SearchPass('$Usuario')";

$Resultado = mysqli_query($Apertura, $Consulta);

$Variable = mysqli_fetch_array($Resultado);

$Conn->CierreConexion();

foreach ($Variable as $value) {
    $hash = $value;
    break;
}
$validar = password_verify($Contraseña, $hash);

if ($validar) {

    session_start();
    $_SESSION['usuario'] = $Usuario;
    echo ("<script>location.href='subMenu.php'</script>");
} else {

    $GuardarInformacion = new InsertDatos();
    if ($GuardarInformacion->Validaradmin($Usuario, $Contraseña)) {
        session_start();
        $_SESSION['usuario'] = $Usuario;
        echo ("<script>location.href='admin.php'</script>");
    } else {
        echo '<script language="javascript">';
        echo 'alert("Correo o Contraseña equivocada")';
        echo '</script>';
        echo ("<script>location.href='Index.html'</script>");
    }
}
