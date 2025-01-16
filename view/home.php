<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>Home Page</title>
</head>
<body>
    <h2>Welcome to the Home Page</h2>

    <h3>Our Restaurants</h3>
    <div>
        <a href="../view/Dishes.php?restaurant=Pakistan">
            <img src="../photos/resturant1.png" alt="Pakistani Restaurant" width="200" style="margin: 10px;">
        </a>
        <a href="../view/Dishes.php?restaurant=Indian">
            <img src="../photos/returant2.png" alt="Indian Restaurant" width="200" style="margin: 10px;">
        </a>
        <a href="../view/Dishes.php?restaurant=Turkish">
            <img src="../photos/resturant3.png" alt="Turkish Restaurant" width="200" style="margin: 10px;">
        </a>
    </div>

    
    
        <a href="profile.php">
            <button>Profile</button>
        </a>
    
</body>
</html>
