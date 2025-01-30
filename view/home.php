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
        <a href="profile_settings.php">
            <button class="profile-button">Profile</button>
        </a>
        <!-- Dropdown for Register using <select> -->
        <form action="../control/register_redirect.php" method="get">
            <label for="role">Choose your role:</label>
            <select name="role" id="role">
                <option value="customer">Customer</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
                <option value="rider">Rider</option> 
            </select>
            <button type="submit" class="registration-button">Register</button>
        </form>
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

