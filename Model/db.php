<?php

// Database connection
$conn = mysqli_connect('localhost', 'root', '', 'food'); // Adjusted database name to 'food'

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Insert a new rider with admin_id as foreign key
function insertRider($admin_id, $name, $email, $phone, $status, $vehicle) {
    global $conn;

    $name = $conn->real_escape_string($name);
    $email = $conn->real_escape_string($email);
    $phone = $conn->real_escape_string($phone);
    $status = $conn->real_escape_string($status);
    $vehicle = $conn->real_escape_string($vehicle);

    $sql = "INSERT INTO riders (admin_id, name, email, phone, status, vehicle) 
            VALUES ('$admin_id', '$name', '$email', '$phone', '$status', '$vehicle')";

    if ($conn->query($sql)) {
        return "Rider inserted successfully.";
    } else {
        return "Error inserting rider: " . $conn->error;
    }
}

// Get all admins
function getAdmins() {
    global $conn;

    $sql = "SELECT * FROM admin";
    return $conn->query($sql);
}

// Get all riders with admin_id as foreign key
function getRiders() {
    global $conn;

    $sql = "SELECT r.name, r.email, r.phone, r.status, r.vehicle, a.username AS admin_username 
            FROM riders r 
            INNER JOIN admin a ON r.admin_id = a.admin_id";
    return $conn->query($sql);
}

// Close the database connection
function closeCon() {
    global $conn;
    $conn->close();
}

?>