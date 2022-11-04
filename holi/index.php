<?php  session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a1a84ee869.js" crossorigin="anonymous"></script>
    <link href="assets/bootstrap/css/estilos.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="./vista/general.css">  
    <title>Tienda de calzados</title>
  </head>
  <body class="body_index">
<!--CABECERA y CAROUSELES (IMAGENES Y BANNERS)-->
<?php include_once 'include/header.php' ?>

    <div id="carouselExampleCaptions" class="carousel slide carosel-fade" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
      </ol>
      <div class="carousel-inner">
        <!-- BANNER 1 -->
        <div class="carousel-item active" data-interval="10000">
          <img src="recursos/img/otros/b4.jpg" class="d-block w-100" height="560px">
          <div class="carousel-caption d-none d-md-block">
            <h5>ENVIO GRATIS</h5>
            <p>🎁🎊🎉Por la apertura de Calzados Star, solo en octubre🎁🎊🎉</p>
          </div>
        </div>
        <!-- BANNER 2 -->
        <div class="carousel-item" data-interval="10000">
          <img src="recursos/img/otros/calzados.jpg" class="d-block w-100" height="560px">
          <div class="carousel-caption d-none d-md-block">
            <h5>Siguenos en Instagram</h5>
            <p>Les invito a visitar y  seguir la página, también tendremos sorpresas  para las que nos siguen en Instagram.</p>
          </div>
        </div>
        <!-- BANNER 3 -->
        <div class="carousel-item" data-interval="10000">
          <img src="recursos/img/otros/b1.jpg" class="d-block w-100" height="560px">
          <div class="carousel-caption d-none d-md-block">
            <h5>ENVIO GRATIS</h5>
            <p>🎁🎊🎉Por la apertura de Calzados Star, solo en octubre🎁🎊🎉</p>
          </div>
        </div>
        <!-- BANNER 4 -->
        <div class="carousel-item" data-interval="10000">
          <img src="recursos/img/otros/b3.jpg" class="d-block w-100" height="560px">
          <div class="carousel-caption d-none d-md-block">
            <h5> Mega sorteo para todas ustedes </h5>
            <p>🎁🎊🎉nn Prepárense para el 17 de octubre , CALZADOS STAR  , MIAMY , ZONA CHIC  Y  MAKE SHOP .Se juntan para brindarles obsequios para  ustedes 🎁🎊🎉 sólo serán 4 ganadoras</p>
          </div>
        </div>         
      </div>
<!-- LISTA O NAVEGADOR -->
      <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a> 
    </div> 
    <main class="container mt-4">
      <div class="row">
        
      <div class="col-3">
          <div class="list-group" id="list-tab" role="tablist">
          <?php 
            
            if(isset($_SESSION['usuario'])){
          ?>
          <a class="list-group-item list-group-item-action " id="list-usuario-list" data-toggle="list" href="#list-usuario" role="tab" aria-controls="home"><i class="fas fa-user"></i> USUARIO</a>
          <?php } ?>
            <a class="list-group-item list-group-item-action active" id="list-productos-list" data-toggle="list" href="#list-productos" role="tab" aria-controls="home"><i class="fas fa-tags"></i> PRODUCTOS</a>
            <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile"><i class="fas fa-shopping-cart"></i> CARRITO </a>
            <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages"> <i class="far fa-newspaper"></i>TERMINOS Y CONDICIONES</a>
            <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings"><i class="fas fa-users"></i> SOBRE NOSOTROS</a>
          </div>
        </div>
        <div class="col-9"> 
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade" id="list-usuario" role="tabpanel" aria-labelledby="list-usuario-list">
<!-- DATOS USUARIO  -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalDatos">
                <i class="far fa-address-card"></i>
              </button> 
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPassword">
                Cambiar Contraseña
              </button>   
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
<!-- USUARIO - DETALLES: seguir comprando -->
             </div>
            <div class="tab-pane fade show active" id="list-productos" role="tabpanel" aria-labelledby="list-productos-list">
              <div class="row row-cols-3" id="lista-productos">
              </div>
            
            </div>
            <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
             <a href = "index.php"><button class="btn btn-warning" type="button" name="button"><i class="fas fa-arrow-left   "></i> Seguir comprando</button></a>
              <hr>
              <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">Producto</th>
                    <th scope="col">Talla</th>
                    <th scope="col">Color</th>
                    <th scope="col">Precio por unidad(S/.)</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Subtotal(S/.)</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody id="carrito">
                </tbody>

              </table>
              <button class="btn btn-warning" type="button" name="button" onclick="vaciarCarrito();">Vaciar carrito</button>
              <a class="a-x" href="./registrarCompra.php"><button class="btn btn-success" type="button" name="button"><i class="fas fa-credit-card"></i>+ Info</button></a>
              <hr> 
              <a href = "index.php"><button class="btn btn-warning" type="button" name="button"><i class="fas fa-arrow-left   "></i> Seguir comprando </button></a>
            </div>

