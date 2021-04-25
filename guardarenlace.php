<?php
require('EnlaceBD.php');

$Clasificacion=$_POST['Enlace'];
$Nombre=$_POST['Nombre'];
$Url=$_POST['Url'];

$Conn = new ConexionBD();
$Apertura = $Conn->AperturaConexion();
$Consulta = "CALL InsertUrl('$Clasificacion','$Nombre','$Url')";
$Resultado = mysqli_query($Apertura,$Consulta);

if($Resultado){
 header("Location:admin.php");
}else{
    echo ("<script>alert('Error al guardar');window.histry.go(-1);</script>");
}

$Conn->CierreConexion();
?>
