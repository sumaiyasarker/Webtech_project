<?php
include "../Model/db.php";
session_start();

if (isset($_GET['restaurant'])) {
    $restaurant = $_GET['restaurant'];
    switch ($restaurant) {
        case 'Pakistan':
            $idRange = "1 AND 4";
            break;
        case 'Indian':
            $idRange = "5 AND 9";
            break;
        case 'Turkish':
            $idRange = "10 AND 13";
            break;
        default:
            echo "Invalid restaurant selection.";
            exit;
    }

    $sql = "SELECT * FROM `dishes` WHERE `d_id` BETWEEN $idRange";
    $result = $conn->query($sql);

    $pageTitle = htmlspecialchars($restaurant) . " Dishes";
} else {
    $pageTitle = "All Dishes";
    $result = getDishes(); // Default to fetch all dishes
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" type="text/css" href="../css/styles_r.css">
</head>
<body>

    <h1><?php echo $pageTitle; ?></h1>
    <?php if (isset($_SESSION['id'])): ?>
        <a href="../view/allreviews.php">
        <button>All Reviews</button>
        </a>
    <?php else: ?>
        <h2>Leave a Review</h2>
        <p>Please <a href="../view/login.php">log in</a> to leave a review.</p>
    <?php endif; ?>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if (isset($row['d_id'])) {
                echo "<div class='dish-container'>
                        <h2>" . htmlspecialchars($row['title']) . "</h2>
                        <p>
                            <a href='../control/order_food.php?d_id=" . $row['d_id'] . "'>
                                <img src='" . $row['img'] . "' alt='" . htmlspecialchars($row['title']) . "' width='200'>
                            </a>
                        </p>
                        <p>" . htmlspecialchars($row['slogan']) . "</p>
                        <p>Price: $" . number_format($row['price'], 2) . "</p>";

                if (isset($_SESSION['id'])) {
                    $customer_id = $_SESSION['id'];
                    $order_result = getOrderByCustomerId($customer_id);
                    if ($order_result) {
                        $order_id = $order_result['o_id'];
                        echo "<form method='GET' action='../view/reviews.php'>
                                <input type='hidden' name='dish_id' value='" . $row['d_id'] . "'>
                                <input type='hidden' name='order_id' value='" . $order_id . "'>
                                <button type='submit'>Leave a Review</button>
                              </form>";
                    } else {
                        echo "<p>No orders found for this user.</p>";
                    }
                }

                echo "</div><hr>";
            } else {
                echo "<div>Error: Missing d_id for one of the dishes.</div><hr>";
            }
        }
    } else {
        echo "No dishes available.";
    }

    closeCon($conn);
    ?>
</body>
</html>
