<?php
include "../Model/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    // Handle Update Restaurant and Category
    if (isset($_POST['update_restaurant_category'])) {
        $old_title = $_POST['old_title'];
        $title = $_POST['title'];
        $o_hr = $_POST['o_hr'];
        $c_hr = $_POST['c_hr'];
        $o_days = $_POST['o_days'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        
        $old_c_name = $_POST['old_c_name'];
        $new_c_name = $_POST['new_c_name'];
    
        // Update Restaurant
        if (!empty($old_title)) {
            $sql_restaurant = "UPDATE Restaurants SET title = ?, o_hr = ?, c_hr = ?, o_days = ?, phone = ?, email = ?, address = ? WHERE title = ?";
            $stmt_restaurant = $conn->prepare($sql_restaurant);
            $stmt_restaurant->bind_param("ssssssss", $title, $o_hr, $c_hr, $o_days, $phone, $email, $address, $old_title);

            if (!$stmt_restaurant->execute()) {
                echo "Error updating restaurant: " . $stmt_restaurant->error . "<br>";
            }
        }

        // Update Category
        if (!empty($old_c_name) && !empty($new_c_name)) {
            $sql_category = "UPDATE Category SET c_name = ? WHERE c_name = ?";
            $stmt_category = $conn->prepare($sql_category);
            $stmt_category->bind_param("ss", $new_c_name, $old_c_name);

            if ($stmt_category->execute()) {
                echo "Category updated successfully.<br>";
            } else {
                echo "Error updating category: " . $stmt_category->error . "<br>";
            }
        }

        echo "Restaurant and Category updated successfully.<br>";
    }

    // Handle Delete Restaurant by Name
    if (isset($_POST['delete_restaurant_by_name'])) 
    {
        $title = $_POST['title'];

        if (!empty($title)) 
        {
            $sql = "DELETE FROM Restaurants WHERE title = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $title);

            if ($stmt->execute()) 
            {
                echo "Restaurant deleted successfully.<br>";
            } 
            else 
            {
                echo "Error: " . $stmt->error . "<br>";
            }
        } 
        else 
        {
            echo "Restaurant name cannot be empty.<br>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Restaurant and Category</title>
</head>
<body>
    <h2>Update a Restaurant and Category</h2>
    <form action="" method="POST">
        <!-- Restaurant Update -->
        <h3>Update Restaurant</h3>
        <label for="old_title">Current Restaurant Title:</label>
        <input type="text" id="old_title" name="old_title" required><br><br>
        <label for="title">New Restaurant Title:</label>
        <input type="text" id="title" name="title"><br><br>
        <label for="o_hr">New Opening Hour:</label>
        <input type="time" id="o_hr" name="o_hr"><br><br>
        <label for="c_hr">New Closing Hour:</label>
        <input type="time" id="c_hr" name="c_hr"><br><br>
        <label for="o_days">New Operating Days:</label>
        <input type="text" id="o_days" name="o_days" placeholder="e.g., Mon-Sun"><br><br>
        <label for="phone">New Phone:</label>
        <input type="text" id="phone" name="phone"><br><br>
        <label for="email">New Email:</label>
        <input type="email" id="email" name="email"><br><br>
        <label for="address">New Address:</label>
        <input type="text" id="address" name="address"><br><br>

        <!-- Category Update -->
        <h3>Update Category</h3>
        <label for="old_c_name">Current Category Name:</label>
        <input type="text" id="old_c_name" name="old_c_name" required><br><br>
        <label for="new_c_name">New Category Name:</label>
        <input type="text" id="new_c_name" name="new_c_name"><br><br>

        <input type="submit" name="update_restaurant_category" value="Update Restaurant and Category">
    </form>

    <h2>Delete a Restaurant by Name</h2>
    <form action="" method="POST">
        <label for="title">Restaurant Name:</label>
        <input type="text" id="title" name="title" required><br><br>
        <input type="submit" name="delete_restaurant_by_name" value="Delete Restaurant">
    </form>
    <br>
    <a href="../View/restaurant.php">Back to Restaurant List</a>
</body>
</html>
