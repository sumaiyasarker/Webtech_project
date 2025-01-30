<?php
session_start();
include "../Model/db.php"; // Include database functions

class RiderController {
    public function register() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
            $admin_id = $_POST['admin_id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $status = $_POST['status'];
            $vehicle = $_POST['vehicle'];
            $error_message = "";

            // Validate email format
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error_message .= "Invalid email format.<br>";
            }
            if (empty($name) || empty($phone) || empty($status) || empty($vehicle)) {
                $error_message .= "All fields are required.<br>";
            }

            if (!empty($error_message)) {
                return $error_message;
            }

            // Insert rider into the database
            return insertRider($admin_id, $name, $email, $phone, $status, $vehicle);
        }
        return null;
    }

    public function getAdmins() {
        return getAdmins(); // Fetch admins from the database
    }
}

// Create controller instance and call the register function
$controller = new RiderController();
$error_message = $controller->register();
$admins = $controller->getAdmins();
?>
