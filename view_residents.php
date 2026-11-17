<?php
include 'config.php'; // Make sure this connects to your DB

$result = $conn->query("SELECT * FROM hostel_residents");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hostel Residents List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f7;
            padding: 20px;
        }

        h1 {
            text-align: center;
            background: #2e86c1;
            color: white;
            padding: 15px;
            border-radius: 8px;
        }

        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ccc;
        }

        th {
            background: #d4e6f1;
        }

        tr:hover {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h1>Hostel Residents</h1>

<table>
    <tr>
        <th>Resident ID</th>
        <th>Name</th>
        <th>Gender</th>
        <th>Room No</th>
        <th>Contact</th>
        <th>Email</th>
    </tr>

    <?php if ($result && $result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['resident_id'] ?></td>
                <td><?= $row['full_name'] ?></td> <!-- change this if your column is "name" -->
                <td><?= $row['gender'] ?? '-' ?></td>
                <td><?= $row['room_no'] ?? '-' ?></td>
                <td><?= $row['contact'] ?? '-' ?></td>
                <td><?= $row['email'] ?? '-' ?></td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr><td colspan="6">No residents found.</td></tr>
    <?php endif; ?>
</table>

</body>
</html>
