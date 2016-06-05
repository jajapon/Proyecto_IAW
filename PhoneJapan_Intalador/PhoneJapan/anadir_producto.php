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
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav">
        <li><a href="./ausuarios.php">Usuarios</a></li>
        <li class="active"><a href="./aproductos.php">Productos</a></li>
        <li><a href="./apedidos.php">Pedidos</a></li>
        <li><a href="./aproveedores.php">Proveedores</a></li>
        <li><a href="./aestadisticas.php">Estadísticas</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION["usuario"]; ?><span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="./ver_perfil.php"><span class="glyphicon glyphicon-user"></span>  Ver perfil</a></li>
              <li><a href="./anadir_producto.php?logout=yes" id="logout" name="logout"> <span class="glyphicon glyphicon-off"></span>  Cerrar sesion</a></li>
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
    <div id="cuerpo_addprod">
             <div id="cr_conten_prod">
               <form style="position:relative;margin-bottom:35px;" enctype="multipart/form-data" method="post" role="form" class="form-horizontal" >
                    <fieldset>

                    <!-- Form Name -->
                    <legend ><span class="glyphicon glyphicon-edit"></span> Añadir Producto</legend>

               <div id="izq">
                   <img src="./imagenes/productos/default.png" id="imagen_movil"/>
               </div>
               <div id="der">
                   <table style="margin-top:10px">
                       <tr>
                           <td><label class="col-md-4 control-label" for="marca">Marca:</label></td>
                           <td><input id="marca" name="marca" type="text" placeholder="Introduzca la marca" class="form-control input-md" required="required"></td>
                       </tr>
                       <tr>
                           <td><label class="col-md-4 control-label" for="modelo">Modelo:</label></td>
                           <td><input id="modelo" name="modelo" type="text" placeholder="Introduzca el modelo" class="form-control input-md" required="required"></td>
                       </tr>
                       <tr>
                           <td><label class="col-md-4 control-label" for="precio">Precio:</label></td>
                           <td><input id="npass" name="precio" min=1 type="number" placeholder="Introduzca el precio" class="form-control input-md" required="required"></td>
                       </tr>
                       <tr>
                           <td><label class="col-md-4 control-label" for="stock">Stock:</label></td>
                           <td><input id="stock" name="stock" type="number" placeholder="Introduzca la cantidad" class="form-control input-md" min=1 required="required"></td>
                       </tr>
                       <tr>
                           <td><label class="col-md-4 control-label" for="prov">Proveedor:</label></td>
                           <td>
                            <?php
                                 echo '<select class="form-control col-md-4" id="prov" name="prov">';
                                include("./php/conexion.php");
                                if ($result = $connection->query($consulta)) {
                                    if ($result->num_rows==0) {
                                    }else{
                                        while($fila=$result->fetch_object()){
                                          echo '<option value="'.$fila->COD_PROV.'">'.$fila->NOMBRE.'</option>' ;
                                        }
                                    }
                                }
                                 echo '</select>';
                               ?>
                           </td>
                       </tr>
                       <tr>
                           <td><label class="col-md-4 control-label" for="files">Imagen:</label></td>
                           <td>
                             <input type="file" name="imagen" id="imagen" />
                              <input id="urlimg" name="urlimg" type="hidden" required="required">
                           </td>
                                 <script language="javascript">
                                     function readURL(input) {
                                         if (input.files && input.files[0]) {
                                             var reader = new FileReader();

                                             reader.onload = function (e) {
                                                 $('#imagen_movil').attr('src', e.target.result);
                                             }
                                             reader.readAsDataURL(input.files[0]);
                                         }
                                     }

                                     $("#imagen").change(function(){
                                         readURL(this);
                                     });
                                 </script>
                       </tr>
                   </table>
               </div>
                </fieldset>

                <fieldset style="margin-top:-60px">
                  <legend><span class="glyphicon glyphicon-edit"></span> Características</legend>
                  <div class="row">
                    <div class="col-md-4">
                      <table style="width:100%;height:260px">
                        <tr>
                            <td><label class="col-md-4 control-label" for="pan">Pantalla:</label></td>
                            <td><input id="pan" name="pan" type="text" placeholder="Introduzca la pantalla" class="form-control input-md" required="required"></td>
                        </tr>
                        <tr>
                            <td><label class="col-md-4 control-label" for="res">Resolución:</label></td>
                            <td><input id="res" name="res" type="text" placeholder="Introduzca la resolución" class="form-control input-md" required="required"></td>
                        </tr>
                        <tr>
                            <td><label class="col-md-4 control-label" for="ram">Memoria RAM:</label></td>
                            <td><input id="ram" name="ram" type="text" placeholder="Introduzca la RAM" class="form-control input-md"  required="required"></td>
                        </tr>
                        <tr>
                            <td><label class="col-md-4 control-label" for="int">Memoria Interna:</label></td>
                            <td><input id="int" name="int" type="text" placeholder="Introduzca la Interna" class="form-control input-md" required="required"></td>
                        </tr>
                        <tr>
                            <td><label class="col-md-4 control-label" for="pro">Procesador:</label></td>
                            <td><input id="pro" name="pro" type="text" placeholder="Introduzca el procesador" class="form-control input-md" required="required"></td>
                        </tr>
                      </table>
                    </div>
                    <div class="col-sm-offset-1 col-md-5">
                      <table style="width:100%;height:260px">
                        <tr>
                            <td><label class="col-md-4 control-label" for="so">Sistema Operativo:</label></td>
                            <td><input id="stock" name="so" type="so" placeholder="Introduzca el SO" class="form-control input-md" required="required"></td>
                        </tr>
                        <tr>
                            <td><label class="col-md-4 control-label" for="fro">Cámara Frontal:</label></td>
                            <td><input id="fro" name="fro" type="text" placeholder="Introduzca la cámara frontal" class="form-control input-md" required="required"></td>
                        </tr>
                        <tr>
                            <td><label class="col-md-4 control-label" for="tra">Cámara Trasera:</label></td>
                            <td><input id="tra" name="tra" type="text" placeholder="Introduzca la cámara trasera" class="form-control input-md" required="required"></td>
                        </tr>
                        <tr>
                            <td><label class="col-md-4 control-label" for="sim">Tipo SIM:</label></td>
                            <td><input id="sim" name="sim" type="text" placeholder="Introduzca el tipo de SIM" class="form-control input-md" required="required"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" value="Añadir" class="btn btn-success col-md-2" style="width:100px;" /></td>
                        </tr>
                      </table>
                    </div>
                </div>
                </fieldset>
               </form>
               <?php
                    if(isset($_POST["marca"])){
                      include("./php/functions.php");
                      include("./php/conexion.php");
                      include("./php/insertar_prod_car_sum.php");
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
