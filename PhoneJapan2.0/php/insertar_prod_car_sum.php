<?php
         $imagen=quitarComillas($_POST["urlimg"]);
         $marca= quitarComillas($_POST["marca"]);
         $modelo=quitarComillas($_POST["modelo"]);
         $stock=quitarComillas($_POST["stock"]);
         $precio=quitarComillas($_POST["precio"]);
         $prov=quitarComillas($_POST["prov"]);

         $pan=quitarComillas($_POST["pan"]);
         $res=quitarComillas($_POST["res"]);
         $ram=quitarComillas($_POST["ram"]);
         $int=quitarComillas($_POST["int"]);
         $pro=quitarComillas($_POST["pro"]);
         $so=quitarComillas($_POST["so"]);
         $fro=quitarComillas($_POST["fro"]);
         $tra=quitarComillas($_POST["tra"]);
         $sim=quitarComillas($_POST["sim"]);

         $consulta = "SELECT * FROM PRODUCTO WHERE MARCA = '$marca' AND MODELO = '$modelo';";
         if ($result = $connection->query($consulta)) {
             if ($result->num_rows==0) {
                 $consulta = "SELECT (MAX(COD_PROD)+1) AS TOTAL FROM PRODUCTO;";
                 $codprod=1;
                 if ($result = $connection->query($consulta)) {
                     if ($result->num_rows==0) {

                     }else{
                         while($fila=$result->fetch_object()){
                             $codprod = $fila->TOTAL;
                         }
                          if($codprod==null || $codprod==""){
                            $codprod=1;
                          }
                          $consulta = "INSERT INTO PRODUCTO VALUES ($codprod, '$marca' ,'$modelo' ,$stock ,'$imagen',$precio)";
                          $consultaCar = "INSERT INTO CARACTERISTICAS VALUES(null,$codprod, '$pan' ,'$res' ,'$ram' ,'$int','$pro','$so','$fro','$tra','$sim');";
                          $consultaSum = "INSERT INTO SUMINISTRO VALUES (NULL,$codprod,$prov,$stock,CURRENT_TIMESTAMP())";
                      //INSERT INTO SUMINISTRO VALUES (NULL,$codprod,$prov,$stock)

                         if ($connection->query($consulta)) {
                             if($connection->query($consultaCar)){
                               if ($connection->query($consultaSum)) {
                                    header("Location: aproductos.php");
                               }else{
                                 var_dump($connection->error);
                               }
                             }else{
                               echo '<script language="javascript">
                                      $("#alert_msg").text("'.$connection->error.'");
                                          $(".alert").toggleClass("hidden").fadeIn(1000);
                                          window.setTimeout(function() {
                                              $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                                  $(this).remove();
                                               });
                                          }, 3000);
                                       </script>';
                             }
                         }else{
                           echo '<script language="javascript">
                                  $("#alert_msg").text("'.$connection->error.' '.$consulta.'");
                                      $(".alert").toggleClass("hidden").fadeIn(1000);
                                      window.setTimeout(function() {
                                          $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                              $(this).remove();
                                           });
                                      }, 50000);
                                   </script>';
                         }
                     }
                  }else{

                 }
                }else{

                }
             }else{
                 echo '<script language="javascript">
                        $("#alert_msg").text("Ya existe un producto con esa marca y modelo");
                            $(".alert").toggleClass("hidden").fadeIn(1000);
                            window.setTimeout(function() {
                                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                    $(this).remove();
                                 });
                            }, 3000);
                         </script>';
              }
  ?>
