<?php
require('./fpdf/fpdf.php');
require('./php/conexion.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(4, 10, '', 0);
$pdf->Image('./imagenes/P.png' , 10 ,9.5, 12 , 12,'png');
$pdf->Cell(10,8,'',0);
$pdf->Cell(150, 10, 'PhoneJapan S.L.', 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(50, 10, 'Fecha: '.date('d-m-Y').'', 0);
$pdf->Ln(18);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(70, 8, '', 0);
$pdf->Cell(100, 8, 'PRODUCTOS DE LA TIENDA', 0);
$pdf->Ln(13);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(20, 8, '', 0);
$pdf->Cell(35, 8, 'MARCA', 0);
$pdf->Cell(55, 8, 'MODELO', 0);
$pdf->Cell(35, 8, 'STOCK', 0);
$pdf->Cell(35, 8, 'PRECIO UNITARIO', 0);
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);
//CONSULTA
$result = $connection->query("SELECT * FROM PRODUCTO;");
$totalli = 0;
$total = 0;
while($fila = $result->fetch_object()){
	$pdf->Cell(20, 8, '', 0);
	$pdf->Cell(35, 8,$fila->MARCA, 0);
	$pdf->Cell(55, 8,$fila->MODELO, 0);
	$pdf->Cell(35, 8,$fila->STOCK, 0);
	$pdf->Cell(35, 8,$fila->PRECIO_UNI ." Euros", 0);
	$pdf->Ln(8);
}
$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Output();
?>
