 
<!DOCTYPE html>
<html lang="en">
<form id="formUsuarios">     
   
   <div class="row">
       <div class="col-lg-6"> 
       <label for="" class="col-form-label">Nombre:</label>
       <input type="text" class="form-control" id="nombre">
    
       </div>
       <div class="col-lg-6">
       <label for="" class="col-form-label">Apellido paterno</label>
       <input type="text" class="form-control" id="apellidoP">
       </div>  
           
   </div>
   <div class="row"> 
       <div class="col-lg-6"> 
         <label for="" class="col-form-label">Apellido materno</label>
         <input type="text" class="form-control" id="apellidoM"> 
       </div> 
       <div class="col-lg-6"> 
       <label for="" class="col-form-label">DNI</label>
       <input type="text" class="form-control" id="DNI">
       </div>
         
   </div>
   <div class="row">
       <div class="col-lg-6">  
           <label for="" class="col-form-label">Direccion</label>
           <input type="text" class="form-control" id="direccion"> 
       </div>   
       <div class="col-lg-6">   
           <label for="" class="col-form-label" minlength="8" maxlength="8">Celular</label>
           <input type="text" class="form-control" id="celular"> 
       </div>       
   </div>     
   <div class="row"> 
       <div class="col-lg-6"> 
           <label for="" class="col-form-label">Usuario</label>
           <input type="text" class="form-control" id="usuario"> 
       </div>    
       <div class="col-lg-6"> 
           <label for="" class="col-form-label">Contraseña</label>
           <input type="text" class="form-control" id="pasword"> 
       </div>     
   </div>
   <div class="  container pt-3">
     <a   href="../index.php">
     <button type="button" class="btn btn-light  "   >Cancelar</button>
     </a>
     <button type="submit" class="btn btn-dark " id="btnGuardar"  >Guardar</button>
     </div>
 </form>
 </html>