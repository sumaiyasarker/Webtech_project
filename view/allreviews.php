<?php
require '../control/allreviews-controller.php'; // Ensure this points to your database connection file
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews</title>
</head>
<body>

<h1>Reviews</h1>

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
        <p>No reviews available.</p>
    <?php endif; ?>
</div>

<?php if (!isset($_SESSION['id'])): ?>
    <p>Please <a href="login.php">log in</a> to leave a review.</p>
<?php endif; ?>

</body>
</html>
