<?php
$Conexion;
class InsertDatos{
//---------------------------------------------------------------------------------------------------------------------------------------
     public function AperturaConexion(){
        $usuario = "root";
        $contrasena = "";
        $servidor = "localhost";
        $basededatos = "demo";
        $this->Conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);  
        return $this->Conexion;
    }
//---------------------------------------------------------------------------------------------------------------------------------------
    function GuardarDatosCuenta($Email,$Password){
        $Apertura = $this->AperturaConexion();
    try{
        $Consulta = "CALL InsertUSer('$Email','$Password')";
        $Resultado = mysqli_query($Apertura,$Consulta);
        mysqli_close($this->Conexion);
        return true;
    }
    catch(Exception $e){
        return false;
    }
}
    function BuscarIdUsuario($Email,$Password){
        $Apertura = $this->AperturaConexion();
    try{
        $Consulta = "CALL SelectIdUsser('$Email','$Password')";
        $Resultado = mysqli_query($Apertura,$Consulta);
        $IdentificadorUsuario = mysqli_fetch_array($Resultado);
        mysqli_close($this->Conexion);
                foreach($IdentificadorUsuario as $x){ 
            $IdUsuario = $x;  
                    break;
             }
        return $IdUsuario;
    }
    catch(Exception $q){
    }
}
    function GuardarDatospersonales($IdUsuario,$T_ID,$Num_ID,$Nombre,$PrimerApellido,$SegundoApellido,$Telefono,$Nacimiento,$Genero,$Escolaridad,$Provincia,$Canton,$Distrito,$Direccion,$T_Usuario){
    $Apertura = $this->AperturaConexion();
     try{
         $Consulta = "CALL InsertInfo('$IdUsuario','$Num_ID','$T_ID','$Nombre','$PrimerApellido','$SegundoApellido','$Genero','$Provincia','$Canton','$Distrito','$Direccion','$Nacimiento','$Telefono','$Escolaridad','$T_Usuario')";
          $Resultado = mysqli_query($Apertura,$Consulta);
         mysqli_close($this->Conexion);
        return true;
    }
    catch(Exception $q){
        return false;
    }
}
    
    
    function ValidarCorreo($Email){
             $Apertura = $this->AperturaConexion();
   try{
        $Consulta = "CALL SearchPass('$Email')";
        $Resultado = mysqli_query($Apertura,$Consulta);
        mysqli_close($this->Conexion);
       
       $ExisteCorreo = mysqli_fetch_array($Resultado);
       
       
       
       if(empty($ExisteCorreo)){
           return false;
       }
       else{
           return true;
       }
       
       
        
    }
    catch(Exception $e){
        
    }
    }
    
    function Validaradmin($Usuario,$Contraseña){
                  $Apertura = $this->AperturaConexion();
   try{
        $Consulta = "CALL SelectAdmi('$Usuario','$Contraseña')";
        $Resultado = mysqli_query($Apertura,$Consulta);
        mysqli_close($this->Conexion);
       
       $Variable = mysqli_fetch_array($Resultado);
        foreach($Variable as $value){ 
        $validar = $value;  
        break;
        }
       if($validar == 1){
            return true;
          
       }
       else{
           return false;
       }
       
       
        
    }
    catch(Exception $e){
        
    }        
    }
    
    
}
