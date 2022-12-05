<?php  session_start(); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="#" />  
    <title>Calzado</title>
      
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/estilos.css">
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
 
    <div class="row fila-menu">
        <div class="col-lg-2 col-md-3">
            <?php include_once '../include/menu.php' ?>
        </div>
                <div class="col-lg-10 col-md-9">
                    <div class="row">
                        <div class="col-lg-12">
                            <table id="tabla" class="table table-hover table-bordered " style="width:100%" >
                                <thead class="text-center">
                                    <tr>
                                    <th>Codigo</th> 
                                    <th>Nombre</th> 
                                    <th>Descripción</th>  
                                    <th>Imagen</th>
                                    <th>Categoría</th>
                                    <th>Proveedor</th>
                                    <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>                           
                                </tbody>        
                            </table>               
            
                         </div>
                    </div>  
                </div>
    </div>     
    <script src="../assets/jquery/jquery-3.3.1.min.js"></script> 
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script> 
    <script type="text/javascript" src="../assets/datatables/datatables.min.js"></script>     
    <script type="text/javascript" src="../control/calzado.js"></script>     
  </body>
</html>

<!--Modal para CRUD-->
<!-- LINEA 78  enctype="multipart/form-data -->
<div class="modal fade" id="modalCRUD"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form" enctype="multipart/form-data">    
                <div class="modal-header">
                    Edición
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombre">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="" class="col-form-label">Descripcion:</label>
                                <input type="text" class="form-control" id="descripcion">
                            </div>
                        </div>

                    </div>


                    <div class="row"> 
                    <div class="col-lg-4">
                            <div class="form-group">
                            <label for="" class="col-form-label">Imagen:</label>
                                <input type="text" class="form-control" id="imagen">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="" class="col-form-label">Categoría:</label>
                                <select id="idTipoCalzado" class="form-control">
                                    <option value="0">Seleccione</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="" class="col-form-label">Proveedore:</label>
                                <select id="idProveedor" class="form-control">
                                    <option value="0">Seleccione</option>
                                </select>
                            </div>
                        </div>
                    </div>
                   <!--
                    <div class="row">  

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="" class="col-form-label">Imagen:</label>
                                <input type="file" class="form-control" id="imagen" >
                            </div>
                        </div>
                         
                    </div>
-->
                </div>
                <div class="modal-footer"> 
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                    <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
                </div>
            </form>    
        </div>
    </div>
</div>

<!--Modal para detalle - CAMBIO LINEA 128 -->
<div class="modal  fade" id="modalDetalle"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="formDetalle">    
                <div class="modal-header">
                    
                </div>
                <div class="modal-body">

                    <div class="row"> 
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="" class="col-form-label">Precio de Venta</label>
                                <input type="number" class="form-control" id="precio">
                            </div> 
                        </div> 
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="" class="col-form-label">Talla</label>
                                <select id="idTalla" class="form-control">
                                    <option value="0">Seleccione</option>
                                </select>
                            </div>               
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                            <label for="" class="col-form-label">Stock</label>
                            <input type="number" class="form-control" id="stock">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="col-form-label">Color</label>
                                <input type="text" class="form-control" id="color">
                            </div>
                        </div>       
                    </div>  

                    <div class="row container">
                        <table id="tablaDetalles" class="table table-hover table-bordered table-responsive table-responsive-sm" style="width:100%" >
                            <thead class="text-center">
                                <tr>
                                    <th>Codigo</th> 
                                    <th>Id Talla</th> 
                                    <th>Talla</th> 
                                    <th>Color</th> 
                                    <th>Precio</th>
                                    <th>Stock</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>                           
                            </tbody>        
                        </table> 
                    </div>              
                </div>
                <div class="modal-footer"> 
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                    <button type="submit" id="btnGuardarDetalle" class="btn btn-dark">Guardar</button>
                </div>
            </form>    
        </div>
    </div>
</div>
