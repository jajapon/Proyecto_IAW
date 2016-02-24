<?php
    ob_start();
?>
<?php
    session_start();
    if(!empty($_SESSION["rol"])){
      if($_SESSION["rol"]=="Admin"){
           header("Location: ausuarios.php");
      }else{
           header("./index.php");
      }
    }
?>
<!DOCTYPE html>
<html lang="en">
<?php include("./head.php"); ?>
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
        <li><a href="./busqueda_productos">Productos</a></li>
        <li><a href="./contacto.php">Contacto</a></li>
        <?php else: ?>
        <li><a href="./ausuarios.php">Usuarios</a></li>
        <li class="active"><a href="./aproductos.php">Productos</a></li>
        <li><a href="./apedidos.php">Pedidos</a></li>
        <li><a href="./aproveedores.php">Proveedores</a></li>
        <?php endif ?>

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php if (empty($_SESSION["usuario"])) : ?>
        <li class="dropdown active">
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
                                New here ? <a href="#"><b>Join Us</b></a>
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
                    while($obj=$result->fetch_object()){
                        $rol=$obj->ROLE;
                        $activo=$obj->ESTADO;
                    }
                    if($activo=="ON"){
                      $_SESSION["usuario"]=$user;
                      $_SESSION["rol"]=$obj->ROLE;
                      if($rol=="Admin"){
                         header("Location: ./ausuarios.php");
                      }else{
                         header("Location: ./index.php");
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
              <li><a href="./registro.php?logout=yes" id="logout" name="logout"> <span class="glyphicon glyphicon-off"></span>  Cerrar sesion</a></li>
              <?php
              if (isset($_GET["logout"])) {
                session_destroy();
                header("Location: ./index.php");
              }
              ?>
            </ul>
          </li>
             <?php if ($_SESSION["rol"]=="User") : ?>
        <li>
          <a href="#"><span class="glyphicon glyphicon-shopping-cart"></span>
          <p style="font-size:14px;position:relative;display:inline">
            <?php
                include("./php/conexion.php");
                $user=$_SESSION["usuario"];
                $consulta = "SELECT * FROM USUARIO, CESTA WHERE USUARIO.COD_USU = CESTA.COD_USU AND USUARIO.USERNAME = '".$user."';";
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
  <div class="container nopadding">
    <div id="cuerpo_registro_web">
           <!--FORM USER Y CONTRASEÑA-->
                <div id="cr_conten_form_perfil" style="">
                <form style="position:relative;top:20px;margin-bottom:35px;" method="post" role="form" class="form-horizontal" >
                    <fieldset>

                    <!-- Form Name -->
                    <legend ><span class="glyphicon glyphicon-edit"></span> Alta en PhoneJapan:</legend>
                    <div style="float:left;width:50%">
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="usern">Usuario:</label>
                          <div class="col-md-6">
                          <input id="usern" name="usern" type="text" placeholder="Nombre de usuario" class="form-control input-md" required="required">
                          </div>
                        </div>
                    </div>

                    <div style="float:right;width:50%">
                        <div class="form-group" >
                          <label class="col-md-4 control-label" for="npass">Contraseña:</label>
                          <div class="col-md-6">
                          <input id="npass" name="npass" type="password" placeholder="Introduzca su contraseña" class="form-control input-md" required="required">
                          </div>
                        </div>
                    </div>
                    </div>
                    </fieldset>

            <!--CONTENIDO FORM REGISTRO-->
              <div id="cr_conten_perfil">
                <div id="cr_conten_form_perfil" class="form-horizontal" style="">
                    <fieldset>
                    <legend><span class="glyphicon glyphicon-user"></span>  Datos personales: </legend>
                    <div style="float:left;width:50%">
                            <!-- Text input-->
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="nom">Nombre:</label>
                              <div class="col-md-6">
                                <input id="nom" name="nom" type="text"  placeholder="Introduzca su nombre" class="form-control input-md" required="required">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="ape">Apellidos:</label>
                              <div class="col-md-6">
                                <input id="ape" name="ape" type="text" placeholder="Introduzca sus apellidos" class="form-control input-md" required="required">
                              </div>
                            </div>
                            </div>

                            <div style="float:right;width:50%">
                              <div class="form-group">
                                <label class="col-md-4 control-label" for="fnac">F. Nacimiento:</label>
                                <div class="col-md-6">
                                  <input id="fnac" name="fnac" type="date" placeholder="Introduzca su f. de Nacimiento" class="form-control input-md" required="required">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-md-4 control-label" for="correo">Email:</label>
                                <div class="col-md-6">
                                  <input id="correo" name="correo"  type="email" placeholder="Introduzca su correo" class="form-control input-md" required="required">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col-md-7" style="float:right;margin-right:70px;">
                                   <input type="checkbox" name="validar" value="1" required="required"/>   Acepto los terminos y condiciones de uso
                                </div>
                              </div>
                              <div class="form-group">
                                       <input type="submit" class="btn btn-primary btn-block" style="width:140px;float:right;margin-right:94px" value="Registrarse">
                              </div>
                            </div>

                        </fieldset>
                </form>
               </div>

                <?php
                    if(isset($_POST["usern"])){
                        include("./php/conexion.php");
                        include("./php/functions.php");

                        $user=quitarComillas($_POST["usern"]);
                        $pass=quitarComillas($_POST["npass"]);
                        $nom=quitarComillas($_POST["nom"]);
                        $ape=quitarComillas($_POST["ape"]);
                        $fnac=quitarComillas($_POST["fnac"]);
                        $correo=quitarComillas($_POST["correo"]);

                        $consulta="SELECT * FROM USUARIO WHERE USERNAME ='$user' OR EMAIL='$correo'";
                        if ($result = $connection->query($consulta)) {
                          if ($result->num_rows==0) {

                              $consulta = "INSERT INTO USUARIO (COD_USU,USERNAME,USERPASS,ROLE,ESTADO,EMAIL,NOMBRE,APELLIDOS,FECHA_NAC)
                                VALUES (NULL,'$user', md5('$pass') ,'User' ,'ON','$correo','$nom','$ape','$fnac');";
                              if ($connection->query($consulta)) {
                                  header("Location: ./index.php");
                              }else{
                                  var_dump($connection->error);
                              }
                          }else{
                              echo '<script language="javascript"> $("#alert_msg").text("Ya existe un usuario con ese correo o nombre de usuario");$(".alert").toggleClass("hidden").fadeIn(1000);window.setTimeout(function() {$(".alert").fadeTo(500, 0).slideUp(500, function(){
                                           $(this).remove();});}, 3000);
                                        </script>';
                                }
                            }

                        }else{

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
