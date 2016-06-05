<?php
    ob_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="./css/footer-distributed-with-address-and-phones.css">
      <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
      <link rel="apple-touch-icon" sizes="57x57" href="./imagenes/apple-icon-57x57.png">
      <link rel="apple-touch-icon" sizes="60x60" href="./imagenes/apple-icon-60x60.png">
      <link rel="apple-touch-icon" sizes="72x72" href="./imagenes/apple-icon-72x72.png">
      <link rel="apple-touch-icon" sizes="76x76" href="./imagenes/apple-icon-76x76.png">
      <link rel="apple-touch-icon" sizes="114x114" href="./imagenes/apple-icon-114x114.png">
      <link rel="apple-touch-icon" sizes="120x120" href="./imagenes/apple-icon-120x120.png">
      <link rel="apple-touch-icon" sizes="144x144" href="./imagenes/apple-icon-144x144.png">
      <link rel="apple-touch-icon" sizes="152x152" href="./imagenes/apple-icon-152x152.png">
      <link rel="apple-touch-icon" sizes="180x180" href="./imagenes/apple-icon-180x180.png">
      <link rel="icon" type="image/png" sizes="192x192"  href="./imagenes/android-icon-192x192.png">
      <link rel="icon" type="image/png" sizes="32x32" href="./imagenes/favicon-32x32.png">
      <link rel="icon" type="image/png" sizes="96x96" href="./imagenes/favicon-96x96.png">
      <link rel="icon" type="image/png" sizes="16x16" href="./imagenes/favicon-16x16.png">
      <link rel="manifest" href="./imagenes/manifest.json">
      <meta name="msapplication-TileColor" content="#ffffff">
      <meta name="msapplication-TileImage" content="./imagenes/ms-icon-144x144.png">
      <meta name="theme-color" content="#ffffff">
      <script src="http://mymaplist.com/js/vendor/TweenLite.min.js"></script>
      <style media="screen">
      body{
          background: url(http://s18.postimg.org/l7yq0ir3t/pick8_1.jpg);
          background-color: #444;
          background: url(http://s18.postimg.org/l7yq0ir3t/pick8_1.jpg),url(http://s18.postimg.org/l7yq0ir3t/pick8_1.jpg),url(http://mymaplist.com/img/parallax/back.png);
          }

          .vertical-offset-100{
          padding-top:100px;
          }
      </style>
      <script type="text/javascript">
      $(document).ready(function() {
        $(document).mousemove(function(event) {
            TweenLite.to($("body"),
            .5, {
                css: {
                    backgroundPosition: "" + parseInt(event.pageX / 8) + "px " + parseInt(event.pageY / '12') + "px, " + parseInt(event.pageX / '15') + "px " + parseInt(event.pageY / '15') + "px, " + parseInt(event.pageX / '30') + "px " + parseInt(event.pageY / '30') + "px",
                  "background-position": parseInt(event.pageX / 8) + "px " + parseInt(event.pageY / 12) + "px, " + parseInt(event.pageX / 15) + "px " + parseInt(event.pageY / 15) + "px, " + parseInt(event.pageX / 30) + "px " + parseInt(event.pageY / 30) + "px"
                }
            })
        })
      })
      </script>
  </head>

  <body>
    <div class="container" style="margin: 0 auto">
    <div class="row vertical-offset-100">
    	<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
            <center>
               <img src="http://s11.postimg.org/7kzgji28v/logo_sm_2_mr_1.png" class="img-responsive" alt="Conxole Admin"/>
            </center>
			 	</div>
			  	<div class="panel-body">
			    	<form accept-charset="UTF-8" role="form" method="post">
                    <fieldset>
			    	  <div class="form-group">
			    		    <input class="form-control" placeholder="Nombre de usuario" name="us" type="text">
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Contraseña" name="pw" type="password" value="">
			    		</div>
              <div class="form-group">
			    		    <input class="form-control" placeholder="Tipo de Host" name="lc" type="text">
			    		</div>
              <div class="form-group">
			    		    <input class="form-control" placeholder="Nombre de la base de datos" name="db" type="text">
			    		</div>
			    		<input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
			    	</fieldset>
			      	</form>
			    </div>
			</div>
		</div>
	</div>
</div>
        <?php
          if(isset($_POST["us"])){
              $username=$_POST["us"];
              $password=$_POST["pw"];
              $database=$_POST["db"];
              $localhost=$_POST["lc"];

              $connection = new mysqli($localhost, $username, $password, $database);
                 //TESTING IF THE CONNECTION WAS RIGHT
              if ($connection->connect_errno) {
                   printf("Connection failed: %s\n", $connection->connect_error);
                   exit();
              }else{
                include("./database.php");
                $file = fopen("../php/configurationdb.php", "a");
                fwrite($file, "<?php"."\n");
                fwrite($file, "$"."username="."'".$username."';"."\n");
                fwrite($file, "$"."password="."'".$password."';"."\n");
                fwrite($file, "$"."database="."'".$database."';"."\n");
                fwrite($file, "$"."localhost="."'".$localhost."';"."\n");
                fwrite($file, "?>"."\n");
                fclose($file);

                unlink("../installation/database.php");
                unlink("../installation/index.php");
                rmdir('../installation');


                 header("Location: ./../index.php");
               }
              }

        ?>
    </div>
  </body>
</html>
