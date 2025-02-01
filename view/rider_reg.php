<?php
include "../Model/db.php";
session_start();
 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $phone = trim($_POST['phone']);
    $status = $_POST['status'];
    $vehicle = trim($_POST['vehicle']);
    $admin_id = $_POST['admin_id'];
 
    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
 
    // Insert the new rider into the database
    $query = "INSERT INTO riders (name, email, password, phone, status, vehicle, admin_id) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssssi", $name, $email, $hashed_password, $phone, $status, $vehicle, $admin_id);
    if ($stmt->execute()) {
        echo "<script>alert('Registration successful. You can now log in.'); window.location.href='../view/rider_login.php';</script>";
    } else {
        echo "<script>alert('Error during registration. Please try again.');</script>";
    }
    $stmt->close();
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Rider Registration</title>
<link rel="stylesheet" href="../css/styles_rider.css">
</head>
<body>
<div class="container">
<h1>Rider Registration</h1>
<form id="riderForm" method="POST" onsubmit="return validateRiderForm()">
<div class="form-group">
<label for="name">Name:</label>
<input type="text" id="name" name="name">
<span class="error-message" id="nameError"></span>
</div>
 
        <div class="form-group">
<label for="email">Email:</label>
<input type="text" id="email" name="email">
<span class="error-message" id="emailError"></span>
</div>
 
        <div class="form-group">
<label for="password">Password:</label>
<input type="password" id="password" name="password">
<span class="error-message" id="passwordError"></span>
</div>
 
        <div class="form-group">
<label for="phone">Phone:</label>
<input type="text" id="phone" name="phone">
<span class="error-message" id="phoneError"></span>
</div>
 
        <div class="form-group">
<label for="status">Status:</label>
<select id="status" name="status">
<option value="">Select Status</option>
<option value="Active">Active</option>
<option value="Inactive">Inactive</option>
</select>
<span class="error-message" id="statusError"></span>
</div>
 
        <div class="form-group">
<label for="vehicle">Vehicle:</label>
<input type="text" id="vehicle" name="vehicle">
<span class="error-message" id="vehicleError"></span>
</div>
 
        <div class="form-group">
<label for="admin_id">Admin ID:</label>
<input type="text" id="admin_id" name="admin_id">
<span class="error-message" id="adminError"></span>
</div>
 
        <input type="submit" name="register" value="Register">
</form>
<p>Have an account? <a href="../view/rider_login.php">Login here</a></p>
</div>
 
<script src="../js/rider_form_validation.js"></script>
</body>
</html>

