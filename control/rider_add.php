<?php
include "../Model/db.php";

// Assuming admin_id is fetched from session or predefined logic
session_start();

<<<<<<< HEAD
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    if (isset($_POST['add_rider'])) // Handle Rider Addition
    {
=======
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add_rider'])) { // Handle Rider Addition
>>>>>>> 1ce2214 (my file)
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $status = $_POST['status'];
        $vehicle = $_POST['vehicle'];
<<<<<<< HEAD
=======
        $admin_id = $_POST['admin_id'];
>>>>>>> 1ce2214 (my file)

        $error_message = "";

        // Validate email
<<<<<<< HEAD
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
=======
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
>>>>>>> 1ce2214 (my file)
            $error_message .= "Invalid email format.\n";
        }

        // Validate phone number
<<<<<<< HEAD
        if (!preg_match('/^[0-9]{10,15}$/', $phone)) 
        {
=======
        if (!preg_match('/^[0-9]{10,15}$/', $phone)) {
>>>>>>> 1ce2214 (my file)
            $error_message .= "Phone number must be between 10 and 15 digits.\n";
        }

        // Check if any errors occurred
<<<<<<< HEAD
        if (!empty($error_message)) 
        {
            echo nl2br($error_message);
        } 
        else 
        {
=======
        if (!empty($error_message)) {
            echo nl2br($error_message);
        } else {
>>>>>>> 1ce2214 (my file)
            $sql = "INSERT INTO Riders (name, email, phone, status, vehicle, admin_id) 
                    VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssi", $name, $email, $phone, $status, $vehicle, $admin_id);

<<<<<<< HEAD
            if ($stmt->execute()) 
            {
                echo "Rider added successfully.<br>";
            } 
            else 
            {
=======
            if ($stmt->execute()) {
                echo "Rider added successfully.<br>";
            } else {
>>>>>>> 1ce2214 (my file)
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
<<<<<<< HEAD
=======
    <link rel="stylesheet" href="../css/styles_rider_add.css">
>>>>>>> 1ce2214 (my file)
</head>
<body>
    <div class="form-container">
        <h2>Add a Rider</h2>
        <form action="" method="POST">
            <label for="name">Rider Name:</label>
<<<<<<< HEAD
            <input type="text" id="name" name="name" required><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" required><br><br>
=======
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" required>
>>>>>>> 1ce2214 (my file)

            <label for="status">Status:</label>
            <select id="status" name="status" required>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
<<<<<<< HEAD
            </select><br><br>

            <label for="vehicle">Vehicle:</label>
            <input type="text" id="vehicle" name="vehicle" required><br><br>
            <label for="admin_id">Admin ID:</label>
            <input type="number" id="admin_id" name="admin_id" required><br><br>

            <input type="submit" name="add_rider" value="Add Rider">
        </form>
    </div>
    <br>
    <a href="../View/riders.php">Back to Riders List</a>

=======
            </select>

            <label for="vehicle">Vehicle:</label>
            <input type="text" id="vehicle" name="vehicle" required>

            <label for="admin_id">Admin ID:</label>
            <input type="number" id="admin_id" name="admin_id" required>

            <input type="submit" name="add_rider" value="Add Rider">
        </form>
        <a href="../View/riders.php" class="back-link">Back to Riders List</a>
    </div>
>>>>>>> 1ce2214 (my file)
</body>
</html>
