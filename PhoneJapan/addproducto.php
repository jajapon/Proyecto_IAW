<?php
ob_start();
?>
<?php
    session_start();
    if(empty($_SESSION["rol"])){
        header("Location: registro.php");
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
    <link rel="stylesheet" href="css/footer-distributed-with-address-and-phones.css">
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<body>
       <div id="wrapper">
        <div id="header">
               <div id="cabecera">  
                   <div class="alert alert-danger hidden" style="width:80%;margin: 0 auto;position:relative;top:10px;height:60px;" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong id="alert_msg">Success! You have been signed in successfully! </strong>
                </div>  
               </div>
               <nav id="nav" class="navbar-default navbar-inverse" role="navigation">
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                     
                      <ul class="nav navbar-nav">
                        <li><a href="./ausuarios.php">Usuarios</a></li>
                        <li><a href="./aproductos.php">Productos</a></li>
                        <li><a href="#">Pedidos</a></li>
                        <li class="active"><a href="#">Proveedores</a></li>     
                      </ul>
                      
                      <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION["usuario"]; ?><span class="caret"></span></a>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="#"><span class="glyphicon glyphicon-user"></span>  Ver perfil</a></li>
                              <li><a href="./registro.php?logout=yes" id="logout" name="logout"> <span class="glyphicon glyphicon-off"></span>  Cerrar sesion</a></li>
                          </ul>
                        </li>
                      </ul>
                   
                   <?php 
                            if (isset($_GET["logout"])) {  
                                 session_destroy();
                                 header("Location: registro.php");
                            }
                   ?> 
                   
            </nav>
        </div>
            <div id="cuerpo_addprod">
                <div id="wrapper">
                     <div id="cr_conten_prod">
                       <form style="position:relative;margin-bottom:35px;" method="post" role="form" class="form-horizontal" >
                            <fieldset>
                            
                            <!-- Form Name -->
                            <legend ><span class="glyphicon glyphicon-edit"></span> Añadir Producto</legend>
                            
                       <div id="izq">
                           <img src="./imagenes/productos/default.png" id="imagen_movil"/>
                       </div>
                       <div id="der">
                           <table >
                               <tr>
                                   <td>
                                       <label class="col-md-4 control-label" for="marca">Marca:</label> 
                                   </td>
                                   <td>
                                      <input id="marca" name="marca" type="text" placeholder="Introduzca la marca" class="form-control input-md" required="required">
                                   </td>
                               </tr>
                               <tr>
                                   <td>
                                       <label class="col-md-4 control-label" for="modelo">Modelo:</label> 
                                   </td>
                                   <td>
                                      <input id="modelo" name="modelo" type="text" placeholder="Introduzca el modelo" class="form-control input-md" required="required">
                                   </td>
                               </tr>
                               <tr>
                                   <td>
                                       <label class="col-md-4 control-label" for="precio">Precio:</label> 
                                   </td>
                                   <td>
                                      <input id="npass" name="precio" min=1 type="number" placeholder="Introduzca el precio" class="form-control input-md" required="required">
                                   </td>
                               </tr>
                               <tr>
                                   <td>
                                       <label class="col-md-4 control-label" for="stock">Stock:</label> 
                                   </td>
                                   <td>
                                      <input id="stock" name="stock" type="number" placeholder="Introduzca la cantidad" class="form-control input-md" min=1 required="required">
                                   </td>
                               </tr>
                               <tr>
                                   <td>
                                       <label class="col-md-4 control-label" for="files">Imagen:</label> 
                                   </td>
                                   <td>
                                      <input type='file' id="files" onchange="myFunction()" accept='./imagenes/productos/' name='files[]'>
                                      <input id="urlimg" name="urlimg" type="hidden" required="required">
                                   </td>
                                         <script language="javascript">
                                             function myFunction() {
                                                var ruta = "./imagenes/productos/" + document.getElementById("files").files[0].name;
                                                $("#urlimg").val(ruta);
                                                $("#imagen_movil").attr("src",ruta).fadeIn();
                                             }
                                         </script>                                     
                               </tr>
                               <tr>
                                   <td>
                                       <label class="col-md-4 control-label" for="desc">Descripción:</label> 
                                   </td>
                                   <td>
                                      <textarea class="col-md-4 form-control" placeholder="Introduzca la descripción" rows="6" name="desc" id="desc" ></textarea>
                                   </td>
                               </tr>
                               <tr>
                                   <td>
                                   </td>
                                   <td>
                                      <input type="submit" value="Añadir" class="btn btn-success col-md-2" style="width:100px;" /> 
                                   </td>
                               </tr>
                           </table>
                       </div>
                        </fieldset>
                       </form>
                       <?php 
                            
                            if(isset($_POST["marca"])){ 
                                $imagen=$_POST["urlimg"];
                                $marca=$_POST["marca"];
                                $modelo=$_POST["modelo"];
                                $stock=$_POST["stock"];
                                $precio=$_POST["precio"];
                                $desc=$_POST["desc"];
                                $connection = new mysqli("localhost", "root", "", "phonejapan");
                                    $consulta = "SELECT * FROM PRODUCTO WHERE MARCA = '$marca' AND MODELO = '$modelo';";  
                                    if ($connection->connect_errno) {
                                        printf("Connection failed: %s\n", $connection->connect_error);
                                        exit();
                                    }
                                    if ($result = $connection->query($consulta)) {
                                        if ($result->num_rows==0) {
                                            
                                            $consulta = "INSERT INTO PRODUCTO VALUES (NULL, '$marca' ,'$modelo' ,'$desc' ,$stock ,'$imagen',$precio)";
                                            if ($connection->query($consulta)) {
                                                 header("Location: aproductos.php");
                                            }else{

                                            }
                                        }else{
                                             echo '<script language="javascript">
                                               $("#alert_msg").text("Ya existe un producto con esa marca y modelo");
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
                       
                     </div>
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
<?php
ob_end_flush();
?>