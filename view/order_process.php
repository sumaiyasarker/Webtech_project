<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    
    if (!isset($_SESSION['email']) || !isset($_SESSION['id'])) 
    {
        echo "<p>Please <a href='login.php'>log in</a> to place an order.</p>";
        exit();
    }

   
    include "../Model/db.php";

    
    $dish_id = $_POST['dish_id'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $cust_id = $_SESSION['id'];  
    $total_price = $price * $quantity;
    $date = date('Y-m-d');  
    $delivery_status = 'Pending'; 


    // Insert order into orders table
    if ($order=insertOrder($cust_id, $quantity, $price)) 
    {
        // Get the newly inserted order ID
        $order_id = $conn->insert_id;

        // Display the order details
        echo "<h2>Order Confirmation</h2>";
        echo "<p><strong>Order ID:</strong> " . $order_id . "</p>";
        echo "<p><strong>Customer ID:</strong> " . $cust_id . "</p>";
        echo "<p><strong>Dish Quantity:</strong> " . $quantity . "</p>";
        echo "<p><strong>Total Price:</strong> $" . number_format($total_price, 2) . "</p>";
        echo "<p><strong>Order Status:</strong> " . $delivery_status . "</p>";
    }
     else 
    {
        echo "Error placing order. Please try again.";
    }

    // Close the connection
    closeCon($conn);
} 
else 
{
    echo "Invalid request.";
}
?>












