<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
      <?php include("../head.php"); ?>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  </head>
  <body>
    <div class="span3">
        <h2>Sign Up</h2>
        <form method="post">
          <label>Username</label>
          <input type="text" name="us" class="span3"><br>
          <label>Password</label>
          <input type="password" name="pw" class="span3"><br>
          <label>Localhost</label>
          <input type="text" name="lc" class="span3"><br>
          <label>Nombre de la Base de datos</label>
          <input type="text" name="db" class="span3"><br>
          <label><input type="checkbox" name="terms"> I agree with the <a href="#">Terms and Conditions</a>.</label><br>
          <input type="submit" value="Sign up" class="btn btn-primary pull-left">
          <div class="clearfix"></div>
        </form>
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

                if (is_dir('../installation')) {
                $objects = scandir('../installation');
                 foreach ($objects as $object) {
                   if ($object != "." && $object != "..") {
                     if (filetype("../installation/".$object) == "dir"){
                        rrmdir("../installation/".$object);
                     }else{
                        unlink("../installation/".$object);
                     }
                   }
                 }
                 reset($objects);
                 rmdir('../installation');
                 header("Location: ./../index.php");
               }
              }

          }
        ?>
    </div>
  </body>
</html>
