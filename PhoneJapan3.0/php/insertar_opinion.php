<?php
    session_start();
    include("./conexion.php");                                
    $consulta = "SELECT * FROM USUARIO WHERE USERNAME ='".$_SESSION["usuario"]."';";
    $user="";
    $prod=$_POST["codprod"];
    $mens=$_POST["addComment"];

    if ($result = $connection->query($consulta)) {
        if ($result->num_rows==0) {

        }else{
            while($obj=$result->fetch_object()){
                  $user = $obj->COD_USU;
            }
            $consulta = "INSERT INTO OPINION VALUES(NULL,$user,$prod,CURRENT_TIMESTAMP(),'$mens')";
            if ($connection->query($consulta)) {

            }else{

            }
        }
     }
?>
