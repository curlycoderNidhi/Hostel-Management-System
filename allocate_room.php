<?php
include 'config.php';

$student_id = $_POST['student_id'];
$room_number = $_POST['room_number'];

// Step 1: Check if student or room is already allocated
$check_sql = "SELECT * FROM room_allocation WHERE student_id = ? OR room_number = ?";
$check_stmt = $conn->prepare($check_sql);
$check_stmt->bind_param("ss", $student_id, $room_number);
$check_stmt->execute();
$check_stmt->store_result();

if ($check_stmt->num_rows > 0) {
    echo "<h3>❌ Either this student is already allocated a room or this room is already taken.</h3>";
} else {
    // Step 2: Allocate room
    $sql = "INSERT INTO room_allocation (student_id, room_number) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $student_id, $room_number);

    if ($stmt->execute()) {
        echo "<h3>✅ Room allocated successfully!</h3>";
    } else {
        echo "<h3>❌ Error: " . $stmt->error . "</h3>";
    }
}

$conn->close();
?>
