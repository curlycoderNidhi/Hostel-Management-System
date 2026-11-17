    <?php
include 'config.php';

$branch = $_GET['branch'] ?? '';
$term = $_GET['term'] ?? '';

$sql = "SELECT * FROM fees WHERE 1=1";
if ($branch) $sql .= " AND branch = '$branch'";
if ($term) $sql .= " AND term = '$term'";

$result = $conn->query($sql);
echo "<table border='1'>
<tr><th>Student ID</th><th>Branch</th><th>Sub-Branch</th><th>Term</th><th>Semester</th><th>Amount</th><th>Payment Date</th><th>Status</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>{$row['student_id']}</td>
        <td>{$row['branch']}</td>
        <td>{$row['sub_branch']}</td>
        <td>{$row['term']}</td>
        <td>{$row['semester']}</td>
        <td>Rs. {$row['amount']}</td>
        <td>{$row['payment_date']}</td>
        <td>{$row['status']}</td>
    </tr>";
}
echo "</table>";
?>
