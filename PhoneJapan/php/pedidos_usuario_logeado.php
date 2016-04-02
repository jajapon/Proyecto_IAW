<?php
    include("./php/conexion.php");
    $user=$_SESSION["usuario"];
    $consulta = "SELECT * FROM PEDIDO,USUARIO WHERE PEDIDO.COD_USU=USUARIO.COD_USU AND USERNAME = '$user'";
    if($result = $connection->query($consulta)){
        if($result->num_rows==0){

        }else{
            if($result = $connection->query($consulta)){
                    if($result->num_rows==0){

                    }else{
                        while($fila=$result->fetch_object()){

                              echo '<tr>
                                        <td style="padding:5px">'.$fila->USERNAME.'</td>
                                        <td style="padding:5px">'.$fila->IMPORTE.'€</td>
                                        <td style="padding:5px">'.$fila->FECHA_PED.'</td>
                                        <td style="padding:5px"><a href="javascript:verDetallesPedido('.$fila->COD_PEDIDO.');" class="btn btn-info"><span class="glyphicon glyphicon-shopping-cart"></span> ver detalles</a>
                                        <a href="./exppdf.php?idpe='.$fila->COD_PEDIDO.'" class="btn btn-danger"><span class="glyphicon glyphicon-file"></span> Exportar PDF </a></td>
                                    </tr>';
                        }

                    }
            }

        }
    }
?>
