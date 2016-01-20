<?php
    ob_start();
?>
<?php
    session_start();
    if(!empty($_SESSION["rol"])){
      if($_SESSION["rol"]=="Admin"){
            header("Location: ausuarios.php");
      }
    }else{
      header("Location: ./index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<?php include("./head.php"); ?>
<script src="./js/funciones_pedidos.js"></script>
<script src="./js/funciones_cesta.js"></script>
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
        <li><a href="./contacto.php">Contacto</a></li>
        <?php endif ?>

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php if (!empty($_SESSION["usuario"])) : ?>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION["usuario"]; ?><span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="./ver_perfiluser.php"><span class="glyphicon glyphicon-user"></span>  Ver perfil</a></li>
              <li><a href="./mispedidos.php"><span class="glyphicon glyphicon-user"></span>Mis pedidos</a></li>
              <li><a href="./cesta.php?logout=yes" id="logout" name="logout"> <span class="glyphicon glyphicon-off"></span>  Cerrar sesion</a></li>
              <?php
              if (isset($_GET["logout"])) {
                session_destroy();
                header("Location: ./index.php");
              }
              ?>
            </ul>
          </li>
             <?php if ($_SESSION["rol"]=="User") : ?>
        <li class="active">
          <a href="./cesta.php"><span class="glyphicon glyphicon-shopping-cart"></span>
          <p id="numcesta" style="font-size:14px;position:relative;display:inline">
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
      <div id="cuerpo_cesta">
               <div id="cr_conten_cesta">
                     <div style="width:90%;height:30px;background-color:lightblue;margin:0 auto;margin-bottom:10px;margin-top:30px;"><h4 class="titles">MI CESTA</h4>
                     </div>
                      <table id="micestat" class="table-bordered" style="width:90%;margin:0 auto;margin-bottom:10px;text-align:center" >
                      <?php
                          include("./php/cesta_usuario_logeado.php")
                      ?>
                      </table>
                      <form method="post">
                          <input type="submit" class="btn btn-success" style="margin-right:5%;float:right;margin-bottom:3%;" name="rpedido" id="rpedido" value="realizar pedido"/>
                      </form>
                      <?php
                        if(isset($_POST["rpedido"])){
                          include("./php/realizar_pedido.php");
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
