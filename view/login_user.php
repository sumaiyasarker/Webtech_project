<!DOCTYPE html>
<html lang="en">
<head>
    <title>Welcome to Our Restaurant</title>
    <link rel="stylesheet" type="text/css" href="../css/styles_r.css">
</head>
<body>
    <h2>Welcome to Our Restaurant</h2>
    <form method="POST" action="../Control/login_process.php">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit">Login</button>
    </form>
    <div class="center-text">
        <p>Don't have an account? <a href="../Control/user.php">Create a new account</a></p>
    </div>
</body>
</html>