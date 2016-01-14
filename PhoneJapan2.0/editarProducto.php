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
<script type="text/javascript" src="./js/funciones_opiniones.js"></script>
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
        <li class="active"><a href="./aproductos.php">Productos</a></li>
        <li><a href="./apedidos.php">Pedidos</a></li>
        <li><a href="./aproveedores.php">Proveedores</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION["usuario"]; ?><span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="./ver_perfil.php"><span class="glyphicon glyphicon-user"></span>  Ver perfil</a></li>
              <li><a href="./editar_productos.php?logout=yes" id="logout" name="logout"> <span class="glyphicon glyphicon-off"></span>  Cerrar sesion</a></li>
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
             <div id="cr_conten_prod">
              <?php
                if(isset($_POST["codprod"])){
                    include("./php/conexion.php");
                    include("./php/mostrar_form_edit_prod.php");
                }

               ?>
               <?php
                  if(isset($_POST["cant"])){
                        $cant=$_POST["cant"];
                        $prov=$_POST["prov"];
                        $cprod=$_POST["cprod"];
                        include("./php/conexion.php");

                        $consulta = "INSERT INTO SUMINISTRO VALUES(NULL,$cprod,$prov,$cant,CURRENT_TIMESTAMP())";

                        if ($connection->query($consulta)) {
                            $consulta = "UPDATE PRODUCTO SET STOCK=STOCK+$cant WHERE COD_PROD=$cprod";
                            if($connection->query($consulta)){
                                 header("Location: aproductos.php");
                            }
                        }else{

                        }
                  }
                ?>
               <?php

                    if(isset($_POST["cprod"])){
                        include("./php/conexion.php");
                        include("./php/functions.php");
                        include("./php/modificar_producto_caracteristicas.php");
                     }else{

                     }
                ?>

               <div class="panel panel-default widget" style="margin-bottom:10px;">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-comment"></span>
                    <h3 class="panel-title">
                        Recent Comments</h3>
                </div>
                <div class="panel-body">
                    <ul class="list-group" id="lista_opiniones">
                       <?php
                            if(isset($_POST["codprod"])){
                               include("./php/conexion.php");
                                $consulta = "SELECT * FROM OPINION, USUARIO WHERE USUARIO.COD_USU = OPINION.COD_USU AND COD_PROD=".$_POST["codprod"].";";

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
                                                        </div>
                                                        <div class="action">
                                                            <button type="button" onclick="javascript:borrarOpinion('.$obj->COD_OPINION.','.$obj->COD_PROD.');" class="btn btn-danger btn-xs" title="Delete">
                                                                <span class="glyphicon glyphicon-trash"></span>
                                                            </button>
                                                        </div>
                                                    </div>
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
                                   <input id="cdprod" name="cdprod" value="<?php echo $_POST["codprod"]; ?>" type="hidden" required="required">
                                </div>
                            </div>

                            <div class="form-group" style="position:relative;top:10px;">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button class="btn btn-success btn-circle text-uppercase" type="submit" id="submitComment" onclick="javascript:insertarOpinion();" ><span class="glyphicon glyphicon-send"></span> Responder</button>
                                </div>
                            </div>
                    </div>
            </div>
             <?php else: ?>

              <?php endif ?>
  </div>
</div>
</div>

<div class="container nopadding">
  <?php include("./footer.php"); ?>
</div>
</body>
</html>
