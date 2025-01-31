<?php
include '../Model/db.php'; 
//include '../Model/orders.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) 
{
    $action = $_POST['action'];
    $order_id = $_POST['order_id'];
    $rider_id = $_POST['rider_id'];

    if ($action === 'assignOrder')
     {
        

        $result = assignOrderToRider($order_id, $rider_id);
        
        
        if ($result) {
            echo json_encode(['success' => true, 'message' => 'Order accepted successfully.']);
        } 
        else 
        {
            echo json_encode(['success' => false, 'message' => 'Failed to accept order.']);
        }
    }
} 
else 
{
    
    echo json_encode(['success' => false, 'message' => 'Invalid request.']);
}
?>
 