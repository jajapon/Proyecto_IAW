<?php
    include("./conexion.php");
    $paginaActual = $_POST["pagina"];
    $dato = $_POST["dato"];
    $result = $connection->query("SELECT COUNT(*) as conteo FROM PROVEEDOR WHERE NOMBRE LIKE '$dato%'");
    if($result){
		  while($obj = $result->fetch_object()){
		    	 $nfilas =$obj->conteo;
		  }
    }
    $nelementos = 5;
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

    $result = $connection->query("SELECT * FROM PROVEEDOR WHERE NOMBRE LIKE '$dato%' LIMIT $limit, $nelementos");
    $tabla = '<table  style="text-align:center" class="table table-striped table-condensed table-hover table-bordered"><tr><th style="text-align:center">Nombre</th><th style="text-align:center">Ciudad</th><th style="text-align:center">Dirección</th><th style="text-align:center">CP</th><th style="text-align:center">Operaciones</th></tr>';
    while($obj = $result->fetch_object()){
        //INSERT INTO `usuario`(`COD_USU`, `USERNAME`, `USERPASS`, `ROLE`, `ESTADO`, `EMAIL`, `NOMBRE`, `APELLIDOS`, `DNI`, `FECHA_NAC`,
        $tabla = $tabla.'<tr><td>'.$obj->NOMBRE.'</td><td>'.$obj->CIUDAD.'</td><td>'.$obj->DIRECCION.'</td><td>'.$obj->CP.'</td><td><a href="javascript:borrarProveedor('.$obj->COD_PROV.');" style="margin-left:3px;" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
    <form  style="display:inline;margin-left:3px;" action="editar_proveedor.php" method="post"><a href="javascript:;" class="btn btn-success" onclick="parentNode.submit();"><span class="glyphicon glyphicon-edit"></span> Editar</a><input type="hidden" name="codprov" value="'.$obj->COD_PROV.'"/></form>
<a style="margin-left:5px;" href="javascript:verDetallesProv('.$obj->COD_PROV.');" class="btn btn-info"><span class="glyphicon glyphicon-shopping-cart"></span> ver detalles</a></td></tr>';
    }
    $tabla = $tabla.'</table>';
    //echo $tabla;
    $array = array( "1" => $tabla, "2" => $lista);

    //$array = array(1=>'holajapon',2=>'hola david');
    echo json_encode($array);

?>
