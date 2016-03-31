<?php
       include("./../jpgraph/jpgraph.php");
       include("./../jpgraph/jpgraph_bar.php");
       include("./../php/conexion.php");

       $consulta="SELECT COUNT(*) AS SUMA,MARCA FROM PRODUCTO GROUP BY MARCA; ";
       $result=$connection->query($consulta);

       while($fila=$result->fetch_object()){
          $label[]=$fila->MARCA;
          $datos[]=$fila->SUMA;
       }

       $grafico = new Graph(1200,500,'auto');
       $grafico->SetScale("textint");
       $grafico->xaxis->title->Set("Productos");
       $grafico->xaxis->SetTickLabels($label);
       $grafico->yaxis->title->Set("Stock");

       $barplot1 = new BarPLot($datos);
       $barplot1->SetFillGradient("#088A4B","#04B486",GRAD_HOR);
       $barplot1->SetWidth(80);

       $grafico->add($barplot1);

       $grafico->stroke();
       $grafico->stroke("IMG.PNG");
?>
