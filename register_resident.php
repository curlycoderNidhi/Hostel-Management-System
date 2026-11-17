<?php
include 'db_connect.php';

// Upload image
$image = $_FILES['image'];
$imageName = time() . "_" . basename($image['name']);
$targetDir = "uploads/";
$targetFile = $targetDir . $imageName;

move_uploaded_file($image['tmp_name'], $targetFile);

// Form inputs
$full_name = $_POST['full_name'];
$gender = $_POST['gender'];
$course = $_POST['course_name'];
$year = $_POST['academic_year'];
$contact = $_POST['contact_number'];
$room_no = $_POST['room_number'];
$mess_type = $_POST['mess_type'];
$incident = $_POST['incident'];
$today = date("Y-m-d");

// Insert resident
$sql1 = "INSERT INTO hostel_residents (full_name, gender, course_name, academic_year, contact_number, image_path)
         VALUES ('$full_name', '$gender', '$course', $year, '$contact', '$targetFile')";
$conn->query($sql1);
$resident_id = $conn->insert_id;

// Insert or update room
$room_check = $conn->query("SELECT * FROM hostel_rooms WHERE room_number = $room_no");
if ($room_check->num_rows > 0) {
    $conn->query("UPDATE hostel_rooms SET occupancy = occupancy + 1 WHERE room_number = $room_no");
    $room_row = $room_check->fetch_assoc();
    $room_id = $room_row['room_id'];
} else {
    $conn->query("INSERT INTO hostel_rooms (room_number, capacity, occupancy) VALUES ($room_no, 2, 1)");
    $room_id = $conn->insert_id;
}

// Allocate room
$conn->query("INSERT INTO room_allocations (resident_id, room_id, allocation_date)
              VALUES ($resident_id, $room_id, '$today')");

// Add mess details
$conn->query("INSERT INTO mess_details (resident_id, mess_type, start_date)
              VALUES ($resident_id, '$mess_type', '$today')");

// Insert safety log if provided
if (!empty($incident)) {
    $conn->query("INSERT INTO safety_logs (resident_id, incident, incident_date)
                  VALUES ($resident_id, '$incident', '$today')");
}

echo "Resident registered successfully!";
$conn->close();
?>
