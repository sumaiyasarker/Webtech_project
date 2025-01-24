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
        <form action="../control/login_customer.php" method="POST">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>

            <div>
                <input type="submit" value="Login">
                <button type="button" onclick="window.history.back();">Go Back</button>
            </div>
        </form>
    </div>
</body>
</html>
