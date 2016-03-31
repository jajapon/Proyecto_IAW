<?php
       include("./../jpgraph/jpgraph.php");
       include("./../jpgraph/jpgraph_bar.php");
       include("./../php/conexion.php");

       $consulta="SELECT COUNT(*) AS nfilas FROM USUARIO";
       $result=$connection->query($consulta);
       $fila=$result->fetch_object();
       $nfila=$fila->nfilas;
       $label[]="USUARIO";
       $datos[]=$fila->nfilas;

       $consulta="SELECT COUNT(*) AS nfilas FROM PRODUCTO";
       $result1=$connection->query($consulta);
       $fila=$result1->fetch_object();
       $nfila=$fila->nfilas;
       $label[]="PRODUCTOS";
       $datos[]=$fila->nfilas;

       $consulta="SELECT COUNT(*) AS nfilas FROM PROVEEDOR";
       $result2=$connection->query($consulta);
       $fila=$result2->fetch_object();
       $nfila=$fila->nfilas;
       $label[]="PROVEEDOR";
       $datos[]=$fila->nfilas;

       $consulta="SELECT COUNT(*) AS nfilas FROM PEDIDO";
       $result3=$connection->query($consulta);
       $fila=$result3->fetch_object();
       $nfila=$fila->nfilas;
       $label[]="PEDIDO";
       $datos[]=$fila->nfilas;

       $grafico = new Graph(900,500,'auto');
       $grafico->SetScale("textint");
       $grafico->xaxis->title->Set("Tablas");
       $grafico->xaxis->SetTickLabels($label);
       $grafico->yaxis->title->Set("Cantidad");

       $barplot1 = new BarPLot($datos);
       $barplot1->SetFillGradient("#F78181","#FE2E2E",GRAD_HOR);
       $barplot1->SetWidth(80);

       $grafico->add($barplot1);

       $grafico->stroke();
       $grafico->stroke("IMG.PNG");
?>
