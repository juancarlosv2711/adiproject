<?php 
$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$basededatos = "demo";

if (isset($_POST["Enviarmodal"])){
$CorreoElectronico = $_POST['correomodal'];
// echo $CorreoElectronico;
}

    
$conexion =mysqli_connect($servidor,$usuario,$contrasena,$basededatos)or die ("Error al conectar a la Base de Datos");
$ExisteCorreo = mysqli_query($conexion,"CALL SearchPass('$CorreoElectronico') ") or die ("Query Fail: ".mysqli_error()); 

$Prueba = mysqli_fetch_array($ExisteCorreo); 
    
if(empty($Prueba)){
            echo '<script language="javascript">';
            echo 'alert("El correo no coinside con algun correo registrado anteriormente en nuestra base de datos")';
            echo '</script>';
            echo ("<script>location.href='Index.html'</script>");
}
    
else{
    foreach($Prueba as $value){
    $x= $value;  
    break;        
  }
$Titulo= "Recuperación de la contraseña";  
$Mensaje= "Este correo es para brindarte la contraseña de la plataforma de la ADI de San Rafael de Heredia".
          "\nSu contraseña es: ".$x.
    "\nPara mayor información contacte al correo electronico: ".'info@adiojodeagua.org</a>';
$Cabeceras= "Sistema Automaitco de Mensajes la ADI de San Rafael de Heredia";   
$enviado = mail($CorreoElectronico, $Titulo, $Mensaje,$Cabeceras); 
    
echo '<script language="javascript">';
echo 'alert("Te enviamos tu contraseña al correo: '.$CorreoElectronico.'")';
echo '</script>';
echo ("<script>location.href='Index.html'</script>");  
}

mysqli_close($conexion);
