<?php
include "../Model/db.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $f_name = htmlspecialchars($_POST['f_name']);
    $l_name = htmlspecialchars($_POST['l_name']);
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];
    $phone = htmlspecialchars($_POST['phone']);
    $address = htmlspecialchars($_POST['address']);
    $delivery_address = htmlspecialchars($_POST['delivery_address']);

    $error_message = [];

  
    if (!preg_match('/^[a-zA-Z ]+$/', $f_name)) 
    {
        $error_message['f_name'] = "First name can only contain letters and spaces.";
    }

    if (!preg_match('/^[a-zA-Z ]+$/', $l_name)) 
    {
        $error_message['l_name'] = "Last name can only contain letters and spaces.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
        $error_message['email'] = "Invalid email format.";
    }

    if (strlen($password) < 6) 
    {
        $error_message['password'] = "Password must be at least 6 characters long.";
    }

    if (!preg_match('/^[0-9]{11}$/', $phone)) 
    {
        $error_message['phone'] = "Phone number must be 11 digits.";
    }

    // Check if there are validation errors
    if (!empty($error_message)) 
    {
        $_SESSION['error_message'] = $error_message;
        $_SESSION['form_data'] = $_POST; 
        header("Location: ../view/registration_form.php");
        exit();
    }

    $message = registerCustomer($f_name, $l_name, $email, $phone, $address, $delivery_address, $password);

    
    if ($message === "Registration successful") 
    {
        header("Location: ../view/login_form.php");
        exit();
    } 
    
    else 
    {
       
        $_SESSION['error_message'] = ['form_error' => $message];
        $_SESSION['form_data'] = $_POST; 
        header("Location: ../view/registration_form.php");
        exit();
    }
}

