<?php
include 'config.php';

$id = $_GET['id'] ?? 0;
$success = '';
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mess_type = $_POST['mess_type'];
    $start_date = $_POST['start_date'];

    $sql = "UPDATE mess_details SET mess_type = ?, start_date = ? WHERE mess_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $mess_type, $start_date, $id);

    if ($stmt->execute()) {
        $success = "Mess details updated.";
    } else {
        $error = "Update failed: " . $stmt->error;
    }
    $stmt->close();
}

// Fetch existing
$stmt = $conn->prepare("SELECT * FROM mess_details WHERE mess_id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();
?>

<form method="POST">
    <h2>Edit Mess Entry</h2>
    Mess Type:
    <select name="mess_type">
        <option value="Veg" <?= $data['mess_type'] == 'Veg' ? 'selected' : '' ?>>Veg</option>
        <option value="Non-Veg" <?= $data['mess_type'] == 'Non-Veg' ? 'selected' : '' ?>>Non-Veg</option>
    </select><br><br>
    Start Date:
    <input type="date" name="start_date" value="<?= $data['start_date'] ?>"><br><br>
    <button type="submit">Update</button>
    <p style="color:green"><?= $success ?></p>
    <p style="color:red"><?= $error ?></p>
</form>
