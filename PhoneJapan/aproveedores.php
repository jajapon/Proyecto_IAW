<?php
    session_start();
    if(empty($_SESSION["rol"])){
        header("Location: ./index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/style_buttons.css">
    <link href="css/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="js/js-image-slider.js" type="text/javascript"></script>
    <link href="css/tooltip.css" rel="stylesheet" type="text/css" />
    <script src="js/tooltip.js" type="text/javascript"></script>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script type="text/javascript" src="./js/funciones_proveedores.js"></script>
    <script type="text/javascript">
      
        imageSlider.thumbnailPreview(function (thumbIndex) { return "<img src='imagenes/thumb" + (thumbIndex + 1) + ".jpg' style='width:100px;height:60px;' />"; });
    </script>
</head>
<body>
       <div id="wrapper">
        <div id="header">
               <div id="cabecera">    
               </div>
               <nav id="nav" class="navbar-default navbar-inverse" role="navigation">
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                     
                      <ul class="nav navbar-nav">
                        <li><a href="./ausuarios.php">Usuarios</a></li>
                        <li><a href="./aproductos.php">Productos</a></li>
                        <li><a href="#">Pedidos</a></li>
                        <li class="active"><a href="#">Proveedores</a></li>     
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
        </div>
            <div id="cuerpo_registro">
                <div id="wrapper">
                     <div>

                     </div>
                     <div id="cr_conten">
                         <div id="agrega_tabla_user"></div>
                         <center><ul class="pagination" id="agrega_lista_user"></ul></center>                     
                     </div>
                </div>
            </div>
            <div id="footer">

            </div>
        </div>
</body>
</html>