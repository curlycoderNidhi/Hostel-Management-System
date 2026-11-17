<?php
require('fpdf182/fpdf.php');
include 'config.php';

$student_id = $_GET['student_id'] ?? '';

if (!$student_id) {
    die("Invalid student ID.");
}

// Fetch the latest payment record for the student
$sql = "SELECT * FROM fee_payments WHERE student_id = ? ORDER BY id DESC LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $student_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!$row) {
    die("No record found for this student.");
}

// Create a new PDF document
class PDF extends FPDF {
    function Header() {
        $this->Image('scet_logo.png', 10, 6, 84); // (file, x, y, width)
        $this->SetFont('Arial','B',16);
        $this->Cell(0,10,' Fee Receipt',0,1,'C');
        $this->Ln(5);
        $this->SetFont('Arial','',12);
        $this->Cell(0,10,'Generated on: ' . date("d-m-Y H:i:s"), 0, 1, 'C');
        $this->Ln(10);
    }

    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial','I',10);
        $this->Cell(0,10,'Page ' . $this->PageNo(), 0, 0, 'C');
    }
}

// Initialize and write to PDF
$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);

// Receipt Data
$pdf->Cell(0,10,'Student ID: ' . $row['student_id'], 0, 1);
$pdf->Cell(0,10,'Branch: ' . $row['branch'], 0, 1);
$pdf->Cell(0,10,'Sub-Branch: ' . $row['sub_branch'], 0, 1);
$pdf->Cell(0,10,'Term: ' . $row['term'], 0, 1);
$pdf->Cell(0,10,'Semester: ' . $row['semester'], 0, 1);
$pdf->Cell(0,10,'Amount Paid: Rs. ' . number_format($row['amount']), 0, 1);
$pdf->Cell(0,10,'Payment Date: ' . $row['payment_date'], 0, 1);
$pdf->Cell(0,10,'Status: ' . ucfirst($row['status']), 0, 1);

// Output the PDF directly in browser
$pdf->Output('I', 'Fee_Receipt_' . $student_id . '.pdf');
?>
