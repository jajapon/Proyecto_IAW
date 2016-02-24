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
    /*if(isset($_POST["codprod"])){
      setcookie("codprod", $_POST["codprod"], time() + (86400 * 30), "/"); // 86400 = 1 day
    }*/
?>
<!DOCTYPE html>
<html lang="en">
<?php include("./head.php"); ?>
<script src="./js/funciones_opiniones.js"></script>
<script src="./js/funciones_cesta.js"></script>
<link rel="stylesheet" href="./css/style_2.css">
<link rel="stylesheet" href="./css/style.css">
<style media="screen">
  .formato1{
    font-family: 'c';
  }
  .formato2{
    font-family: 'd';
  }
  .formato3{
    font-family: 'e';
  }
</style>
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
                                 <form class="form" role="form" method="post" action="./ver_detalles_prod.php" id="login-nav">
                                        <div class="form-group">
                                             <label class="sr-only" for="username">Email address</label>
                                             <input type="text" class="form-control" name="username" id="username" placeholder="Email address or username" required>
                                             <input type="hidden" name="codprod" id="codprod" value="<?php echo $_GET["codprod"]; ?>" />
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
                          header("Location: ./ver_detalles_prod.php?codprod=".$_POST['codprod']." ");
                      }
                    }else{
                      echo '<script language="javascript">$("#alert_msg").text("El usuario esta dado de baja, solo un admin puede volverle a activar");$(".alert").toggleClass("hidden").fadeIn(1000); window.setTimeout(function() {$(".alert").fadeTo(500, 0).slideUp(500, function(){
  $(this).remove();});}, 3000);</script>';-
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
              <li><a href="./ver_detalles_prod.php?logout=yes" id="logout" name="logout"> <span class="glyphicon glyphicon-off"></span>  Cerrar sesion</a></li>
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
          <a href="cesta.php"><span class="glyphicon glyphicon-shopping-cart"></span>
          <p id="ncesta" name="ncesta" style="font-size:14px;position:relative;display:inline">
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
      <div id="cuerpo_editprod">
               <div id="cr_conten_prod">
                <div class="row" style="margin-bottom:50px">
                <?php
                  if(isset($_GET["codprod"])){
                      include("./php/conexion.php");
                      $consulta = "SELECT * FROM PRODUCTO,CARACTERISTICAS WHERE PRODUCTO.COD_PROD = CARACTERISTICAS.COD_PROD  AND PRODUCTO.COD_PROD=".$_GET["codprod"].";";

                      if ($result = $connection->query($consulta)) {
                             if ($result->num_rows==0) {
                                header("Location: ./index.php");
                             } else {
                               while($obj=$result->fetch_object()){
                                  echo '<div style="background-color:white;margin-bottom:50px;">
                                    <div class="col-md-12">
                                      <div class="col-md-12" style="height:25%;margin-bottom:20px;margin-top:10px">
                                            <h4 class="formato1" style="text-transform: uppercase;float:left;padding-left:5%;margin-top:40px;font-size:23px;color:gray;text-shadow:0px 1px 0px #000;">'.$obj->MARCA.'</h4><h1 class="formato3" style="color:#2E9AFE;text-shadow:0px 1px 0px #000;text-transform: uppercase;float:left;font-size:44px;margin-left:5px" >'.$obj->MODELO.'</h1>
                                      </div>
                                      <div class="col-md-3" style="height:50%">
                                           <div class="col-md-12" >
                                             <img src="'.$obj->IMAGEN.'" style="width:85%;margin-left:1%;height:320px"alt="" />
                                           </div>
                                      </div>
                                      <div class="col-md-6" style="border-right:solid gray 1px;border-left:solid gray 1px;height:50%">
                                            <h3 class="formato1" style=";font-weight:normal;color:gray;margin-top:8px">CARACTERISTICAS:</h3>
                                            <table class="col-md-12 table-striped  formato2" style="font-weight:normal;font-size:14px;width:100%">
                                              <tr>
                                                <td style="text-align:left;padding:5px 5px;width:50%">Pantalla: </td>
                                                <td>'.$obj->PANTALLA.'</td>
                                              </tr>
                                              <tr>
                                                <td style="text-align:left;padding:5px 5px;">Resolución: </td>
                                                <td>'.$obj->RESOLUCION.'</td>
                                              </tr>
                                              <tr>
                                                <td style="text-align:left;padding:5px 5px;">Memoria RAM: </td>
                                                <td>'.$obj->RAM.'</td>
                                              </tr>
                                              <tr>
                                                <td style="text-align:left;padding:5px 5px;">Memoria Interna: </td>
                                                <td>'.$obj->MINTERNA.'</td>
                                              </tr>
                                              <tr>
                                                <td style="text-align:left;padding:5px 5px;">Procesador: </td>
                                                <td>'.$obj->PROCESADOR.'</td>
                                              </tr>
                                              <tr>
                                                <td style="text-align:left;padding:5px 5px;">Sistema Operativo: </td>
                                                <td>'.$obj->SO.'</td>
                                              </tr>
                                              <tr>
                                                <td style="text-align:left;padding:5px 5px;">Camara frontal: </td>
                                                <td>'.$obj->FRONTAL.'</td>
                                              </tr>
                                              <tr>
                                                <td style="text-align:left;padding:5px 5px;">Camara trasera: </td>
                                                <td>'.$obj->TRASERA.'
                                                </td>
                                              </tr>
                                              <tr>
                                                <td style="text-align:left;padding:5px 5px;">Tipo de SIM: </td>
                                                <td>'.$obj->SIM.'</td>
                                              </tr>
                                            </table>
                                      </div>
                                      <div class="col-md-3">
                                        <h3 class="formato1" style="font-weight:normal;color:gray;margin-top:8px;text-align:center">REALIZAR COMPRA:</h3>
                                        <div style="background-color:#F2F2F2;padding-bottom:10px;overflow:hidden;">
                                          <div class="col-md-12">
                                                <h4 class="formato1" style=" padding:10px 40px;background-color:gray; text-align:center;color:white;font-size:40px;font-weight:normal;">'.$obj->PRECIO_UNI.'€</h4>
                                          </div>
                                          <div class="col-md-12">
                                            <input id="cprod" name="cprod" type="hidden" required="required">';
                                            if(isset($_SESSION["usuario"]) && ($obj->STOCK)>0){
                                              echo '<input type="button" id="addcar" name="addcar" value="ANADIR AL CARRITO" onclick="javascript:insertarProductoCesta('.$obj->COD_PROD.');" class="btn btn-success col-md-12 formato1" style="width:100%;height:60px;border-radius:0px;color:white;font-size:20px" />';
                                            }else{
                                              echo '<input type="button" id="addcar" name="addcar" value="ANADIR AL CARRITO" onclick="javascript:insertarProductoCesta('.$obj->COD_PROD.');" class="btn btn-success col-md-12 formato1" style="width:100%;height:60px;border-radius:0px;color:white;font-size:20px" disabled="disabled"/>';
                                            }
                                            echo '</div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                     ';
                                 }
                              }
                      }else {
                        header("Location: ./index.php");
                      }
                  }else{
                    //header("Location: ./index.php");
                  }

                 ?>
               </div>
                 <?php

                      if(isset($_POST["cprod"])){
                          $codprod=$_POST["cprod"];
                          $consulta = "SELECT * FROM PRODUCTO WHERE COD_PROD=".$codprod.";";

                          include("./php/conexion.php");
                          if ($result = $connection->query($consulta)) {
                              if ($result->num_rows==0) {

                              }else{

                                  /*$consulta = "UPDATE PRODUCTO SET STOCK=(STOCK-1) WHERE COD_PROD=".$codprod.";";

                                  if ($connection->query($consulta)) {
                                      header("Location: aproductos.php");
                                  }else{

                                  }*/
                              }
                          }else{

                          }
                       }else{

                       }
                  ?>

                  <div class="col-md-12">
                    <div class="panel panel-default widget" style="margin-bottom:40px;">
                          <div class="panel-heading">
                              <span class="glyphicon glyphicon-comment"></span>
                              <h3 class="panel-title">
                                  Recent Comments</h3>
                          </div>
                          <div class="panel-body">
                              <ul class="list-group" id="lista_opiniones">
                                 <?php
                                      if(isset($_GET["codprod"])){
                                          include("./php/conexion.php");
                                          $consulta = "SELECT * FROM OPINION, USUARIO WHERE USUARIO.COD_USU = OPINION.COD_USU AND COD_PROD=".$_GET["codprod"]." ORDER BY COD_OPINION ASC;";

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
                                                                  </div>';



                                                      if(isset($_SESSION["rol"])){
                                                          if($_SESSION["rol"]=="Admin"){
                                                              echo '<div class="action">
                                                                      <button type="button" onclick="javascript:borrarOpinion('.$obj->COD_OPINION.','.$obj->COD_PROD.');" class="btn btn-danger btn-xs" title="Delete">
                                                                          <span class="glyphicon glyphicon-trash"></span>
                                                                      </button>
                                                                  </div>';
                                                          }else{
                                                              if($_SESSION["usuario"]==$obj->USERNAME){
                                                                   echo '<div class="action">
                                                                      <button type="button" onclick="javascript:borrarOpinion('.$obj->COD_OPINION.','.$obj->COD_PROD.');" class="btn btn-danger btn-xs" title="Delete">
                                                                          <span class="glyphicon glyphicon-trash"></span>
                                                                      </button>
                                                                  </div>';
                                                              }else{

                                                              }
                                                          }
                                                      }else{

                                                      }
                                                       echo '</div>
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
                                             <input id="cdprod" name="cdprod" value="<?php echo $_GET["codprod"]; ?>" type="hidden" required="required">
                                          </div>
                                      </div>

                                      <div class="form-group" style="position:relative;top:10px;">
                                          <div class="col-sm-offset-2 col-sm-10">
                                              <button class="btn btn-success btn-circle text-uppercase" type="submit" id="submitComment" onclick="javascript:insertarOpinion();" ><span class="glyphicon glyphicon-send"></span> Responder</button>
                                          </div>
                                      </div>
                              </div>
                      </div>
                    <?php endif ?>
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
