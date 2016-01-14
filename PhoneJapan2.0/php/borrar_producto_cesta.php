<?php
  $cdprod= $_POST["codprod"];
  $cduser= $_POST["coduser"];
  $tabla="";
  $ncesta="";
  include("./conexion.php");
  session_start();

if($result=$connection->query("SELECT * FROM CESTA WHERE COD_USU = $cduser AND COD_PROD=$cdprod ;")){
    if($result->num_rows==0){

    }else{
      $cant =0;
      while($fila3=$result->fetch_object()){
        $cant = $fila3->CANTIDAD;
      }
      if($cant==1){
        $consulta = "DELETE FROM CESTA WHERE COD_USU = $cduser AND COD_PROD=$cdprod ;";
        if($connection->query($consulta)){
          $user=$_SESSION["usuario"];
          $consulta = "SELECT *  FROM CESTA,PRODUCTO,USUARIO WHERE CESTA.COD_USU=USUARIO.COD_USU AND PRODUCTO.COD_PROD=CESTA.COD_PROD AND USERNAME = '$user'";
          if($result = $connection->query($consulta)){
              if($result->num_rows==0){

              }else{
                  if($result = $connection->query($consulta)){
                          $total=0;
                          if($result->num_rows==0){

                          }else{
                              $coduser="";
                              $tabla= '<tr ><th style="padding:5px;text-align:center">Producto</th><th style="padding:5px;text-align:center">Marca</th><th style="padding:5px;text-align:center">Modelo</th><th style="padding:5px;text-align:center">Cantidad</th><th style="padding:5px;text-align:center">Importe</th><th style="padding:5px;text-align:center" >Operacion</th></tr>';
                              while($fila=$result->fetch_object()){
                                   $cantidad = $fila->CANTIDAD;
                                   $precio = $fila->PRECIO_UNI;
                                   $total=$total+($cantidad*$precio);
                                   $tabla=$tabla.'<tr><td style="padding:5px"><center><img src="'.$fila->IMAGEN.'" style="width:30px;height:60px"/></center></td><td style="padding:5px">'.$fila->MARCA.'</td><td style="padding:5px">'.$fila->MODELO.'</td><td style="padding:5px">'.$fila->CANTIDAD.'</td><td style="padding:5px">'.$fila->PRECIO_UNI.'</td><td style="padding:5px"><a href="javascript:borrarCesta('.$fila->COD_PROD.','.$fila->COD_USU.');" style="margin-left:3px;" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Borrar</a></td></tr>';
                              }
                              $tabla=$tabla."<tr><td colspan='4'></td><td colspan='1' style='padding:5px;'>$total €</td><td colspan='1' style='padding:5px;'></td><t/r>";

                              $user=$_SESSION["usuario"];
                              $consulta = "SELECT SUM(CESTA.CANTIDAD) AS TOTAL FROM USUARIO, CESTA WHERE USUARIO.COD_USU = CESTA.COD_USU AND USUARIO.USERNAME = '".$user."';";
                              if($result = $connection->query($consulta)){
                                    $total=0;
                                    if($result->num_rows==0){
                                        var_dump($result->num_rows);
                                    }else{
                                        while($fila=$result->fetch_object()){
                                            $total=$total+$fila->TOTAL;
                                        }
                                    }
                                    $ncesta="($total)";
                              }else{
                                var_dump($connection->error);
                              }
                          }
                  }

              }
          }
        }else{
          echo $connection->error;
        }
      }else{
        $consulta = "UPDATE CESTA SET CANTIDAD=(CANTIDAD-1) WHERE COD_USU = $cduser AND COD_PROD=$cdprod ;";
        if($connection->query($consulta)){
          //$consulta = "UPDATE PRODUCTO SET STOCK=(STOCK+1) WHERE COD_PROD=$cdprod ;";
          //$connection->query($consulta);
          $user=$_SESSION["usuario"];
          $consulta = "SELECT *  FROM CESTA,PRODUCTO,USUARIO WHERE CESTA.COD_USU=USUARIO.COD_USU AND PRODUCTO.COD_PROD=CESTA.COD_PROD AND USERNAME = '$user'";
          if($result = $connection->query($consulta)){
              if($result->num_rows==0){

              }else{
                  if($result = $connection->query($consulta)){
                          $total=0;
                          if($result->num_rows==0){

                          }else{
                              $coduser="";
                              $tabla= '<tr ><th style="padding:5px;text-align:center">Producto</th><th style="padding:5px;text-align:center">Marca</th><th style="padding:5px;text-align:center">Modelo</th><th style="padding:5px;text-align:center">Cantidad</th><th style="padding:5px;text-align:center">Importe</th><th style="padding:5px;text-align:center" >Operacion</th></tr>';
                              while($fila=$result->fetch_object()){
                                   $cantidad = $fila->CANTIDAD;
                                   $precio = $fila->PRECIO_UNI;
                                   $total=$total+($cantidad*$precio);
                                   $tabla=$tabla.'<tr><td style="padding:5px"><center><img src="'.$fila->IMAGEN.'" style="width:30px;height:60px"/></center></td><td style="padding:5px">'.$fila->MARCA.'</td><td style="padding:5px">'.$fila->MODELO.'</td><td style="padding:5px">'.$fila->CANTIDAD.'</td><td style="padding:5px">'.$fila->PRECIO_UNI.'</td><td style="padding:5px"><a href="javascript:borrarCesta('.$fila->COD_PROD.','.$fila->COD_USU.');" style="margin-left:3px;" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Borrar</a></td></tr>';
                              }
                              $tabla=$tabla."<tr><td colspan='4'></td><td colspan='1' style='padding:5px;'>$total €</td><td colspan='1' style='padding:5px;'></td><t/r>";

                              $user=$_SESSION["usuario"];
                              $consulta = "SELECT SUM(CESTA.CANTIDAD) AS TOTAL FROM USUARIO, CESTA WHERE USUARIO.COD_USU = CESTA.COD_USU AND USUARIO.USERNAME = '".$user."';";
                              if($result = $connection->query($consulta)){
                                    $total=0;
                                    if($result->num_rows==0){
                                        var_dump($result->num_rows);
                                    }else{
                                        while($fila=$result->fetch_object()){
                                            $total=$total+$fila->TOTAL;
                                        }
                                    }
                                    $ncesta="($total)";
                              }else{
                                var_dump($connection->error);
                              }
                          }
                  }

              }
          }
        }else{
          echo $connection->error;
        }
      }
    }
}

  $array = array( "1" => $tabla, "2" => $ncesta);
  echo json_encode($array);

?>
