<?php 

require('EnlaceBD.php');
$Conn = new ConexionBD();
$Apertura = $Conn->AperturaConexion();
$Consulta = "CALL SelectListVideo";
$Resultado = mysqli_query($Apertura,$Consulta);
           
echo '  <div class="row" >';

echo'  <div class="col-sm-12 col-md-12">';
echo '<table class="table" id="table2excel">';

      echo '<thead class="thead-dark">';
      echo '<tr>';
    echo'<th scope="col">ID</th>';
    echo'<th scope="col">Nombre</th>';
    echo'<th scope="col">Archivo</th>';
    echo'</tr>';
    echo'</thead>';
    echo'<tbody style="display:block; height:200px;  overflow:auto;">';

foreach($Resultado as $ver){   
   echo '<tr>';
   echo '<td align="left" id='.$ver["id"].'>'.$ver["id"].'</td>';
   echo '<td >'.$ver["Nombre"].'</td>';
    echo '<td><a class="Tabla_Item" href="eliminarvideo.php?id='.$ver["id"].'" onclick="return Confirmar()">Eliminar</a></td>';
    echo '</tr>'; 
    
}    
echo'</tbody>'; 

echo '</div>';

echo '</div>';
$Conn->CierreConexion();

?>
