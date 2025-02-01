<?php
include "../Model/db.php";

// Assuming admin_id is fetched from session or predefined logic
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add_rider'])) { // Handle Rider Addition
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $status = $_POST['status'];
        $vehicle = $_POST['vehicle'];
        $admin_id = $_POST['admin_id'];

        $error_message = "";

        // Validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error_message .= "Invalid email format.\n";
        }

        // Validate phone number
        if (!preg_match('/^[0-9]{10,15}$/', $phone)) {
            $error_message .= "Phone number must be between 10 and 15 digits.\n";
        }

        // Check if any errors occurred
        if (!empty($error_message)) {
            echo nl2br($error_message);
        } else {
            $sql = "INSERT INTO Riders (name, email, phone, status, vehicle, admin_id) 
                    VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssi", $name, $email, $phone, $status, $vehicle, $admin_id);

            if ($stmt->execute()) {
                echo "Rider added successfully.<br>";
            } else {
                echo "Error: " . $stmt->error . "<br>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rider Management</title>
    <link rel="stylesheet" href="../css/styles_rider_add.css">
</head>
<body>
    <div class="form-container">
        <h2>Add a Rider</h2>
        <form action="" method="POST">
            <label for="name">Rider Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" required>

            <label for="status">Status:</label>
            <select id="status" name="status" required>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
            </select>

            <label for="vehicle">Vehicle:</label>
            <input type="text" id="vehicle" name="vehicle" required>

            <label for="admin_id">Admin ID:</label>
            <input type="number" id="admin_id" name="admin_id" required>

            <input type="submit" name="add_rider" value="Add Rider">
        </form>
        <a href="../View/riders.php" class="back-link">Back to Riders List</a>
    </div>
</body>
</html>
