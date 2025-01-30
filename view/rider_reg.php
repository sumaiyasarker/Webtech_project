<?php
include "../control/rider_controller.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rider Registration</title>
</head>
<body>
    <h1>Rider Registration</h1>

    <?php if (!empty($error_message)) { echo "<p style='color:red;'>$error_message</p>"; } ?>

    <form method="POST">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="phone">Phone:</label><br>
        <input type="text" id="phone" name="phone" required><br><br>

        <label for="status">Status:</label><br>
        <select id="status" name="status" required>
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
        </select><br><br>

        <label for="vehicle">Vehicle:</label><br>
        <input type="text" id="vehicle" name="vehicle" required><br><br>

        <label for="admin_id">Admin:</label><br>
        <select id="admin_id" name="admin_id" required>
        <input type="text" id="admin_id" name="admin_id" required><br><br>
            
  

        <input type="submit" name="register" value="Register">
    </form>
</body>
<script src="../js/riders.js"></script>
</html>
