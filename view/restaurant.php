<?php
include "../Model/db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant List</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        a {
            text-decoration: none;
            color: blue;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Restaurant List</h1>

    <table>
        <thead>
            <tr>
                <th>Category</th>
                <th>Restaurant Title</th>
                <th>Opening Hour</th>
                <th>Closing Hour</th>
                <th>Operating Days</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT c.c_name, r.title, r.o_hr, r.c_hr, r.o_days, r.phone, r.email, r.address
                    FROM Restaurants r
                    INNER JOIN Category c ON r.category_id = c.c_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['c_name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['title']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['o_hr']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['c_hr']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['o_days']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['address']) . "</td>";
                    // Using r.title as query parameter (URL-encoded) View dishes 
                    echo "<td><a href='../view/Dishes.php?restaurant_title=" . urlencode($row['title']) . "'>Dishes</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='9'>No restaurants found.</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>

    <br>
    <a href="../Control/addRestaurant.php">Back to addRestaurant</a>
    <br>
    <a href="../Control/update_deleteRestaurant.php">Back to update_deleteRestaurant</a>
</body>
</html>
