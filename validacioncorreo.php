<?php
require('EnlaceBD.php');
$Conn = new ConexionBD();
$Apertura = $Conn->AperturaConexion();


$Correo = $_POST["Correo"];
$Consulta = "CALL SelectLogin('$Correo')"; 

$Validacion = mysqli_query($Apertura,$Consulta);

$Variable = mysqli_fetch_array($Validacion);
$Conn->CierreConexion();
foreach($Variable as $value){ 
        $validar = $value;  
     break;
}
if($validar==1){
    echo 1;
}
else{
    echo 0;
}

?>
