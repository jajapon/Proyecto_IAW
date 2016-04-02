<?php
    ob_start();
?>
<?php
    session_start();
    if(!empty($_SESSION["rol"])){
        $tema = $_SESSION["tema"];
        if($_SESSION["rol"]=="User"){
            header("Location: ./index.php");
        }
    }else{
      $_SESSION["tema"]=1;
      $tema = $_SESSION["tema"];
      header("Location: ./index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<?php include("./head.php"); ?>
<link rel="stylesheet" href="./css/style_2.css">
<link rel="stylesheet" href="./css/style.css">
<link rel="stylesheet" href="./css/style_buttons.css">
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="./prodsxmarca.js"></script>
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
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav">
        <li><a href="./ausuarios.php">Usuarios</a></li>
        <li><a href="./aproductos.php">Productos</a></li>
        <li><a href="./apedidos.php">Pedidos</a></li>
        <li><a href="./aproveedores.php">Proveedores</a></li>
        <li class="active"><a href="./aestadisticas.php">Estadísticas</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION["usuario"]; ?><span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="./ver_perfil.php"><span class="glyphicon glyphicon-user"></span>  Ver perfil</a></li>
              <li><a href="./aproveedores.php?logout=yes" id="logout" name="logout"> <span class="glyphicon glyphicon-off"></span>  Cerrar sesion</a></li>
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
    <div id="cuerpo_prov">
        <div id="cr_prov">
          <form class="form-horizontal" role="form" method="post">
              <fieldset>
                <legend><span class="glyphicon glyphicon-user"></span> CANTIDAD PRODUCTOS POR MARCA</legend>
                <?php
                  include("./php/prodsxmarcagrafica.php");
                 ?>
              </fieldset>

              <fieldset>
                <legend><span class="glyphicon glyphicon-user"></span> ESTADISTICAS GENERALES</legend>
                <?php
                  include("./php/estadisticasglobalesgrafica.php");
                 ?>
              </fieldset>

              <fieldset>
                <legend><span class="glyphicon glyphicon-user"></span> PRODUCTOS MAS VENDIDOS</legend>
                <?php
                  include("./php/productosmascompradosgrafica.php");
                 ?>
              </fieldset>
          </form>
        </div>
    </div>
  </div>
</div>

<div class="container nopadding">
  <?php include("./footer.php"); ?>
</div>
</body>
</html>
