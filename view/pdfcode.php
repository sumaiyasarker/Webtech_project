<?php
session_start();
include "../Model/db.php";
require "../lib/fpdf.php"; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    
    $userId = $_SESSION['id'];
    $orderDetails = $_POST['order_details']; 
    $totalPrice = $_POST['total_price'];

   
    $orderId = insertOrder($userId, $orderDetails, $totalPrice);
    
    if ($orderId) 
    {
        
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        
        // Header
        $pdf->Cell(0, 10, 'Order Receipt', 0, 1, 'C');
        $pdf->Ln(10);

        // User Info
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, "Order ID: $orderId", 0, 1);
        $pdf->Cell(0, 10, "User ID: $userId", 0, 1);
        $pdf->Cell(0, 10, "Email: " . htmlspecialchars($_SESSION['email']), 0, 1);
        $pdf->Ln(5);

        // Order Details
        $pdf->Cell(0, 10, 'Order Details:', 0, 1);
        foreach (json_decode($orderDetails, true) as $item)
        {
            $pdf->Cell(0, 10, "{$item['name']} - Qty: {$item['quantity']} - Price: {$item['price']}", 0, 1);
        }
        $pdf->Ln(5);

        // Total Price
        $pdf->Cell(0, 10, "Total Price: $$totalPrice", 0, 1);

        // Save PDF to the 'pdf' folder
        $filePath = "../pdf/receipt_$orderId.pdf";
        $pdf->Output('F', $filePath);

        // Show success message
        echo "<script>
            alert('Order placed successfully. Receipt saved.');
            window.location.href = 'user_dashboard.php';
        </script>";
        exit();
    } else {
        echo "<script>
            alert('Error placing order. Please try again.');
            window.location.href = 'order_page.php';
        </script>";
        exit();
    }
} else {
    // Redirect if accessed directly
    header("Location: order_page.php");
    exit();
}
?>
