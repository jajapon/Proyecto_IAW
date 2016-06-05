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
$pdf->Cell(100, 8, 'PROVEEDORES DE LA TIENDA', 0);
$pdf->Ln(13);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(25, 8, '', 0);
$pdf->Cell(35, 8, 'NOMBRE', 1,0,"C");
$pdf->Cell(35, 8, 'CIUDAD', 1,0,"C");
$pdf->Cell(35, 8, 'DIRECCION', 1,0,"C");
$pdf->Cell(35, 8, 'CODIGO POSTAL', 1,0,"C");
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);
//CONSULTA
$result = $connection->query("SELECT * FROM PROVEEDOR;");
$totalli = 0;
$total = 0;
while($fila = $result->fetch_object()){
	$pdf->Cell(25, 8, '', 0);
	$pdf->Cell(35, 8,$fila->NOMBRE, 1,0,"C");
	$pdf->Cell(35, 8,$fila->CIUDAD, 1,0,"C");
	$pdf->Cell(35, 8,$fila->DIRECCION, 1,0,"C");
	$pdf->Cell(35, 8,$fila->CP, 1,0,"C");
	$pdf->Ln(8);
}
$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Output();
?>
