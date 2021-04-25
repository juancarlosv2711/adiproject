<?php
require('EnlaceBD.php');
$Conn = new ConexionBD();
$Apertura = $Conn->AperturaConexion();
//-----------------------------------Creacion de Conexion

$NId = $_POST["NId"];
$Consulta = "CALL SelectXdistrito('$NId')";
$Distritos = mysqli_query($Apertura, $Consulta);

while ($row = mysqli_fetch_array($Distritos, MYSQLI_ASSOC)) {
    echo '<option value="' . $row['NombreDistrito'] . '">' . $row['NombreDistrito'] . '</option>';
};

$Conn->CierreConexion();
