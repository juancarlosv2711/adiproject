<?php
require('enlacebd.php');
$Tipo = $_POST["NId"];

$Conn = new ConexionBD();

$Apertura = $Conn->AperturaConexion();

switch ($Tipo) {
    case "Legal":
            $Consulta = "CALL SelectUrl('1')";
            $Resultado = mysqli_query($Apertura,$Consulta);
            echo'<h3>Enlaces Importantes</h3>';
            
            echo '<table class="table">';
            echo '<thead class="thead-dark">';
            echo '<tr>';
            echo '<th scope="col"></th>'; 
            echo '<th scope="col"></th>'; 
            echo '</tr>'; 
            echo '</thead>';
            echo '<tbody style="display:block; height:200px;  overflow:auto;">';

            foreach ($Resultado as $ver) {

              echo '<tr>';    
              echo '<td align="left">'.$ver["Nombre"].'</td>';
               echo '<td> <a href="'.$ver["URL"].'" target="_blank">Enlace</a></td>';
              echo '</tr>';  

             }
            echo ' </tbody>';
            echo '</table>';
        break;
    case "Financiero":
             $Consulta = "CALL SelectUrl('2')";
             $Resultado = mysqli_query($Apertura,$Consulta);
            echo'<h3>Enlaces Importantes</h3>';
            
             echo '<table class="table">';
             echo '<thead class="thead-dark">';
             echo '<tr>';
             echo '<th scope="col"></th>';  
             echo '<th scope="col"></th>'; 
             echo '</tr>'; 
             echo '</thead>';
             echo '<tbody style="display:block; height:200px;  overflow:auto;">';

            foreach ($Resultado as $ver) {

            echo '<tr>';    
            echo '<td align="left">'.$ver["Nombre"].'</td>';
             echo '<td> <a href="'.$ver["URL"].'" target="_blank">Enlace</a></td>';
            echo '</tr>';  

            }
            echo ' </tbody>';
            echo '</table>';
        break;
    case "Diseño y Mercadeo":
              $Consulta = "CALL SelectUrl('3')";
              $Resultado = mysqli_query($Apertura,$Consulta);
              echo'<h3>Enlaces Importantes</h3>';
             
              echo '<table class="table">';
              echo '<thead class="thead-dark">';
              echo '<tr>';
              echo '<th scope="col"></th>';   
                echo '<th scope="col"></th>'; 
              echo '</tr>'; 
              echo '</thead>';
              echo '<tbody style="display:block; height:200px;  overflow:auto;">';

             foreach ($Resultado as $ver) {

             echo '<tr>';    
             echo '<td align="left">'.$ver["Nombre"].'</td>';
             echo '<td> <a href="'.$ver["URL"].'" target="_blank">Enlace</a></td>';
             echo '</tr>';  

             }
             echo ' </tbody>';
             echo '</table>';
        break;
    case "Administracion":
             $Consulta = "CALL SelectUrl('4')";
             $Resultado = mysqli_query($Apertura,$Consulta);
             echo'<h3>Enlaces Importantes</h3>';
             
             echo '<table class="table">';
             echo '<thead class="thead-dark">';
             echo '<tr>';
             echo '<th scope="col"></th>';   
             echo '<th scope="col"></th>'; 
             echo '</tr>'; 
             echo '</thead>';
             echo '<tbody style="display:block; height:200px;  overflow:auto;">';
           
            foreach ($Resultado as $ver) {

            echo '<tr>';    
            echo '<td align="left">'.$ver["Nombre"].'</td>';
             echo '<td> <a href="'.$ver["URL"].'" target="_blank">Enlace</a></td>';
            echo '</tr>';  

            }
            echo ' </tbody>';
            echo '</table>';
        break;
}




 
    
 

$Conn->CierreConexion();
?>
