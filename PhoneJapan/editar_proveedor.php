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
<script type="text/javascript" src="./js/funciones_proveedores.js"></script>
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
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav">
        <li><a href="./ausuarios.php">Usuarios</a></li>
        <li><a href="./aproductos.php">Productos</a></li>
        <li><a href="./apedidos.php">Pedidos</a></li>
        <li class="active"><a href="./aproveedores.php">Proveedores</a></li>
        <li><a href="./aestadisticas.php">Estadísticas</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION["usuario"]; ?><span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="./ver_perfil.php"><span class="glyphicon glyphicon-user"></span>  Ver perfil</a></li>
              <li><a href="./anadir_proveedor.php?logout=yes" id="logout" name="logout"> <span class="glyphicon glyphicon-off"></span>  Cerrar sesion</a></li>
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
           <!--FORM USER Y CONTRASEÑA-->
                <div id="cr_prov" style="">
                <form style="position:relative;top:20px;margin-bottom:35px;" method="post" role="form" class="form-horizontal" >
                    <fieldset>
                    <?php
                      if(isset($_POST["codprov"])){
                        include("./php/conexion.php");
                        $consulta = "SELECT * FROM PROVEEDOR WHERE COD_PROV = ".$_POST["codprov"].";";

                        if ($result = $connection->query($consulta)) {
                            if ($result->num_rows==0) {

                            }else{
                                while($fila=$result->fetch_object()){
                    echo '<legend><span class="glyphicon glyphicon-edit"></span> Alta de Proveedor en PhoneJapan:</legend>
                    <div style="float:left;width:50%">
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="nom">Nombre:</label>
                          <div class="col-md-6">
                          <input id="nom" name="nom" type="text" value="'.$fila->NOMBRE.'" placeholder="Nombre del proveedor" class="form-control input-md" required="required">
                          <input id="codprov" name="codprov" type="hidden" value="'.$fila->COD_PROV.'" class="form-control input-md" required="required">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="ciudad">Ciudad:</label>
                          <div class="col-md-6">
                          <input id="ciudad" name="ciudad" type="text" value="'.$fila->CIUDAD.'" placeholder="Introduce la ciudad" class="form-control input-md" required="required">
                          </div>
                        </div>
                    </div>

                    <div style="float:right;width:50%">
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="dir">Dirección:</label>
                          <div class="col-md-6">
                          <input id="dir" name="dir" type="text" placeholder="Introduce la dirección" value="'.$fila->DIRECCION.'" class="form-control input-md" required="required">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="cp">CP:</label>
                          <div class="col-md-6">
                          <input id="cp" name="cp" type="number" min="0" max="99999"  placeholder="Código Postal" class="form-control input-md" value="'.$fila->CP.'" required="required">
                          </div>
                        </div>
                        <div class="form-group">
                          <button type="submit" style="float:right;position:relative;right:92px" class="btn btn-success">Modificar datos</button>
                        </div>
                    </div>';
                                }
                            }
                        }
                      }else{


                      }

                    ?>
                    </fieldset>
                </form>
               </div>
            </div>

                <?php
                    if(isset($_POST["nom"])){

                        $nom=$_POST["nom"];
                        $ciu=$_POST["ciudad"];
                        $dir=$_POST["dir"];
                        $cp=$_POST["cp"];
                        $codprov=$_POST["codprov"];

                        include("./php/conexion.php");
                            $consulta = "SELECT * FROM PROVEEDOR WHERE NOMBRE = '$nom';";

                            if ($result = $connection->query($consulta)) {
                                if ($result->num_rows==0) {
                                }else{
                                    $consulta="UPDATE PROVEEDOR SET NOMBRE='$nom', CIUDAD='$ciu',DIRECCION='$dir',CP=$cp WHERE COD_PROV = $codprov";                       if ($connection->query($consulta)) {
                                        header("Location: ./aproveedores.php");
                                    }else{

                                    }
                                }
                            }

                        }else{

                        }

                    ?>
  </div>
</div>

<div class="container nopadding">
  <?php include("./footer.php"); ?>
</div>
</body>
</html>
