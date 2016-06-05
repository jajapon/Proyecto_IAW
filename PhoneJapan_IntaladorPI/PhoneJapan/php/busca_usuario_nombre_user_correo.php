<?php
    include("./conexion.php");
    $paginaActual = $_GET["pagina"];
    $dato = $_GET["dato"];
    $result = $connection->query("SELECT COUNT(*) as conteo FROM USUARIO WHERE EMAIL LIKE '%$dato%' OR NOMBRE LIKE '%$dato%' OR APELLIDOS LIKE '%$dato%' OR USERNAME LIKE '%$dato%'");
    if($result){
		  while($obj = $result->fetch_object()){
		    	 $nfilas =$obj->conteo;
		  }
    }
    $nelementos = 8;
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


    $result = $connection->query("SELECT * FROM USUARIO WHERE EMAIL LIKE '%$dato%' OR NOMBRE LIKE '%$dato%' OR APELLIDOS LIKE '%$dato%' OR USERNAME LIKE '%$dato%' LIMIT $limit, $nelementos");

    $tabla = '<table class="table table-striped table-condensed table-hover table-bordered" style="text-align:center"><tr><th>Usuario</th><th>Rol</th><th>Estado</th><th>Nombre</th><th>Apellidos</th><th>Email</th><th>Fecha_Nacimiento</th><th>Operaciones</th></tr>';
    while($obj = $result->fetch_object()){
        //INSERT INTO `usuario`(`COD_USU`, `USERNAME`, `USERPASS`, `ROLE`, `ESTADO`, `EMAIL`, `NOMBRE`, `APELLIDOS`, `DNI`, `FECHA_NAC`,
        $tabla = $tabla.'<tr><td>'.$obj->USERNAME.'</td><td>'.$obj->ROLE.'</td><td>'.$obj->ESTADO.'</td><td>'.$obj->NOMBRE.'</td><td>'.$obj->APELLIDOS.'</td><td>'.$obj->EMAIL.'</td><td>'.$obj->FECHA_NAC.'</td><td></a><form action="editar_usuario.php" method="post"><a href="javascript:;" onclick="parentNode.submit();"><span class="glyphicon glyphicon-edit"></span></a><input type="hidden" name="coduser" value="'.$obj->COD_USU.'"/></form></td></tr>';
    }
    $tabla = $tabla.'</table>';
    //echo $tabla;
    $array = array( "1" => $tabla, "2" => $lista);

    //$array = array(1=>'holajapon',2=>'hola david');
    echo json_encode($array);
?>
