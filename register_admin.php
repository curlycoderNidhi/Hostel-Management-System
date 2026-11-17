<?php
include 'config.php';

// Get form input values safely
$admin_id = $_POST['admin_id'] ?? '';
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$password_raw = $_POST['password'] ?? '';

// Check if any field is missing
if (empty($admin_id) || empty($name) || empty($email) || empty($password_raw)) {
    echo "<h3>❌ All fields are required.</h3>";
    exit;
}

// Secure the password
$password = password_hash($password_raw, PASSWORD_DEFAULT);

// Step 1: Check if admin_id or email already exists
$check_sql = "SELECT * FROM admins WHERE admin_id = ? OR email = ?";
$check_stmt = $conn->prepare($check_sql);

if (!$check_stmt) {
    echo "<h3>❌ Prepare failed: " . $conn->error . "</h3>";
    exit;
}

$check_stmt->bind_param("ss", $admin_id, $email);
$check_stmt->execute();
$check_stmt->store_result();

if ($check_stmt->num_rows > 0) {
    echo "<h3>❌ Admin already exists with this ID or Email.</h3>";
} else {
    // Step 2: Insert new admin
    $insert_sql = "INSERT INTO admins (admin_id, username, email, password) VALUES (?, ?, ?, ?)";
    $insert_stmt = $conn->prepare($insert_sql);

    if (!$insert_stmt) {
        echo "<h3>❌ Prepare failed: " . $conn->error . "</h3>";
        exit;
    }

    $insert_stmt->bind_param("ssss", $admin_id, $name, $email, $password);

    if ($insert_stmt->execute()) {
        echo "<h3>✅ Admin registered successfully!</h3>";
    } else {
        echo "<h3>❌ Error: " . $insert_stmt->error . "</h3>";
    }
}

$conn->close();
?>
