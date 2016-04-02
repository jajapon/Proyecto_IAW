<div id="container3" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
<script type="text/javascript">
$(function () {
    // Create the chart
    $('#container3').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: ''
        },
        subtitle: {
            text: ''
        },
        xAxis: {
          type: 'category',
          title: {
              text: 'Datos'
          }

        },
        yAxis: {
            title: {
                text: 'Cantidad'
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: ''
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f}</b><br/>'
        },

        series: [{
            name: 'Estadisticas Generales',
            colorByPoint: true,
            data: [<?php
                  include("conexion.php");
                  $consulta="SELECT COUNT(*) AS nfilas FROM USUARIO";
                  $result=$connection->query($consulta);
                  $fila=$result->fetch_object();
                  $nfila=$fila->nfilas;
                  $label[]="USUARIOS";
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

                  for($i=0;$i<count($datos);$i++){?>
                    {
                        name: "<?php echo $label[$i]?>",
                        y: <?php echo $datos[$i]; ?>
                    },
                  <?php } ?>
                  ]
        }],

    });
});
</script>
