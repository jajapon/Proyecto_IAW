<?php
    include("./php/conexion.php");
    $user=$_SESSION["usuario"];
    $consulta = "SELECT *  FROM CESTA,PRODUCTO,USUARIO WHERE CESTA.COD_USU=USUARIO.COD_USU AND PRODUCTO.COD_PROD=CESTA.COD_PROD AND USERNAME = '$user'";
    if($result = $connection->query($consulta)){
        if($result->num_rows==0){

        }else{
            if($result = $connection->query($consulta)){
                    $total=0;
                    if($result->num_rows==0){

                    }else{
                        while($fila=$result->fetch_object()){
                             $cantidad = $fila->CANTIDAD;
                             $precio = $fila->PRECIO_UNI;

                             $total=$total+($cantidad*$precio);
                              echo '<tr><td style="padding:5px"><center><img src="'.$fila->IMAGEN.'" style="width:30px;height:60px"/></center></td>
                                    <td style="padding:5px">'.$fila->MARCA.'</td>
                                    <td style="padding:5px">'.$fila->MODELO.'</td>
                                    <td style="padding:5px">'.$fila->CANTIDAD.'</td>
                                    <td style="padding:5px">'.$fila->PRECIO_UNI.'</td>
                                    <td style="padding:5px">'.$fila->COD_PROD.'</td></tr>';
                        }
                        echo "
                        <tr>
                            <td colspan='4'></td>
                            <td colspan='1' style='padding:5px;'>$total €</td>
                            <td colspan='1' style='padding:5px;'></td>
                        <t/r>";
                    }
            }

        }
    }
?>
