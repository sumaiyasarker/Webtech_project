<?php
session_start();

// Include the database connection and utility functions
include "../Model/db.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $username = $_POST['username'];
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $status = $_POST['status'];
    $password = $_POST['password'];

    // Check if the email is already registered
    $email = $conn->real_escape_string($email);
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        echo "<script>alert('This email is already registered.');</script>";
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert the new user into the database
        $insertSQL = "INSERT INTO users (username, f_name, l_name, email, phone, address, status, password) 
                      VALUES ('$username', '$f_name', '$l_name', '$email', '$phone', '$address', '$status', '$hashed_password')";

        if ($conn->query($insertSQL) === TRUE) {
            echo "<script>alert('Registration successful!');</script>";
            header("Location: ../view/login_user.php");
            exit();
        } else {
            echo "<script>alert('Error: " . $conn->error . "');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="../css/styles_r.css">
</head>
<body>
    <h2>Register New User</h2>
    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="f_name">First Name:</label>
        <input type="text" id="f_name" name="f_name" required><br><br>

        <label for="l_name">Last Name:</label>
        <input type="text" id="l_name" name="l_name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" required><br><br>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required><br><br>

        <label for="status">Status:</label>
        <input type="text" id="status" name="status" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit">Register</button>
    </form>
</body>
</html>
