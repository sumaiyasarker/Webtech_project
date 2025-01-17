<?php
include "../Model/db.php";

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
</head>
<body>

    <h1><?php echo $pageTitle; ?></h1>

    <?php
    if ($result->num_rows > 0)
    {
        while ($row = $result->fetch_assoc())
        {
            if (isset($row['d_id']))
            {
                echo "<div>
                        <h2>" . htmlspecialchars($row['title']) . "</h2>
                        <p>
                            <a href='../control/order_food.php?d_id=" . $row['d_id'] . "'>
                                <img src='" . $row['img'] . "' alt='" . htmlspecialchars($row['title']) . "' width='200'>
                            </a>
                        </p>
                        <p>" . htmlspecialchars($row['slogan']) . "</p>
                        <p>Price: $ " . number_format($row['price'], 2) . "</p>
                      </div><hr>";
            }
            else
            {
                echo "<div>Error: Missing d_id for one of the dishes.</div><hr>";
            }
        }
    }
    else
    {
        echo "No dishes available.";
    }

    // Close the connection
    closeCon($conn);
    ?>

</body>
</html>
