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
        <form action="../control/register_customer.php" method="POST">
            <label for="f_name">First Name:</label>
            <input type="text" id="f_name" name="f_name" required><br><br>

            <label for="l_name">Last Name:</label>
            <input type="text" id="l_name" name="l_name" required><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>

            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" required><br><br>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required><br><br>

            <label for="delivery_address">Delivery Address:</label>
            <input type="text" id="delivery_address" name="delivery_address" required><br><br>

            <input type="submit" value="Register">
        </form>
    </div>
</body>
</html>
