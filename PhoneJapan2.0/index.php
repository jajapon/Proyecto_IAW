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
<script src="./js/index.js"></script>
<link rel="stylesheet" href="./css/carrusel.css">
<link rel="stylesheet" href="./css/style_2.css">
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

<nav class="navbar navbar-inverse container" style="border-radius:2px">
 <div class="container-fluid nopadding">
    <div class="navbar-header">
      <a class="active navbar-brand" href="#"><span class="glyphicon glyphicon-home"></span></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <?php if(empty($_SESSION["usuario"]) || $_SESSION["rol"]=="User") : ?>
          <li><a href="#">Productos</a></li>
          <li><a href="#">Sobre nosotros</a></li>
          <li><a href="./contacto.php">Contacto</a></li>
        <?php else: ?>
          <li><a href="./ausuarios.php">Usuarios</a></li>
          <li class="active"><a href="./aproductos.php">Productos</a></li>
          <li><a href="./apedidos.php">Pedidos</a></li>
          <li><a href="./aproveedores.php">Proveedores</a></li>
        <?php endif ?>

      </ul>
      <div class="col-sm-3 col-md-5">
        <form class="navbar-form" role="search">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="bs-prod" id="bs-prod">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit" disabled="disabled"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
        </form>
    </div>
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

               $user = quitarComillas($_POST["username"]);
               $pass = quitarComillas($_POST["password"]);
               $consulta = "SELECT * FROM USUARIO WHERE USERNAME = '$user' AND USERPASS =md5('$pass')";

               if ($result = $connection->query($consulta)) {
                  if ($result->num_rows==0) {
                    echo '<script language="javascript">$("#alert_msg").text("Usuario o contraseña incorrectos");$(".alert").toggleClass("hidden").fadeIn(1000); window.setTimeout(function() {$(".alert").fadeTo(500, 0).slideUp(500, function(){
$(this).remove();});}, 3000);</script>';
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
        <?php else: ?>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION["usuario"]; ?><span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="./ver_perfiluser.php"><span class="glyphicon glyphicon-user"></span>  Ver perfil</a></li>
              <li><a href="./mispedidos.php"><span class="glyphicon glyphicon-user"></span>Mis pedidos</a></li>
              <li><a href="./index.php?logout=yes" id="logout" name="logout"> <span class="glyphicon glyphicon-off"></span>  Cerrar sesion</a></li>
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
          <a href="./cesta.php"><span class="glyphicon glyphicon-shopping-cart"></span>
          <p style="font-size:14px;position:relative;display:inline">
            <?php
                include("./php/conexion.php");
                $user=$_SESSION["usuario"];
                $consulta = "SELECT SUM(CESTA.CANTIDAD) AS TOTAL FROM USUARIO, CESTA WHERE USUARIO.COD_USU = CESTA.COD_USU AND USUARIO.USERNAME = '".$user."';";
                if($result = $connection->query($consulta)){
                      $total=0;
                      if($result->num_rows==0){
                          var_dump($result->num_rows);
                      }else{
                          while($fila=$result->fetch_object()){
                              $total=$total+$fila->TOTAL;
                          }
                      }
                      echo "($total)";
                }else{
                  var_dump($connection->error);
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
<div class="container" style="margin:0px auto; margin-top:-45px;background-color:white">
  <div class="row">
    <div class="col-md-12 nopaddingmargin">
      <div id="main">
      <div id="gallery">
         <?php include("./php/galeria.php"); ?>
      </div>
    </div>
    </div>
</div><br>
<div class="row">
  <div class="container">
  <div class="col-sm-12">
  <div class="prods_index_1">
         <div class="prods_title"><p>PRODUCTOS MAS VENDIDOS</p></div>
         <?php
             $consulta = "SELECT * FROM PRODUCTO P, LINEADEPEDIDO L WHERE P.COD_PROD = L.COD_PROD GROUP BY L.COD_PROD ORDER BY SUM(L.CANTIDAD) DESC LIMIT 5 ;";
             include("./php/conexion.php");
             if ($result = $connection->query($consulta)) {
                  if ($result->num_rows==0) {

                  }else{
                      while($fila=$result->fetch_object()){
                          echo '<div style="width:19%;height:300px;border:solid #A9E2F3 3px;float:left;margin-right:1%;margin-bottom:1%;"><img src="'.$fila->IMAGEN.'" style=" width:45%;height:175px;margin-left:27.5%;margin-top:5%;margin-bottom:2%;" />
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

          <div class="prods_index_2">
                 <div class="prods_title"><p>ÚLTIMOS PRODUCTOS</p></div>
                 <?php
                     $consulta = "SELECT * FROM PRODUCTO ORDER BY COD_PROD DESC LIMIT 5 ;";
                     include("./php/conexion.php");
                     if ($result = $connection->query($consulta)) {
                          if ($result->num_rows==0) {

                          }else{
                              while($fila=$result->fetch_object()){
                                  echo '<div style="width:19%;height:300px;border:solid #A9E2F3 3px;float:left;margin-right:1%;margin-bottom:1%;"><img src="'.$fila->IMAGEN.'" style=" width:45%;height:175px;margin-left:27.5%;margin-top:5%;margin-bottom:2%;" />
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

                  <div class="prods_index_3">
                         <div class="prods_title"><p>CATÁLOGO DE PRODUCTOS</p></div>
                         <?php
                             $consulta = "SELECT * FROM PRODUCTO;";
                             include("./php/conexion.php");
                             if ($result = $connection->query($consulta)) {
                                  if ($result->num_rows==0) {

                                  }else{
                                      while($fila=$result->fetch_object()){
                                          echo '<div style="width:19%;height:300px;border:solid #A9E2F3 3px;float:left;margin-right:1%;margin-bottom:1%;"><img src="'.$fila->IMAGEN.'" style=" width:45%;height:175px;margin-left:27.5%;margin-top:5%;margin-bottom:2%;" /><div style="height:15%;width:100%;margin-bottom:2px;"><h5 style="color:#086A87;font-weight:bold;text-align:center">'.$fila->MARCA.' '.$fila->MODELO.'</h5></div><div style="height:15%;width:100%;margin-bottom:2px;"><center><form action="./ver_detalles_prod.php" method="post"><input type="hidden" id="codprod" name="codprod" value="'.$fila->COD_PROD.'"><button type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-shopping-cart white"></span> '.$fila->PRECIO_UNI.'€</button></form></center></div></div>';
                                      }
                                  }
                             }
                          ?>
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
