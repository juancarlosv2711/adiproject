<?php
require('enlacebd.php');
$Tipo = $_POST["NId"];

$Conn = new ConexionBD();

$Apertura = $Conn->AperturaConexion();

switch ($Tipo) {
    case "Legal":
            $Consulta = "CALL SelectDocumento('1')";
            $Resultado = mysqli_query($Apertura,$Consulta);
            echo'<h3>Documentos Descargables</h3>';
          
            echo '<table class="table">';
            echo '<thead class="thead-dark">';
            echo '<tr>';
            echo '<th scope="col">Nombre</th>';
            echo '<th scope="col">Archivo</th>';    
            echo '</tr>'; 
            echo '</thead>';
            echo '<tbody style="display:block; height:200px; overflow:auto;">';

            foreach ($Resultado as $ver) {

              echo '<tr>';    
              echo '<td align="left">'.$ver["Nombre"].'</td>';
              echo '<td><a href="'.$ver["URL"].'" download="">Descargar</a>        </td>';
              echo '</tr>';  

             }
            echo ' </tbody>';
            echo '</table>';
           
            
        
        break;
        
        
        
    case "Financiero":
             $Consulta = "CALL SelectDocumento('2')";
             $Resultado = mysqli_query($Apertura,$Consulta);
            echo'<h3>Documentos Descargables</h3>';
           
             echo '<table class="table">';
             echo '<thead class="thead-dark">';
             echo '<tr>';
             echo '<th scope="col">Nombre</th>';
             echo '<th scope="col">Archivo</th>';    
             echo '</tr>'; 
             echo '</thead>';
             echo '<tbody style="display:block; height:200px; overflow:auto;">';

            foreach ($Resultado as $ver) {

            echo '<tr>';    
            echo '<td align="left">'.$ver["Nombre"].'</td>';
            echo '<td><a  href="'.$ver["URL"].'" download="">Descargar</a> </td>';
            echo '</tr>';  

            }
            echo ' </tbody>';
            echo '</table>';
        break;
    case "Diseño y Mercadeo":
              $Consulta = "CALL SelectDocumento('3')";
              $Resultado = mysqli_query($Apertura,$Consulta);
              echo'<h3>Documentos Descargables</h3>';
              
              echo '<table class="table">';
              echo '<thead class="thead-dark">';
              echo '<tr>';
              echo '<th scope="col">Nombre</th>';
              echo '<th scope="col">Archivo</th>';    
              echo '</tr>'; 
              echo '</thead>';
              echo '<tbody style="display:block; height:200px;  overflow:auto;">';

             foreach ($Resultado as $ver) {

             echo '<tr>';    
             echo '<td align="left">'.$ver["Nombre"].'</td>';
             echo '<td><a    href="'.$ver["URL"].'" download="">Descargar</a> </td>';
             echo '</tr>';  

             }
             echo ' </tbody>';
             echo '</table>';
        break;
    case "Administracion":
             $Consulta = "CALL SelectDocumento('4')";
             $Resultado = mysqli_query($Apertura,$Consulta);
        
             echo'<h3>Documentos Descargables</h3>';
             
             echo '<table class="table">';
             echo '<thead class="thead-dark">';
             echo '<tr>';
             echo '<th scope="col">Nombre</th>';
             echo '<th scope="col">Archivo</th>';    
             echo '</tr>'; 
             echo '</thead>';
        
             echo '<tbody style="display:block; height:200px;  overflow:auto;">';

            foreach ($Resultado as $ver) {

            echo '<tr>';    
            echo '<td align="left">'.$ver["Nombre"].'</td>';
            echo '<td><a  href="'.$ver["URL"].'" download="">Descargar</a> </td>';
            echo '</tr>';  

            }
            echo ' </tbody>';
           
        break;
}




 
    
 

$Conn->CierreConexion();
?>
