<?php 
echo '  
<div class="row" id="VistaVideo">  
<form action="guardarenlace.php" method="post">
       <div class="col-sm-12 col-md-12">
              <h1>Guardar Enlace</h1>
                   </div>
                <div class="col-sm-12 col-md-12">        
                    <label for="">Tipo De Enlace</label>
                      <br>
                    <select class="browser-default custom-select" name="Enlace" id="Enlace" required>
                        <option value="">Seleccione una Opción</option>
                        <option value="1">Legal</option>
                        <option value="2">Financiero</option>
                        <option value="3">Diseño y Mercadeo</option>
                        <option value="4">Administracion</option>
                    </select>
                </div>
                <div class="col-sm-12 col-md-12">
                    <label for="">Nombre del Enlace</label>
                      <br>
                   <input type="text" class="form-control" name="Nombre" required>
                </div>
                <div class="col-sm-12 col-md-12">
                <label for="">Direccion url</label>
                  <br>
                     <input type="text" class="form-control" name="Url" required>
                </div>
                <div class="col-sm-12 col-md-12">
                <br>
                <button type="submit" class="btn btn-primary" name="Enviarmodal" onclick="return ConfirmarGuarda()">Guardar</button>
               </div>
 </form>
</div>
 
    ';



?>
