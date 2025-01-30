<?php
include "../control/rider_controller.php";  // Corrected path
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rider Login</title>
</head>
<body>
    <h1>Rider Login</h1>

    <?php if (!empty($error_message)) { echo "<p style='color:red;'>$error_message</p>"; } ?>

    <form method="POST">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" name="login" value="Login">
        <a href="../View/riders.php"></a>
    </form>
</body>
</html>
