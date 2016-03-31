<?php
$div1 ="<div class='prods_title colort'><p>CATÁLOGO DE PRODUCTOS</p></div>";
$dato = $_POST["dato"];
$opcion = $_POST["orden"];
$min = $_POST["min"];
$max = $_POST["max"];

include("./conexion.php");
$consulta="SELECT * FROM PRODUCTO WHERE MODELO LIKE '%$dato%' ";
if($min==$max){
  if($min==0 && $max==0){

  }else{
    $consulta = $consulta . 'AND PRECIO_UNI ='. $min;
  }
}else{
  if($min > $max){

  }else{
    $consulta = $consulta . 'AND PRECIO_UNI BETWEEN ' . $min . ' AND ' . $max;
  }
}
switch ($opcion) {
    case 0:
        break;
    case 1:
        $consulta = $consulta . " ORDER BY STOCK ASC";
        break;
    case 2:
        $consulta = $consulta . " ORDER BY STOCK DESC";
        break;
    case 3:
        $consulta = $consulta . " ORDER BY PRECIO_UNI ASC";
        break;
    case 4:
        $consulta = $consulta . " ORDER BY PRECIO_UNI DESC ";
        break;
    case 5:
        $consulta = $consulta . " ORDER BY MARCA ASC";
        break;
    case 6:
        $consulta = $consulta . " ORDER BY MARCA DESC";
        break;
}

if ($result = $connection->query($consulta)) {
     if ($result->num_rows==0) {

     }else{
         while($fila=$result->fetch_object()){
             $div1=$div1.'<div id="divprods"><img src="'.$fila->IMAGEN.'" style=" width:45%;height:175px;margin-left:27.5%;margin-top:5%;margin-bottom:2%;" /><div style="height:15%;width:100%;margin-bottom:2px;"><h5 style="color:#086A87;font-weight:bold;text-align:center">'.$fila->MARCA.' '.$fila->MODELO.'</h5></div><div style="height:15%;width:100%;margin-bottom:2px;"><center>                                   <a style="text-decoration:none;color:white" href="./ver_detalles_prod.php?codprod='.$fila->COD_PROD.'" class="btn btn-success"><span style="color:white" class="glyphicon glyphicon-shopping-cart white" ></span> '.$fila->PRECIO_UNI.'€</a></center></div></div>';
         }
     }

     echo $div1;
}else{
  echo $connection->error."  ".$consulta;
}
?>
