<?php
ob_start();
?>
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
    <link rel="stylesheet" href="css/footer-distributed-with-address-and-phones.css">
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <script src="js/js-image-slider.js" type="text/javascript"></script>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script type="text/javascript" src="./js/funciones_usuario.js"></script>
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
                        <li><a href="./ausuarios.php">Usuarios</a></li>
                        <li><a href="./aproductos.php">Productos</a></li>
                        <li><a href="#">Pedidos</a></li>
                        <li><a href="#">Proveedores</a></li>     
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
            <div id="cuerpo_perfil">
                <div id="wrapper">
                     <div>

                     </div>
                     <div id="cr_conten_perfil">
                        <div id="cr_conten_form_perfil" style="">
                        <form class="form-horizontal" role="form" method="post"> 
                            <fieldset>
                            <legend><span class="glyphicon glyphicon-user"></span>  Datos personales: <?php echo $_SESSION["usuario"]; ?></legend>
                            <?php 
                            $user = $_SESSION["usuario"];
                            $consulta = "SELECT * FROM USUARIO WHERE USERNAME = '$user';";  
                            $connection = new mysqli("localhost", "root", "", "phonejapan");
                                                          //TESTING IF THE CONNECTION WAS RIGHT
                            if ($connection->connect_errno) {
                                     printf("Connection failed: %s\n", $connection->connect_error);
                                     exit();
                            }
                            if ($result = $connection->query($consulta)) {
                                if ($result->num_rows==0) {

                                }else{
                                 while($obj=$result->fetch_object()){
                                    echo '<div style="float:left;width:50%">
                                    <!-- Text input-->
                                    <div class="form-group">
                                      <label class="col-md-4 control-label" for="nom">Nombre:</label>  
                                      <div class="col-md-6">
                                      <input id="nom" name="nom" type="text" value="'.$obj->NOMBRE.'" placeholder="Introduzca su nombre" class="form-control input-md" required="required">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-md-4 control-label" for="ape">Apellidos:</label>  
                                      <div class="col-md-6">
                                      <input id="ape" name="ape" type="text" value="'.$obj->APELLIDOS.'" placeholder="Introduzca sus apellidos" class="form-control input-md" required="required">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-md-4 control-label" for="fnac">F. Nacimiento:</label>  
                                      <div class="col-md-6">
                                      <input id="fnac" name="fnac" type="date" value="'.$obj->FECHA_NAC.'" placeholder="Introduzca su f. de Nacimiento" class="form-control input-md" required="required">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-md-4 control-label" for="dni">NIF/DNI:</label>  
                                      <div class="col-md-6">
                                      <input id="dni" name="dni" value="'.$obj->DNI.'" type="text" placeholder="Introduzca su NIF" class="form-control input-md" required="">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-md-4 control-label" for="dir">Direccion:</label>  
                                      <div class="col-md-6">
                                      <input id="dir" name="dir" value="'.$obj->DIRECCION.'" type="text" placeholder="Introduzca su dirección" class="form-control input-md" required="">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-md-4 control-label" for="correo">Email:</label>  
                                      <div class="col-md-6">
                                      <input id="correo" name="correo" value="'.$obj->EMAIL.'" type="email" placeholder="Introduzca su correo" class="form-control input-md" required="">
                                      </div>
                                    </div>
                                    </div>

                                    <div style="float:right;width:50%">
                                    <!-- Text input-->
                                    <div class="form-group">
                                      <label class="col-md-4 control-label" for="pais">Pais:</label>  
                                      <div class="col-md-6">
                                      <input id="pais" name="pais" value="'.$obj->PAIS.'" type="text" placeholder="Introduzca su Nacionalidad" class="form-control input-md" required="required">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-md-4 control-label" for="prov">Provincia:</label>  
                                      <div class="col-md-6">
                                      <input id="prov" name="prov" type="text" value="'.$obj->PROVINCIA.'" placeholder="Introduzca su Provincia" class="form-control input-md" required="required">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-md-4 control-label" for="ciudad">Ciudad:</label>  
                                      <div class="col-md-6">
                                      <input id="ciudad" name="ciudad" value="'.$obj->CIUDAD.'" type="text" placeholder="Introduzca sus ciudad" class="form-control input-md" required="required">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-md-4 control-label" for="cp">Código Postal:</label>  
                                      <div class="col-md-6">
                                      <input id="cp" name="cp" type="number" value="'.$obj->CP.'" maxlength="5" placeholder="Introduzca su CP" class="form-control input-md" required="">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-md-4 control-label" for="tlf">Teléfono:</label>  
                                      <div class="col-md-6">
                                      <input id="tlf" name="tlf" type="number" value="'.$obj->TLF.'" maxlength="9" placeholder="Introduzca su tlf" class="form-control input-md" required="">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                             <input type="submit" class="btn btn-primary btn-block" style="width:140px;float:right;margin-right:94px" value="Modificar">
                                    </div>
                                    </div>

                                    </fieldset>';
                                  }
                                }
                                
                            } 
                            ?>
                            
                            <?php 
                            if(isset($_POST["nom"])){
                                $user= $_SESSION["usuario"];
                                $nom=$_POST["nom"];
                                $ape=$_POST["ape"];
                                $fnac=$_POST["fnac"];
                                $dni=$_POST["dni"];
                                $dir=$_POST["dir"];
                                $correo=$_POST["correo"];
                                $pais=$_POST["pais"];
                                $prov=$_POST["prov"];
                                $ciudad=$_POST["ciudad"];
                                $cp=$_POST["cp"];
                                $tlf=$_POST["tlf"];
                                //UPDATE USUARIO SET EMAIL = '".$correo."', NOMBRE = '".$nom."', APELLIDOS=  '".$ape."',DNI = '".$dni."',FECHA_NAC = '".$fnac."',DIRECCION = '".$dir."',CP = ".$nom.",CIUDAD = '".$ciudad."',PROVINCIA  = '".$prov."',PAIS = '".$pais."',TLF = '".$tlf."' WHERE USERNAME = '".$user."';";
                                $consulta = "UPDATE USUARIO SET EMAIL = '".$correo."', NOMBRE = '".$nom."', APELLIDOS=  '".$ape."', DNI = '".$dni."', FECHA_NAC = '".$fnac."', DIRECCION = '".$dir."', CP = ".$cp.", CIUDAD = '".$ciudad."', PROVINCIA  = '".$prov."', PAIS = '".$pais."', TLF = ".$tlf." WHERE USERNAME = '".$user."';";
                                $connection = new mysqli("localhost", "root", "", "phonejapan");
                                                              //TESTING IF THE CONNECTION WAS RIGHT
                                if ($connection->connect_errno) {
                                    printf("Connection failed: %s\n", $connection->connect_error);
                                    exit();
                                }
                                if ($result = $connection->query($consulta)) {
                                    header("Location: ./ausuarios.php");
                                } else{
                                    
                                }
                            }else{
                            }
                            ?>
                        </form>
                       </div>
                       
                       <!--CAMBIO CONTRASEÑA-->
                        <div id="cr_conten_form_perfil" style="">
                        <form style="margin-top:35px;" method="post" role="form" class="form-horizontal" >
                            <fieldset>
                            
                            <!-- Form Name -->
                            <legend ><span class="glyphicon glyphicon-edit"></span> Cambiar Contraseña</legend>
                            <div style="float:left;width:50%">
                                <div class="form-group">
                                  <label class="col-md-4 control-label" for="oldpass">Contraseña:</label>  
                                  <div class="col-md-6">
                                  <input id="oldpass" name="oldpass" type="password" placeholder="Antigua contraseña" class="form-control input-md" required="required">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-md-4 control-label" for="npass">N. Contraseña:</label>  
                                  <div class="col-md-6">
                                  <input id="npass" name="npass" type="password" placeholder="Nueva contraseña" class="form-control input-md" required="required">
                                  </div>
                                </div>
                            
                            </div>
                            
                            <div style="float:right;width:50%">
                                <div class="form-group" style="margin-left:-94px;" >
                                  <label class="col-md-3 control-label" style="width:200px;position:relative;float: left;" for="rnpass">Repite Contraseña:</label>  
                                  <div class="col-md-6">
                                  <input id="rnpass" name="rnpass" type="password" placeholder="Repita contraseña" class="form-control input-md" required="required">
                                  </div>
                                </div>
                                <div class="form-group">
                                     <input type="submit" class="btn btn-primary btn-block" style="width:140px;float:right;margin-right:91px" value="Modificar">
                                </div>
                            </div>
                            </div>
                            
                            </fieldset>
                        </form>
                        <?php 
                            if(isset($_POST["oldpass"])){
                                $user=$_SESSION["usuario"];
                                $p1=$_POST["oldpass"];
                                $p2=$_POST["npass"];
                                $p3=$_POST["rnpass"];
                                $connection = new mysqli("localhost", "root", "", "phonejapan");

                                if($p3==$p2){
                                    $consulta = "SELECT * FROM USUARIO WHERE USERNAME = '$user' AND USERPASS=md5('$p1');";  
                                    if ($connection->connect_errno) {
                                        printf("Connection failed: %s\n", $connection->connect_error);
                                        exit();
                                    }
                                    if ($result = $connection->query($consulta)) {
                                        if ($result->num_rows==0) {

                                        }else{
                                            $consulta = "UPDATE USUARIO SET USERPASS = md5('$p2') WHERE USERNAME='$user'"; 
                                            if ($connection->query($consulta)) {
                                                   header("Location: ./ausuarios.php");
                                            }
                                        }
                                    }
                            
                                }else{
                                    
                                }
                            }
                            ?>
                       </div>
                       
                       <!--Baja de Usuario-->
                       <div id="cr_conten_form_perfil" style="">
                        <form  class="form-horizontal" method="post" style="margin-top:-40px;" >
                            <fieldset>
                            
                            <!-- Form Name -->
                            <legend ><span class="glyphicon glyphicon-remove-sign"></span>  Darse de baja</legend>
                            
                                <div class="form-group">
                                     <p style="margin:0px 20px;">Si desea darse de baja de la pagina web de PhoneJapan pulse en el boton que se muestra debajo. Esperamos que su estancia en la web haya sido satisfactoria y deseamos que regrese pronto.</p>
                                     <center><input type="submit" name="baja" class="btn btn-primary btn-block" style="width:200px;margin-top:20px" value="Darse de baja"></center>
                                </div>
                            </div>
                            
                            </fieldset>
                        </form>
                        
                        <?php
                            if(isset($_POST["baja"])){
                                    $user=$_SESSION["usuario"];
                                    $consulta = "SELECT * FROM USUARIO WHERE USERNAME = '$user';";  
                                    if ($connection->connect_errno) {
                                        printf("Connection failed: %s\n", $connection->connect_error);
                                        exit();
                                    }
                                    if ($result = $connection->query($consulta)) {
                                        if ($result->num_rows==0) {

                                        }else{
                                            $consulta = "UPDATE USUARIO SET ESTADO = 'OFF' WHERE USERNAME='$user'"; 
                                            if ($connection->query($consulta)) {
                                                   session_destroy();
                                                   header("Location: ./index.php");
                                                   
                                            }
                                        }
                                    }          
                            }else{
                                
                            }
                        
                        ?>
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
        </div>
</body>
</html>
<?php
ob_end_flush();
?>