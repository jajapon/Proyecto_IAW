<?php
       include("./../jpgraph/jpgraph.php");
       include("./../jpgraph/jpgraph_bar.php");
       include("./../php/conexion.php");
       $consulta="SELECT p.COD_PROD, p.MARCA, p.MODELO, sum(l.CANTIDAD) as total FROM LINEADEPEDIDO l , PRODUCTO p
       where l.COD_PROD=p.COD_PROD GROUP BY l.COD_PROD ORDER BY sum(l.CANTIDAD) DESC LIMIT 5;";

       $result=$connection->query($consulta);

       while($fila=$result->fetch_object()){
          $label[]=$fila->MARCA." ".$fila->MODELO;
          $datos[]=$fila->total;
       }

       $grafico = new Graph(1200,500,'auto');
       $grafico->SetScale("textint");
       $grafico->xaxis->title->Set("Productos");
       $grafico->xaxis->SetTickLabels($label);
       $grafico->yaxis->title->Set("Stock");

       $barplot1 = new BarPLot($datos);
       $barplot1->SetFillGradient("#0174DF","#2E9AFE",GRAD_HOR);
       $barplot1->SetWidth(80);

       $grafico->add($barplot1);

       $grafico->stroke();
       $grafico->stroke("IMG.PNG");
?>
