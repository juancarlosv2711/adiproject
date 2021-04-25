<?php 
require('EnlaceBD.php');

$Id= $_GET['id'];

$Conn = new ConexionBD();
$Apertura = $Conn->AperturaConexion();
$Consulta = "CALL DeletVideo('$Id')";
$Resultado = mysqli_query($Apertura,$Consulta);

if($Resultado){
      
    header("Location:admin.php");
  
}else{
    echo ("<script>alert('Error no se puede Eliminar');window.histry.go(-1);</script>");
}

$Conn->CierreConexion();
?>
