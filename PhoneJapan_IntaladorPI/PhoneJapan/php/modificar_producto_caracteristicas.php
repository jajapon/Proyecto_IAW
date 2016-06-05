<?php
         $codprod=$_POST["cprod"];
         $imagen=$_POST["urlimg"];
         $marca= $_POST["marca"];
         $modelo=$_POST["modelo"];
         $precio=$_POST["precio"];

         $pan=$_POST["pan"];
         $res=$_POST["res"];
         $ram=$_POST["ram"];
         $int=$_POST["int"];
         $pro=$_POST["pro"];
         $so=$_POST["so"];
         $fro=$_POST["fro"];
         $tra=$_POST["tra"];
         $sim=$_POST["sim"];

         $consulta = "SELECT * FROM PRODUCTO WHERE COD_PROD=".$codprod.";";
         if ($result = $connection->query($consulta)) {
             if ($result->num_rows==0) {

             }else{
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
                 if($ruta=="" || $ruta==null){
                   $ruta=$imagen;
                 }
                 $consulta = "UPDATE PRODUCTO SET MARCA='".$marca."', MODELO='".$modelo."', IMAGEN='".$ruta."' , PRECIO_UNI=".$precio." WHERE COD_PROD=".$codprod.";";
                 $consultaC = "UPDATE CARACTERISTICAS SET PANTALLA='".$pan."', RESOLUCION='".$res."',  RAM='".$ram."', MINTERNA='".$int."' , PROCESADOR='".$pro."', SO='".$so."' , FRONTAL='".$fro."', TRASERA='".$tra."', SIM='".$sim."' WHERE COD_PROD=".$codprod.";";

                 if ($connection->query($consulta)) {
                    if($connection->query($consultaC)){
                      header("Location: aproductos.php");
                      echo '<script language="javascript">
                             $("#alert_msg").text("'.$ruta.'");
                                 $(".alert").toggleClass("hidden").fadeIn(1000);
                                 window.setTimeout(function() {
                                     $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                         $(this).remove();
                                      });
                                 }, 3000);
                              </script>';
                    }
                 }else{

                 }
             }
         }else{

         }

 ?>
