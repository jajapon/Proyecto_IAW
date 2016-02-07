<?php
    session_start();
    include("./conexion.php");
    $contfilas = 0;
    $consulta = "SELECT * FROM LINEADEPEDIDO, PRODUCTO WHERE PRODUCTO.COD_PROD = LINEADEPEDIDO.COD_PROD AND COD_PEDIDO = ".$_POST["codPedido"].";";

    $datosDiv = '<div style="width:90%;height:33px;background-color:lightblue;margin:0 auto;margin-bottom:10px;"><h4 class="titles">DATOS DEL PEDIDO</h4>';
    $datosDiv = $datosDiv.'<table class="table-bordered" style="width:100%;margin:0 auto;margin-bottom:10px;text-align:center"><tr ><th style="padding:5px;text-align:center">Producto</th><th style="padding:5px;text-align:center">Marca</th><th style="padding:5px;text-align:center">Modelo</th><th style="padding:5px;text-align:center">Precio Unitario</th><th style="padding:5px;text-align:center">Cantidad</th><th style="padding:5px;text-align:center">Importe linea</th></tr>';
    if($result = $connection->query($consulta)){
        if($result->num_rows==0){

        }else{
            while($fila=$result->fetch_object()){
                $datosDiv=$datosDiv.'<tr><td style="padding:5px"><img src="'.$fila->IMAGEN.'" style="width:25px;height:50px" /></td><td style="padding:5px">'.$fila->MARCA.'</td><td style="padding:5px">'.$fila->MODELO.'</td><td style="padding:5px">'.$fila->PRECIO_UNI.'€</td></td><td style="padding:5px">'.$fila->CANTIDAD.'</td></td><td style="padding:5px">'.($fila->CANTIDAD*$fila->PRECIO_UNI).'€</td></tr>';
                $contfilas=$contfilas+1;
            }
            $datosDiv = $datosDiv.'</table>';
        }
    }

    $array = array( "1" => $datosDiv,"2"=>$contfilas);

    //$array = array(1=>'holajapon',2=>'hola david');
    echo json_encode($array);
?>
