<?php
include "../Model/db.php"; 

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

    
    if (!preg_match('/^[a-zA-Z ]+$/', $f_name)) 
    {
        $error_message .= "First name can only contain letters and spaces.\n";
    }

   
    if (!preg_match('/^[a-zA-Z ]+$/', $l_name)) 
    {
        $error_message .= "Last name can only contain letters and spaces.\n";
    }

   
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
        $error_message .= "Invalid email format.\n";
    }

    
    if (strlen($password) < 6) 
    {
        $error_message .= "Password must be at least 6 characters long.\n";
    }

    
    if (!preg_match('/^[0-9]{11}$/', $phone))
    {
        $error_message .= "Phone number must be 11 digits.\n";
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
            
            header("Location: ../view/login_form.php");
            exit();
        }
    }
}
?>
