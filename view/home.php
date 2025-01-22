<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home Page</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="top-buttons">
        <a href="profile.php">
            <button class="profile-button">Profile</button>
        </a>
        <a href="../control/customer.php">
            <button class="registration-button">Register</button>
        </a>
    </div>

    <div class="content-container">
        <h2>Welcome to the Home Page</h2>
        <h3>Our Restaurants</h3>

        <div class="restaurants-container">
            <a href="../view/Dishes.php?restaurant=Pakistan">
                <img src="../photos/resturant1.png" alt="Pakistani Restaurant" class="restaurant-img">
            </a>
            <a href="../view/Dishes.php?restaurant=Indian">
                <img src="../photos/returant2.png" alt="Indian Restaurant" class="restaurant-img">
            </a>
            <a href="../view/Dishes.php?restaurant=Turkish">
                <img src="../photos/resturant3.png" alt="Turkish Restaurant" class="restaurant-img">
            </a>
        </div>
    </div>
</body>
</html>
