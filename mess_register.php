<?php
include 'config.php';

// Get today's day (e.g., Monday)
$today = date('l');

// Fetch menu for today
$sql = "SELECT * FROM mess_menu WHERE day_of_week = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $today);
$stmt->execute();
$result = $stmt->get_result();

$menu = [];
while ($row = $result->fetch_assoc()) {
    $menu[] = $row;
}
$stmt->close();
?>
