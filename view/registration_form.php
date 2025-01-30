<?php
session_start();

if (isset($_SESSION['error_message'])) 
{
    $error_message = $_SESSION['error_message']; 
} 
else
{
    $error_message = []; 
}

if (isset($_SESSION['form_data']))
{
    $form_data = $_SESSION['form_data']; 
} 
else 
{
    $form_data = []; 
}

session_unset();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="form-container">
        <h2>Customer Registration</h2>

        <!-- Display form-level error, like "This email is already registered" -->
        <?php 
        if (isset($error_message['form_error'])) 
        {
            echo '<div class="error-message" style="color: red;">';
            echo htmlspecialchars($error_message['form_error']);
            echo '</div>';
        }
        ?>

        <form action="../control/register_customer.php" method="POST">
            <!-- First Name -->
            <div class="form-group">
                <label for="f_name">First Name:</label>
                <input type="text" id="f_name" name="f_name" value="<?php echo isset($form_data['f_name']) ? htmlspecialchars($form_data['f_name']) : ''; ?>" required>
                <div class="error-message" style="color: red;">
                    <?php echo isset($error_message['f_name']) ? $error_message['f_name'] : ''; ?>
                </div>
            </div>

            <!-- Last Name -->
            <div class="form-group">
                <label for="l_name">Last Name:</label>
                <input type="text" id="l_name" name="l_name" value="<?php echo isset($form_data['l_name']) ? htmlspecialchars($form_data['l_name']) : ''; ?>" required>
                <div class="error-message" style="color: red;">
                    <?php echo isset($error_message['l_name']) ? $error_message['l_name'] : ''; ?>
                </div>
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo isset($form_data['email']) ? htmlspecialchars($form_data['email']) : ''; ?>" required>
                <div class="error-message" style="color: red;">
                    <?php echo isset($error_message['email']) ? $error_message['email'] : ''; ?>
                </div>
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <div class="error-message" style="color: red;">
                    <?php echo isset($error_message['password']) ? $error_message['password'] : ''; ?>
                </div>
            </div>

            <!-- Phone -->
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" value="<?php echo isset($form_data['phone']) ? htmlspecialchars($form_data['phone']) : ''; ?>" required pattern="\d{11}" title="Please enter an 11-digit phone number.">
                <div class="error-message" style="color: red;">
                    <?php echo isset($error_message['phone']) ? $error_message['phone'] : ''; ?>
                </div>
            </div>

            <!-- Address -->
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" value="<?php echo isset($form_data['address']) ? htmlspecialchars($form_data['address']) : ''; ?>" required>
            </div>

            <!-- Delivery Address -->
            <div class="form-group">
                <label for="delivery_address">Delivery Address:</label>
                <input type="text" id="delivery_address" name="delivery_address" value="<?php echo isset($form_data['delivery_address']) ? htmlspecialchars($form_data['delivery_address']) : ''; ?>" required>
            </div>

            <!-- Submit Button -->
            <div class="form-group">
                <input type="submit" value="Register">
            </div>
        </form>

        <!-- Link to login page -->
        <div class="login-link">
            <p>Have an account? <a href="../view/login_form.php">Login here</a></p>
        </div>
    </div>
</body>
</html>

