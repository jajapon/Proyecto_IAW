<?php
      $consulta = "SELECT * FROM producto ORDER BY COD_PROD DESC LIMIT 10";
      include("./php/conexion.php");

      if ($result = $connection->query($consulta)) {
           if ($result->num_rows==0) {

           }else{
               $carrusel='<div id="slides">';
               $menucarrusel='<div id="menu"><ul>';
               while($fila=$result->fetch_object()){
                   $carrusel=$carrusel.'<div class="slide">
                                           <div style="float:left;width:220px;position:relative;height:356px;margin-left:230px;margin-right:20px;margin-top:20px;" >
                                                 <img src="'.$fila->IMAGEN.'" style="width:183px;height:350px;"/>
                                                 <span style="background-image: url(./imagenes/sticker_precio.png);background-size:100% 100%;width:80px;height:80px;display:block;position:relative;margin-top:-80px;margin-left:30%;"><h4 style="position:relative;top:33px;color:white;font-weight:bold;">'.$fila->PRECIO_UNI.'€</h4></span>
                                           </div>
                                           <div style="float:left;width:480px;;position:relative;height:356px;margin-right:120px;margin-top:20px;text-align:left">
                                              <h1>'.$fila->MARCA.' '.$fila->MODELO.'</h1>
                                              <p>El '.$fila->MARCA.' '.$fila->MODELO.' es uno de los ultimos productos que estamos ofertando en PhoneJapan. Si quiere ver sus caracteristicas o consultar mas datos sobre el producto acceda a traves del enlace que aparece justo debajo. Un saludo.<br>
                                              </p>
                                              <form  style="display:inline;margin-left:3px;" action="ver_detalles_prod.php" method="post"><a href="javascript:;" style="text-decoration:none;color:red;box-shadow:0px 0px 0x #000;font-weight:bold;text-shadow:0px 1px 0px #000;font-size:16px;padding:7px 15px;margin-left:7px;font-weight:normal;border-radius:2px" class="btn btn-warning" onclick="parentNode.submit();"><span class="glyphicon glyphicon-shopping-cart"></span> Ver detalles</a><input type="hidden" name="codprov" value="'.$fila->COD_PROD.'"/>
                                           </div>
                                       </div>';
                     $menucarrusel=$menucarrusel.'<li class="menuItem"><a href=""><img src="'.$fila->IMAGEN.'" alt="thumbnail" /></a></li>';
               }
               $carrusel=$carrusel.'</div>';
               $menucarrusel=$menucarrusel.'</ul></div>';
               echo $carrusel;
               echo $menucarrusel;
           }
      }
 ?>
