<?php
session_start();
include "../Model/db.php"; // Include database connection and helper functions

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Validate credentials by calling verifyLogin from db.php
    $loginResult = verifyUserLogin($email, $password);

    if ($loginResult['success']) {
        // Store user info in session
        $_SESSION['id'] = $loginResult['user']['u_id'];
        $_SESSION['username'] = $loginResult['user']['username'];
        $_SESSION['email'] = $email;

        // Redirect to user_cus.php
        echo "<script>
            alert('Login successful! Redirecting to your dashboard.');
            window.location.href = 'user_cus.php';
        </script>";
        exit();
    } else {
        // Show an error message in a popup
        $message = htmlspecialchars($loginResult['message']);
        echo "<script>
            alert('Login failed: $message');
            window.location.href = '../view/login.php';
        </script>";
        exit();
    }
} else {
    // If accessed directly, redirect to the login page
    header("Location: ../view/login.php");
    exit();
}
?>
