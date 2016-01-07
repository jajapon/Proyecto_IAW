<?php
    session_start();
    $connection = new mysqli("localhost","root","","phonejapan");
    if ($connection->connect_errno) {
        printf("Connect failed: %s\n", $connection->connect_error);
        exit();
    }
    $contfilas = 0;
    $consulta = "SELECT * FROM SUMINISTRO, PRODUCTO, PROVEEDOR WHERE PRODUCTO.COD_PROD = SUMINISTRO.COD_PROD AND PROVEEDOR.COD_PROV = SUMINISTRO.COD_PROV AND SUMINISTRO.COD_PROV = ".$_POST["codprov"].";";

    $datosDiv ='<div style="height:34px;background-color:lightblue;margin:0 auto;margin-bottom:10px;margin-top:5px;"><p style="float:left;margin-top:4px;font-weight:bold;color:white;margin-left:5px;font-size:18px;">SUMINISTROS SOLICITADOS AL PROVEEDOR</p></div>';
    $datosDiv = $datosDiv.'<table class="table-bordered" style="width:100%;margin:0 auto;margin-bottom:30px;text-align:center"><tr ><th style="padding:5px;text-align:center">Producto</th><th style="padding:5px;text-align:center">Proveedor</th><th style="padding:5px;text-align:center">Marca</th><th style="padding:5px;text-align:center">Modelo</th><th style="padding:5px;text-align:center">Precio Unitario</th><th style="padding:5px;text-align:center">Cantidad</th><th style="padding:5px;text-align:center">Fecha</th></tr>';
    if($result = $connection->query($consulta)){
        if($result->num_rows==0){
           
        }else{
            while($fila=$result->fetch_object()){
                $datosDiv=$datosDiv.'<tr><td style="padding:5px"><img src="'.$fila->IMAGEN.'" style="width:25px;height:50px" /></td><td style="padding:5px">'.$fila->NOMBRE.'</td></td><td style="padding:5px">'.$fila->MARCA.'</td><td style="padding:5px">'.$fila->MODELO.'</td><td style="padding:5px">'.$fila->PRECIO_UNI.'€</td></td><td style="padding:5px">'.$fila->CANTIDAD.'</td></td><td style="padding:5px">'.$fila->FECHA_SUM.'</td></tr>';
                $contfilas=$contfilas+1;
            }
            $datosDiv = $datosDiv.'</table>';
        }
    }else{
         $datosDiv = $datosDiv.$consulta; 
    }

    $array = array( "1" => $datosDiv,"2"=>$contfilas);

    //$array = array(1=>'holajapon',2=>'hola david');
    echo json_encode($array);
?>
