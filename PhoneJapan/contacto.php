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
<?php include("./head.php"); ?>
<script src="./js/carrusel.js"></script>
<link rel="stylesheet" href="./css/carrusel.css">
<link rel="stylesheet" href="./css/style_2.css">
<link rel="stylesheet" href="./css/style.css">
</head>
<body>

<div class="jumbotron container banner">
  <div class="container text-center">
     <div class="alert alert-danger hidden" style="width:80%;margin: 0 auto;position:relative;top:-20px;height:60px;" role="alert">
       <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       <strong id="alert_msg">Success! You have been signed in successfully! </strong>
     </div>
  </div>
</div>

<nav class="navbar navbar-inverse container nopadding" style="margin-bottom:5px;border-radius:2px">
  <div>
    <div class="navbar-header">
      <a class="navbar-brand" href="./index.php"><span class="glyphicon glyphicon-home" ></span></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <?php if(empty($_SESSION["usuario"]) || $_SESSION["rol"]=="User") : ?>
        <li><a href="./busqueda_productos.php">Productos</a></li>
        <li class="active"><a href="./contacto.php">Contacto</a></li>
        <?php endif ?>

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php if (empty($_SESSION["usuario"])) : ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
            <ul id="login-dp" class="dropdown-menu">
                <li>
                     <div class="row container" style="width:290px">
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
                            </div>
                            <div class="bottom text-center">
                                New here ? <a href="./registro.php"><b>Join Us</b></a>
                            </div>
                     </div>
                </li>
            </ul>
        </li>
        <?php
            if (isset($_POST["username"])) {
               $rol ="";
               include("./php/conexion.php");
               include("./php/functions.php");

               $user = $_POST["username"];
               $pass = $_POST["password"];
               $consulta = "SELECT * FROM USUARIO WHERE USERNAME = '$user' AND USERPASS =md5('$pass')";

               if ($result = $connection->query($consulta)) {
                  if ($result->num_rows==0) {
                        echo '<script language="javascript">$("#alert_msg").text("Usuario o contraseña incorrectos");$(".alert").toggleClass("hidden").fadeIn(1000); window.setTimeout(function() {$(".alert").fadeTo(500, 0).slideUp(500, function(){
$(this).remove();});}, 3000);</script>';
                  } else {
                    $activo = "";
                    $rol="";
                    while($obj=$result->fetch_object()){
                        $rol=$obj->ROLE;
                        $activo=$obj->ESTADO;
                    }
                    if($activo=="ON"){
                      $_SESSION["usuario"]=$user;
                      $_SESSION["rol"]=$rol;
                      if($rol=="Admin"){
                          header("Location: ./ausuarios.php");
                      }else{
                          header("Location: ./contacto.php");
                      }
                    }else{
                      echo '<script language="javascript">$("#alert_msg").text("El usuario esta dado de baja, solo un admin puede volverle a activar");$(".alert").toggleClass("hidden").fadeIn(1000); window.setTimeout(function() {$(".alert").fadeTo(500, 0).slideUp(500, function(){
  $(this).remove();});}, 3000);</script>';
                    }
                  }
               } else {
               }
            }else{
            }
        ?>
        <?php else: ?>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION["usuario"]; ?><span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="./ver_perfiluser.php"><span class="glyphicon glyphicon-user"></span>  Ver perfil</a></li>
              <li><a href="./mispedidos.php"><span class="glyphicon glyphicon-user"></span>Mis pedidos</a></li>
              <li><a href="./contacto.php?logout=yes" id="logout" name="logout"> <span class="glyphicon glyphicon-off"></span>  Cerrar sesion</a></li>
              <?php
              if (isset($_GET["logout"])) {
                session_destroy();
                header("Location: ./contacto.php");
              }
              ?>
            </ul>
          </li>
             <?php if ($_SESSION["rol"]=="User") : ?>
        <li>
          <a href="cesta.php"><span class="glyphicon glyphicon-shopping-cart"></span>
          <p style="font-size:14px;position:relative;display:inline">
            <?php
                include("./php/conexion.php");
                $user=$_SESSION["usuario"];
                $consulta = "SELECT SUM(CESTA.CANTIDAD) AS TOTAL FROM USUARIO, CESTA WHERE USUARIO.COD_USU = CESTA.COD_USU AND USUARIO.USERNAME = '".$user."';";
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
            ?>
          </p>
        </a>
      </li>
            <?php endif ?>
        <?php endif ?>
      </ul>
    </div>
  </div>
</nav>
  <div class="row">
    <div class="container" style="background-color:white;">
    <div id="cuerpo_email">
         <div id="cr_conten_form_email" style="">
               <form style="position:relative;top:20px;width:100%;" method="post">
               <fieldset>
               <legend style="margin-bottom:40px;"><span class="glyphicon glyphicon-envelope"></span>  Contacto</legend>
                    <div class="row" style="margin:0 auto">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name"> Nombre y Apellidos:</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Introduce tu nombre" required="required" />
                            </div>
                            <div class="form-group ">
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

                }
            ?>

          </div>
    </div>

</div>
</div>
<div class="container nopadding">
  <?php include("./footer.php"); ?>
</div>
</body>
</html>
