<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("SELECT resident_id, mess_type, start_date FROM mess_details WHERE mess_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();

        // Optional: change start_date to today
        $new_start = date("Y-m-d");

        $insert = $conn->prepare("INSERT INTO mess_details (resident_id, mess_type, start_date) VALUES (?, ?, ?)");
        $insert->bind_param("iss", $data['resident_id'], $data['mess_type'], $new_start);

        if ($insert->execute()) {
            header("Location: mess_details.php");
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Original record not found.";
    }
} else {
    echo "Invalid request.";
}
?>
