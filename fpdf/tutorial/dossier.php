<?php
require('../fpdf.php');
// require '../../config/database.php';
// $id=$_GET['id'];
// $req=$db->prepare('SELECT * FROM reservation WHERE id = ?');
// $req->execute(array($id));

class PDF extends FPDF
{
// Load data
function LoadData($file)
{
	// Read file lines
	$lines = file($file);
	$data = array();
	foreach($lines as $line)
		$data[] = explode(';',trim($line));
	return $data;
}

// Simple table
function BasicTable()
{
	// Header
	//$this->Image('11.PNG',8,1,190);

	// foreach($header as $col)

	// $this->Cell(40,100,$col,100);
	$this->Ln(30);
	require 'config/database.php';
	// $ida=$_GET['ida'];
	$req=$db->query('SELECT * FROM viol');
	// $req->execute(array($ida));
	//$this->Cell(180,17,'FACTURE POUR SERVICE RENDU',1,0,'C');
	$this->Image('dd.PNG',5,4,190);
		$this->Ln();
		$this->Cell(50,6,'DATE DEBUT',1,0,'C');
		$this->Cell(50,6,'ETAT',1,0,'C');
		// $this->Cell(30,6,'DATE',1,0,'C');
		$this->Cell(25,6,'VICTIME',1,0,'C');
		$this->Cell(30,6,'SUSPECT',1,0,'C');
		
		$this->Cell(30,6,'AGENT',1,0,'C');

		$this->Ln();

	while ($row = $req->fetch(PDO::FETCH_OBJ)) {
		

		$this->Cell(50,8,$row->datedebut,1,0,'C');
		$this->Cell(50,8,$row->etat,1,0,'C');
		// $this->Cell(30,8,$row->datenaissance,1,0,'C');
		$this->Cell(25,8,$row->victime,1,0,'C');
		$this->Cell(30,8,$row->suspect,1,0,'C');
	
		$this->Cell(30,8,$row->agent,1,0,'C');
		$this->Ln();
		// $this->Cell(70,18,$row->username,1,0,'C');
		// $this->Cell(40,18,'Dois Pour',1,0,'C');
		// $this->Cell(20,18,$row->fin,1,0,'C');
		// $this->Cell(40,18,'$',1,0,'C');
		// $this->Ln();
		// $this->cell(20,18,'Detail',1,0,'C');
		// $this->Cell(160,18,$row->ville,1,0,'C');
		// $this->Ln();
		// $this->cell(180,18,'Singature',1,0,'C');

	}
	// Data
	// foreach($data as $row)
	// {
	// 	foreach($row as $col)
			
	// 		$this->Cell(40,6,$col,1);
	// 	$this->Ln();
	// }
}

// Better table
function ImprovedTable($data)
{
	// Column widths
	$w = array(40, 35, 40, 45);
	// Header
	// for($i=0;$i<count($header);$i++)
	// 	$this->Cell($w[$i],7,$header[$i],1,0,'C');
	// $this->Ln();
	// Data
	foreach($data as $row)
	{
		$this->Cell($w[0],6,$row[0],'LR');
		$this->Cell($w[1],6,$row[1],'LR');
		$this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
		$this->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
		$this->Ln();
	}
	// Closing line
	$this->Cell(array_sum($w),0,'','T');
}

// Colored table
function FancyTable($data)
{
	// Colors, line width and bold font
	$this->SetFillColor(255,0,0);
	$this->SetTextColor(255);
	$this->SetDrawColor(128,0,0);
	$this->SetLineWidth(.3);
	$this->SetFont('','B');
	// Header
	$w = array(40, 35, 40, 45);
	// for($i=0;$i<count($header);$i++)
	// 	$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
	// $this->Ln();
	// Color and font restoration
	$this->SetFillColor(224,235,255);
	$this->SetTextColor(0);
	$this->SetFont('');
	// Data
	$fill = false;
	foreach($data as $row)
	{
		$this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
		$this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
		$this->Cell($w[2],6,number_format($row[2]),'LR',0,'R',$fill);
		$this->Cell($w[3],6,number_format($row[3]),'LR',0,'R',$fill);
		$this->Ln();
		$fill = !$fill;
	}
	// Closing line
	$this->Cell(array_sum($w),0,'','T');
}
}

$pdf = new PDF();
// Column headings
// $header = array('Nom', 'Date', 'Date fin', '');
// Data loading
// $data = $pdf->LoadData('countries.txt');
$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->BasicTable();
// $pdf->AddPage();
// $pdf->ImprovedTable($data);
// $pdf->AddPage();
// $pdf->FancyTable($data);
$pdf->Output();
?>
