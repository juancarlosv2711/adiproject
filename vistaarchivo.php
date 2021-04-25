<?php 

echo ' <div class="row" id="VistaArchivo">  
<form action="guardararchivo.php" method="post" enctype="multipart/form-data">
       <div class="col-sm-12 col-md-12">
              <h1>Guardar Archivo</h1>
                   </div>
                <div class="col-sm-12 col-md-12">        
                    <label for="">Tipo De Archivo</label>
                      <br>
                    <select class="browser-default custom-select" name="ClasArchivo" id="Video" required>
                        <option value="">Seleccione una Opción</option>
                        <option value="1">Legal</option>
                        <option value="2">Financiero</option>
                        <option value="3">Diseño y Mercadeo</option>
                        <option value="4">Administracion</option>
                    </select>
                </div>
                <div class="col-sm-12 col-md-12">
                    <label for="">Nombre del archivo</label>
                      <br>
                   <input class="form-control" type="text" name="NombreArchivo" required>
                </div>
                
                <div class=" col-md-12">
                <label for="">Archivo</label>
                  <br>
                        <input type="file" class="form-control-file" id="src-file1" name="Archivo" required>
     
                </div>
                
                <div class="col-sm-12 col-md-12">
                <br>
                <button type="submit" class="btn btn-primary" name="Enviarmodal"  onclick="return ConfirmarGuarda()">Guardar</button>
               </div>
  </form>
</div>
    ';

?>