<!-- TERMINOS Y CONDICIONES-->
            <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
              <section class="">
                <div class="">
                  <article class="border p-2 m-2">
                    <h5>CONDICIONES GENERALES</h5>
                    <p>Estas condiciones generales, en adelante, «Las Condiciones Generales», regulan la relación jurídica que emana de los procesos de contratación realizados entre los usuarios-clientes, en adelante, «los clientes»</p>
                    <hr>
                    PIE DE ARTICULO
                  </article>
                </div>
                  <div>
                <article class="border p-2 m-2">
                  <h5>1. Aceptación y disponibilidad de las Condiciones Generales de Contratación.</h5>
                  <p>
                     Mediante la aceptación del presente contrato, usted declara ser una persona mayor de edad y con capacidad para contratar que ha leído y acepta las presentes condiciones generales.
Estas condiciones generales, en adelante, «Las Condiciones Generales», regulan la relación jurídica que emana de los procesos de contratación realizados entre los usuarios-clientes, en adelante, «los clientes», de la página web ubicada en la url www.azapateria.com propiedad de Macarena Pardiñas Torrado, con domicilio social en Plaza da Mahía, 1, bajo 6, 15220, Bertamiráns-Ames (A Coruña) y provisto de CIF/NIF 78803980T, en adelante «www.azapateria.com». Los Clientes aceptan las Condiciones Generales desde el instante que utilicen o contraten el servicio o adquieran cualquier producto. Este documento puede ser impreso y almacenado por los clientes.
                  </p>
                  <hr>
                  PIE DE ARTICULO
                </article>

                  </div><div class="">
                  <article class="border p-2 m-2">
                    <h5>2. Normas aplicables.</h5>
                    <p>
Las presentes Condiciones Generales, están sujetas a lo dispuesto en la Ley 7/1998, de 13 de abril, sobre Condiciones Generales de Contratación; a la Ley 26/1984, de 19 de julio, General para la Defensa de Consumidores y Usuarios; al Real Decreto 1906/1999, de 17 de diciembre de 1999, por el que se regula la Contratación Telefónica o Electrónica con condiciones generales; a la Ley Orgánica 15/1999, de 13 de diciembre, de Protección de Datos de Carácter Personal; a la Ley 7/1996, de 15 de enero de Ordenación del Comercio Minorista; a la Ley 34/2002 de 11 de julio, de Servicios de la Sociedad de la Información y de Comercio Electrónico, así como a cualquier otra norma que sustituya a las anteriores o sean de aplicación en España.
                    </p>
                    <hr>
                    PIE DE ARTICULO
                  </article>

                </div>
                  <div>
                <article class="border p-2 m-2">
                  <h5>3. Modificación de las Condiciones Generales.</h5>
                  <p>
                     www.azapateria.com podrá modificar las Condiciones Generales notificándolo a los clientes con antelación suficiente, con el fin de mejorar los servicios y productos ofrecidos a través de www.azapateria.com. Mediante la modificación de las Condiciones Generales expuestas en la página web de www.azapateria.com, se entenderá por cumplido dicho deber de notificación. En todo caso, antes de utilizar los servicios o contratar productos, se podrán consultar las Condiciones Generales.
                  </p>
                  <hr>
                  PIE DE ARTICULO
                </article>

                  </div><div class="">
                  <article class="border p-2 m-2">
                    <h5>4. Descripción de los productos o servicios.</h5>
                    <p>
                        Los productos de www.azapateria.com que son comercializados a través de nuestra página web, conceden el derecho de devolución en los quince días naturales siguientes a la recepción del pedido. Solo se aceptarán devoluciones de productos en su estado original, con su embalaje, documentación, etc. La oferta de los productos de www.azapateria.com tiene validez indefinida pudiendo ser modificada, rectificada o cancelada sin previo aviso a los usuarios y consumidores habituales o eventuales. La responsabilidad civil de www.azapateria.com por los productos suministrados queda limitada al importe de los mismos, el usuario o consumidor renuncia a reclamar cualquier responsabilidad a www.azapateria.com por cualquier concepto en cualquier caso de insatisfacción de los productos adquiridos en www.azapateria.com así como posibles fallos, lentitud de acceso o errores en el acceso a la Página Web, incluyéndose pérdidas de datos, u otro tipo de información que pudiera existir en el ordenador o red del usuario que acceda a www.azapateria.com.
