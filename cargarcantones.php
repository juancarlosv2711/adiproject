<?php
require('EnlaceBD.php');
$Conn = new ConexionBD();
$Apertura = $Conn->AperturaConexion();
//-----------------------------------Creacion de Conexion

$NId = $_POST["NId"];
$Consulta = "CALL SelectXcanton('$NId')";
$Cantones = mysqli_query($Apertura, $Consulta);

while ($row = mysqli_fetch_array($Cantones, MYSQLI_ASSOC)) {
    echo '<option value="' . $row['IdCanton'] . '">' . $row['NombreCanton'] . '</option>';
};

$Conn->CierreConexion();
