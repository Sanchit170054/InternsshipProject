<?php 
require_once 'FPDF/fpdf.php';
include('databseConnection.php'); 

if(isset($_POST['pdf']))
{
	
$query = "SELECT * FROM userdata";
$data = mysqli_query($connect, $query);

	$pdf = new FPDF('p', 'mm', 'A3');
	$pdf->SetFont('arial', 'U', '18');
	
	$pdf->AddPage();
	$pdf->Image('post.jpg',20,15,23);
	$pdf->cell(270,30,"MMVC User's Report",10,1,'C');
	$pdf->cell('45', '20', 'User Name', '1', '0', 'C');
	$pdf->cell('45', '20', 'User ID', '1', '0', 'C');
	$pdf->cell('65', '20', 'Email', '1', '0', 'C');
	$pdf->cell('45', '20', 'Mob. Number', '1', '0', 'C');
	$pdf->cell('45', '20', 'Department', '1', '0', 'C');
	$pdf->cell('35', '20', 'Role', '1', '1', 'C');
	$pdf->Ln(4);
	
	while($row = mysqli_fetch_assoc($data))
	{
		$pdf->SetFont('arial', '', '10');
		$pdf->cell('45', '20', $row['userName'], '1', '0', 'C');
		$pdf->cell('45', '20', $row['userID'], '1', '0', 'C');
		$pdf->cell('65', '20', $row['Email'], '1', '0', 'C');
		$pdf->cell('45', '20', $row['phoneNumber'], '1', '0', 'C');
		$pdf->cell('45', '20', $row['department'], '1', '0', 'C');
		$pdf->cell('35', '20', $row['role'], '1', '1', 'C');
	
	}
	$pdf->Output();
	
	
}

if(isset($_POST['postPdf']))
{
	
$query = "SELECT * FROM post";
$data = mysqli_query($connect, $query);

	$pdf = new FPDF('p', 'mm', 'A3');
	$pdf->SetFont('arial', 'U', '18');
	
	$pdf->AddPage();
	$pdf->Image('post.jpg',20,15,23);
	$pdf->cell(270,30,"MMVC User's Post Report",10,1,'C');
	$pdf->cell('65', '20', 'Title', '1', '0', 'C');
	$pdf->cell('65', '20', 'Description', '1', '0', 'C');
	$pdf->cell('45', '20', 'Category', '1', '0', 'C');
	$pdf->cell('45', '20', 'Owner Name', '1', '0', 'C');
	$pdf->cell('45', '20', 'Owner ID', '1', '1', 'C');
	$pdf->Ln(4);
	
	while($row = mysqli_fetch_assoc($data))
	{
		$pdf->SetFont('arial', '', '10');
		$pdf->cell('65', '20', $row['tittle'], '1', '0', 'C');
		$pdf->cell('65', '20', $row['description'], '1', '0', 'C');
		$pdf->cell('45', '20', $row['category'], '1', '0', 'C');
		$pdf->cell('45', '20', $row['username'], '1', '0', 'C');
		$pdf->cell('45', '20', $row['userID'], '1', '1', 'C');
		
	}
	$pdf->Output();
	
	
}

?>