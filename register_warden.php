<?php
include 'config.php';

$warden_id = $_POST['warden_id'];
$name = $_POST['name'];
$email = $_POST['email'];
$department = $_POST['department'];

// Step 1: Check if warden_id or email already exists
$check_sql = "SELECT * FROM wardens WHERE warden_id = ? OR email = ?";
$check_stmt = $conn->prepare($check_sql);
$check_stmt->bind_param("ss", $warden_id, $email);
$check_stmt->execute();
$check_stmt->store_result();

if ($check_stmt->num_rows > 0) {
    echo "<h3>❌ Warden already exists with this ID or Email.</h3>";
} else {
    // Step 2: Insert new warden
    $insert_sql = "INSERT INTO wardens (warden_id, name, email, department) VALUES (?, ?, ?, ?)";
    $insert_stmt = $conn->prepare($insert_sql);
    $insert_stmt->bind_param("ssss", $warden_id, $name, $email, $department);

    if ($insert_stmt->execute()) {
        echo "<h3>✅ Warden registered successfully!</h3>";
    } else {
        echo "<h3>❌ Error: " . $insert_stmt->error . "</h3>";
    }
}

$conn->close();
?>
    