<?php
    $mysqli = new mysqli("localhost","root","","phonejapan");
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
    $paginaActual = $_GET["pagina"];
    $result = $mysqli->query("SELECT COUNT(*) as conteo FROM PROVEEDOR");
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

    $result = $mysqli->query("SELECT * FROM PROVEEDOR LIMIT $limit, $nelementos");
    $tabla = '<table  class="table table-striped table-condensed table-hover"><caption class="text-center" id="caption_lista">Proveedores de  PhoneJapan</caption><tr><th>Codigo Proveedor</th><th>Nombre</th><th>Ciudad</th><th>Direccion</th><th>CP</th><th>Operaciones</th></tr>';
    while($obj = $result->fetch_object()){
        //INSERT INTO `usuario`(`COD_USU`, `USERNAME`, `USERPASS`, `ROLE`, `ESTADO`, `EMAIL`, `NOMBRE`, `APELLIDOS`, `DNI`, `FECHA_NAC`,
        $tabla = $tabla.'<tr><td>'.$obj->COD_PROV.'</td><td>'.$obj->NOMBRE.'</td><td>'.$obj->CIUDAD.'</td><td>'.$obj->DIRECCION.'</td><td>'.$obj->CP.'</td><td><a href="#"><span class="glyphicon glyphicon-remove"></span></a></td></tr>';
    }
    $tabla = $tabla.'</table>';
    //echo $tabla;
    $array = array( "1" => $tabla, "2" => $lista);

    //$array = array(1=>'holajapon',2=>'hola david');
    echo json_encode($array);

?>