Imágenes de los articulos.
El cliente asume que puedan existir leves diferencias entre el color de la imagen y el color real del artículo suministrado debido a la calidad de las fotografías.
                    </p>
                    <hr>
                    PIE DE ARTICULO
                  </article>

                </div>
                  <div>
                <article class="border p-2 m-2">
                  <h5>5. Descripción de los contenidos y propiedad intelectual</h5>
                  <p>
                     Los contenidos suministrados por www.azapateria.com están sujetos a los derechos de propiedad intelectual e industrial y son titularidad exclusiva de A Zapatería o de las personas físicas o jurídicas que se informe. Mediante la adquisición de un producto, www.azapateria.com no confiere al adquirente ningún derecho de alteración, explotación, reproducción, distribución o comunicación pública sobre el mismo. La cesión de los citados derechos precisará el previo consentimiento por escrito de su titular. El cliente no podrá poner a disposición de terceras personas dichos contenidos. La propiedad intelectual se extiende, además del contenido incluido en www.azapateria.com, a sus gráficos, logotipos, diseño, imágenes y código fuente utilizado para su programación.
                  </p>
                  <hr>
                  PIE DE ARTICULO
                </article>

                  </div><div class="">
                  <article class="border p-2 m-2">
                    <h5>6. Uso del Servicio y responsabilidades</h5>
                    <p> www.azapateria.com no garantiza la disponibilidad permanente de los servicios, quedando exonerado por cualquier tipo de responsabilidad por posibles daños y perjuicios causados debido a la indisponibilidad del servicio por causas de fuerza mayor o errores en las redes telemáticas de transferencia de datos, ajenos a su voluntad. www.azapateria.com no se hace responsable del contenido de los enlaces a otras páginas Web que no sean titularidad suya y que, por tanto, no pueden ser controladas por ésta. El cliente manifiesta que conoce que la información facilitada por www.azapateria.com a través de sus servicios, no tiene carácter legal y únicamente se ofrece a efectos informativos.</p>
                    <hr>
                    PIE DE ARTICULO
                  </article>
                </div>
                  <div>
                <article class="border p-2 m-2">
                  <h5>7. Precios y formas de pago</h5>
                  <p>
                      A Zapatería hace todos los esfuerzos dentro de sus medios para ofrecer la información contenida en el website de forma veraz y sin errores tipográficos. En el caso que en algún momento se produjera algún error de este tipo, ajeno en todo momento a la voluntad de A Zapatería, se procedería inmediatamente a su corrección. De existir un error tipográfico en alguno de los precios mostrados y algún cliente hubiera tomado una decisión de compra basada en ese error, A Zapatería le comunicará al cliente dicho error y este tendrá derecho a rescindir su compra sin ningún coste por su parte. Los precios, las características y la disponibilidad de los productos comercializados por A Zapatería pueden variar por lo que se informará al cliente antes de aceptar cualquier pedido. El precio del producto es el que está en vigor en el momento de la aceptación del pedido por A Zapatería. En caso de que un Cliente haga un pedido con un precio erróneo, www.azapateria.com le comunicará el precio correcto, y, de querer el cliente continuar su pedido, se aplicará el precio corregido por www.azapateria.com. Todos los pedidos de productos están sujetos a la aceptación del pedido por parte de www.azapateria.com. A Zapatería no enviará ningún producto hasta que su departamento de administración haya comprobado que se ha realizado el pago. En caso de impago por el cliente, total o parcial, en la fecha de vencimiento pactada para uno o más envíos de productos, A Zapatería podrá suspender o cancelar cualquier envío o contrato pendiente, sin incurrir en responsabilidad por cualesquiera daños o pérdidas, incluido el lucro cesante, o daños por retraso o pérdida de producción ocasionados al Cliente. La anterior facultad de A Zapatería en ningún caso liberará al Cliente de sus obligaciones contractuales con relación a los pagos adeudados y a la recepción de productos. En caso de producirse un retraso en la recepción o retirada de la mercancía por parte del cliente, A Zapatería quedará facultada para almacenar la mercancía, por cuenta y riesgo del cliente, en sus instalaciones o en las de un tercero y el cliente vendrá obligado al pago de los gastos ocasionados a A Zapatería.
