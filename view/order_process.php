<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (!isset($_SESSION['email']) || !isset($_SESSION['id']))
    {
        echo "<p>Please <a href='login.php'>log in</a> to place an order.</p>";
        exit();
    }

    require_once '../lib/fpdf.php'; 
    include "../Model/db.php"; 

    $dish_id = $_POST['dish_id'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $cust_id = $_SESSION['id'];  
    $total_price = $price * $quantity;
    $date = date('Y-m-d');  
    $delivery_status = 'Pending'; 

    if ($order = insertOrder($cust_id, $quantity, $price)) 
    {
        $order_id = $conn->insert_id;

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 12);

        $pdf->Cell(0, 10, "Order Confirmation", 0, 1, 'C');
        $pdf->Ln(10);
        $pdf->Cell(40, 10, "Order ID: " . $order_id);
        $pdf->Ln(10);
        $pdf->Cell(40, 10, "Customer ID: " . $cust_id);
        $pdf->Ln(10);
        $pdf->Cell(40, 10, "Dish Quantity: " . $quantity);
        $pdf->Ln(10);
        $pdf->Cell(40, 10, "Total Price: $" . number_format($total_price, 2));
        $pdf->Ln(10);
        $pdf->Cell(40, 10, "Order Status: " . $delivery_status);
        
        $pdf->Output('F', '../pdf/order_' . $order_id . '.pdf'); 

        // Add HTML structure to display order confirmation and include the CSS
        echo "<!DOCTYPE html>
        <html>
        <head>
            <title>Order Confirmation</title>
            <link rel='stylesheet' type='text/css' href='../css/styles.css'> <!-- Link to your CSS file -->
        </head>
        <body>
            <div class='form-container'>
                <h1>Order Confirmation</h1>
                <br>
                <p><strong>Order ID:</strong> " . $order_id . "</p>
                <br>
                <p><strong>Customer ID:</strong> " . $cust_id . "</p>
                 <br>
                <p><strong>Dish Quantity:</strong> " . $quantity . "</p>
                 <br>
                <p><strong>Total Price:</strong> $" . number_format($total_price, 2) . "</p>
                 <br>
                <p><strong>Order Status:</strong> " . $delivery_status . "</p>
                 <br>
                <p style='color: green;'>PDF has been generated and saved in the <strong>pdf</strong> folder.</p>

            </div>
        </body>
        </html>";
    } 
    else 
    {
        echo "Error placing order. Please try again.";
    }

    closeCon($conn);
} 
else 
{
    echo "Invalid request.";
}
?>
