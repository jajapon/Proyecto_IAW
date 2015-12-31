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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
 <script src="./js/login.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

</head>
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
                        <li class="active"><a href="#">Contacto</a></li>
                        >
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
                                                                header("Location: ausuarios.php");
                                                            }else{
                                                                header("Location: contacto.php");
                                                            }
                                                          }
                                                       } else {                                                                                                                              
                                                       }
                                                    }else{

                                                    } 
                                                ?>
                                            </div>
                                            <div class="bottom text-center">
                                                New here ? <a href="./registro.php"><b>Join Us</b></a>
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
                      
                        <li ><a class="navbar-brand" href="#"><span class="glyphicon glyphicon-shopping-cart white"><p style="font-size:14px;position:relative;top:-3px;display:inline">(0)</p></span></a></li>
                      <?php else: ?>

                      <?php endif ?>
                
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION["usuario"]; ?><span class="caret"></span></a>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="./ver_perfil.php"><span class="glyphicon glyphicon-user"></span>  Ver perfil</a></li>
                              <li><a href="./registro.php?logout=yes" id="logout" name="logout"> <span class="glyphicon glyphicon-off"></span>  Cerrar sesion</a></li>
                          </ul>
                        </li>
                </ul>
                   
                   <?php 
                            if (isset($_GET["logout"])) {  
                                 session_destroy();
                                 header("Location: contacto.php");
                            }
                   ?> 
                   
                <?php endif ?>
                  </nav>
             </div>
             
             
            <div id="cuerpo_email">
                 <div id="cr_conten_form_email" style="">
                       <form style="position:relative;top:20px;" method="post">
                       <fieldset>
                       <legend style="margin-bottom:40px;"><span class="glyphicon glyphicon-envelope"></span>  Contacto</legend>
                            <div class="row" style="width:95%;margin:0 auto">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name"> Nombre y Apellidos:</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Introduce tu nombre" required="required" />
                                    </div>
                                    <div class="form-group">
                                        <label for="mailfrom"> Email:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                            </span>
                                            <input type="email" class="form-control" id="mailfrom" name="mailfrom" placeholder="Introduce el email" required="required" />  
                                         </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="subject">
                                            Asunto</label>
                                        <select id="subject" name="subject" class="form-control" required="required">
                                            <option value="na" selected="">Choose One:</option>
                                            <option value="service">General Customer Service</option>
                                            <option value="suggestions">Suggestions</option>
                                            <option value="product">Product Support</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Mensaje</label>
                                        <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                                            placeholder="Introduce el mensaje"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success pull-right" style="width:130px" id="btnContactUs" disabled>Enviar</button>
                                </div>
                            </div>
                      </fieldset>
                    </form>
                      <?php
                        if (isset($_POST["name"])) {
                            include("./php/class.smtp.php");
                            include("./php/class.phpmailer.php");
                           
                            $name = $_POST['name'];
                            $email = $_POST['mailfrom'];
                            $message = $_POST['message'];
                            $from = $_POST['mailfrom'];
                            $to = 'juan.antonio.japon@gmail.com'; 
                            $subject = 'Message from Contact Demo ';
                            
                            $body ="From: $name\n E-Mail: $email \n Message:\n $message";
                            $mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch

                            $mail->IsSMTP(); // telling the class to use SMTP
                            
                            function SendMail( $ToEmail, $MessageHTML, $MessageTEXT ) {
                              $Mail = new PHPMailer();
                              $Mail->IsSMTP(); // Use SMTP
                              $Mail->Host        = "smtp.gmail.com"; // Sets SMTP server
                              $Mail->SMTPDebug   = 2; // 2 to enable SMTP debug information
                              $Mail->SMTPAuth    = TRUE; // enable SMTP authentication
                              $Mail->SMTPSecure  = "tls"; //Secure conection
                              $Mail->Port        = 587; // set the SMTP port
                              $Mail->Username    = 'juan.antonio.japon@gmail.com'; // SMTP account username
                              $Mail->Password    = 'juangol2'; // SMTP account password
                              $Mail->Priority    = 1; // Highest priority - Email priority (1 = High, 3 = Normal, 5 = low)
                              $Mail->CharSet     = 'UTF-8';
                              $Mail->Encoding    = '8bit';
                              $Mail->Subject     = 'Test Email Using Gmail';
                              $Mail->ContentType = 'text/html; charset=utf-8\r\n';
                              $Mail->From        = 'juan.antonio.japon@gmail.com';
                              $Mail->FromName    = 'GMail Test';
                              $Mail->WordWrap    = 900; // RFC 2822 Compliant for Max 998 characters per line

                              $Mail->AddAddress( $ToEmail ); // To:
                              $Mail->isHTML( TRUE );
                              $Mail->Body    = $MessageHTML;
                              $Mail->AltBody = $MessageTEXT;
                              $Mail->Send();
                              $Mail->SmtpClose();

                              if ( $Mail->IsError() ) { // ADDED - This error checking was missing
                                return FALSE;
                              }
                              else {
                                return TRUE;
                              }
}

                                $ToEmail = 'juan.antonio.japon@gmail.com';
                                $MessageHTML = '<p>sakaskjal<p>';
                                $MessageTEXT = '<p>sakaskjal<p>';
                                $ToName  = 'Name';

                                $Send = SendMail( $ToEmail, $MessageHTML, $MessageTEXT );
                                if ( $Send ) {
                                    echo '<script language="javascript">
                                            alert("perfectooo");
                                       </script>';
                                }
                                else {
                                  echo "<h2> ERROR</h2>";
                                }
                                die;
                             
                             /*if (mail("juan.antonio.japon@gmail.com", "Comprobación Email", "Si lees el mensaje, terminaste correctamente la configuración")) {
                                 echo '<script language="javascript">
                                            $("#alert_msg").text("Email enviado correctamente");
                                            $(".alert").toggleClass("hidden").fadeIn(1000);
                                            window.setTimeout(function() {
                                                      $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                                            $(this).remove(); 
                                                      });
                                            }, 3000);
                                       </script>';
                                    //$result='<div class="alert alert-success">Thank You! I will be in touch</div>';
                            } else {
                                    //$result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later.</div>';
                            }*/
                        }
                    ?>
                        
                  </div>

            </div>

                        
                       <!--ACABA AQUI-->
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