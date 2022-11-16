<?php
require('fpdf/fpdf.php');
require 'conexion.php';

$sql ="SELECT * from principal ";
$result = $conexion->query($sql);

$pdf = new FPDF("p","mm","letter");
$pdf->AddPage();
$pdf->SetFont('Arial','B',11);
$pdf->Cell(200,10,utf8_decode("Nota de Remicion"),0,1,"C");
$pdf->Ln(2);


$pdf->Cell(18,5, "Fecha",0,0,"C");
$pdf->Cell(20,5, "Nombre",0,0,"C");
$pdf->Cell(24,5, "Modelo",0,0,"C");
$pdf->Cell(50,5, "Descripcion",0,0,"C");
$pdf->Cell(30,5, "Problema",0,0,"C");
$pdf->Cell(45,5, "Reparacion",0,0,"C");
$pdf->Cell(10,5, "Presupuesto",0,1,"C");

$pdf->SetFont('Arial','B',9);
    while($fila = $result->fetch_assoc()){
        $pdf->Cell(18,5, $fila['fecha'],1,0,"C");
        $pdf->Cell(20,5, $fila['nombre' ],1,0,"C");
        $pdf->Cell(24,5, $fila['modelo'],1,0,"C");
        $pdf->Cell(50,5, $fila['descripcion'],1,0,"C");
        $pdf->Cell(30,5, $fila['problema'],1,0,"C");
        $pdf->Cell(45,5, $fila['descripcion_r'],1,0,"C");
        $pdf->Cell(10,5, $fila['presupuesto'],1,1,"C");
    }
    $pdf->Output();
?>