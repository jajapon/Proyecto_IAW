<?php
include("./conexion.php");
$div1 ="<div class='prods_title'><p>CATÁLOGO DE PRODUCTOS</p></div>";
$dato=$_POST["dato"];

$consulta = "SELECT * FROM PRODUCTO WHERE MARCA LIKE '%$dato%'  OR MODELO LIKE '%$dato%';";
if ($result = $connection->query($consulta)) {
     if ($result->num_rows==0) {

     }else{
         while($fila=$result->fetch_object()){
             $div1=$div1.'<div style="width:19%;height:300px;border:solid #A9E2F3 3px;float:left;margin-right:1%;margin-bottom:1%;"><img src="'.$fila->IMAGEN.'" style=" width:45%;height:175px;margin-left:27.5%;margin-top:5%;margin-bottom:2%;" /><div style="height:15%;width:100%;margin-bottom:2px;"><h5 style="color:#086A87;font-weight:bold;text-align:center">'.$fila->MARCA.' '.$fila->MODELO.'</h5></div><div style="height:15%;width:100%;margin-bottom:2px;"><center><form action="./ver_detalles_prod.php" method="post"><input type="hidden" id="codprod" name="codprod" value="'.$fila->COD_PROD.'"><button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-shopping-cart white" ></span> '.$fila->PRECIO_UNI.'€</button></form></center></div></div>';
         }
     }

     echo $div1;
}else{
  echo $connection->error;
}


?>
