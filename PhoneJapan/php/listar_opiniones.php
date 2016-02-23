<?php
    include("./conexion.php");
    $consulta = "SELECT * FROM OPINION, USUARIO WHERE USUARIO.COD_USU = OPINION.COD_USU AND COD_PROD=".$_POST["cdprod"].";";

    if ($connection->connect_errno) {
          // printf("Connection failed: %s\n", $connection->connect_error);
           exit();
    }

    $lista="";
     if ($result = $connection->query($consulta)) {
         if ($result->num_rows==0) {

          }else{
             while($obj=$result->fetch_object()){

                $lista=$lista.'<li class="list-group-item"><div class="row"><div class="col-xs-2 col-md-1"><img src="http://placehold.it/80" class="img-circle img-responsive" alt="" /></div><div class="col-xs-10 col-md-11"><div><div class="mic-info"><span style="color:darkblue" >'.$obj->USERNAME.': '.$obj->ROLE.'</span> <p style="float:right">'.$obj->FECHA_OP.'<p></div></div><div class="comment-text" style="margin-bottom:10px"> '.$obj->MENSAJE.' </div>';

                 if(isset($_SESSION["rol"])){
                      if($_SESSION["rol"]=="Admin"){
                              $lista=$lista.'<div class="action"><button type="button" onclick="javascript:borrarOpinion('.$obj->COD_OPINION.','.$obj->COD_PROD.');" class="btn btn-danger btn-xs" title="Delete"><span class="glyphicon glyphicon-trash"></span></button></div>';
                       }else{
                           if($_SESSION["usuario"]==$obj->USERNAME){
                              $lista=$lista.'<div class="action"><button type="button" onclick="javascript:borrarOpinion('.$obj->COD_OPINION.','.$obj->COD_PROD.');" class="btn btn-danger btn-xs" title="Delete"><span class="glyphicon glyphicon-trash"></span> </button></div>';
                           }else{

                            }
                       }
                  }else{

                   }
                   $lista=$lista.'</div></div></li>';
            }
        }
     }else{

      }
    //echo $tabla;
    $array = array( "1" => $lista);

    //$array = array(1=>'holajapon',2=>'hola david');
    echo json_encode($array);

?>
