<?php
    session_start();
    $connection = new mysqli("localhost", "root", "", "phonejapan");
                                    
    $consulta = "SELECT * FROM USUARIO WHERE USERNAME ='".$_SESSION["usuario"]."';"; 
    $user="";
    $prod=$_POST["codprod"];
    $mens=$_POST["addComment"];
    if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
     }
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