Los precios indicados en nuestra Web incluyen IVA.
                  </p>
                  <hr>
                  PIE DE ARTICULO
                </article>
                  </div>
                  <div>
                <article class="border p-2 m-2">
                  <h5>8. Normas de garantía</h5>
                  <p>
                      Las Normas de Garantía figuran en la ficha técnica de cada producto.
                  </p>
                  <hr>
                  PIE DE ARTICULO
                </article>
                  </div>
              </section>
            </div>
            <!-- #list-settings o TERMINOS Y CONDICIONES-->
            <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
              <article class="border p-2 m-2">
              La tienda de Calzados Star S.A. fundada el 1 de julio del 2013 en el mercado de plaza villa sur comenzó con una pequeña tienda de calzados para dama para todo tipo de ocacion y siguió prosperando hasta tener en la actualidad 3 tiendas de calzados en lima, además de que se implementó del envío por delivery a causa de la actual situación de estado de emergencia.
              <hr>
                PIE DE ARTICULO  
            </article>
              
            </div>
            
          </div>
        </div>
      
    </main>
<!--PIE DE PAGINA o FOOTER-->
    <br><br><br><br><br><br><br>
    <?php include_once 'include/footer.php' ?>

    <script src="./assets/jquery/jquery-3.3.1.min.js"></script> 
    <script type="text/javascript" src="./control/usuario/index.js"></script> 
    <script src="./assets/bootstrap/js/bootstrap.min.js"></script>     
  </body>
</html>

<!--Modal para CRUD-->
<div class="modal fade" id="modalComprar"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 id="calzado-nombre"></h3>
          <button class="close" type="button" data-dismiss="modal" aria-hidden="true">X</button>      
        </div>
        <div class="modal-body">
          <img src='recursos/img/productos/ejemplo1.jpg' id="calzado-imagen" class='card-img-top mb-4' height='400px'>
          <strong class="mt-2"><h4 id="calzado-precio"></h4></strong>
          <h5 id="calzado-descripcion" class="mt-2"></h5>
          <div class="row mt-4">
            <div class="col-6">
              <div class="form-group">
                <label class="form-label">Talla:</label>
                <select class="form-control" id="calzado-talla"></select>
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label class="form-label">Color:</label>
                <select class="form-control" id="calzado-color"></select>
              </div>
            </div>
            <div class="col-12">
              <button class="btn btn-primary" onclick="agregar();">
                <img src="Recursos/carrito.svg">
                Agregar al Carrito
              </button>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>     

<!-- Modal  Registro    ¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨TOCA AGREGAR CONDICIONAL PARA QUE MANDE UN ALERTz-->
<div class="modal fade" id="modalDatos" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Actualizar Datos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <div class="form-label">Nombres</div>
              <input type="text" class="form-control" id="f-nombre">
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <div class="form-label">Apellido Paterno</div>
              <input type="text" class="form-control" id="f-apellidoP">
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <div class="form-label">Apellido Materno</div>
              <input type="text" class="form-control" id="f-apellidoM">
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <div class="form-label">DNI</div>
              <input type="text" class="form-control" id="f-dni">
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <div class="form-label">Dirección</div>
              <input type="text" class="form-control" id="f-direccion">
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <div class="form-label">Celular</div>
              <input type="text" class="form-control" id="f-celular">
            </div>
          </div>
        
        
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="guardarCambios();">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->

<!-- Modal Recuperación de contraseña -->
<div class="modal fade" id="modalPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Actualizar Contraseña</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <div class="form-label">Contraseña Actual</div>
              <input type="password" class="form-control" id="current-password">
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <div class="form-label">Contraseña Nueva</div>
              <input type="password" class="form-control" id="new-password">
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <div class="form-label">Confirmar Contraseña</div>
              <input type="password" class="form-control" id="confirm-password">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="cambiarPassword();">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->