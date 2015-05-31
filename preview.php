<?php

require('fpdf17/fpdf.php');
if(!isset($_SESSION['id']))
		Redirect::redirectTo($rp."login.php");

//print_r($_POST);
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Times','B',16);
$pdf->SetTitle('Name of the Document.pdf');
$pdf->Cell(0,2,'BMS College of Engineering, Banglaore- 560019',0,1,'C');
$pdf->Ln(0.01);

$pdf->SetFontSize(10);
$pdf->Cell(0,10,'(Autonomous Institute, Affiliated to VTU, Belgaum)',0,1,'C');
$pdf->Ln(0.1);

$pdf->SetFont('Times','',13);
$pdf->Cell(0,10,$_POST['dept'],0,1,'C');
$pdf->Ln(0.1);

$pdf->SetFont('Times','B',16);
$pdf->Cell(0,5,$_POST['type'],0,1,'C');
$pdf->Ln(3);

$pdf->SetFont('Times','',12);
$pdf->Cell(125,4,"Semester: ".$_POST['sem'],0,0,'L');
$pdf->Cell(50,4,"Duration: ".$_POST['duration'],0,1,'L');
$pdf->Ln(0.1);

$pdf->SetFont('Times','',12);
$pdf->Cell(125,4,"Course: ".$_POST['course'],0,0,'L');
$pdf->Cell(50,4,"Max Marks: ".$_POST['max'],0,1,'L');
$pdf->Ln(0.1);

$pdf->SetFont('Times','',12);
$pdf->Cell(125,4,"Course code: ".$_POST['course-code'],0,0,'L');
$pdf->Cell(50,4,"Date: ".$_POST['date'],0,1,'L');
$pdf->Ln(1);

$pdf->SetFont('Times','U',13);
$pdf->Cell(0,8,$_POST['instruction'],0,1,'C');
$pdf->Ln(1);

$questions = json_decode($_POST['questions'],true) ;

foreach ($questions as $q ) {
	if(count($q['sub'])>0){
		$pdf->SetFont('Times','B',16);
		$pdf->Cell(0,5,$q['title'],0,1,'C');
		$pdf->Ln(1);
		$c ='a';
		
		foreach ($q["sub"] as $sq) {
				$pdf->SetFont('Times','',13);
				$pdf->Cell(10,5,($c++).")",0,0,'L');
				$pdf->MultiCell(0,5,strip_tags(trim($sq['text'])));
				$pdf->SetFont('Times','B',13);
				$pdf->Cell(10);
				$pdf->Cell(50,5,$sq['copo'],0,0,'L');
				$pdf->Cell(0,5,"(".trim($sq['marks']).")",0,0,'R');
				$pdf->Ln(10);
		}
		$pdf->Ln(5);
	}
}
$pdf->Ln(10);
$pdf->SetFont('Times','',13);
$pdf->Cell(0,10,"GOOD LUCK!",0,1,'C');
$pdf->Cell(0,10,"******",0,1,'C');
$pdf->Ln(0.1);
// $pdf->SetFont('Times','',13);
// $pdf->Cell(0,8,"Course: ".$_POST['course'],0,1,'L');
// $pdf->Ln(0.1);

$pdf->Output();
?>