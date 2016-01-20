<?php
include("./conexion.php");
$div1 ="<div class='prods_title_search'><p>CATÁLOGO DE PRODUCTOS</p></div>";
$min=$_POST["min"];
$max=$_POST["max"];
$orden=$_POST["orden"];
$dato=$_POST["dato"];
$primeravez=0;


$consulta = "SELECT * FROM PRODUCTO ";

if($min==0){
  $min = 0;
}

if($max==0){
  $max = 0;
}

if($min>$max || ($min==0 && $max==0) || $min==$max){

}else{
   if($primeravez==0){
     $primeravez=1;
     $consulta=$consulta." WHERE ";
   }else{
     $consulta=$consulta." AND ";
   }
   $consulta = $consulta."PRECIO_UNI BETWEEN ".$min." AND ".$max;
}

if($dato==""){

}else{
   if($primeravez==0){
     $primeravez=1;
     $consulta=$consulta." WHERE ";
   }else{
     $consulta=$consulta." AND ";
   }
   $consulta = $consulta."MARCA LIKE '%".$dato."%' OR MODELO LIKE '%".$dato."%'";
}

if($orden=="nada"){

}else{
   $consulta=$consulta." ORDER BY ".$orden;
}
if ($result = $connection->query($consulta)) {
     if ($result->num_rows==0) {

     }else{
         while($fila=$result->fetch_object()){
             $div1=$div1.'<div style="width:19%;height:300px;border:solid #A9E2F3 3px;float:left;margin-right:1%;margin-bottom:1%;"><img src="'.$fila->IMAGEN.'" style=" width:45%;height:175px;margin-left:27.5%;margin-top:5%;margin-bottom:2%;" /><div style="height:15%;width:100%;margin-bottom:2px;"><h5 style="color:#086A87;font-weight:bold;text-align:center">'.$fila->MARCA.' '.$fila->MODELO.'</h5></div><div style="height:15%;width:100%;margin-bottom:2px;"><center><form action="./ver_detalles_prod.php" method="post"><input type="hidden" id="codprod" name="codprod" value="'.$fila->COD_PROD.'"><button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-shopping-cart white" ></span> '.$fila->PRECIO_UNI.'€</button></form></center></div></div>';
         }
     }

     echo $div1;
}else{
  echo $connection->error."  ".$consulta;
}
?>
