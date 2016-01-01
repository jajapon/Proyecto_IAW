<?php
ob_start();
?>
<?php
    session_start();
    if(!empty($_SESSION["rol"])){
        if($_SESSION["rol"]=="Admin"){
            header("Location: ausuarios.php");
        }
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
    <link rel="stylesheet" href="./demo.css">
        <script src="./script.js"></script>

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
       <div id="wrapper" >
        <div id="header">
               <div id="cabecera">
                <div class="alert alert-danger hidden" style="width:80%;margin: 0 auto;position:relative;top:10px;height:60px;" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong id="alert_msg">Success! You have been signed in successfully! </strong>
                </div>
               </div>
                
               <nav id="nav" class="navbar-default navbar-inverse" role="navigation">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-home white"></span></a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                     
                      <ul class="nav navbar-nav">
                        <li><a href="#">Productos</a></li>
                        <li><a href="#">Sobre nosotros</a></li>
                        <li><a href="./contacto.php">Contacto</a></li>
                        
                      </ul>
                      
                      <?php if (empty($_SESSION["usuario"])) : ?>
                      <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
                            <ul id="login-dp" class="dropdown-menu">
                                <li>
                                     <div class="row">
                                            <div class="col-md-12">
                                                 <form class="form" role="form" method="post" id="login-nav">
                                                        <div class="form-group">
                                                             <label class="sr-only" for="username">Email address</label>
                                                             <input type="text" class="form-control" name="username" id="username" placeholder="Email address or username" required>
                                                        </div>
                                                        <div class="form-group">
                                                             <label class="sr-only" for="password">Password</label>
                                                             <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                                                             <div class="help-block text-right"><a href="">Forget the password ?</a></div>
                                                        </div>
                                                        <div class="form-group">
                                                             <input type="submit" class="btn btn-primary btn-block" value="Sing in">
                                                        </div>
                                                        <div class="checkbox">
                                                             <label>
                                                             <input type="checkbox"> keep me logged-in
                                                             </label>
                                                        </div>
                                                 </form>
                                                <?php 
                                                    if (isset($_POST["username"])) {   
                                                       $user = $_POST["username"];
                                                       $pass = md5($_POST["password"]);
                                                       $rol ="";
                                                       $consulta = "SELECT * FROM USUARIO WHERE USERNAME = '$user' AND USERPASS ='$pass'";  
                                                       $connection = new mysqli("localhost", "root", "", "phonejapan");
                                                          //TESTING IF THE CONNECTION WAS RIGHT
                                                       if ($connection->connect_errno) {
                                                            printf("Connection failed: %s\n", $connection->connect_error);
                                                            exit();
                                                       }
                                                       if ($result = $connection->query($consulta)) {
                                                          if ($result->num_rows==0) {
                                                                echo '<script language="javascript">
                                                                $("#alert_msg").text("Usuario o contraseña incorrectos");
                                                                                $(".alert").toggleClass("hidden").fadeIn(1000);
                                                                         window.setTimeout(function() {
                                                                            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                                                                
                                                                                $(this).remove(); 
                                                                            });
                                                                        }, 3000);
                                                                </script>';
                                                          } else {
                                                            while($obj=$result->fetch_object()){
                                                                $_SESSION["usuario"]=$user;
                                                                $_SESSION["rol"]=$obj->ROLE;
                                                                $rol=$obj->ROLE;
                                                            }
                                                            
                                                            if($rol=="Admin"){
                                                                header("Location: ./ausuarios.php");
                                                            }else{
                                                                header("Location: ./index.php");
                                                            }
                                                          }
                                                       } else {                                                                                                                              
                                                       }
                                                    }else{

                                                    } 
                                                ?>
                                            </div>
                                            <div class="bottom text-center">
                                                New here ? <a href="#"><b>Join Us</b></a>
                                            </div>
                                     </div>
                                </li>
                            </ul>
                        </li>
                      </ul>
                    </div>
                  <!-- Login Ends Here -->
                       
                <?php else: ?>
                      <ul class="nav navbar-nav navbar-right">
                      <?php if ($_SESSION["rol"]=="User") : ?>
                      
                        <li ><a class="navbar-brand" href="#"><span class="glyphicon glyphicon-shopping-cart white"><p style="font-size:14px;position:relative;top:-3px;display:inline"><?php
                                $connection = new mysqli("localhost","root","","phonejapan");
                                if ($connection->connect_errno) {
                                    printf("Connect failed: %s\n", $connection->connect_error);
                                    exit();
                                }
                                $user=$_SESSION["usuario"];
                                $consulta = "SELECT * FROM USUARIO WHERE USERNAME = '".$user."';";

                                if($result = $connection->query($consulta)){
                                    if($result->num_rows==0){

                                    }else{
                                        $cduser="";
                                        while($fila=$result->fetch_object()){
                                            $cduser = $fila->COD_USU;  
                                        }          
                                        $consulta = "SELECT SUM(CANTIDAD) AS TOTAL FROM CESTA WHERE COD_USU = $cduser";
                                        if($result = $connection->query($consulta)){
                                                $total=0;
                                                if($result->num_rows==0){

                                                }else{
                                                    while($fila=$result->fetch_object()){
                                                         $total=$total+$fila->TOTAL;
                                                    }
                                                }
                                                echo "($total)";
                                        }
                                
                                    }
                                }
                            ?></p></span></a></li>
                      <?php else: ?>

                      <?php endif ?>
                
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION["usuario"]; ?><span class="caret"></span></a>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="./ver_perfiluser.php"><span class="glyphicon glyphicon-user"></span>  Ver perfil</a></li>
                              <li><a href="./registro.php?logout=yes" id="logout" name="logout"> <span class="glyphicon glyphicon-off"></span>  Cerrar sesion</a></li>
                          </ul>
                        </li>
                </ul>
                   
                   <?php 
                            if (isset($_GET["logout"])) {  
                                 session_destroy();
                                 header("Location: ./index.php");
                            }
                   ?> 
                   
                <?php endif ?>
            </nav>
            </div>

            <div id="cuerpo_index">
                   <!--FORM USER Y CONTRASEÑA-->
                <div id="cr_conten_index" style="">
                  <div id="main">
                  <div id="gallery">	
                     <?php 
                           $consulta = "SELECT * FROM producto ORDER BY COD_PROD DESC LIMIT 10";  
                           $connection = new mysqli("localhost", "root", "", "phonejapan");

                            if ($connection->connect_errno) {
                                printf("Connection failed: %s\n", $connection->connect_error);
                                exit();
                           }
                           if ($result = $connection->query($consulta)) {
                                if ($result->num_rows==0) {

                                }else{
                                    $carrusel='<div id="slides">';
                                    $menucarrusel='<div id="menu"><ul>';
                                    while($fila=$result->fetch_object()){
                                        $carrusel=$carrusel.'<div class="slide">
                                                                <div style="float:left;width:220px;position:relative;height:356px;margin-left:150px;margin-right:20px;margin-top:20px;" >
                                                                      <img src="'.$fila->IMAGEN.'" style="width:163px;height:350px;"/> 
                                                                      <span style="background-image: url(./imagenes/sticker_precio.png);background-size:100% 100%;width:80px;height:80px;display:block;position:relative;margin-top:-80px;margin-left:30%;"><h4 style="position:relative;top:33px;color:white;font-weight:bold;">'.$fila->PRECIO_UNI.'€</h4></span>
                                                                </div>
                                                                <div style="float:left;width:400px;position:relative;height:356px;margin-right:150px;margin-top:20px;text-align:left">
                                                                   <h1>'.$fila->MARCA.' '.$fila->MODELO.'</h1>
                                                                   <p>El '.$fila->MARCA.' '.$fila->MODELO.' es uno de los ultimos productos que estamos ofertando en PhoneJapan. Si quiere ver sus caracteristicas o consultar mas datos sobre el producto acceda a traves del enlace que aparece justo debajo. Un saludo.<br>
                                                                   </p> 
                                                                </div>
                                                            </div>';  

                                        $menucarrusel=$menucarrusel.'<li class="menuItem"><a href=""><img src="'.$fila->IMAGEN.'" alt="thumbnail" /></a></li>';
                                    }
                                    $carrusel=$carrusel.'</div>';
                                    $menucarrusel=$menucarrusel.'</ul></div>';
                                    echo $carrusel;
                                    echo $menucarrusel;

                                }
                           }
                      ?>
                  </div>    
                </div>
                <div style="width:98%;position:relative;left:1%;background-color:white;overflow:hidden;margin-top:20px;margin-left:1%">
                       <div style="width:99%;height:43px;margin-bottom:10px;background-color:#A9E2F3"></div>
                       <?php
                           $consulta = "SELECT * FROM producto";  
                           $connection = new mysqli("localhost", "root", "", "phonejapan");

                           if ($connection->connect_errno) {
                                printf("Connection failed: %s\n", $connection->connect_error);
                                exit();
                           }
                           if ($result = $connection->query($consulta)) {
                                if ($result->num_rows==0) {

                                }else{
                                    while($fila=$result->fetch_object()){
                                        echo '<div style="width:19%;height:260px;border:solid #A9E2F3 3px;float:left;margin-right:1%;margin-bottom:1%;"><img src="'.$fila->IMAGEN.'" style=" width:45%;height:145px;margin-left:27.5%;margin-top:5%;margin-bottom:2%;" />
                                               <div style="height:15%;width:100%;margin-bottom:2px;">
                                                   <h5 style="color:#086A87;font-weight:bold;text-align:center">'.$fila->MARCA.' '.$fila->MODELO.'</h5>
                                               </div>
                    <div style="height:15%;width:100%;margin-bottom:2px;">
                                                 <center><form action="./ver_detalles_prod.php" method="post">
                                                 <input type="hidden" id="codprod" name="codprod" value="'.$fila->COD_PROD.'">
                                                 <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-shopping-cart white" ></span> '.$fila->PRECIO_UNI.'€</button></form>
                                                 </center>
                                               </div>
                                           </div>';
                                    }
                                }
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