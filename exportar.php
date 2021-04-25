<?php 
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename= ListaUsuarios.xls");

require('EnlaceBD.php');
$Conn = new ConexionBD();
$Apertura = $Conn->AperturaConexion();
$Consulta = "CALL SelectUsuarios";
$Resultado = mysqli_query($Apertura,$Consulta);

    echo'<table class="table" id="table2excel">';
    echo'<thead class="thead-dark">';
    echo'<tr>';
    echo'<th scope="col">Correo Electronico</th>';
    echo'<th scope="col">Tipo ID</th>';
    echo'<th scope="col">Cedula</th>';
    echo'<th scope="col">Nombre</th>';
    echo'<th scope="col">Primer Apellido</th>';
    echo'<th scope="col">Segundo Apellido</th>';
    echo'<th scope="col">Nacimiento</th>';
    echo'<th scope="col">Telefono</th>';
    echo'</tr>';
    echo'</thead>';
    echo'<tbody>';

foreach($Resultado as $ver){   
   echo '<tr>';
   echo '<td>'.$ver["CorreoElectronico"].'</td>';
   echo '<td>'.$ver["TipoIdentificacion"].'</td>';
   echo '<td>'.$ver["NumeroIdentificacion"].'</td>';
   echo '<td>'.$ver["Nombre"].'</td>';
   echo '<td>'.$ver["Apellido1"].'</td>';
   echo '<td>'.$ver["Apellido2"].'</td>';
   echo '<td>'.$ver["FechaNacimiento"].'</td>';
   echo '<td>'.$ver["Telefono"].'</td>';
}    
echo'</tbody>'; 


echo'</table>';

$Conn->CierreConexion();

?>
