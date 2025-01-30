<?php
include "../Model/db.php"; 
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $error_message = "";
    $success_message = "";

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
        $error_message .= "<div class='message error'>Invalid email format.</div>";
    }

    // Check if password is empty
    if (empty($password)) 
    {
        $error_message .= "<div class='message error'>Password is required.</div>";
    }

    // If there are any error messages, store them in session and redirect back to the form
    if (!empty($error_message)) 
    {
        $_SESSION['error_message'] = $error_message;  // Store error message in session
        header("Location: ../view/login_form.php");  // Redirect back to login form
        exit();
    } 
    else 
    {
        // Verify login credentials (Assume verifyLogin() is a function to check the login)
        $loginResult = verifyLogin($email, $password);

        if ($loginResult['success']) 
        {
            $user = $loginResult['user'];

            $_SESSION['email'] = $email;
            $_SESSION['id'] = $user['id'];

            header("Location: ../view/home.php");
            exit();
        } 
        else 
        {
            // If login fails, store the error message and redirect back to login form
            $_SESSION['error_message'] = "<div class='message error'>" . $loginResult['message'] . "</div>";
            header("Location: ../view/login_form.php");
            exit();
        }
    }
}
?>

