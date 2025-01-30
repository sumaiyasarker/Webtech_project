<?php
include "../control/profile_controller.php";
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
        <p>ID: <?php echo htmlspecialchars($customer_id); ?></p>
        <p>Email: <?php echo htmlspecialchars($email); ?></p>

        <?php if (!empty($message)): ?>
            <p class="<?php echo strpos($message, 'successfully') !== false ? 'success-message' : 'error-message'; ?>">
                <?php echo htmlspecialchars($message); ?>
            </p>
        <?php endif; ?>

        <h3>Change Password</h3>
        <form method="POST" action="../control/profile_controller.php">
            <label for="current_password">Current Password:</label>
            <input type="password" id="current_password" name="current_password" required><br><br>

            <label for="new_password">New Password:</label>
            <input type="password" id="new_password" name="new_password" required><br><br>

            <button type="submit" name="update_password">Update Password</button>
        </form>

        <h3>Delete Account</h3>
        <form method="POST" action="../control/profile_controller.php" 
              onsubmit="return confirm('Warning: This action cannot be undone. Are you sure you want to delete your account?');">
            <button type="submit" name="delete_account" class="delete-button">Delete Account</button>
        </form>

        <button onclick="window.location.href='home.php';" class="back-button">Back to Home</button>
    </div>
</body>
</html>

