<?php
include "../Model/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    if (isset($_POST['add_category'])) // Handle Category Addition
    {
        $c_name = $_POST['c_name'];

        if (!empty($c_name)) 
        {
            $sql = "INSERT INTO Category (c_name) VALUES (?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $c_name);

            if ($stmt->execute()) 
            {
                echo "Category added successfully.<br>";
            } 
            else 
            {
                echo "Error: " . $stmt->error . "<br>";
            }
        } 
        else 
        {
            echo "Category name cannot be empty.<br>";
        }
    } 
    elseif (isset($_POST['register_restaurant'])) // Handle Restaurant Registration
    {
        $category_id = $_POST['category_id'];
        $title = $_POST['title'];
        $o_hr = $_POST['o_hr'];
        $c_hr = $_POST['c_hr'];
        $o_days = $_POST['o_days'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];

        $error_message = "";

        // Validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
            $error_message .= "Invalid email format.\n";
        }

        // Validate phone number
        if (!preg_match('/^[0-9]{10,15}$/', $phone)) 
        {
            $error_message .= "Phone number must be between 10 and 15 digits.\n";
        }

        // Check if any errors occurred
        if (!empty($error_message)) 
        {
            echo nl2br($error_message);
        } 
        else 
        {
            $sql = "INSERT INTO Restaurants (category_id, title, o_hr, c_hr, o_days, phone, email, address) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("isssssss", $category_id, $title, $o_hr, $c_hr, $o_days, $phone, $email, $address);

            if ($stmt->execute()) 
            {
                echo "Restaurant registered successfully.<br>";
            } 
            else 
            {
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
    <title>Category and Restaurant Management</title>
</head>
<body>
    <div class="form-container">
        <h2>Manage Categories</h2>
        <form action="" method="POST">
            <label for="c_name">Category Name:</label>
            <input type="text" id="c_name" name="c_name" required><br><br>
            <input type="submit" name="add_category" value="Add Category">
        </form>
        
        <h2>Register a Restaurant</h2>
        <form action="" method="POST">
            <label for="category_id">Category:</label>
            <select id="category_id" name="category_id" required>
                <?php
                $result = $conn->query("SELECT c_id, c_name FROM Category");
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['c_id'] . "'>" . $row['c_name'] . "</option>";
                }
                ?>
            </select><br><br>

            <label for="title">Restaurant Title:</label>
            <input type="text" id="title" name="title" required><br><br>

            <label for="o_hr">Opening Hour:</label>
            <input type="time" id="o_hr" name="o_hr" required><br><br>

            <label for="c_hr">Closing Hour:</label>
            <input type="time" id="c_hr" name="c_hr" required><br><br>

            <label for="o_days">Operating Days:</label>
            <input type="text" id="o_days" name="o_days" placeholder="e.g., Mon-Sun" required><br><br>

            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" required><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required><br><br>

            <input type="submit" name="register_restaurant" value="Register Restaurant">
        </form>
        
        
    </div>
    <br>
    <a href="../View/restaurant.php">Back to Restaurant List</a>
    <script src="../JS/addRestaurant.js"></script>

</body>
</html>
