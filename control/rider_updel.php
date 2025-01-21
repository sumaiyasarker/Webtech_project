<?php
include "../Model/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle Update Rider
    if (isset($_POST['update_rider'])) {
        $old_name = htmlspecialchars(trim($_POST['old_name']));
        $name = htmlspecialchars(trim($_POST['name']));
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $phone = htmlspecialchars(trim($_POST['phone']));
        $status = htmlspecialchars(trim($_POST['status']));
        $vehicle = htmlspecialchars(trim($_POST['vehicle']));
        $admin_id = isset($_POST['admin_id']) ? htmlspecialchars(trim($_POST['admin_id'])) : null;

        if (!empty($old_name)) {
            // Check if the email is already in use by another rider
            $check_sql = "SELECT * FROM Riders WHERE email = ? AND name != ?";
            $check_stmt = $conn->prepare($check_sql);
            $check_stmt->bind_param("ss", $email, $old_name);
            $check_stmt->execute();
            $check_result = $check_stmt->get_result();

            if ($check_result->num_rows > 0) {
                echo "Error: The email is already in use by another rider.<br>";
            } else {
                // Proceed with the update
                $sql_rider = "UPDATE Riders SET name = ?, email = ?, phone = ?, status = ?, vehicle = ?, admin_id = ? WHERE name = ?";
                $stmt_rider = $conn->prepare($sql_rider);
                $stmt_rider->bind_param("sssssis", $name, $email, $phone, $status, $vehicle, $admin_id, $old_name);

                if ($stmt_rider->execute()) {
                    echo "Rider updated successfully.<br>";
                } else {
                    echo "Error updating rider: " . $stmt_rider->error . "<br>";
                }
            }
        } else {
            echo "Error: Current rider name is required.<br>";
        }
    }

    // Handle Delete Rider by Name
    if (isset($_POST['delete_rider_by_name'])) {
        $name = htmlspecialchars(trim($_POST['name']));

        if (!empty($name)) {
            $sql = "DELETE FROM Riders WHERE name = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $name);

            if ($stmt->execute()) {
                echo "Rider deleted successfully.<br>";
            } else {
                echo "Error: " . $stmt->error . "<br>";
            }
        } else {
            echo "Rider name cannot be empty.<br>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update or Delete Rider</title>
</head>
<body>
    <div class="form-container">
        <!-- Update Rider Section -->
        <h2>Update a Rider</h2>
        <form action="" method="POST">
            <label for="old_name">Current Rider Name:</label>
            <input type="text" id="old_name" name="old_name" required><br><br>
            
            <label for="name">New Rider Name:</label>
            <input type="text" id="name" name="name"><br><br>
            
            <label for="email">New Email:</label>
            <input type="email" id="email" name="email"><br><br>
            
            <label for="phone">New Phone:</label>
            <input type="text" id="phone" name="phone"><br><br>
            
            <label for="status">New Status:</label>
            <select id="status" name="status">
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
            </select><br><br>
            
            <label for="vehicle">New Vehicle:</label>
            <input type="text" id="vehicle" name="vehicle"><br><br>

            <label for="admin_id">Admin ID:</label>
            <input type="number" id="admin_id" name="admin_id" required><br><br>
            
            <input type="submit" name="update_rider" value="Update Rider">
        </form>

        <!-- Delete Rider Section -->
        <h2>Delete a Rider by Name</h2>
        <form action="" method="POST">
            <label for="name">Rider Name:</label>
            <input type="text" id="name" name="name" required><br><br>
            <input type="submit" name="delete_rider_by_name" value="Delete Rider">
        </form>
    </div>

    <br>
    <a href="../View/riders.php">Back to Riders List</a>
</body>
</html>
