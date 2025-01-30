<?php
include "../Model/db.php"; // Database connection
session_start(); // Start session to access admin_id

// Check if the form is submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data from POST request
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $status = $_POST['status'];
    $vehicle = $_POST['vehicle'];
    $admin_id = $_POST['admin_id']; // Assuming admin_id is coming from the form (or session)

    $response = [];

    // Validate input
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response['success'] = false;
        $response['message'] = 'Invalid email format.';
    } elseif (!preg_match('/^[0-9]{10,15}$/', $phone)) {
        $response['success'] = false;
        $response['message'] = 'Phone number must be between 10 and 15 digits.';
    } else {
        // Prepare SQL query to insert new rider
        $query = "INSERT INTO Riders (name, email, phone, status, vehicle, admin_id) 
                  VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssssi", $name, $email, $phone, $status, $vehicle, $admin_id);

        if ($stmt->execute()) {
            $response['success'] = true;
            $response['message'] = 'Rider added successfully.';
        } else {
            $response['success'] = false;
            $response['message'] = 'Error inserting rider: ' . $stmt->error;
        }
    }

    // Return response as JSON
    echo json_encode($response);
}
?>
