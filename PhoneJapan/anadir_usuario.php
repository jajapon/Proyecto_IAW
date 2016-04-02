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
              <li><a href="./anadir_usuario.php?logout=yes" id="logout" name="logout"> <span class="glyphicon glyphicon-off"></span>  Cerrar sesion</a></li>
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
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="usern">Usuario:</label>
                          <div class="col-md-6">
                          <input id="usern" name="usern" type="text" placeholder="Nombre de usuario" class="form-control input-md" required="required">
                          </div>
                        </div>
                    </div>

                    <div style="float:right;width:50%">
                        <div class="form-group" >
                          <label class="col-md-4 control-label" for="npass">Contraseña:</label>
                          <div class="col-md-6">
                          <input id="npass" name="npass" type="password" placeholder="Introduzca su contraseña" class="form-control input-md" required="required">
                          </div>
                        </div>
                    </div>
                    </div>
                    </fieldset>

            <!--CONTENIDO FORM REGISTRO-->
              <div id="cr_conten_perfil">
                <div id="cr_conten_form_perfil" class="form-horizontal" style="">
                    <fieldset>
                    <legend><span class="glyphicon glyphicon-user"></span>  Datos personales: </legend>
                    <div style="float:left;width:50%">
                            <!-- Text input-->
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="nom">Nombre:</label>
                              <div class="col-md-6">
                              <input id="nom" name="nom" type="text"  placeholder="Introduzca su nombre" class="form-control input-md" required="required">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="ape">Apellidos:</label>
                              <div class="col-md-6">
                              <input id="ape" name="ape" type="text" placeholder="Introduzca sus apellidos" class="form-control input-md" required="required">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="fnac">F. Nacimiento:</label>
                              <div class="col-md-6">
                              <input id="fnac" name="fnac" type="date" placeholder="Introduzca su f. de Nacimiento" class="form-control input-md" required="required">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="dni">NIF/DNI:</label>
                              <div class="col-md-6">
                              <input id="dni" name="dni"  type="text" placeholder="Introduzca su NIF" class="form-control input-md" required="required">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="dir">Direccion:</label>
                              <div class="col-md-6">
                              <input id="dir" name="dir" type="text" placeholder="Introduzca su dirección" class="form-control input-md" required="required">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="correo">Email:</label>
                              <div class="col-md-6">
                              <input id="correo" name="correo"  type="email" placeholder="Introduzca su correo" class="form-control input-md" required="required">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="estado">Estado:</label>
                              <div class="col-md-6">
                                  <select class="form-control" id="estado" name="estado">
                                    <option value="ON">Activo</option>
                                    <option value="OFF">Inactivo</option>
                                  </select>
                              </div>
                            </div>
                            </div>

                            <div style="float:right;width:50%">
                            <!-- Text input-->
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="pais">Pais:</label>
                              <div class="col-md-6">
                              <input id="pais" name="pais"  type="text" placeholder="Introduzca su Nacionalidad" class="form-control input-md" required="required">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="prov">Provincia:</label>
                              <div class="col-md-6">
                              <input id="prov" name="prov" type="text" placeholder="Introduzca su Provincia" class="form-control input-md" required="required">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="ciudad">Ciudad:</label>
                              <div class="col-md-6">
                              <input id="ciudad" name="ciudad" type="text" placeholder="Introduzca sus ciudad" class="form-control input-md" required="required">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="cp">Código Postal:</label>
                              <div class="col-md-6">
                              <input id="cp" name="cp" type="number" maxlength="5" placeholder="Introduzca su CP" class="form-control input-md" required="required">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="tlf">Teléfono:</label>
                              <div class="col-md-6">
                              <input id="tlf" name="tlf" type="number" maxlength="9" placeholder="Introduzca su tlf" class="form-control input-md" required="required">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="tipo">Tipo:</label>
                              <div class="col-md-6">
                                  <select class="form-control" id="tipo" name="tipo">
                                    <option value="User">Cliente</option>
                                    <option value="Admin">Administrador</option>
                                  </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-md-7" style="float:right;margin-right:14%;">
                                 <input type="checkbox" name="validar" value="1" required="required"/>   Acepto los terminos y condiciones de uso
                              </div>
                            </div>
                            <div class="form-group">
                                     <input type="submit" class="btn btn-primary btn-block" style="width:140px;float:right;margin-right:19%" value="Añadir usuario">
                            </div>
                            </div>

                        </fieldset>
                </form>
               </div>

                <?php
                    if(isset($_POST["usern"])){
                        include("./php/conexion.php");
                        include("./php/functions.php");
                        include("./php/aanadir_user.php");
                    }else{

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
