<?php
include("./conexion.php");
$div1 ="<div class='prods_title colort'><p>CATÁLOGO DE PRODUCTOS</p></div>";
$dato=$_POST["dato"];

$consulta = "SELECT * FROM PRODUCTO WHERE MARCA LIKE '%$dato%'  OR MODELO LIKE '%$dato%';";
if ($result = $connection->query($consulta)) {
     if ($result->num_rows==0) {

     }else{
         while($fila=$result->fetch_object()){
             $div1=$div1.'<div id="divprods"><img src="'.$fila->IMAGEN.'" style=" width:45%;height:175px;margin-left:27.5%;margin-top:5%;margin-bottom:2%;" /><div style="height:15%;width:100%;margin-bottom:2px;"><h5 style="color:#086A87;font-weight:bold;text-align:center">'.$fila->MARCA.' '.$fila->MODELO.'</h5></div><div style="height:15%;width:100%;margin-bottom:2px;"><center><a style="text-decoration:none;color:white" href="./ver_detalles_prod.php?codprod='.$fila->COD_PROD.'" class="btn btn-success"><span style="color:white" class="glyphicon glyphicon-shopping-cart white" ></span> '.$fila->PRECIO_UNI.'€</a>
</center></div></div>';
         }
     }

     echo $div1;
}else{
  echo $connection->error;
}


?>
