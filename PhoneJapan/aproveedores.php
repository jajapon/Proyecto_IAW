<?php
    session_start();
    if(empty($_SESSION["rol"])){
        header("Location: ./index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/style_buttons.css">
    <link href="css/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="js/js-image-slider.js" type="text/javascript"></script>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/footer-distributed-with-address-and-phones.css">

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- Optional theme -->

        <script type="text/javascript" src="./js/funciones_proveedores.js"></script>
</head>
<body>
       <div id="wrapper">
        <div id="header">
               <div id="cabecera">    
               </div>
               <nav id="nav" class="navbar-default navbar-inverse" role="navigation">
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                     
                      <ul class="nav navbar-nav">
                        <li><a href="./ausuarios.php">Usuarios</a></li>
                        <li><a href="./aproductos.php">Productos</a></li>
                        <li><a href="./apedidos.php">Pedidos</a></li>
                        <li class="active"><a href="#">Proveedores</a></li>     
                      </ul>
                      
                      <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION["usuario"]; ?><span class="caret"></span></a>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="./ver_perfil.php"><span class="glyphicon glyphicon-user"></span>  Ver perfil</a></li>
                              <li><a href="./aproveedores.php?logout=yes" id="logout" name="logout"> <span class="glyphicon glyphicon-off"></span>  Cerrar sesion</a></li>
                          </ul>
                        </li>
                      </ul>
                   
                   <?php 
                            if (isset($_GET["logout"])) {  
                                 session_destroy();
                                 header("Location: ./index.php");
                            }
                   ?> 
                   
            </nav>
        </div>
            <div id="cuerpo_prov">
                     <div id="cr_prov">
                         <div style="height:44px;background-color:lightblue;margin:0 auto;margin-bottom:10px;margin-top:5px;"><p style="float:left;margin-top:8px;font-weight:bold;color:white;margin-left:5px;font-size:18px;">PROVEEDORES PHONEJAPAN</p><a href="./anadir_proveedor.php" style="float:right;margin:3px;margin-top:5px;height:32px;" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>Añadir</a><input type="text"  style="float:right;width:200px;margin-top:5px;" placeholder="Busqueda de un proveedor" class="form-control" id="bs-prov"/>  
                           </div>
                         <div id="agrega_tabla_prov"></div>
                         <center><ul class="pagination" id="agrega_lista_prov"></ul></center>                  
                    <div id="agrega_tabla_sum"></div> 
                     </div>
            </div>
            <footer class="footer-distributed">
                <div class="footer-left">
                    <h3>Phone<span>japan</span></h3>
                    <p class="footer-company-name">Company Name &copy; 2015</p>
                </div>
                <div class="footer-center">
                    <div>
                        <i class="fa fa-map-marker"></i>
                        <p><span>Ies. Triana</span> España, Sevilla</p>
                    </div>
                    <div>
                        <i class="fa fa-phone"></i>
                        <p>+34 666777888</p>
                    </div>

                    <div>
                        <i class="fa fa-envelope"></i>
                        <p><a href="mailto:juan.antonio.japon@gmail.com">juan.antonio.japon@gmail.com</a></p>
                    </div>
                </div>
                <div class="footer-right">
                    <p class="footer-company-about">
                        <span>About the company</span>
                        Pagina web desarrollada por Juan Antonio Japon de la Torre para el Proyecto de ASIR
                    </p>
                    <div class="footer-icons">
                        <a href="https://www.facebook.com/juan.a.japon"><i class="fa fa-facebook"></i></a>
                        <a href="https://twitter.com/jajapon91"><i class="fa fa-twitter"></i></a>
                        <a href="https://es.linkedin.com/in/juan-antonio-japon-de-la-torre-466b9952"><i class="fa fa-linkedin"></i></a>
                        <a href="https://github.com/jajapon"><i class="fa fa-github"></i></a>
                    </div>
                </div>
		</footer>
        </div>
</body>
</html>