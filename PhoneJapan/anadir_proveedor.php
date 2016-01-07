<?php
ob_start();
?>
<?php
    session_start();
    if(!empty($_SESSION["rol"])){

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
    <link rel="stylesheet" href="./css/footer-distributed-with-address-and-phones.css">
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
 <script src="./js/login.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script type="text/javascript">
        
        imageSlider.thumbnailPreview(function (thumbIndex) { return "<img src='imagenes/thumb" + (thumbIndex + 1) + ".jpg' style='width:100px;height:60px;' />"; });
    </script>
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
                        <li class="active"><a href="#">Usuarios</a></li>
                        <li><a href="./aproductos.php">Productos</a></li>
                        <li><a href="./apedidos.php">Pedidos</a></li>
                        <li><a href="./aproveedores.php">Proveedores</a></li>     
                      </ul>
                      
                      <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION["usuario"]; ?><span class="caret"></span></a>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="./ver_perfil.php"><span class="glyphicon glyphicon-user"></span>  Ver perfil</a></li>
                              <li><a href="./ausuarios.php?logout=yes" id="logout" name="logout"> <span class="glyphicon glyphicon-off"></span>  Cerrar sesion</a></li>
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
                   <!--FORM USER Y CONTRASEÑA-->
                        <div id="cr_prov" style="">
                        <form style="position:relative;top:20px;margin-bottom:35px;" method="post" role="form" class="form-horizontal" >
                            <fieldset>
                            
                            <!-- Form Name -->
                            <legend ><span class="glyphicon glyphicon-edit"></span> Alta de Proveedor en PhoneJapan:</legend>
                            <div style="float:left;width:50%">
                                <div class="form-group">
                                  <label class="col-md-4 control-label" for="nom">Nombre:</label>  
                                  <div class="col-md-6">
                                  <input id="nom" name="nom" type="text" placeholder="Nombre del proveedor" class="form-control input-md" required="required">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-md-4 control-label" for="ciudad">Ciudad:</label>  
                                  <div class="col-md-6">
                                  <input id="ciudad" name="ciudad" type="text" placeholder="Introduce la ciudad" class="form-control input-md" required="required">
                                  </div>
                                </div>
                            </div>
                            
                            <div style="float:right;width:50%">
                                <div class="form-group">
                                  <label class="col-md-4 control-label" for="dir">Dirección:</label>  
                                  <div class="col-md-6">
                                  <input id="dir" name="dir" type="text" placeholder="Introduce la dirección" class="form-control input-md" required="required">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-md-4 control-label" for="cp">CP:</label>  
                                  <div class="col-md-6">
                                  <input id="cp" name="cp" type="number" min="0" max="99999"  placeholder="Código Postal" class="form-control input-md" required="required">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <button type="submit" style="float:right;position:relative;right:92px" class="btn btn-success">Añadir proveedor</button>
                                </div>
                            </div>
                            </fieldset>                 
                        </form>
                       </div>
                    </div>

                        <?php 
                            if(isset($_POST["nom"])){
                                
                                $nom=$_POST["nom"];
                                $ciu=$_POST["ciudad"];
                                $dir=$_POST["dir"];
                                $cp=$_POST["cp"];
                                
                                $connection = new mysqli("localhost", "root", "", "phonejapan");
                                    $consulta = "SELECT * FROM PROVEEDOR WHERE NOMBRE = '$nom';";  
                                    if ($connection->connect_errno) {
                                        printf("Connection failed: %s\n", $connection->connect_error);
                                        exit();
                                    }
                                    if ($result = $connection->query($consulta)) {
                                        if ($result->num_rows==0) {
                                            $consulta = "INSERT INTO PROVEEDOR VALUES (NULL,'$nom','$ciudad','$dir',$cp)";
                                            if ($connection->query($consulta)) {
                                                 header("Location: ./aproveedores.php");
                                            }else{

                                            }
                                        }else{
                                             echo '<script language="javascript">
                                               $("#alert_msg").text("Ya existe un usuario con ese correo o nombre de usuario");
                                                   $(".alert").toggleClass("hidden").fadeIn(1000);
                                                   window.setTimeout(function() {
                                                       $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                                           $(this).remove(); 
                                                        });
                                                   }, 3000);
                                                </script>';
                                        }
                                    }
                            
                                }else{
                                    
                                }
                            
                            ?>
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
        </div>
</body>
</html>
<?php
ob_end_flush();
?>