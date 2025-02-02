<?php 
include "../Model/db.php";  // Database connection

session_start();

// Start output buffering to ensure header works correctly
ob_start();

$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Validate inputs
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Invalid email format.";
    } elseif (empty($password)) {
        $error_message = "Password is required.";
    } else {
        // Check rider credentials in the database
        $query = "SELECT * FROM riders WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Verify the password
            if (password_verify($password, $row['password'])) {
                $_SESSION['rider_id'] = $row['rider_id'];
                $_SESSION['rider_name'] = $row['name'];

                // Redirect to rider dashboard
                header("Location: orderRIDER_dashboard.php");
                exit();
            } else {
                $error_message = "Incorrect password.";
            }
        } else {
            $error_message = "No matching email found.";
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rider Login</title>
    <link rel="stylesheet" href="../css/styles_loginr.css"> <!-- Link to external CSS -->
</head>
<body>
    <div class="login-container">
        <h1>Rider Login</h1>
        
        <?php if (!empty($error_message)) : ?>
            <p class="error-message"><?php echo $error_message; ?></p>
        <?php endif; ?>

        <form method="POST">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" name="login" value="Login">
        </form>

        <a href="index.php" class="back-link">Back to Home</a>
    </div>
</body>
</html>
