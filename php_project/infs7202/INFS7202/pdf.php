<?php
session_start();
require("fpdf/fpdf.php");
class PDF extends FPDF
{
// Page header
function Header()
{
// Logo
// Arial bold 15
$this->SetFont('Arial','B',15);
// Move to the right
$this->Ln(20);
$this->Cell(80);
// Title
$this->Cell(30,10,'Registration Information',0,1,'C');
$this->Ln(1);
$this->Cell(80);
$this->Cell(30,10,'Welcome to Our website',0,1,'C');
$this->Ln(10);
// Table headings
$this->Cell(10,10,'#',1,0,'C');
$this->Cell(90,10,'Title',1,0,'C');
$this->Cell(90,10,'Information',1,1,'C');
// Line break
}

// Page footer
function Footer()
{
// Position at 1.5 cm from bottom
$this->SetY(-15);
// Arial italic 8
$this->SetFont('Arial','I',8);
// Page number
$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
// row
$pdf->Cell(10,10,'1',0,0,'C');
$pdf->Cell(90,10,'Username',0,0,'C');
$pdf->Cell(90,10,$_SESSION["Username"],0,1,'C');
// row

// About
$pdf->SetFont('Arial','B',15);
$pdf->Cell(180,20,'I wanna tell you',0,1,'C');
$pdf->SetFont('Times','',12);
$pdf->Cell(180,20,'welcome ',0,1,'C');
$pdf->Cell(180,20,'Hello',0,1,'C');
$pdf->Cell(180,20,'thanks for registration',0,1,'C');
$pdf->Cell(180,20,'Invite your friends',0,1,'C');

$pdf->Output();
?>