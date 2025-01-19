<?php
require '../control/reviews-controller.php'; // Ensure this points to your database connection file
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews for Dish</title>
</head>
<body>

<h1>Reviews for Dish</h1>

<div class="reviews-section">
    <h2>All Reviews</h2>
    <?php if (!empty($reviews)): ?>
        <?php foreach ($reviews as $review): ?>
            <div class="review-item">
                <h3>Dish: <?= htmlspecialchars($review['dish_title']) ?></h3>
                <p><strong>Reviewed by:</strong> <?= htmlspecialchars($review['customer_name']) ?></p>
                <p><strong>Comment:</strong> <?= htmlspecialchars($review['comment']) ?></p>
                <hr>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No reviews available for this dish yet.</p>
    <?php endif; ?>
</div>

<form method="POST" action="">
    <h2>Leave a Review</h2>
    <textarea name="comment" required placeholder="Write your review here..."></textarea>
    <input type="hidden" name="order_id" value="<?= htmlspecialchars($order_id) ?>"> <!-- Include order_id -->
    <button type="submit">Submit Review</button>
</form>

</body>
<script src="../js/reviews.js"></script>
</html>
