<?php
include "../Model/db.php"; // Move up one directory

echo "db.php included successfully.";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $delivery_address = $_POST['delivery_address'];

    $error_message = "";

    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) //email validation
    {

        $error_message .= "Invalid email format.\n";
    }

    if (strlen($password) < 6) 
    {
        $error_message .= "Password must be at least 6 characters long.\n";
    }

    if (!preg_match('/^[0-9]{11}$/', $phone))
    {
        $error_message .= "Phone number must be 10 digits.\n";
    }

    
    if (!empty($error_message)) 
    {
        echo nl2br($error_message);
    } 
    else
     {
        
        $message = registerCustomer($f_name, $l_name, $email, $phone, $address, $delivery_address, $password);
        echo $message;

        
        if ($message === "Registration successful")
         {
            header("Location:login.php");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Customer Registration</title>
</head>
<body>
    <h2>Customer Registration</h2>
    <form action="" method="POST">
        <label for="f_name">First Name:</label>
        <input type="text" id="f_name" name="f_name" required><br><br>

        <label for="l_name">Last Name:</label>
        <input type="text" id="l_name" name="l_name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" required><br><br>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required><br><br>

        <label for="delivery_address">Delivery Address:</label>
        <input type="text" id="delivery_address" name="delivery_address" required><br><br>

        <input type="submit" value="Register">
    </form>
</body>
</html>
