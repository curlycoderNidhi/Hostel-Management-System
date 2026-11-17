<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM mess_details WHERE mess_id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: mess_details.php");
    } else {
        echo "Delete failed: " . $conn->error;
    }
}
?>
