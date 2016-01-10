<?php
        include("./php/conexion.php");
        $user=$_SESSION["usuario"];
        $consultaUsu="SELECT * FROM USUARIO WHERE USERNAME='$user'";
        if($checkUserResult = $connection->query($consultaUsu)){
            if($checkUserResult->num_rows==0){

            }else{
                $cduser = "";
                while($fila=$checkUserResult->fetch_object()){
                    $cduser = $fila->COD_USU;
                }

            $consulta = "SELECT *  FROM CESTA,PRODUCTO,USUARIO WHERE CESTA.COD_USU=USUARIO.COD_USU AND PRODUCTO.COD_PROD=CESTA.COD_PROD AND USERNAME = '$user'";
            if($result = $connection->query($consulta)){
                if($result->num_rows==0){
                         echo '<script language="javascript">
                             $("#alert_msg").text("No dispone de productos en la cesta para realizar un pedido");
                             $(".alert").toggleClass("hidden").fadeIn(1000);
                             window.setTimeout(function() {
                                 $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                       $(this).remove();
                                 });
                             }, 3000);
                            </script>';
                }else{
                    if($result = $connection->query($consulta)){
                            $total=0;
                            if($result->num_rows==0){

                            }else{
                                $consultaPedidos="SELECT MAX(COD_PEDIDO) AS MAXCODP FROM PEDIDO";
                                $codpedidonew=0;
                                if($result2 = $connection->query($consultaPedidos)){
                                    if($result2->num_rows==0){
                                        $codpedidonew=1;
                                    }else{
                                        while($filaped=$result2->fetch_object()){
                                            $codpedidonew=$filaped->MAXCODP;
                                            $codpedidonew=$codpedidonew+1;
                                        }
                                    }
                                }

                                $insertPedidoQuery="INSERT INTO PEDIDO VALUES($codpedidonew,$cduser,CURRENT_TIMESTAMP(),0);";
                                if($connection->query($insertPedidoQuery)){

                                }
                                while($fila=$result->fetch_object()){
                                     $cantidad = $fila->CANTIDAD;
                                     $precio = $fila->PRECIO_UNI;
                                     $total=$total+($cantidad*$precio);
                                     $codprod=$fila->COD_PROD;

                                     $consultaInsertLinea = "INSERT INTO LINEADEPEDIDO VALUES(NULL,$codpedidonew,$codprod,$cantidad); ";
                                    $connection->query($consultaInsertLinea);
                                }

                                $modificarPedidoTotal="UPDATE PEDIDO SET IMPORTE = $total WHERE COD_PEDIDO=$codpedidonew ;";
                                $connection->query($modificarPedidoTotal);

                                $consultaBorrarCesta ="DELETE FROM CESTA WHERE COD_USU = $cduser";
                                $connection->query($consultaBorrarCesta);
                                header("Location: ./cesta.php");

                            }
                    }

                }
            }
        }
        }


?>
