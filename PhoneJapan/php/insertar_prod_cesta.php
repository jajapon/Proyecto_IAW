<?php
    include("./php/conexion.php");
    $user=$_SESSION["usuario"];
    $consulta = "SELECT * FROM USUARIO WHERE USERNAME = '".$user."';";

    if($result = $connection->query($consulta)){
        if($result->num_rows==0){

        }else{
            $cduser="";
            while($fila=$result->fetch_object()){
                $cduser = $fila->COD_USU;
            }
            $codprod = $_POST["codprod"];
            $consulta = "SELECT * FROM CESTA,PRODUCTO WHERE CESTA.COD_PROD = PRODUCTO.COD_PROD AND CESTA.COD_USU = $cduser AND CESTA.COD_PROD = $codprod";
            if($result = $connection->query($consulta)){
               $stock = 0;
                if($result->num_rows==0){
                    while($fila=$result->fetch_object()){
                      $cantidad=$fila->CANTIDAD;
                      $stock = $fila->STOCK;
                    }
                    $consultaInsert = "INSERT INTO CESTA VALUES(".$cduser.",".$codprod.",1)";
                  //  $consultaProducto = "UPDATE PRODUCTO SET STOCK = (STOCK - 1) WHERE COD_PROD = $codprod";
                    $connection->query($consultaInsert);
                  //  $connection->query($consultaProducto);
                    $stock=$stock-1;
                }else{
                    $cantidad=0;
                    while($fila=$result->fetch_object()){
                        $cantidad=$fila->CANTIDAD;
                        $stock = $fila->STOCK;
                    }
                    $cantidad=$cantidad+1;
                    $consultaUpdate = "UPDATE CESTA SET CANTIDAD = $cantidad WHERE COD_PROD = $codprod AND COD_USU = $cduser;";
                    if($result = $connection->query($consultaUpdate)){
                    //  $consultaProducto = "UPDATE PRODUCTO SET STOCK = (STOCK - 1) WHERE COD_PROD = $codprod";
                  //    $connection->query($consultaProducto);
                    }
                    $stock=$stock-1;

                }

                $consulta = "SELECT SUM(CANTIDAD) AS TOTAL FROM CESTA WHERE COD_USU = $cduser";
                if($result = $connection->query($consulta)){
                    $total=0;
                    if($result->num_rows==0){

                    }else{
                        while($fila=$result->fetch_object()){
                             $total=$total+$fila->TOTAL;
                        }
                    }
                    //$ncesta="($total)";
                    echo "($total)";
                    //$array = array( "1" => $ncesta, "2" => $stock);

                    //$array = array(1=>'holajapon',2=>'hola david');
                    //echo json_encode($array);
                }
            }else{
                echo $connection->error;
            }
        }
    }else{

    }
?>
