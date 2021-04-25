<?php 
 require('EnlaceBD.php');         
$Clasificacion=$_POST['ClasArchivo'];

$NombreArchi=$_POST['NombreArchivo'];

    $Nombre=$_FILES['Archivo']['name'];
   $Guardar=$_FILES['Archivo']['tmp_name'];

if(!file_exists('archivos')){
    mkdir('archivos',0777,true);
    if(file_exists('archivos')){
        if(move_uploaded_file($Guardar, 'archivos/'.$Nombre)){
           

         $Conn = new ConexionBD();
         $Apertura = $Conn->AperturaConexion();
         $Consulta = "CALL insertdoc($Clasificacion,'$NombreArchi','archivos/$Nombre')";
         $Resultado = mysqli_query($Apertura,$Consulta);

        if($Resultado){
            header("Location:admin.php");
        }else{
          echo ("<script>alert('Error al guardar');window.histry.go(-1);</script>");
        }

        }else{
            echo"No guardado";
        }
    }
}else{
    if(move_uploaded_file($Guardar, 'archivos/'.$Nombre)){
            $Conn = new ConexionBD();
            $Apertura = $Conn->AperturaConexion();
             $Consulta = "CALL insertdoc($Clasificacion,'$NombreArchi','archivos/$Nombre')";
             $Resultado = mysqli_query($Apertura,$Consulta);

             if($Resultado){
              header("Location:admin.php");
           }else{
              echo ("<script>alert('Error al guardar');window.histry.go(-1);</script>");
             }

        }else{
           echo ("<script>alert('Error al guardar');window.histry.go(-1);</script>");
        }
}


?>
