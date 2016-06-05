<?php
    ob_start();
?>
<?php
    session_start();
    if(!empty($_SESSION["rol"])){
      $tema = $_SESSION["tema"];
      if($_SESSION["rol"]=="Admin"){
            header("Location: ausuarios.php");
      }
    }else{
      $_SESSION["tema"]=1;
      $tema = $_SESSION["tema"];
    }
?>
<!DOCTYPE html>
<html lang="en">
<?php include("./head.php"); ?>
<script src="./js/carrusel.js"></script>
<script src="./js/index.js"></script>
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

<?php
  if(isset($_SESSION["rol"])){
    if($_SESSION["tema"]==1){
      echo '<nav class="navbar navbar-inverse container nopadding" style="margin-bottom:5px;border-radius:2px">';
    }elseif($_SESSION["tema"]==2){
      echo '<nav class="navbar navbar-default container nopadding" style="margin-bottom:5px;border-radius:2px">';
    }elseif($_SESSION["tema"]==3){
      echo '<nav class="navbar navbar-default container nopadding" style="margin-bottom:5px;border-radius:2px">';
    }
  }else{
    echo '<nav class="navbar navbar-inverse container nopadding" style="margin-bottom:5px;border-radius:2px">';
  }
?>

  <div>
    <div class="navbar-header">
      <a class="navbar-brand" href="./index.php"><span class="glyphicon glyphicon-home" ></span></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <?php if(empty($_SESSION["usuario"]) || $_SESSION["rol"]=="User") : ?>
        <li class="active"><a href="./busqueda_productos.php">Productos</a></li>
        <li><a href="./contacto.php">Contacto</a></li>
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
                    $tema="";
                    while($obj=$result->fetch_object()){
                        $rol=$obj->ROLE;
                        $activo=$obj->ESTADO;
                        $tema=$obj->THEME;
                    }
                    if($activo=="ON"){
                      $_SESSION["usuario"]=$user;
                      $_SESSION["rol"]=$rol;
                      $_SESSION["tema"]=$tema;
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
              <li><a href="./busqueda_productos.php?logout=yes" id="logout" name="logout"> <span class="glyphicon glyphicon-off"></span>  Cerrar sesion</a></li>
              <?php
              if (isset($_GET["logout"])) {
                session_destroy();
                header("Location: ./busqueda_productos.php");
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
         <div class="row" style="margin-top:2%;">
             <div class="col-md-offset-1 col-md-2 ">
               <div class="input-group custom-search-form col-md-12">
                  <select class="form-control" id="orden">
                    <option value="0">Ordenar por</option>
                    <option value="1">Stock: menor a mayor</option>
                    <option value="2">Stock: mayor a menor </option>
                    <option value="3">Precio: menor a mayor</option>
                    <option value="4">Precio: mayor a menor</option>
                    <option value="5">Marca: A a la Z</option>
                    <option value="6">Marca: Z a la A</option>
                  </select>
               </div>
              </div>

              <div class=" col-md-5">
                <div class="input-group custom-search-form">
                  <div class="col-md-5">
                        <input type="number" value="0" id="min" placeholder="Min €" class="form-control" style="float:left">
                  </div>
                  <div class="col-md-1">
                        <span style="position:relative;top:7px;">a:</span>
                  </div>
                   <div class="col-md-5">
                     <input type="number" value="0" id="max" placeholder="Max €" class="form-control">
                   </div>
                </div>
               </div>

              <div class="col-md-3">
                <div class="input-group custom-search-form">
                  <input type="text" class="form-control" id="prod" placeholder="Introduce el producto">
                  <span class="input-group-btn">
                  <button class="btn btn-default" type="button" id="search">
                  <span class="glyphicon glyphicon-search"></span>
                  </button>
                  </span>
                </div>
               </div>
         </div>

         <div class="row">
           <div class="col-md-offset-1 col-md-10 nopadding">
             <div class="prods_index_4">
                    <div class="prods_title colort"><p>CATÁLOGO DE PRODUCTOS</p></div>
                    <?php
                        $consulta = "SELECT * FROM PRODUCTO ;";
                        include("./php/conexion.php");
                        if ($result = $connection->query($consulta)) {
                             if ($result->num_rows==0) {

                             }else{
                                 while($fila=$result->fetch_object()){
                                     echo '<div id="divprods"><img src="'.$fila->IMAGEN.'" style=" width:45%;height:60%;margin-left:27.5%;margin-top:5%;margin-bottom:2%;" />
                                            <div style="height:15%;width:100%;margin-bottom:2px;">
                                                <h5 style="color:#086A87;font-weight:bold;text-align:center">'.$fila->MARCA.' '.$fila->MODELO.'</h5>
                                            </div>
                 <div style="height:15%;width:100%;margin-bottom:2px;">
                                              <center>
                                              <a style="text-decoration:none;color:white" href="./ver_detalles_prod.php?codprod='.$fila->COD_PROD.'" class="btn btn-success"><span style="color:white" class="glyphicon glyphicon-shopping-cart white" ></span> '.$fila->PRECIO_UNI.'€</a>
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
    </div>

</div>
</div>
<div class="container nopadding">
  <?php include("./footer.php"); ?>
</div>
</body>
</html>
