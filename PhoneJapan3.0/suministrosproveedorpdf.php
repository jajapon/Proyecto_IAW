<?php
require('./fpdf/fpdf.php');
require('./php/conexion.php');

$idpr=$_GET["idpr"];

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(4, 10, '', 0);
$pdf->Image('./imagenes/P.PNG' , 10 ,9.5, 12 , 12,'png');
$pdf->Cell(10,8,'',0);
$pdf->Cell(150, 10, 'PhoneJapan S.L.', 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(50, 10, 'Fecha: '.date('d-m-Y').'', 0);
$pdf->Ln(18);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(70, 8, '', 0);
$pdf->Cell(100, 8, 'SUMINISTROS DEL PROVEEDOR', 0);
$pdf->Ln(13);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(30, 8, 'PROVEEDOR', 1,0,"C");
$pdf->Cell(30, 8, 'MARCA', 1,0,"C");
$pdf->Cell(55, 8, 'MODELO', 1,0,"C");
$pdf->Cell(30, 8, 'PRECIO UNITARIO', 1,0,"C");
$pdf->Cell(20, 8, 'CANTIDAD', 1,0,"C");
$pdf->Cell(30, 8, 'FECHA', 1,0,"C");
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);
//CONSULTA
$consulta = "SELECT * FROM SUMINISTRO, PRODUCTO, PROVEEDOR WHERE PRODUCTO.COD_PROD = SUMINISTRO.COD_PROD AND PROVEEDOR.COD_PROV = SUMINISTRO.COD_PROV AND SUMINISTRO.COD_PROV = ".$idpr.";";

$result = $connection->query($consulta);
$totalli = 0;
$total = 0;
while($fila = $result->fetch_object()){
	$pdf->Cell(30, 8,$fila->NOMBRE, 1,0,"C");
  $pdf->Cell(30, 8,$fila->MARCA, 1,0,"C");
  $pdf->Cell(55, 8,$fila->MODELO, 1,0,"C");
  $pdf->Cell(30, 8,$fila->PRECIO_UNI."Euros", 1,0,"C");
  $pdf->Cell(20, 8,$fila->CANTIDAD, 1,0,"C");
  $pdf->Cell(30, 8,$fila->FECHA_SUM, 1,0,"C");
	$pdf->Ln(8);
}
$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Output();
?>
