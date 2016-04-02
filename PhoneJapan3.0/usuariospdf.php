<?php
require('./fpdf/fpdf.php');
require('./php/conexion.php');

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
$pdf->Cell(100, 8, 'USUARIOS DE LA TIENDA', 0);
$pdf->Ln(13);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(30, 8, 'USUARIO', 1,0,"C");
$pdf->Cell(30, 8, 'NOMBRE', 1,0,"C");
$pdf->Cell(30, 8, 'APELLIDOS', 1,0,"C");
$pdf->Cell(45, 8, 'EMAIL', 1,0,"C");
$pdf->Cell(25, 8, 'TIPO', 1,0,"C");
$pdf->Cell(30, 8, 'FECHA NACIMIENTO', 1,0,"C");
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);
//CONSULTA
$result = $connection->query("SELECT * FROM USUARIO;");
$totalli = 0;
$total = 0;
while($fila = $result->fetch_object()){
	$pdf->Cell(30, 8,$fila->USERNAME, 1,0,"C");
	$pdf->Cell(30, 8,$fila->NOMBRE, 1,0,"C");
	$pdf->Cell(30, 8,$fila->APELLIDOS, 1,0,"C");
	$pdf->Cell(45, 8,$fila->EMAIL, 1,0,"C");
	$pdf->Cell(25, 8,$fila->ROLE, 1,0,"C");
	$pdf->Cell(30, 8,$fila->FECHA_NAC, 1,0,"C");
	$pdf->Ln(8);
}
$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Output();
?>
