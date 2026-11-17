<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'config.php'; // Database connection

$student_id = $_POST['student_id'] ?? null;
$name = $_POST['name'] ?? null;
$email = $_POST['email'] ?? null;
$course = $_POST['course'] ?? null;

// Optional: Check if any field is missing
if (!$student_id || !$name || !$email || !$course) {
    die("<h3>❗ All fields are required.</h3>");
}

// Step 1: Check if email or student_id already exists
$check_sql = "SELECT * FROM students WHERE email = ? OR student_id = ?";
$check_stmt = $conn->prepare($check_sql);
$check_stmt->bind_param("ss", $email, $student_id);
$check_stmt->execute();
$check_stmt->store_result();

if ($check_stmt->num_rows > 0) {
    echo "<h3>❌ Record already exists with this Email or Student ID.</h3>";
} else {
    // Step 2: Insert into students table
    $insert_sql = "INSERT INTO students (student_id, name, email, course) VALUES (?, ?, ?, ?)";
    $insert_stmt = $conn->prepare($insert_sql);
    
    if (!$insert_stmt) {
        die("❌ Prepare failed: " . $conn->error);
    }

    $insert_stmt->bind_param("ssss", $student_id, $name, $email, $course);

    if ($insert_stmt->execute()) {
        echo "<h3>✅ Student registered successfully!</h3>";
    } else {
        echo "<h3>❌ Error inserting record: " . $insert_stmt->error . "</h3>";
    }

    $insert_stmt->close();
}

$check_stmt->close();
$conn->close();
?>
