<?php
include "../Model/db.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $error_message = "";

    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $error_message .= "Invalid email format.\n";
    }

    
    if (empty($password)) 
    {
        $error_message .= "Password is required.\n";
    }

    if (!empty($error_message))
    {
        echo nl2br($error_message);
    } 
    
    else 
    {
        
        $loginResult = verifyLogin($email, $password);

        if ($loginResult['success'])
         {
            $user = $loginResult['user'];

            
            $_SESSION['email'] = $email;
            $_SESSION['id'] = $user['id'];
            
            echo "Login successful. Welcome, " . htmlspecialchars($user['f_name']) . "!";
            echo "Login successful. Welcome, " . htmlspecialchars($user['id']) . "!";
            header("Location:../view/home.php");
             exit();
        }
         else 
        {
            echo $loginResult['message'];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>Customer Login</title>
</head>
<body>
    <h2>Customer Login</h2>
    <form action="" method="POST">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
    <br><br>
    <button onclick="window.history.back();">Go Back</button>
        <input type="submit" value="Login">
    </form>
</body>
</html>
