<?php
include "../Model/db.php";
session_start();

if (!isset($_SESSION['id']) || !isset($_SESSION['email']))
 {
    header("Location: ../view/login_form.php");
    exit();
}

$customer_id = $_SESSION['id'];
$email = $_SESSION['email'];
$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['update_password'])) 
    {
        $current_password = $_POST['current_password'];
        $new_password = $_POST['new_password'];

       
        $stored_password = getPasswordById($customer_id);

        
        error_log("Stored password hash: " . $stored_password);

        
        if (password_verify($current_password, $stored_password)) 
        {
            
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            if (updatePasswordById($customer_id, $hashed_password)) 
            {
                session_destroy();
                header("Location: ../view/login_form.php?message=Password updated successfully.");
                exit();
            } 
            else 
            {
                $message = "Failed to update password. Please try again.";
            }
        } 
        else 
        {
            $message = "Current password is incorrect.";
        }
    } 
    elseif (isset($_POST['delete_account']))
     {
        
        if (deleteProfileById($customer_id))
         {
            session_destroy();
            header("Refresh: 2; URL=../view/login_form.php?message=Profile deleted successfully.");
            exit();
        } 
        else
         {
            $message = "Failed to delete account. Please try again.";
        }
    }
}

// Retrieve customer name for the profile page
$customer_name = profile($email);

