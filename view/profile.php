<?php
include "../Model/db.php";

session_start();

if (!isset($_SESSION['id']) || !isset($_SESSION['email']))
 {
    header("Location: login.php");
    exit();
}

$customer_id = $_SESSION['id'];
$email = $_SESSION['email'];

if ($_SERVER['REQUEST_METHOD'] == 'POST')
 {
    if (isset($_POST['update_password'])) 
    {
        $current_password = $_POST['current_password'];
        $new_password = $_POST['new_password'];

        $stored_password = getPasswordById($customer_id);

        if (password_verify($current_password, $stored_password))
         {
            if (updatePasswordById($customer_id, $new_password)) 
            {
                session_destroy();
                header("Location:../control/login.php?message=Password updated successfully.");
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
            echo "<script>alert('Profile deleted successfully. Redirecting to login page.');</script>";
            header("Refresh: 2; URL=../control/login.php");
            exit();
        } 
        else {
            $message = "Failed to delete account. Please try again.";
        }
    }
}

$customer_name = profile($email);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Settings</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="form-container">
        <h2>Welcome, <?php echo htmlspecialchars($customer_name); ?>!</h2>
        <br>
        <p>ID: <?php echo htmlspecialchars($customer_id); ?></p>
        <p>Email: <?php echo htmlspecialchars($email); ?></p>
        <br>
        <?php if (isset($message)) { echo "<p class='error-message'>$message</p>"; } ?>

        <h3>Change Password</h3>
        <form method="POST">
            <label for="current_password">Current Password:</label>
            <input type="password" id="current_password" name="current_password" required><br><br>

            <label for="new_password">New Password:</label>
            <input type="password" id="new_password" name="new_password" required><br><br>

            <button type="submit" name="update_password">Update Password</button>
        </form>

        <h3>Delete Account</h3>
        <form method="POST" onsubmit="return confirm('Warning: This action cannot be undone. Are you sure you want to delete your account?');">
            <button type="submit" name="delete_account" class="delete-button">Delete Account</button>
        </form>

        <br>
        <button onclick="window.location.href='home.php';" class="back-button">Back to Home</button>
    </div>
</body>
</html>
