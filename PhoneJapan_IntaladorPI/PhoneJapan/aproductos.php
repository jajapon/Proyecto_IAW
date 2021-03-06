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
<script type="text/javascript" src="./js/funciones_productos.js"></script>
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
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav">
        <li><a href="./ausuarios.php">Usuarios</a></li>
        <li class="active"><a href="#">Productos</a></li>
        <li><a href="./apedidos.php">Pedidos</a></li>
        <li><a href="./aproveedores.php">Proveedores</a></li>
        <li><a href="./aestadisticas.php">Estadísticas</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION["usuario"]; ?><span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="./ver_perfil.php"><span class="glyphicon glyphicon-user"></span>  Ver perfil</a></li>
              <li><a href="./aproductos.php?logout=yes" id="logout" name="logout"> <span class="glyphicon glyphicon-off"></span>  Cerrar sesion</a></li>
          </ul>
        </li>
      </ul>
    </div>

   <?php
            if (isset($_GET["logout"])) {
                 session_destroy();
                 header("Location: ./index.php");
            }
   ?>
</nav>

<div class="container" style="margin:0px auto;background-color:white;margin-top:5px;">
  <div class="row">
    <div id="cr_conten_p">
  <div id="cr_conten_sitio">
    <p class="titles">Productos PhoneJapan</p>

    <a href="./anadir_producto.php" style="float:right;margin:4.5px;font-weight:bold;border-radius:2.5px;" class="btn btn-success btn-sm">
       Añadir</a>
    <input type="text" placeholder="Busqueda de un producto" class="form-control" style="height:30px" id="bs-prod" />
    <select id="bs-prod-2" class="form-control btn-sm" style="float:right;width:120px;height:30px;margin:4.5px">
      <option value="0" selected>Ordenar por</option>
      <option value="1">Stock: menor a mayor</option>
      <option value="2">Stock: mayor a menor</option>
      <option value="3">Precio: menor a mayor</option>
      <option value="4">Precio: mayor a menor</option>
      <option value="5">Marca: menor a mayor</option>
      <option value="6">Marca: mayor a menor</option>
    </select>
    <a href="./productospdf.php" style="float:right;margin-top:5px;height:30px" class="btn btn-danger"><span class="glyphicon glyphicon-file"></span> Exportar PDF </a>

  </div>
  <div id="agrega_tabla_prods"></div>
  <center>
  <div class="pag_prods">
    <ul class="pagination" id="agrega_lista_prods"></ul>
  </div>
</center>
</div>

  </div>
</div>

<div class="container nopadding">
  <?php include("./footer.php"); ?>
</div>
</body>
</html>
