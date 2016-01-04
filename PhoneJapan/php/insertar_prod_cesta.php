<?php
    session_start();
    $connection = new mysqli("localhost","root","","phonejapan");
    if ($connection->connect_errno) {
        printf("Connect failed: %s\n", $connection->connect_error);
        exit();
    }
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
            $consulta = "SELECT * FROM CESTA WHERE COD_USU = $cduser AND COD_PROD = $codprod";
            if($result = $connection->query($consulta)){
                if($result->num_rows==0){
                    $consultaInsert = "INSERT INTO CESTA VALUES(".$cduser.",".$codprod.",1)";
                    $connection->query($consultaInsert);
                }else{
                    $cantidad=0;
                    while($fila=$result->fetch_object()){
                        $cantidad=$fila->CANTIDAD;
                        
                    }
                    $cantidad=$cantidad+1;
                    $consultaUpdate = "UPDATE CESTA SET CANTIDAD = $cantidad WHERE COD_PROD = $codprod AND COD_USU = $cduser;";
                    if($result = $connection->query($consultaUpdate)){
                    
                    }
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
                    echo "($total)";
                }  
            }else{
            
            }
        }
    }else{
        
    }
?>
