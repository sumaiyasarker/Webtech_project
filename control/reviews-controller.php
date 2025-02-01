<?php
require_once '../Model/db.php'; // Ensure this points to your database connection file
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

// Get the dish_id and order_id from the GET request
$dish_id = isset($_GET['dish_id']) ? intval($_GET['dish_id']) : 0;
$order_id = isset($_GET['order_id']) ? intval($_GET['order_id']) : 0; // Get the order ID

// Fetch reviews for the specific dish
$reviews = [];
if ($dish_id > 0) {
    $sql = "SELECT r.comment, d.title AS dish_title, CONCAT(c.f_name, ' ', c.l_name) AS customer_name 
            FROM reviews r 
            JOIN dishes d ON r.d_id = d.d_id 
            JOIN customer c ON r.customer_id = c.id 
            WHERE d.d_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $dish_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    while ($row = $result->fetch_assoc()) {
        $reviews[] = $row;
    }
}

// Handle form submission for adding a review
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['comment']) && $order_id > 0) { // Ensure order_id is valid
        $comment = $_POST['comment'];
        $customer_id = $_SESSION['id'];

        // Insert review into the database
        $sql = "INSERT INTO reviews (comment, customer_id, d_id, o_id) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("siii", $comment, $customer_id, $dish_id, $order_id); // Include o_id
        
        if ($stmt->execute()) {
            header("Location: " . $_SERVER['HTTP_REFERER']); // Redirect back to the previous page
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "Error: Missing required fields.";
    }
}
?>
