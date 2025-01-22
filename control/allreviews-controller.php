<?php
include_once '../Model/db.php'; // Include the db.php for database connection

// Start the session only if it hasn't been started yet
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Fetch all reviews from the database
$reviews = [];
if ($conn) {
    $sql = "SELECT r.comment, d.title AS dish_title, CONCAT(c.f_name, ' ', c.l_name) AS customer_name 
            FROM reviews r 
            JOIN dishes d ON r.d_id = d.d_id 
            JOIN customer c ON r.customer_id = c.id 
            ORDER BY r.review_id DESC"; // Adjust the query as needed
    $result = $conn->query($sql);

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $reviews[] = $row; // Store each review in the $reviews array
        }
    } else {
        echo "Error fetching reviews: " . $conn->error;
    }
} else {
    echo "Database connection failed.";
}
?>
