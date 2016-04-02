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
        <li class="active"><a href="./ausuarios.php">Usuarios</a></li>
        <li><a href="./aproductos.php">Productos</a></li>
        <li><a href="./apedidos.php">Pedidos</a></li>
        <li><a href="./aproveedores.php">Proveedores</a></li>
        <li><a href="./aestadisticas.php">Estadísticas</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION["usuario"]; ?><span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="./ver_perfil.php"><span class="glyphicon glyphicon-user"></span>  Ver perfil</a></li>
              <li><a href="./editar_usuario.php?logout=yes" id="logout" name="logout"> <span class="glyphicon glyphicon-off"></span>  Cerrar sesion</a></li>
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
    <div id="cuerpo_registro_web">
           <!--FORM USER Y CONTRASEÑA-->
                <div id="cr_conten_form_perfil" style="">

                <form style="position:relative;top:20px;margin-bottom:35px;" method="post" role="form" class="form-horizontal" >

                    <fieldset>

                    <!-- Form Name -->
                    <legend ><span class="glyphicon glyphicon-edit"></span> Alta en PhoneJapan:</legend>
                    <div style="float:left;width:50%">
                       <?php
                        if(isset($_POST["coduser"])){
                          include("./php/conexion.php");
                          $consulta = "SELECT * FROM USUARIO WHERE COD_USU = ".$_POST["coduser"].";";
                          include("./php/amostrar_form_editar_user.php");
                         }
                      ?>
                </form>
               </div>

                <?php

                    if(isset($_POST["nom"])){
                        include("./php/conexion.php");
                        include("./php/functions.php");

                        $cduser=$_POST["coduser"];
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
                        $estado=$_POST["estado"];
                        $tipo=$_POST["tipo"];
                        $consulta = "SELECT * FROM USUARIO WHERE COD_USU =".$cduser.";";

                        if ($result = $connection->query($consulta)) {
                          if ($result->num_rows!=0) {
                              $consulta = "UPDATE USUARIO SET ROLE='$tipo',ESTADO='$estado',EMAIL='$correo' ,NOMBRE='$nom',APELLIDOS='$ape',DNI='$dni',FECHA_NAC='$fnac',DIRECCION='$dir',CP=$cp,CIUDAD='$ciudad',PROVINCIA='$prov', PAIS='$pais',TLF=$tlf WHERE COD_USU=$cduser;";
                              echo '<script language="javascript">
                                       alert("'.$consulta.'");
                             </script>';
                              //UPDATE USUARIO SET ROLE='$tipo',ESTADO='$estado',EMAIL='$dorreo' ,NOMBRE='$nom',APELLIDOS='$aper',DNI='$dni',FECHA_NAC='$fnac',DIRECCION='$dir',CP=$cp,CIUDAD='$ciudad',PROVINCIA='$prov', PAIS='$pais',TLF=$tlf WHERE COD_USU=$cduser;

                              if ($connection->query($consulta)) {
                                   header("Location: ausuarios.php");
                              }else{

                              }
                          }else{
                              echo '<script language="javascript">
                                       $("#alert_msg").text("Ya existe un usuario con ese correo o nombre de usuario");
                                           $(".alert").toggleClass("hidden").fadeIn(1000);
                                           window.setTimeout(function() {
                                               $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                                   $(this).remove();
                                                });
                                           }, 3000);
                                        </script>';
                          }
                        }

                    }else{

                    }

                ?>
               </div>
               <!--ACABA AQUI-->
    </div>
  </div>
</div>
<div class="container nopadding">
  <?php include("./footer.php"); ?>
</div>
</body>
</html>
