<?php
include 'config.php';

$student_id = $_POST['student_id'];
$branch = $_POST['branch'];
$sub_branch = $_POST['sub_branch'];
$term = $_POST['term'];
$semester = $_POST['semester'];
$amount = $_POST['amount'];
$payment_date = $_POST['payment_date'];
$status = $_POST['status'];

// Validation
if ($student_id == "" || $branch == "" || $term == "" || $semester == "" || $amount == "" || $payment_date == "" || $status == "") {
    echo "All fields are required!";
    exit;
}

$sql = "INSERT INTO fee_payments (student_id, branch, sub_branch, term, semester, amount, payment_date, status)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssss", $student_id, $branch, $sub_branch, $term, $semester, $amount, $payment_date, $status);

if ($stmt->execute()) {
    if ($status === "Paid") {
        // Redirect to PDF generation with student_id
        header("Location: generate_pdf.php?student_id=" . urlencode($student_id));
        exit();
    } else {
        echo "Fee submitted with status: $status";
    }
} else {
    echo "Error: " . $stmt->error;
}

$conn->close();
?>
