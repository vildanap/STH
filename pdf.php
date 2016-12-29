<?php
require('./fpdf17/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$xml=simplexml_load_file('anketa.xml');


//ucitavanje sadrzaja u varijable
 $niz = array();
 $i=0;
foreach($xml->children() as $odgovor) { 
	$odg=$odgovor->tekst; 
	$niz[$i] = $odg;
	$i=$i+1;
} 
$duzina=$i;
$pdf->SetFillColor(224, 235, 255);
$pdf->SetFont('Arial','B',16);
$pdf->SetXY(0, 5);
$pdf->Cell(220, 20, "Rezultati ankete", 0, 0, 'C', true);
$pdf->SetFont('Arial','B',12);
$pdf->Text(20,40,"Pitanje dana: Srednjovjekovni naziv Sarajeva je?");
$pdf->SetFillColor(100, 120, 100);
$pdf->SetXY(10,60);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(20,12,'R.br.',1,0,'C',true);
$pdf->Cell(90,12,'Odgovor',1,0,'C',true); 
$pdf->Ln();
	foreach($niz as $columnValue){
		$pdf->SetFont('Arial','',12,0,'C');	
		$pdf->Cell(20,12,$duzina-$i+1,1,0,'C');
		$pdf->Cell(90,12,$columnValue,1,0,'C');	
		$pdf->Ln();
		$i=$i-1;
}
$pdf->SetFillColor(224, 235, 255);
$pdf->Cell(20,12,'Ukupno:',1,0,'C',true);
$pdf->Cell(90,12,$duzina,1,0,'C',true);
$pdf->Output();
?>