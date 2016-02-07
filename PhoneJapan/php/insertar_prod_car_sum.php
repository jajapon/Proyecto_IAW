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
                          $ruta="";

                          if ($_FILES["imagen"]["error"] > 0){
                            echo "ha ocurrido un error";
                          } else {
                                    //ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido.
                                    //y que el tamano del archivo no exceda los 100kb
                                    $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
                                    $limite_kb = 4000;
                                    if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024){
                                      //esta es la ruta donde copiaremos la imagen
                                      //recuerden que deben crear un directorio con este mismo nombre
                                      //en el mismo lugar donde se encuentra el archivo subir.php
                                      $ruta = "./imagenes/productos/" . $_FILES['imagen']['name'];
                                      //comprovamos si este archivo existe para no volverlo a copiar.
                                      //pero si quieren pueden obviar esto si no es necesario.
                                      //o pueden darle otro nombre para que no sobreescriba el actual.
                                      if (!file_exists($ruta)){
                                        //aqui movemos el archivo desde la ruta temporal a nuestra ruta
                                        //usamos la variable $resultado para almacenar el resultado del proceso de mover el archivo
                                        //almacenara true o false
                                        $resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
                                        if ($resultado){
                                          echo "el archivo ha sido movido exitosamente";
                                        } else {
                                          echo "ocurrio un error al mover el archivo.";
                                        }
                                      } else {
                                        echo $_FILES['imagen']['name'] . ", este archivo existe";
                                      }
                                    } else {
                                      echo "archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes";
                                    }
                            }

                          $consulta = "INSERT INTO PRODUCTO VALUES ($codprod, '$marca' ,'$modelo' ,$stock ,'$ruta',$precio)";
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
