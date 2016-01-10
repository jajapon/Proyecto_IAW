<?php
    ob_start();
?>
<?php
    session_start();
    if(!empty($_SESSION["rol"])){
        if($_SESSION["rol"]=="User"){
            header("Location: ./index.php");
        }
    }else{
      header("Location: ./index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<?php include("./head.php"); ?>
<script type="text/javascript" src="./js/funciones_pedidos.js"></script>
<link rel="stylesheet" href="./css/style_2.css">
<link rel="stylesheet" href="./css/style.css">
<link rel="stylesheet" href="./css/style_buttons.css">
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

<nav id="nav" class="navbar-default navbar-inverse container nopadding" role="navigation">
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse container-fluid" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav">
        <li><a href="./ausuarios.php">Usuarios</a></li>
        <li><a href="./aproductos.php">Productos</a></li>
        <li class="active"><a href="./apedidos.php">Pedidos</a></li>
        <li><a href="./aproveedores.php">Proveedores</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION["usuario"]; ?><span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="./ver_perfil.php"><span class="glyphicon glyphicon-user"></span>  Ver perfil</a></li>
              <li><a href="./apedidos.php?logout=yes" id="logout" name="logout"> <span class="glyphicon glyphicon-off"></span>  Cerrar sesion</a></li>
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

<div class="container" style="margin:0px auto;background-color:white;margin-top:5px;">
  <div class="row">
    <div id="cuerpo_cesta">
             <div id="cr_conten_cesta">
                   <div style="width:90%;height:30px;background-color:lightblue;margin:0 auto;margin-bottom:10px;margin-top:30px;"><h4 style="color:white;font-weight:bold;padding-top:7px;margin-left:2%;text-shadow:0px 1px 0px #000">MIS PEDIDOS</h4>
                   </div>
                    <table class="table-bordered" style="width:90%;margin:0 auto;margin-bottom:10px;text-align:center" >
                        <tr >
                            <th style="padding:5px;text-align:center">Usuario</th>
                            <th style="padding:5px;text-align:center">Importe</th>
                            <th style="padding:5px;text-align:center">Fecha del Pedido</th>
                            <th style="padding:5px;text-align:center">Operaciones</th>
                        </tr>
                        <?php include("./php/listar_pedidos.php"); ?>
                    </table>
             </div>
             <div id="mispedidos">

            </div>
    </div>
  </div>
</div>
<div class="container nopadding">
  <?php include("./footer.php"); ?>
</div>
</body>
</html>
