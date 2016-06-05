<?php
require('./fpdf/fpdf.php');
require('./php/conexion.php');
$pedido = $_GET["idpe"];
session_start();

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
$pdf->Cell(100, 8, 'DETALLES DEL PEDIDO', 0);
$pdf->Ln(13);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(24, 8, 'COD_LINEA', 0);
$pdf->Cell(30, 8, 'MARCA', 0);
$pdf->Cell(55, 8, 'MODELO', 0);
$pdf->Cell(30, 8, 'CANTIDAD', 0);
$pdf->Cell(30, 8, 'PRECIO UNITARIO', 0);
$pdf->Cell(30, 8, 'IMPORTE', 0);
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);
//CONSULTA
$result = $connection->query("SELECT * FROM LINEADEPEDIDO, PRODUCTO WHERE PRODUCTO.COD_PROD = LINEADEPEDIDO.COD_PROD AND COD_PEDIDO = ".$pedido.";");
$totalli = 0;
$total = 0;
while($fila = $result->fetch_object()){
	$totalli = $fila->CANTIDAD * $fila->PRECIO_UNI ;
	$total = $total +  $totalli;

	$pdf->Cell(24, 8,$fila->COD_LINEA, 0);
	$pdf->Cell(30, 8,$fila->MARCA, 0);
	$pdf->Cell(55, 8,$fila->MODELO, 0);
	$pdf->Cell(30, 8,$fila->CANTIDAD, 0);
	$pdf->Cell(30, 8,$fila->PRECIO_UNI ." Euros", 0);
	$pdf->Cell(30, 8,$totalli . " Euros", 0);
	$pdf->Ln(8);
}
$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(148,8,'',0);
$pdf->Cell(30,8,'Total Pedido: '.$total." Euros",0);
$pdf->Output();
?>
