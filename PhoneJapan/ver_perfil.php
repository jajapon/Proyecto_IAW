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
<script type="text/javascript" src="./js/funciones_usuario.js"></script>
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
        <li><a href="./aproveedores.php">Proveedores</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown active">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION["usuario"]; ?><span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="./ver_perfil.php"><span class="glyphicon glyphicon-user"></span>  Ver perfil</a></li>
              <li><a href="./ver_perfil.php?logout=yes" id="logout" name="logout"> <span class="glyphicon glyphicon-off"></span>  Cerrar sesion</a></li>
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
    <div id="cuerpo_perfil">

             <div id="cr_conten_perfil">
                <div id="cr_conten_form_perfil" style="">
                <form class="form-horizontal" role="form" method="post">
                    <fieldset>
                    <legend><span class="glyphicon glyphicon-user"></span>  Datos personales: <?php echo $_SESSION["usuario"]; ?></legend>
                    <?php
                    $user = $_SESSION["usuario"];
                    $consulta = "SELECT * FROM USUARIO WHERE USERNAME = '$user';";
                    $connection = new mysqli("localhost", "root", "", "phonejapan");
                                                  //TESTING IF THE CONNECTION WAS RIGHT
                    if ($connection->connect_errno) {
                             printf("Connection failed: %s\n", $connection->connect_error);
                             exit();
                    }
                    if ($result = $connection->query($consulta)) {
                        if ($result->num_rows==0) {

                        }else{
                         while($obj=$result->fetch_object()){
                            echo '<div style="float:left;width:50%">
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="nom">Nombre:</label>
                              <div class="col-md-6">
                              <input id="nom" name="nom" type="text" value="'.$obj->NOMBRE.'" placeholder="Introduzca su nombre" class="form-control input-md" required="required">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="ape">Apellidos:</label>
                              <div class="col-md-6">
                              <input id="ape" name="ape" type="text" value="'.$obj->APELLIDOS.'" placeholder="Introduzca sus apellidos" class="form-control input-md" required="required">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="fnac">F. Nacimiento:</label>
                              <div class="col-md-6">
                              <input id="fnac" name="fnac" type="date" value="'.$obj->FECHA_NAC.'" placeholder="Introduzca su f. de Nacimiento" class="form-control input-md" required="required">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="dni">NIF/DNI:</label>
                              <div class="col-md-6">
                              <input id="dni" name="dni" value="'.$obj->DNI.'" type="text" placeholder="Introduzca su NIF" class="form-control input-md" required="">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="dir">Direccion:</label>
                              <div class="col-md-6">
                              <input id="dir" name="dir" value="'.$obj->DIRECCION.'" type="text" placeholder="Introduzca su dirección" class="form-control input-md" required="">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="correo">Email:</label>
                              <div class="col-md-6">
                              <input id="correo" name="correo" value="'.$obj->EMAIL.'" type="email" placeholder="Introduzca su correo" class="form-control input-md" required="">
                              </div>
                            </div>
                            </div>

                            <div style="float:right;width:50%">
                            <!-- Text input-->
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="pais">Pais:</label>
                              <div class="col-md-6">
                              <input id="pais" name="pais" value="'.$obj->PAIS.'" type="text" placeholder="Introduzca su Nacionalidad" class="form-control input-md" required="required">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="prov">Provincia:</label>
                              <div class="col-md-6">
                              <input id="prov" name="prov" type="text" value="'.$obj->PROVINCIA.'" placeholder="Introduzca su Provincia" class="form-control input-md" required="required">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="ciudad">Ciudad:</label>
                              <div class="col-md-6">
                              <input id="ciudad" name="ciudad" value="'.$obj->CIUDAD.'" type="text" placeholder="Introduzca sus ciudad" class="form-control input-md" required="required">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="cp">Código Postal:</label>
                              <div class="col-md-6">
                              <input id="cp" name="cp" type="number" value="'.$obj->CP.'" maxlength="5" placeholder="Introduzca su CP" class="form-control input-md" required="">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="tlf">Teléfono:</label>
                              <div class="col-md-6">
                              <input id="tlf" name="tlf" type="number" value="'.$obj->TLF.'" maxlength="9" placeholder="Introduzca su tlf" class="form-control input-md" required="">
                              </div>
                            </div>
                            <div class="form-group">
                                     <input type="submit" class="btn btn-primary btn-block" style="width:140px;float:right;margin-right:19%" value="Modificar">
                            </div>
                            </div>

                            </fieldset>';
                          }
                        }

                    }
                    ?>

                    <?php
                    if(isset($_POST["nom"])){
                        include("./php/conexion.php");
                        include("./php/functions.php");

                        $user= $_SESSION["usuario"];
                        $nom=$_POST["nom"];
                        $ape=$_POST["ape"];
                        $fnac=$_POST["fnac"];
                        $dni=$_POST["dni"];
                        $dir=$_POST["dir"];
                        $correo=$_POST["correo"];
                        $pais=$_POST["pais"];
                        $prov=$_POST["prov"];
                        $ciudad=$_POST["ciudad"];
                        $cp=$_POST["cp"];
                        $tlf=$_POST["tlf"];
                        $consulta = "UPDATE USUARIO SET EMAIL = '".$correo."', NOMBRE = '".$nom."', APELLIDOS=  '".$ape."', DNI = '".$dni."', FECHA_NAC = '".$fnac."', DIRECCION = '".$dir."', CP = ".$cp.", CIUDAD = '".$ciudad."', PROVINCIA  = '".$prov."', PAIS = '".$pais."', TLF = ".$tlf." WHERE USERNAME = '".$user."';";

                        if ($result = $connection->query($consulta)) {
                            header("Location: ./ausuarios.php");
                        } else{

                        }
                    }else{
                    }
                    ?>
                </form>
               </div>

               <!--CAMBIO CONTRASEÑA-->
                <div id="cr_conten_form_perfil" style="">
                <form style="margin-top:35px;" method="post" role="form" class="form-horizontal" >
                    <fieldset>

                    <!-- Form Name -->
                    <legend ><span class="glyphicon glyphicon-edit"></span> Cambiar Contraseña</legend>
                    <div style="float:left;width:50%">
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="oldpass">Contraseña:</label>
                          <div class="col-md-6">
                          <input id="oldpass" name="oldpass" type="password" placeholder="Antigua contraseña" class="form-control input-md" required="required">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="npass">N. Contraseña:</label>
                          <div class="col-md-6">
                          <input id="npass" name="npass" type="password" placeholder="Nueva contraseña" class="form-control input-md" required="required">
                          </div>
                        </div>

                    </div>

                    <div style="float:right;width:50%">
                        <div class="form-group" style="margin-left:-94px;" >
                          <label class="col-md-3 control-label" style="width:200px;position:relative;float: left;" for="rnpass">Repite Contraseña:</label>
                          <div class="col-md-6">
                          <input id="rnpass" name="rnpass" type="password" placeholder="Repita contraseña" class="form-control input-md" required="required">
                          </div>
                        </div>
                        <div class="form-group">
                             <input type="submit" class="btn btn-primary btn-block" style="width:140px;float:right;margin-right:24%" value="Modificar">
                        </div>
                    </div>
                    </div>

                    </fieldset>
                </form>
                <?php
                    if(isset($_POST["oldpass"])){
                        include("./php/conexion.php");
                        include("./php/functions.php");
                        $user=$_SESSION["usuario"];
                        $p1=quitarComillas($_POST["oldpass"]);
                        $p2=quitarComillas($_POST["npass"]);
                        $p3=quitarComillas($_POST["rnpass"]);

                        if($p3==$p2){
                            $consulta = "SELECT * FROM USUARIO WHERE USERNAME = '$user' AND USERPASS=md5('$p1');";
                            if ($result = $connection->query($consulta)) {
                                if ($result->num_rows==0) {

                                }else{
                                    $consulta = "UPDATE USUARIO SET USERPASS = md5('$p2') WHERE USERNAME='$user'";
                                    if ($connection->query($consulta)) {
                                           header("Location: ./ausuarios.php");
                                    }
                                }
                            }

                        }else{

                        }
                    }
                    ?>
               </div>

               <!--Baja de Usuario-->
               <div id="cr_conten_form_perfil" style="">
                <form  class="form-horizontal" method="post" style="margin-top:-10px;" >
                    <fieldset>

                    <!-- Form Name -->
                    <legend ><span class="glyphicon glyphicon-remove-sign"></span>  Darse de baja</legend>

                        <div class="form-group">
                             <p style="margin:0px 20px;">Si desea darse de baja de la pagina web de PhoneJapan pulse en el boton que se muestra debajo. Esperamos que su estancia en la web haya sido satisfactoria y deseamos que regrese pronto.</p>
                             <center><input type="submit" name="baja" class="btn btn-primary btn-block" style="width:200px;margin-top:20px" value="Darse de baja"></center>
                        </div>
                    </div>

                    </fieldset>
                </form>

                <?php
                    if(isset($_POST["baja"])){
                            $user=$_SESSION["usuario"];
                            $consulta = "SELECT * FROM USUARIO WHERE USERNAME = '$user';";
                            include("./php/conexion.php");
                            if ($connection->connect_errno) {
                                printf("Connection failed: %s\n", $connection->connect_error);
                                exit();
                            }
                            if ($result = $connection->query($consulta)) {
                                if ($result->num_rows==0) {

                                }else{
                                    $consulta = "UPDATE USUARIO SET ESTADO = 'OFF' WHERE USERNAME='$user'";
                                    if ($connection->query($consulta)) {
                                           session_destroy();
                                           header("Location: ./index.php");

                                    }
                                }
                            }
                    }else{

                    }

                ?>
               </div>
    </div>
</div>

<div class="container nopadding">
  <?php include("./footer.php"); ?>
</div>
</body>
</html>
