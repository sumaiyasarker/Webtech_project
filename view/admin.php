<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: index.php");
    exit;
}

$username = $_SESSION['admin_username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/styles_page.css">
</head>
<body>

<div class="container">
    <h1>Welcome, <?php echo htmlspecialchars($username); ?>!</h1>
    <p>You have successfully logged in.</p>

    <div class="button-container">
        <a href="riders.php"><button class="btn">View Riders</button></a>
        <a href="restaurant.php"><button class="btn">View Restaurants</button></a>
        <a href="../control/admin_user.php"><button class="btn">View Users</button></a>
    </div>
</div>

</body>
</html>
