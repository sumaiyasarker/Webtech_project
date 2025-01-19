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
        echo $error_message;
    } 
    
    else 
    {
        $loginResult = verifyLogin($email, $password);

        if ($loginResult['success'])
         {
            $user = $loginResult['user'];

            $_SESSION['email'] = $email;
            $_SESSION['id'] = $user['id'];

            $success_message = "<div class='message success'>Login successful. Welcome, " . htmlspecialchars($user['f_name']) . "!</div>";
            echo $success_message;
            header("Location:../view/home.php");
            exit();
        }
         else 
        {
            $error_message = "<div class='message error'>" . $loginResult['message'] . "</div>";
           // echo $error_message;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Login</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="form-container">
        <h2>Customer Login</h2>
        <form action="" method="POST">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>

            <!-- Error message for password will be placed here -->
            <?php if (!empty($error_message)) echo $error_message; ?>

            <div>
                <input type="submit" value="Login">
                <button type="button" onclick="window.history.back();">Go Back</button>
            </div>
        </form>
    </div>
</body>
</html>
