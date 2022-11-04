<?php  session_start(); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="#" />  
    <title>tipos de calzados</title>
      
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <!-- CSS personalizado --> 
    <link rel="stylesheet" href="../vista/general.css">  
      
      
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="../assets/datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="../assets/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">    
      
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">  
  </head>
    
  <body> 
     <header>
     <h3 class='text-center'></h3>
     </header>    
      
     <div class="container">
        <div class="row">
            <div class="col-lg-12">            
            <button id="btnNuevo" type="button" class="btn btn-info" data-toggle="modal"><i class="material-icons">post_add</i></button>    
            </div>    
        </div>    
    </div>    
    <br>  
 
    <div class="container ">
    <div class="row">
            <div class="col-lg-12">
                    
                <table id="tablaUsuarios" class="table table-hover table-bordered " style="width:100%" >
                    <thead class="text-center">
                        <tr>
                            <th>Codigo</th> 
                            <th>Nombre</th>  
                          
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>                           
                    </tbody>        
                </table>               
          
            </div>
        </div>  
    </div>   
 
<!--Modal para CRUD-->
<div class="modal fade" id="modalCRUD"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <form id="formUsuarios">    
            <div class="modal-header">
                Edición
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                    <div class="form-group">
                    <label for="" class="col-form-label">Nombre:</label>
                    <input type="text" class="form-control" id="nombre">
                    </div>
                    </div>
                       
                </div>
                 
                               
            </div>
            <div class="modal-footer"> 
                 <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
            </div>
        </form>    
        </div>
    </div>
</div>   
    <script src="../assets/jquery/jquery-3.3.1.min.js"></script> 
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script> 
    <script type="text/javascript" src="../assets/datatables/datatables.min.js"></script>     
    <script type="text/javascript" src="../control/tipoCalzado.js"></script>     
  </body>
</html>