<?php
         $codprod=quitarComillas($_POST["cprod"]);
         $imagen=quitarComillas($_POST["urlimg"]);
         $marca= quitarComillas($_POST["marca"]);
         $modelo=quitarComillas($_POST["modelo"]);
         $precio=quitarComillas($_POST["precio"]);

         $pan=quitarComillas($_POST["pan"]);
         $res=quitarComillas($_POST["res"]);
         $ram=quitarComillas($_POST["ram"]);
         $int=quitarComillas($_POST["int"]);
         $pro=quitarComillas($_POST["pro"]);
         $so=quitarComillas($_POST["so"]);
         $fro=quitarComillas($_POST["fro"]);
         $tra=quitarComillas($_POST["tra"]);
         $sim=quitarComillas($_POST["sim"]);

         $consulta = "SELECT * FROM PRODUCTO WHERE COD_PROD=".$codprod.";";
         if ($result = $connection->query($consulta)) {
             if ($result->num_rows==0) {

             }else{
                 $consulta = "UPDATE PRODUCTO SET MARCA='".$marca."', MODELO='".$modelo."', IMAGEN='".$imagen."' , PRECIO_UNI=".$precio." WHERE COD_PROD=".$codprod.";";
                 $consultaC = "UPDATE CARACTERISTICAS SET PANTALLA='".$pan."', RESOLUCION='".$res."',  RAM='".$ram."', MINTERNA='".$int."' , PROCESADOR='".$pro."', SO='".$so."' , FRONTAL='".$fro."', TRASERA='".$tra."', SIM='".$sim."' WHERE COD_PROD=".$codprod.";";

                 if ($connection->query($consulta)) {
                    if($connection->query($consultaC)){
                      header("Location: aproductos.php");
                    }
                 }else{

                 }
             }
         }else{

         }

 ?>
