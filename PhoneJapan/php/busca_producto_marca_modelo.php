<?php

    $paginaActual = $_GET["pagina"];
    $dato = $_GET["dato"];
    $mysqli = new mysqli("localhost","root","","phonejapan");
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
    $paginaActual = $_GET["pagina"];
    $result = $mysqli->query("SELECT COUNT(*) as conteo FROM PRODUCTO WHERE MARCA LIKE '%$dato%' OR MODELO LIKE '%$dato%'");
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

    if($paginaActual > 1){
        $lista = $lista.'<li><a href="javascript:paginacion('.($paginaActual-1).');">Anterior</a></li>'; 
    }
    for($i=1;$i<$npaginas;$i++){
        if($paginaActual == $i){
            $lista = $lista.'<li><a class="active" href="javascript:paginacion('.$i.');">'.$i.'</a></li>'; 
        }else{
            $lista = $lista.'<li><a  href="javascript:paginacion('.$i.');">'.$i.'</a></li>';
        }
    }
    if($paginaActual < $npaginas){
        $lista = $lista.'<li><a href="javascript:paginacion('.($paginaActual+1).');">Siguiente</a></li>'; 
    }
    
    if($paginaActual <= 1){
        $limit = 0; 
    }else{
        $limit = $nelementos * ($paginaActual-1);
    }

    $result = $mysqli->query("SELECT * FROM PRODUCTO WHERE MARCA LIKE '%$dato%' OR MODELO LIKE '%$dato%' LIMIT $limit, $nelementos");
    $tabla = '<table  class="table table-striped table-condensed table-hover"><tr><th>Imagen</th><th>Marca</th><th>Modelo</th><th>Stock</th><th>Precio Unitario</th><th>Operaciones</th></tr>';
    while($obj = $result->fetch_object()){
        //INSERT INTO `usuario`(`COD_USU`, `USERNAME`, `USERPASS`, `ROLE`, `ESTADO`, `EMAIL`, `NOMBRE`, `APELLIDOS`, `DNI`, `FECHA_NAC`,
        $tabla = $tabla.'<tr><td><center><img style="width:35px;height:70px;" src="'.$obj->IMAGEN.'" /></center></td><td>'.$obj->MARCA.'</td><td>'.$obj->MODELO.'</td><td>'.$obj->STOCK.'</td><td>'.$obj->PRECIO_UNI.'</td><td><a  style="margin-right:10px;" href="javascript:borrarProducto('.$obj->COD_PROD.');"><span style="width:40px;height:40px;" class="glyphicon glyphicon-remove"></span></a><a href="javascript:borrarProducto('.$obj->COD_PROD.');"></a><form  style="float:left;margin-right:15px;" action="editarProducto.php" method="post"><a href="javascript:;" onclick="parentNode.submit();"><span class="glyphicon glyphicon-edit"></span></a><input type="hidden" name="codprod" value="'.$obj->COD_PROD.'"/></form></td></tr>';
    }
    $tabla = $tabla.'</table>';
    //echo $tabla;
    $array = array( "1" => $tabla, "2" => $lista);

    //$array = array(1=>'holajapon',2=>'hola david');
    echo json_encode($array);

?>