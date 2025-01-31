<?php
include "../Model/db.php"; 
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $error_message = "";
    $success_message = "";

    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
        $error_message .= "<div class='message error'>Invalid email format.</div>";
    }

   
    if (empty($password)) 
    {
        $error_message .= "<div class='message error'>Password is required.</div>";
    }

    
    if (!empty($error_message)) 
    {
        $_SESSION['error_message'] = $error_message;  
        header("Location: ../view/login_form.php");  
        exit();
    } 
    else 
    {
       
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
           
            $_SESSION['error_message'] = "<div class='message error'>" . $loginResult['message'] . "</div>";
            header("Location: ../view/login_form.php");
            exit();
        }
    }
}
?>
