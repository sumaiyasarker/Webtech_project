<?php
session_start();
include "../Model/db.php";

if (!isset($_SESSION['email']) || !isset($_SESSION['id'])) {
    echo "<p>Please <a href='login.php'>log in</a> to place an order.</p>";
    exit();
}

if (isset($_GET['d_id']) && is_numeric($_GET['d_id'])) {
    $dish_id = $_GET['d_id'];
    $dish = getDishById($dish_id);

    if ($dish) 
    
    {
        echo "<!DOCTYPE html>
        <html>
        <head>
            <title>Order Food</title>
            <link rel='stylesheet' href='../css/styles.css'>
            <script src='../js/order_food_js.js'></script>
        </head>
        <body>
            <div class='form-container'>
                <h1>Order for " . htmlspecialchars($dish['title']) . "</h1>
                <br><br>
                <form method='POST' action='../view/order_process.php'>
                    <p>Price: $ <span>" . htmlspecialchars($dish['price']) . "</span></p>
                    <br>
                    <p>Quantity: 
                        <div class='quantity-container'>
                            <button type='button' class='quantity-button' onclick='decreaseQuantity()'>-</button>
                            <input type='number' id='quantity' name='quantity' value='1' min='1'>
                            <button type='button' class='quantity-button' onclick='increaseQuantity()'>+</button>
                        </div>
                    </p>
                    <p>Total Price: $ <span id='total_price'>" . htmlspecialchars($dish['price']) . "</span></p>
                    <br>
                    <input type='hidden' name='dish_id' value='" . htmlspecialchars($dish['d_id']) . "'>
                    <input type='hidden' name='price' value='" . htmlspecialchars($dish['price']) . "'>
                    <input type='hidden' name='cust_id' value='" . htmlspecialchars($_SESSION['id']) . "'>
                    <button type='submit'>Place Order</button>
                </form>
            </div>
        </body>
        </html>";
    } else {
        echo "Dish not found.";
    }
} else {
    echo "Invalid or missing dish ID.";
}
?>
