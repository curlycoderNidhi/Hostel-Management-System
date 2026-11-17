<?php
include 'config.php';

$success = '';
$error = '';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $resident_id = $_POST['resident_id'];
    $mess_type = $_POST['mess_type'];
    $start_date = $_POST['start_date'];

    if (!empty($resident_id) && !empty($mess_type) && !empty($start_date)) {
        $sql = "INSERT INTO mess_details (resident_id, mess_type, start_date) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iss", $resident_id, $mess_type, $start_date);

        if ($stmt->execute()) {
            $success = "Mess details added successfully!";
        } else {
            $error = "Database error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        $error = "Please fill in all fields.";
    }
}

// Fetch mess records
$mess_result = $conn->query("SELECT * FROM mess_details ORDER BY mess_id DESC");

// ✅ Fixed line - use actual column name like full_name
$residents_result = $conn->query("SELECT resident_id, full_name FROM hostel_residents");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mess Details Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #eef2f3;
            padding: 20px;
        }

        h1 {
            background: #388e3c;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .form-container, .table-container {
            background: white;
            padding: 25px;
            border-radius: 8px;
            margin: 20px auto;
            max-width: 800px;
            box-shadow: 0 0 10px rgba(0,0,0,0.15);
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
        }

        button {
            margin-top: 15px;
            padding: 10px 15px;
            background: #388e3c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .success { color: green; margin-top: 10px; }
        .error { color: red; margin-top: 10px; }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: center;
        }

        th {
            background: #c8e6c9;
        }

        a.action-link {
            text-decoration: none;
            margin: 0 5px;
            color: #1565c0;
        }

        a.action-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<h1>Mess Details Management</h1>

<div class="form-container">
    <h2>Add Mess Entry</h2>
    <?php if ($success): ?><p class="success"><?= $success ?></p><?php endif; ?>
    <?php if ($error): ?><p class="error"><?= $error ?></p><?php endif; ?>

    <form action="" method="POST">
        <label for="resident_id">Resident:</label>
        <select name="resident_id" required>
            <option value="">-- Select Resident --</option>
            <?php while ($res = $residents_result->fetch_assoc()): ?>
                <option value="<?= $res['resident_id'] ?>">ID: <?= $res['resident_id'] ?> - <?= $res['full_name'] ?></option>
            <?php endwhile; ?>
        </select>

        <label for="mess_type">Mess Type:</label>
        <select name="mess_type" required>
            <option value="">--Select--</option>
            <option value="Veg">Veg</option>
            <option value="Non-Veg">Non-Veg</option>
        </select>

        <label for="start_date">Start Date:</label>
        <input type="date" name="start_date" required>

        <button type="submit">Submit</button>
    </form>
</div>

<div class="table-container">
    <h2>Mess Details Table</h2>
    <table>
        <tr>
            <th>Mess ID</th>
            <th>Resident ID</th>
            <th>Mess Type</th>
            <th>Start Date</th>
            <th>Actions</th>
        </tr>
        <?php if ($mess_result && $mess_result->num_rows > 0): ?>
            <?php while ($row = $mess_result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['mess_id'] ?></td>
                    <td><?= $row['resident_id'] ?></td>
                    <td><?= $row['mess_type'] ?></td>
                    <td><?= $row['start_date'] ?></td>
                    <td>
                        <a href="edit_mess.php?id=<?= $row['mess_id'] ?>" class="action-link">Edit</a>
                        <a href="copy_mess.php?id=<?= $row['mess_id'] ?>" class="action-link">Copy</a>
                        <a href="delete_mess.php?id=<?= $row['mess_id'] ?>" class="action-link" onclick="return confirm('Delete this entry?')">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="5">No records found.</td></tr>
        <?php endif; ?>
    </table>
</div>

</body>
</html>
