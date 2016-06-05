<?php

    $paginaActual = $_GET["pagina"];
    $dato = $_GET["dato"];
    $opcion = $_GET["opcion"];
    include("./conexion.php");
    $paginaActual = $_GET["pagina"];
    $result = $connection->query("SELECT COUNT(*) as conteo FROM PRODUCTO WHERE MARCA LIKE '%$dato%' OR MODELO LIKE '%$dato%'");
    if($result){
		  while($obj = $result->fetch_object()){
		    	 $nfilas =$obj->conteo;
		  }
    }
    $nelementos = 10;
    $npaginas = ceil($nfilas/$nelementos);
    $lista ='';
    $tabla = '';
    $limit = 0;

    for($i=1;$i<=$npaginas;$i++){
        if($paginaActual == $i){
            $lista = $lista.'<li class="active"><a href="javascript:paginacion('.$i.');">'.$i.'</a></li>';
        }else{
            $lista = $lista.'<li><a href="javascript:paginacion('.$i.');">'.$i.'</a></li>';
        }
    }

    if($paginaActual <= 1){
        $limit = 0;
    }else{
        $limit = $nelementos * ($paginaActual-1);
    }
    $consulta="SELECT * FROM PRODUCTO WHERE MARCA LIKE '%$dato%' OR MODELO LIKE '%$dato%'";


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
            $consulta = $consulta . "ORDER BY MARCA DESC";
            break;
    }
    $consulta=$consulta." LIMIT $limit, $nelementos";
    $tabla = '<table style="text-align:center" class="table table-striped table-condensed table-hover table-bordered"><tr><th style="text-align:center">Imagen</th><th style="text-align:center">Marca</th><th style="text-align:center">Modelo</th><th style="text-align:center">Stock</th><th style="text-align:center">Precio Unitario</th><th style="text-align:center">Operaciones</th></tr>';
    if($result = $connection->query($consulta)){
      while($obj = $result->fetch_object()){
          //INSERT INTO `usuario`(`COD_USU`, `USERNAME`, `USERPASS`, `ROLE`, `ESTADO`, `EMAIL`, `NOMBRE`, `APELLIDOS`, `DNI`, `FECHA_NAC`,
          if($obj->STOCK <= 10){
              $tabla = $tabla.'<tr style="color:white;font-weight:bold"><td style="background-color:#F78181"><center><img style="width:27px;height:50px;" src="'.$obj->IMAGEN.'" /></center></td><td style="background-color:#F78181">'.$obj->MARCA.'</td><td style="background-color:#F78181">'.$obj->MODELO.'</td><td style="background-color:#F78181">'.$obj->STOCK.'</td><td style="background-color:#F78181">'.$obj->PRECIO_UNI.'€</td><td style="background-color:#F78181"><form  style="display:inline" action="editarProducto.php" method="post"><a href="javascript:;" onclick="parentNode.submit();"><span class="glyphicon glyphicon-edit"></span></a><input type="hidden" name="codprod" value="'.$obj->COD_PROD.'"/></form></td></tr>';
          }else{
              $tabla = $tabla.'<tr><td><center><img style="width:27px;height:50px;" src="'.$obj->IMAGEN.'" /></center></td><td>'.$obj->MARCA.'</td><td>'.$obj->MODELO.'</td><td>'.$obj->STOCK.'</td><td>'.$obj->PRECIO_UNI.'€</td><td><a href="javascript:borrarProducto('.$obj->COD_PROD.');"></a><form  style="display:inline" action="editarProducto.php" method="post"><a href="javascript:;" onclick="parentNode.submit();"><span class="glyphicon glyphicon-edit"></span></a><input type="hidden" name="codprod" value="'.$obj->COD_PROD.'"/></form></td></tr>';
          }
      }
    }else{
      $tabla = $tabla.'<tr><td colspan="6"><center>'.$connection->error.''.$consulta.'</form></td></tr>';
    }

    $tabla = $tabla.'</table>';
    //echo $tabla;
    $array = array( "1" => $tabla, "2" => $lista);

    //$array = array(1=>'holajapon',2=>'hola david');
    echo json_encode($array);

?>
