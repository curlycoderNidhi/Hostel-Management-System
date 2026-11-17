<?php
include 'config.php'; // Your DB connection

$mess_type = $_GET['mess_type'] ?? '';

if (!$mess_type) {
    echo "<p>No mess type selected.</p>";
    exit;
}

$sql = "SELECT day_of_week, meal, time_slot, items FROM mess_menu 
        WHERE mess_type = ? 
        ORDER BY 
            FIELD(day_of_week, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'),
            FIELD(meal, 'Breakfast', 'Lunch', 'Snacks', 'Dinner')";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $mess_type);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<h3>" . htmlspecialchars($mess_type) . " Menu</h3>";
    echo "<table border='1' cellpadding='8' cellspacing='0' style='width:100%; border-collapse: collapse;'>";
    echo "<tr><th>Day</th><th>Meal</th><th>Time</th><th>Items</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['day_of_week']}</td>
                <td>{$row['meal']}</td>
                <td>{$row['time_slot']}</td>
                <td>{$row['items']}</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "<p>No menu found for this mess type.</p>";
}
?>
