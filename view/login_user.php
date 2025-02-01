<!DOCTYPE html>
<html lang="en">
<head>
    <title>Welcome to Our Restaurant</title>
</head>
<body>
    <h2>Welcome to Our Restaurant</h2>
    <form method="POST" action="../control/login_process.php">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="../control/user.php">Create a new account</a></p>
</body>
</html>
