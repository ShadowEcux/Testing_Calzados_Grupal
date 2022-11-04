<?php 
    session_start();
    if(isset($_SESSION['usuario'])){
        include_once './include/header.php';  
?>
        <html>
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <link rel="shortcut icon" href="#" />  
                <title>Registrar Compra</title>
                <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
                <link rel="stylesheet" href="./vista/general.css">  
                <link rel="stylesheet" type="text/css" href="./assets/datatables/datatables.min.css"/>
                <link rel="stylesheet"  type="text/css" href="./assets/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">    
                <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">  
            </head>
            <body>
                <div class="container pt-5">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card m-4">
                                <div class="card-header">Mis Datos</div>
                                <div class="card-body"> 
                                    <div class="row">
                                        <div class="col-6 b-n">
                                            <p class="card-text">Nombres:</p>
                                            <p class="card-text">Apellidos:</p>
                                            <p class="card-text">DNI:</p>
                                            <p class="card-text">Dirección:</p>
                                            <p class="card-text">Celular:</p>
                                        </div>
                                        <div class="col-6">
                                            <p class="card-text" id="r-nombre"></p>
                                            <p class="card-text" id="r-apellidos"></p>
                                            <p class="card-text" id="r-dni"></p>
                                            <p class="card-text" id="r-direccion"></p>
                                            <p class="card-text" id="r-celular"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card m-4">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col">Método de Pago:</div>
                                        <div class="col"><strong>Efectivo</strong></div>
                                    </div>
                                </div>
                                <!--div class="card-body"> 
                                    <p class="card-text">Efectivo:</p> 
                                </div-->
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card m-4">
                                <table class="table">
                                    <thead class="card-header">
                                        <tr>
                                            <th scope="col" colspan="2">Costos de la Compra</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">Subtotal</th>
                                            <td id="r-subtotal"></td> 
                                        </tr>
                                        <tr>
                                            <th scope="row">Costo de envio</th>
                                            <td id="r-costoEnvio"></td> 
                                        </tr> 
                                        <tr>
                                            <th scope="row">Total</th>
                                            <td id="r-total"></td> 
                                        </tr> 
                                    </tbody>
                                </table>
                            </div>
                            <div class="pl-4 pr-4">
                                <button class="btn btn-block btn-primary" onclick="finalizar();">Finalizar Compra</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include_once './include/footer.php' ?>
                <script src="./assets/jquery/jquery-3.3.1.min.js"></script> 
                <script type="text/javascript" src="./control/usuario/registrarCompra.js"></script>     
                <script src="./assets/bootstrap/js/bootstrap.min.js"></script> 
            </body>
        </html>
<?php
    } else{
        echo "<script>window.location.href = './login.php'</script>;";      
    }
?>