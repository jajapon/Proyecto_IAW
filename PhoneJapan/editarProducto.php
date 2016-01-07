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
    <script src="./js/funciones_opiniones.js"></script>
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
                        <li class="active"><a href="./aproductos.php">Productos</a></li>
                        <li><a href="./apedidos.php">Pedidos</a></li>
                        <li><a href="./aproveedores.php">Proveedores</a></li>     
                      </ul>
                      
                      <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION["usuario"]; ?><span class="caret"></span></a>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="#"><span class="glyphicon glyphicon-user"></span>  Ver perfil</a></li>
                              <li><a href="./index.php?logout=yes" id="logout" name="logout"> <span class="glyphicon glyphicon-off"></span>  Cerrar sesion</a></li>
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
            <div id="cuerpo_editprod">
                <div id="wrapper">
                     <div id="cr_conten_prod">
                      <?php 
                        if(isset($_POST["codprod"])){
                            $connection = new mysqli("localhost", "root", "", "phonejapan");
                            $consulta = "SELECT * FROM PRODUCTO WHERE COD_PROD=".$_POST["codprod"].";";  
                            if ($connection->connect_errno) {
                                    printf("Connection failed: %s\n", $connection->connect_error);
                                    exit();
                            } 
                            
                            if ($result = $connection->query($consulta)) {
                                   if ($result->num_rows==0) {
                                         
                                   } else {
                                     while($obj=$result->fetch_object()){
                                        echo '<form style="position:relative;margin-bottom:35px;" method="post" role="form" class="form-horizontal" >              
                                                <fieldset>

                                                <!-- Form Name -->
                                                <legend ><span class="glyphicon glyphicon-edit"></span> Editar Producto</legend>

                                           <div id="izq">
                                               <img src="'.$obj->IMAGEN.'" id="imagen_movil"/>
                                           </div>
                                           <div id="der">
                                               <table >
                                                   <tr>
                                                       <td>
                                                           <label class="col-md-4 control-label" for="marca">Marca:</label> 
                                                       </td>
                                                       <td>
                                                          <input id="marca" name="marca" type="text" value="'.$obj->MARCA.'" placeholder="Introduzca la marca" class="form-control input-md" required="required">
                                                       </td>
                                                   </tr>
                                                   <tr>
                                                       <td>
                                                           <label class="col-md-4 control-label" for="modelo">Modelo:</label> 
                                                       </td>
                                                       <td>
                                                          <input id="modelo" name="modelo" value="'.$obj->MODELO.'" type="text" placeholder="Introduzca el modelo" class="form-control input-md" required="required">
                                                       </td>
                                                   </tr>
                                                   <tr>
                                                       <td>
                                                           <label class="col-md-4 control-label" for="precio">Precio:</label> 
                                                       </td>
                                                       <td>
                                                          <input id="npass" value="'.$obj->PRECIO_UNI.'" step="any" name="precio" min=1 type="number" placeholder="Introduzca el precio" class="form-control input-md" required="required">
                                                       </td>
                                                   </tr>
                                                   <tr>
                                                       <td>
                                                           <label class="col-md-4 control-label" for="stock">Stock:</label> 
                                                       </td>
                                                       <td>
                                                          <input id="stock" name="stock" value="'.$obj->STOCK.'" type="number" placeholder= "Introduzca la cantidad" class="form-control input-md" min=1 required="required" disabled>
                                                       </td>
                                                   </tr>
                                                   <tr>
                                                       <td>
                                                           <label class="col-md-4 control-label" for="files">Imagen:</label> 
                                                       </td>
                                                       <td>
                                                          <input type="file" id="files" onchange="myFunction()" accept="./imagenes/productos/" value="'.$obj->IMAGEN.'" name="files[]">
                                                          <input id="urlimg" name="urlimg" value="'.$obj->IMAGEN.'" type="hidden" required="required">
                                                          <input id="cprod" name="cprod" value="'.$obj->COD_PROD.'" type="hidden" required="required">
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
                                                          <textarea class="col-md-4 form-control" placeholder="Introduzca la descripción" rows="6" name="desc" id="desc" required="required">'.$obj->DESCRIPCION.'</textarea>
                                                       </td>
                                                   </tr>
                                                   <tr>
                                                       <td>
                                                       </td>
                                                       <td>
                                                          <input type="submit" value="Editar" class="btn btn-success col-md-2" style="width:100px;" /> 
                                                       </td>
                                                   </tr>
                                               </table>
                                           </div>
                                            </fieldset>
                                           </form>';
                                         
                                            echo '<form style="position:relative;margin-bottom:35px;" method="post" role="form" class="form-horizontal" >              
                                                <fieldset>

                                                <!-- Form Name -->
                                                <legend ><span class="glyphicon glyphicon-edit"></span> Solicitar suministro del Producto</legend></fieldset>
                                           <div style="width:100%">
                                              <table style="width:100%;">
                                                   <tr>
                                                       <td>
                                                           <label class="col-md-4 control-label" for="cant">Cantidad:</label> 
                                                       </td>
                                                       <td>
                                                          <input id="cant" name="cant" value="1" type="number" placeholder= "Introduzca la cantidad" class="form-control input-md" style="width:70%" min=1 required="required">
                                                          <input id="cprod" name="cprod" value="'.$obj->COD_PROD.'" type="hidden" required="required">
                                                       </td>
                                                       <td>
                                                           <label class="col-md-4 control-label" for="prov">Proveedor:</label> 
                                                       </td>
                                                       <td>';
                                         
                                         echo '<select class="form-control" id="prov" name="prov" class="form-control input-md">';
                                         $connection = new mysqli("localhost", "root", "", "phonejapan");
                                         $consulta = "SELECT * FROM PROVEEDOR;";  
                                         if ($connection->connect_errno) {
                                            printf("Connection failed: %s\n", $connection->connect_error);
                                            exit();
                                         }
                                        if ($result = $connection->query($consulta)) {
                                            if ($result->num_rows==0) {
                                            }else{
                                                while($fila=$result->fetch_object()){   
                                                  echo '<option value="'.$fila->COD_PROV.'">'.$fila->NOMBRE.'</option>' ;
                                                }
                                            }
                                        }
                                         echo '</select>';
                                                       echo '</td>
                                                       <td>
                                                          <input type="submit" style="margin-left:10px;width:90%;" value="Editar" class="btn btn-success col-md-2" /> 
                                                       </td>
                                                   </tr>
                                                </table> 
                                           </div>
                                           </form>';
                                       }
                                    }
                            }else {                                                                                                                              
                            }                       
                        }
                       
                       ?>  
                       <?php  
                          if(isset($_POST["cant"])){ 
                                $cant=$_POST["cant"];
                                $prov=$_POST["prov"];
                                $cprod=$_POST["cprod"];
                              
                                $connection = new mysqli("localhost", "root", "", "phonejapan");
                                $consulta = "INSERT INTO SUMINISTRO VALUES(NULL,$cprod,$prov,$cant,CURRENT_TIMESTAMP())";  
                               
                                if ($connection->connect_errno) {
                                        printf("Connection failed: %s\n", $connection->connect_error);
                                        exit();
                                }
                                if ($connection->query($consulta)) {
                                    $consulta = "UPDATE PRODUCTO SET STOCK=STOCK+$cant WHERE COD_PROD=$cprod"; 
                                    if($connection->query($consulta)){
                                         header("Location: aproductos.php");  
                                    }                                 
                                }
                          

                          }
                        ?> 
                       <?php 
                            
                            if(isset($_POST["cprod"])){ 
                                $imagen=$_POST["urlimg"];
                                $marca=$_POST["marca"];
                                $modelo=$_POST["modelo"];
                                $stock=$_POST["stock"];
                                $precio=$_POST["precio"];
                                $codprod=$_POST["cprod"];
                                $desc=$_POST["desc"];
                                $connection = new mysqli("localhost", "root", "", "phonejapan");
                                $consulta = "SELECT * FROM PRODUCTO WHERE COD_PROD=".$codprod.";";  
                                
                               
                                if ($connection->connect_errno) {
                                        printf("Connection failed: %s\n", $connection->connect_error);
                                        exit();
                                }
                                if ($result = $connection->query($consulta)) {
                                    if ($result->num_rows==0) {

                                    }else{
                                       
                                        $consulta = "UPDATE PRODUCTO SET MARCA='".$marca."', MODELO='".$modelo."',  DESCRIPCION='".$desc."', IMAGEN='".$imagen."' , PRECIO_UNI=".$precio." WHERE COD_PROD=".$codprod.";";
                                        
                                        if ($connection->query($consulta)) {
                                            header("Location: aproductos.php");  
                                        }else{

                                        }
                                    }
                                }else{
                                    
                                }
                            
                             }else{

                             }
                            
                        ?>
                       
                       <div class="panel panel-default widget" style="margin-bottom:10px;">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-comment"></span>
                            <h3 class="panel-title">
                                Recent Comments</h3>
                        </div>
                        <div class="panel-body">
                            <ul class="list-group" id="lista_opiniones">
                               <?php 
                                    if(isset($_POST["codprod"])){
                                        $connection = new mysqli("localhost", "root", "", "phonejapan");
                                        $consulta = "SELECT * FROM OPINION, USUARIO WHERE USUARIO.COD_USU = OPINION.COD_USU AND COD_PROD=".$_POST["codprod"].";";  
                                        if ($connection->connect_errno) {
                                                printf("Connection failed: %s\n", $connection->connect_error);
                                                exit();
                                        }
                                        
                                         if ($result = $connection->query($consulta)) {
                                            if ($result->num_rows==0) {
                                                
                                            }else{
                                                while($obj=$result->fetch_object()){
                                                    echo '<li class="list-group-item">
                                                        <div class="row">
                                                            <div class="col-xs-2 col-md-1">
                                                                <img src="http://placehold.it/80" class="img-circle img-responsive" alt="" /></div>
                                                            <div class="col-xs-10 col-md-11">
                                                                <div>
                                                                    <div class="mic-info">
                                                                        <span style="color:darkblue" >'.$obj->USERNAME.': '.$obj->ROLE.'</span> <p style="float:right">'.$obj->FECHA_OP.'<p> 
                                                                    </div>
                                                                </div>
                                                                <div class="comment-text" style="margin-bottom:10px">
                                                                    '.$obj->MENSAJE.'
                                                                </div>
                                                                <div class="action">
                                                                    <button type="button" onclick="javascript:borrarOpinion('.$obj->COD_OPINION.','.$obj->COD_PROD.');" class="btn btn-danger btn-xs" title="Delete">
                                                                        <span class="glyphicon glyphicon-trash"></span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>';
                                                }

                                            }
                                        }else{

                                         }
                                }else{
                                    
                                }
                                     
                            
                                ?>
                            </ul>
                        </div> 
                     </div>
                     <?php if (isset($_SESSION["usuario"])) : ?>
                     <div class="panel panel-default widget" style="margin-bottom:40px;">
                                  <div class="panel-heading">
                                      <h3 class="panel-title"> Añadir opinión</h3>
                                  </div>
                            <div class="panel-body">

                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label">Mensaje: </label>
                                        <div class="col-sm-10">
                                          <textarea class="form-control" name="addComment" id="addComment" rows="5" required="required"></textarea>
                                           <input id="cdprod" name="cdprod" value="<?php echo $_POST["codprod"]; ?>" type="hidden" required="required">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group" style="position:relative;top:10px;">
                                        <div class="col-sm-offset-2 col-sm-10">                    
                                            <button class="btn btn-success btn-circle text-uppercase" type="submit" id="submitComment" onclick="javascript:insertarOpinion();" ><span class="glyphicon glyphicon-send"></span> Responder</button>
                                        </div>
                                    </div>            
                            </div>
                    </div>
                     <?php else: ?>

                      <?php endif ?>
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